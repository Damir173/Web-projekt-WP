<?php $page = 'aboutus'; include "inc/header.php"; ?>


<div class="container d-none d-xl-block">
  <div class="row justify-content-center ">
    <div class="col-4">
    <h1 class="ml2">
  <span class="text-wrapper">
    <span class="letters2">&nbsp&nbsp&nbsp&nbspZbor rukometnih sudaca</span>
  </span>
</h1>
<h1 class="ml1">
  <span class="text-wrapper">
    <span class="line line1"></span>
    <span class="letters">Slavonski Brod</span>
    <span class="line line2"></span>
  </span>
</h1>
    </div>
</div>
<br>

 </div>



 <div class="container-fluid" style="margin-top:10px; width:98%">

  <div class="row justify-content-center">
    <div class="col-sm-4 red1" style="margin-top:5px;">
    <h2 id = "animated-example" class = "animated bounceInUp">Tko smo mi?</h2>
   <hr style="height:5px;border-width:0;color:blue;background-color:blue; width:100px;">
    <p id="onamap">
Lorem ipsum dolor sit amet, consectetur adipiscing elit. A aliquam massa tincidunt sed. Pellentesque viverra hendrerit lacus, ac ultrices libero laoreet in. Vivamus porttitor dolor vel tincidunt egestas. Fusce et placerat sem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras eget tristique augue, in aliquet magna. Fusce vitae suscipit eros, eget maximus enim. Sed enim elit, aliquet nec vulputate sed, feugiat ac lectus. Aenean eget tristique odio. Morbi rutrum ligula nisi, id gravida turpis auctor in. Ut sollicitudin justo sit amet libero imperdiet euismod. Integer vitae libero imperdiet, suscipit libero.</p>
    </div>

    <div class="col-sm-4 red2" style="margin-top:5px;"> 

  
     <img class="embed-responsive embed-responsive-16by9" src="../Web-projekt-WP/images/handball.jpg" style=" margin:auto !important;  border-radius:5px; border: 1px solid gray; width:80%; height:95%;">

    
    </div>
    </div>
 </div>



 <div class="container-fluid" style="margin-top:10px; margin-bottom:20px; width:98%;">

<div class="row justify-content-center ">
  <div class="col-sm-4 red1 d" style="margin-top:5px;">

  <div class="stat" style="padding-bottom:10px">
  <div class="d-none d-xl-block"> <br><br><br></div>
  <div id="shiva"><span>Ukupan broj clanova: </span><span class="count"><?php echo brojclanova(1);?></span></div>
<div id="shiva"><span>Broj sudaca: </span><span class="count"><?php echo brojclanova(2);?></span></div>
<div id="shiva"><span>Broj nadzornika: </span><span class="count"><?php echo brojclanova(3);?></span></div>
<div id="shiva"><span>Broj mjeritelja vremena: </span><span class="count"><?php echo brojclanova(4);?></span></div>

  </div>


</div>

  <div class="col-sm-4 red2"  style="margin-top:5px;">
  <h2 id = "animated-example" class = "animated bounceInUp">Statistika</h2>
   <hr style="height:5px;border-width:0;color:blue;background-color:blue; width:100px;">
  <p id="onamap">Lorem ipsum dolor sit amet, consectetur adipiscing elit. A aliquam massa tincidunt sed. Pellentesque viverra hendrerit lacus, ac ultrices libero laoreet in. Vivamus porttitor dolor vel tincidunt egestas. Fusce et placerat sem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras eget tristique augue, in aliquet magna. Fusce vitae suscipit eros, eget maximus enim. Sed enim elit, aliquet nec vulputate sed, feugiat ac lectus. Aenean eget tristique odio. Morbi rutrum ligula nisi, id gravida turpis auctor in. Ut sollicitudin justo sit amet libero imperdiet euismod. Integer vitae libero imperdiet, suscipit libero.</p>
  
  </div>
  </div>
</div>










<script>


// counter

$('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 5500,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});



</script>




<script>

    // Wrap every letter in a span
var textWrapper = document.querySelector('.ml1 .letters');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
  .add({
    targets: '.ml1 .letter',
    scale: [0.3,1],
    opacity: [0,1],
    translateZ: 0,
    easing: "easeOutExpo",
    duration: 1000,
    delay: (el, i) => 70 * (i+1) + 1000
  }).add({
    targets: '.ml1 .line',
    scaleX: [0,1],
    opacity: [0.5,1],
    easing: "easeOutExpo",
    duration: 700,
    offset: '-=875',
    delay: (el, i, l) => 80 * (l - i)
  }).add({
    targets: '.ml1',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });


var textWrapper2 = document.querySelector('.ml2 .letters2');
textWrapper2.innerHTML = textWrapper2.textContent.replace(/\S/g, "<span class='letter2'>$&</span>");


anime.timeline({loop: true})
  .add({
    targets: '.ml2 .letter2',
    scale: [0.3,1],
    opacity: [0,1],
    translateZ: 0,
    easing: "easeOutExpo",
    duration: 1000,
    delay: (el, i) => 70 * (i+1)
  }).add({
    targets: '.ml2 .line',
    scaleX: [0,1],
    opacity: [0.5,1],
    easing: "easeOutExpo",
    duration: 700,
    offset: '-=875',
    delay: (el, i, l) => 80 * (l - i)
  }).add({
    targets: '.ml2',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });


</script>


<?php
include "inc/footer.php" ;

?>