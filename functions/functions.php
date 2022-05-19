<?php
function clean($str)
{
    return htmlentities($str);
}

function redirect($location)
{
    header("location: {$location}");
    exit();
}

function set_message($message)
{
    if (!empty($message)) {
        $_SESSION['message'] = $message;
    } else {
        $message = "";
    }
}

function display_message()
{
    if (isset($_SESSION['message'])) {
        echo '<div class="upozorenje">' . $_SESSION['message'] . '</div>';
        unset($_SESSION['message']);
    }
}


function email_exists($email)
{
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $query = "SELECT id FROM users WHERE email = '$email'";
    $result = query($query);

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function user_exists($user)
{
    $user = filter_var($user, FILTER_SANITIZE_SPECIAL_CHARS);
    $query = "SELECT id FROM users WHERE username = '$user'";
    $result = query($query);

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function validate_user_registration()
{
    $errors = [];
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $first_name = clean($_POST['first_name']);
        $last_name = clean($_POST['last_name']);
        $username = clean($_POST['username']);
        $email = clean($_POST['email']);
        $password = clean($_POST['password']);
        $confirm_password = clean($_POST['confirm_password']);
        if (strlen($first_name) < 3) {
            $errors[] = "Ime ne može biti manje od 3 znaka!";
        }
        if (strlen($last_name) < 3) {
            $errors[] = "Prezime ne može biti manje od 3 znaka!";
        }
        if (strlen($username) < 3) {
            $errors[] = "Korisničko ime ne može biti manje od 3 znaka!";
        }
        if (strlen($username) > 20) {
            $errors[] = "Korisničko ime ne može biti veće od 20 znakova!";
        }
        if (email_exists($email)) {
            $errors[] = "E-mail adresa je već zauzeta!";
        }
        if (user_exists($username)) {
            $errors[] = "Korisničko ime je već zauzeto!";
        }
        if (strlen($password) < 8) {
            $errors[] = "Lozinka ne može biti manja od 8 znakova!";
        }
        if ($password != $confirm_password) {
            $errors[] = "Lozinke se ne podudaraju!";
        }
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo '<div class="upoz col-xs-12 col-md-4 pl-0 mx-auto"> <img class="imica" src="../Web-projekt-WP/images/usklicnik.png"></img> <span class="erorispan">' . $error . '</span></div>';
            }
        } else {
            $first_name = filter_var($first_name, FILTER_SANITIZE_SPECIAL_CHARS);
            $last_name = filter_var($last_name, FILTER_SANITIZE_SPECIAL_CHARS);
            $username = filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);

            create_user($first_name, $last_name, $username, $email, $password);
        }
    }
}

function create_user($first_name, $last_name, $username, $email, $password)
{
    $first_name = escape($first_name);
    $last_name = escape($last_name);
    $username = escape($username);
    $email = escape($email);
    $password = escape($password);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users(first_name,last_name,username,email,password) ";
    $sql .= "VALUES('$first_name','$last_name','$username','$email','$password')";
    confirm(query($sql));
    set_message("Uspješna registracija! Molimo Vas ulogirajte se.");
    redirect('login.php');

}

function validate_user_login()
{
    $errors = [];
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = clean($_POST['email']);
        $password = clean($_POST['password']);

        if (empty($email)) {
            $errors[] = "Email field cannot be empty";
        }
        if (empty($password)) {
            $errors[] = "Password field cannot be empty";
        }
        if (empty($errors)) {
            if (user_login($email, $password)) {
                redirect('index.php');
            } else {
                $errors[] = "Neispravna e-mail adresa ili lozinka!";
            }
        }
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo '<div class="upoz col-xs-12 col-md-4 pl-0 mx-auto"> <img class="imica" src="../Web-projekt-WP/images/usklicnik.png"></img> <span class="erorispan">' . $error . '</span></div>';
            }
        }
    }

}

function user_login($email, $password)
{

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = query($query);

    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();

        if (password_verify($password, $data['password'])) {
            $_SESSION['email'] = $email;
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function login_check_pages()
{
    if (isset($_SESSION['email'])) {
        redirect('index.php');
    }
}

function user_restrictions()
{
    if (!isset($_SESSION['email'])) {
        redirect('login.php');
    }
}


function get_user($id = NULL)
{
    error_reporting(E_ERROR | E_PARSE);
    if ($id != NULL) {
        $query = "SELECT * FROM users WHERE id=" . $id;
        $result = query($query);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return "User not found.";
        }
    } else {
        $query = "SELECT * FROM users WHERE email='" . $_SESSION['email'] . "'";
        $result = query($query);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return "User not found.";
        }
    }
}


function create_post()
{
    $errors = [];
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $post_content = clean($_POST['post_content']);
        $naslov = clean($_POST['naslov']);
        $sazetak = clean($_POST['sazetak']);
        if (strlen($post_content) > 500) {
            $errors[] = "Your post content is too long!";
        }

        if (!empty($errors)) {      
            foreach ($errors as $error) {
                echo '<div class="alert">' . $error . '</div>';
            }
        } else {
   
            $user = get_user();
            $user_id = $user['id'];     

            $sql = "INSERT INTO posts(user_id, title, summary , content ) ";
            $sql .= "VALUES($user_id , '$naslov', '$sazetak', '$post_content')";
            confirm(query($sql));
            redirect('index.php');

            
        }
    }
}




function user_posts($id = NULL)
{
    error_reporting(E_ERROR | E_PARSE);
    if ($id != NULL) {
        $query = "SELECT * FROM posts WHERE posts.user_id=" . $id;
        $result = query($query);

        if ($result->num_rows > 0) {
            return $result->num_rows;
        } else {
            return "Nema objavljenih postova!";
        }
    } 
}


