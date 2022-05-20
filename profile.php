<?php $page = 'profile'; include "inc/header.php";
user_restrictions();

updatepw();
updateusername();
updateemail();
uploadprofilna();

if(isset($_SESSION['email'])) {
 $user = get_user(); 

 echo "<img class='profilna' src='" . $user['p_image'] . "'>";
echo $user['username']; echo "\n";
echo $user['first_name']; echo "\n\r";
echo $user['last_name']; echo "\n";
echo $user['email']; echo "\n";

if($user['id_group'] == '1'){
  echo "Funkcija: administrator";
}
else {
  echo "Funkcija: član";
}


$userp = user_posts($user['id']);

echo $userp;

}

else { 
  redirect("login.php");
}


?>
  <form method="POST" enctype="multipart/form-data">

  <input type="file" name="profilna_file" required>
  <input type="submit" value="Učitaj sliku" name="submit_profilna">
  </form>

 
             <form  method="POST">

<input class="pw" type="password" name="old_password" placeholder="Stara lozinka" required >      
<input class="pw" type="password" name="password" placeholder="Nova lozinka" required>
<input class="pw" type="password" name="confirm_password" placeholder="Potvrda nove lozinke" required >

<input type = "submit" name="change_pw" value="Promjeni lozinku">

             </form>
             <form  method="POST">

<input type = "text" name="username" placeholder="Username" required>   
<input type = "submit" name="change_username" value="Promjeni username">

</form>


<form  method="POST">

<input type = "email" name="email" placeholder="Email" required>    
<input type = "submit" name="change_email" value="Promjeni e-mail" >

</form>

