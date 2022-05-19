<?php $page = 'profile'; include "inc/header.php";
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
 