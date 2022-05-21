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
    $sql = "INSERT INTO users(first_name,last_name,username,email,password, p_image) ";
    $sql .= "VALUES('$first_name','$last_name','$username','$email','$password', 'images/profile/default.jpg')";
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
        $post_content = $_POST['post_content'];
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


function updatepw(){

    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['change_pw']))  {
        $pw_old = clean($_POST['old_password']);
        $pw = clean($_POST['password']);
        $pw_con = clean($_POST['confirm_password']);
        $user = get_user();
        $user_id = $user['id'];
        $user_pw = $user['password'];

        if( !(password_verify($pw_old, $user_pw))) {
                $errors[] = "Niste dobro unijeli staru lozinku!";
            }


        if ($pw != $pw_con) {
            $errors[] = "Lozinke se ne podudaraju!";
        }

        if (strlen($pw) < 8) {
            $errors[] = 'Lozinka mora biti dulja od 8 znakova';
        }

        if (!empty($errors)) {      
            foreach ($errors as $error) {
                echo '<div class="alert">' . $error . '</div>';
            }
        }


        else{
            $password = escape($pw);
            $password = password_hash($pw, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password = '$password' WHERE users.id = '$user_id'";
            confirm(query($sql));
        }
    
    }
}

function updateusername(){
    $errors = [];
    $user = get_user();
    $user_id = $user['id'];
    if ($_SERVER['REQUEST_METHOD'] == "POST"){

        if (isset($_POST['change_username'])) {
            $username = clean($_POST['username']);
            if (strlen($username) < 3) {
                $errors[] = "Korisničko ime ne može biti manje od 3 znaka!";
            }
            if (strlen($username) > 20) {
                $errors[] = "Korisničko ime ne može biti veće od 20 znakova!";
            }
            if (user_exists($username)) {
                $errors[] = "Korisničko ime je već zauzeto!";
            }



            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo '<div class="upoz col-xs-12 col-md-4 pl-0 mx-auto"> <img class="imica" src="../Web-projekt-WP/images/usklicnik.png"></img> <span class="erorispan">' . $error . '</span></div>';
                }
            }
            else{

                $sql = "UPDATE users SET username = '$username' WHERE users.id = '$user_id'";
                confirm(query($sql));
                redirect('profile.php');
            }


    }
}

}

function updateemail(){


    $errors = [];
    $user = get_user();
    $user_id = $user['id'];
    if ($_SERVER['REQUEST_METHOD'] == "POST"){

        if (isset($_POST['change_email'])) {

            $email = clean($_POST['email']);

        if (email_exists($email)) {
            $errors[] = "E-mail adresa je već zauzeta!";
        }



            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo '<div class="upoz col-xs-12 col-md-4 pl-0 mx-auto"> <img class="imica" src="../Web-projekt-WP/images/usklicnik.png"></img> <span class="erorispan">' . $error . '</span></div>';
                }
            }
            else{

                $sql = "UPDATE users SET email = '$email' WHERE users.id = '$user_id'";
                confirm(query($sql));
                session_destroy();
    
                redirect('login.php');
 
            
            }


         }
    }
}

function uploadprofilna(){
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['submit_profilna'])) {
            $errors = "";
            $odredisni_dir = "images/profile/";
            $user = get_user();
            $user_id = $user['id'];
            $odredisni_file = $odredisni_dir . $user_id . "." .pathinfo(basename($_FILES['profilna_file']['name']), PATHINFO_EXTENSION );
            $error = 0;
            $fileType = strtolower(pathinfo($odredisni_file, PATHINFO_EXTENSION));

            $provjera = getimagesize($_FILES['profilna_file']['tmp_name']);
            if($provjera !== false){
                $error = 0;
            }
            else{
                $errors = "Datoteka nije slika!";
                $error = 1;
            }
            if($_FILES['profilna_file']['size'] > 6000000){
                $errors = "Slika je prevelike veličine. Max 6MB!";
                $error = 1;
            }

            if($fileType != "jpg" && $fileType != "png" && $fileType != "gif" && $fileType != "jpeg" ){
                $errors = "Dozvoljene ekstenzije: .jpg, .png, .gif i .jpeg!";
                $error = 1;
            }

            if($error == 1){
                echo "Error" . $errors;

            }
            else{
                $sql = "UPDATE users SET p_image='$odredisni_file' WHERE id=$user_id";
                confirm(query($sql));
            }
            if(!move_uploaded_file($_FILES["profilna_file"]["tmp_name"], $odredisni_file)) {
                echo 'Error';
            }
        }
        redirect('profile.php');

    }
}


function dodajclana(){
    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $ime = $_POST['a_ime'];
        $prezime = clean($_POST['a_prezime']);
        $funkcija = clean($_POST['fja']);
        $email = clean($_POST['a_email']);
        $funkcijazbor = clean($_POST['a_dodatna']);
        $datumpristupa = clean($_POST['a_datum']); 

        $sql = "INSERT INTO team(first_name,last_name,funkcija,datumpristupa,email, dodatna_fja) ";
        $sql .= "VALUES('$ime','$prezime','$funkcija','$datumpristupa','$email', '$funkcijazbor')";
        confirm(query($sql));
        


    }





}