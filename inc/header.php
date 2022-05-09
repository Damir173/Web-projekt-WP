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
          <li class="nav-item">
          <a class="nav-link " href="index.php">Home</a>
          </li>
        
          <?php  $user = get_user(); if( (isset($_SESSION['email'])) && $user['id_group'] == '1'  ): ?>
            <li class="nav-item">
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
          
          <li class="nav-item">
            <a class="nav-link " href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="register.php">Register</a>
          </li>
            <?php else: ?>
          <li class="nav-item profile-name">
            <a class="nav-link" href="profile.php"><?php $user = get_user(); echo $user['username'];?>  </a>
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