<?php include "inc/header.php"; ?>


<?php 
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $first_name = escape($_POST['first_name']);
    $last_name = escape($_POST['last_name']);
    $username = escape($_POST['username']);
    $email = escape($_POST['email']);
    $password = escape($_POST['password']);
    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(first_name,last_name,username,profile_image,email,password, id_group) ";
    $sql .= "VALUES('$first_name','$last_name','$username','uploads/default.jpg','$email','$password', '1')";
    confirm(query($sql));
}

?>

<div class="flag2"><p> Login</p></div>
<form  method="POST" class="reg" >
    <input type = "text" name="first_name" placeholder="First Name" id="first_name" required>
    <input type = "text" name="last_name" placeholder="Last Name" id="last_name" required>
    <input type = "text" name="username" placeholder="Username" required>
    <input type = "email" name="email" placeholder="Email" required>
    <input type = "password" name="password" placeholder="Password" required>
    <input type = "password" name="confirm_password" placeholder="Confirm password" required>
    <input type = "submit" name="register-submit" placeholder="Register now" >
        
</form>

