<?php $page = 'profile'; include "inc/header.php";
updatepodatke();
if(isset($_SESSION['email'])) {
 $user = get_user(); 
echo $user['username']; echo "\n";
echo $user['first_name']; echo "\n\r";
echo $user['last_name']; echo "\n";
echo $user['email']; echo "\n";


$userp = user_posts($user['id']);

echo $userp;

}

else { 
  redirect("login.php");
}

?>
             <form  method="POST">
               
<input class="pw" type="password" name="old_password" placeholder="Stara lozinka" required>      
<input class="pw" type="password" name="password" placeholder="Nova lozinka" required>
<input class="pw" type="password" name="confirm_password" placeholder="Potvrda nove lozinke" required>

<input type = "submit" name="change_pw" value="Promjeni lozinku">

             </form>
