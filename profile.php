<?php include "inc/header.php";

if(isset($_SESSION['email'])) {
 $user = get_user(); 
echo $user['username']; echo "\n";
echo $user['first_name']; echo "\n\r";
echo $user['last_name']; echo "\n";
echo $user['email'];

}

else { 
  redirect("login.php");
}

?>