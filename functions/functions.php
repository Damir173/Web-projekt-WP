<?php

function create_user(){
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
    
        // echo '<div class="uspjesnaReg">Wrong</div>';
    
        echo '<div class="uspjesnaReg col-md-3 mx-auto">Sucessfuly registration. Please log in!</div>';
    
    }
}