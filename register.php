<?php include "inc/header.php";
login_check_pages(); ?>
<?php 

validate_user_registration();    ?>
   
<div class="regv col-md-7 mx-auto " >
<div class ="regh"> <p id="reghp"> R E G I S T R A C I J A </p> </div>
<form  method="POST" class="reg" >

    <div class="row"> 
    <div class = "col-md-4 mx-auto"> <p class="regp">Name:</p> </div>
    <div class="col-md-8">
    <input type = "text" name="first_name" placeholder="First Name"  required>
    </div>
    </div>
    <div class="row"> 
    <div class = "col-md-4 mx-auto"> <p class="regp">Last name:</p> </div>
    <div class="col-md-8">
    <input type = "text" name="last_name" placeholder="Last Name"  required>
    </div>
    </div>
    <div class="row"> 
    <div class = "col-md-4 mx-auto"> <p class="regp">Username:</p> </div>
    <div class="col-md-8">
    <input type = "text" name="username" placeholder="Username" required>
    </div>
    </div>
    <div class="row"> 
    <div class = "col-md-4 mx-auto"> <p class="regp">E-mail:</p> </div>
    <div class="col-md-8">
    <input type = "email" name="email" placeholder="Email" required>    
    </div>
    </div>
    <div class="row"> 
    <div class = "col-md-4 mx-auto"> <p class="regp">Password:</p> </div>
    <div class="col-md-8">
    <input type = "password" name="password" placeholder="Password" required>
    </div>
    </div>
    <div class="row"> 
    <div class = "col-md-4 mx-auto"> <p class="regp">Confirm password:</p> </div>
    <div class="col-md-8">
    <input type = "password" name="confirm_password" placeholder="Confirm password" required>
    </div>
    </div>
  
    <input type = "submit" name="register-submit" value="Register now" id="regbutton">
 
        
</form>
</div>






