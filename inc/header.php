<?php
include "functions/init.php"
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Basic</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

  </head>

<body>  


  <nav class="navbar  navbar-expand-lg navbar-light bg-gradient rounded-top ">
    <div class="container-fluid">
      <a></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
     <li class="nav-item <?php if($page =='index'){echo 'active';}?>">
          <a class="nav-link" href="index.php">Home</a>
          </li>
 
         <?php  $user = get_user(); if( (isset($_SESSION['email'])) && $user['id_group'] == '1'  ): ?>
            <li class="nav-item <?php if($page =='administration'){echo 'active';}?>">
          <a class="nav-link " href="administration.php">Administration</a>
          </li>
          <?php endif; ?>
          <?php if(isset($_SESSION['email'])): ?>

          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
          <?php endif; ?>

</ul>

</div>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
        
          <?php if(!isset($_SESSION['email'])): ?>
          
          <li class="nav-item <?php if($page =='login'){echo 'active';}?>">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item <?php if($page =='register'){echo 'active';}?>">
            <a class="nav-link " href="register.php">Register</a>
          </li>
            <?php else: ?>
          <li class="nav-item profile-name <?php if($page =='profile'){echo 'active';}?>">
         

            <a class="nav-link" href="profile.php">      <img src= "<?php $user = get_user(); echo $user['p_image'];?>  " style="width:35px; height:35px; margin-right:5px; border-radius:50%; border:1px solid gray;"><?php $user = get_user(); echo $user['username'];?>  </a>
          </li>
   
           <?php endif; ?>
          
 
        </ul>

      </div>
    </div>
  </nav>

  <div class="slideshow-container">

    <div class="mySlides fade">
      <img src= "https://www.watermeetsmoney.com/wp-content/uploads/2017/11/Header-background-2.png" style="width:100%; height:299px;">
    </div>
    
    <div class="mySlides fade">
      <img src="https://springboard.ai/wp-content/uploads/2017/11/header-use-case-finance.jpg" style="width:100%; height:299px;">
    </div>
    
    <div class="mySlides fade">
      <img src="https://244194-752526-raikfcquaxqncofqfm.stackpathdns.com/wp-content/uploads/Background-Header-1.jpg" style="width:100%; height:299px;">
    </div>
    </div>

    <div class="flag"> </div>
</body>


</html>



<script>
  let slideIndex = 0;
showSlides();
function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    

  slides[slideIndex-1].style.display = "block";  
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}




</script>