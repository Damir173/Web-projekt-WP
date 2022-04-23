<?php include "inc/header.php";


display_message();
validate_user_login();
login_check_pages();

?>





<div class="regv col-md-7 mx-auto " >
<div class ="regh"> <p id="reghp"> P R I J A V A </p> </div>
<form  method="POST" class="reg" >

    <div class="row"> 
    <div class = "col-md-4 mx-auto"> <p class="regp">E-mail:</p> </div>
    <div class="col-md-8">
    <input type="email" name="email" placeholder="Email" required>
    </div>
    </div>
    <div class="row"> 
    <div class = "col-md-4 mx-auto"> <p class="regp">Password:</p> </div>
    <div class="col-md-8">
    <input type="password" name="password" placeholder="Password" required>
    </div>
    </div>
   
  
    <input type = "submit" name="register-submit" value="Log In" id="regbutton">
 
        
 </form>
 </div>
 
 