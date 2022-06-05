<?php $page = 'login'; include "inc/header.php";


display_message();
validate_user_login();
login_check_pages();

?>


<div class="container h-100 login">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="../Web-projekt-WP/images/logo.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
                <form  method="POST"  >
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-envelope"></i></span>
							</div>
                            <input type="email" class="mail" name="email" placeholder="Email" required>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
                            <input class="pw" type="password" name="password" placeholder="Password" required>
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Remember me</label>
							</div>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
                            <input type = "submit" name="register-submit" value="Log In" class="regb btn btn-primary">
							
				   </div>
					</form>
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Nemate račun? <a href="register.php" class="ml-2">Registrirajte se</a>
					</div>
				
				</div>
			</div>

		</div>
	</div>


	<?php include "inc/footer.php"; ?>

<!-- <div class="regv col-md-7 mx-auto " >
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
 </div>-->
 
 