

  <div class="container-fluid" style="margin-top:10px; margin-bottom:25px; width:98%; ">

<div class="row justify-content-center">
  
  <div class="col-sm-7 postovi " style="border: 1px solid gray;">

  <?php foreach ( $results['Postss'] as $Posts ) { ?>

<div class="vanjski">
<h4 id ="ha4" >

 <div class=" fleksi" >
 <a class="apf" href=".?action=viewPosts&amp;PostsId=<?php echo $Posts->id?>"> Naslov: <?php echo htmlspecialchars( $Posts->title )?></a>
  </div>
  </h4>
<div class="row">
  </h4>
</div>
<div class="row">
<div class="col-sm-6">
<span class="hp input-group-text"><i class=" fa fa-calendar" aria-hidden="true"></i> <span class="pubDate"><?php echo date('j F l H:i', $Posts->publicationDate)?>  </span>
</span>
  </div>
  <div class="col-sm-6 ">
  <span class="hp input-group-text"><i class=" fa fa-user" aria-hidden="true"></i> <span class="pubDate"><?php echo getUName($Posts->user_id) ?></span>
  </div>
</div>
<div class="rh row">
<div class="s col-sm-12 d-flex aligns-items-center justify-content-center">
<span id="sspan">
<?php echo  $Posts->summary ?>
</span>
</div>
</div>
  
<div class="row">
<div class="col-sm-12  d-flex aligns-items-center justify-content-center" style="margin-bottom:10px;">
<button  class=" bpl btn btn-primary" onclick="location.href = '.?action=viewPosts&amp;PostsId=<?php echo $Posts->id?>'"   >Uđi u članak</button>
  </div>
</div>

<div class="drugi"></div>
</div>
<br> 

<!-- 
    <div class="d-flex flex-md-nowrap"  >
      
        <div class="fleksi p-2 bg-info  d-none d-xl-block">  </div>
      <div class="d-flex flex-column  " style="width:100%;">
      <div class="p-2 bg-warning"><span class="hp input-group-text"><i class="hpf fas fa-quote-right ">  <a class="apf" href=".?action=viewPosts&amp;PostsId=<?php echo $Posts->id?>"> Naslov: <?php echo htmlspecialchars( $Posts->title )?></a> </i></span>
      </div>
      <div class="p-2 bg-warning"> <span class="hp input-group-text"><i class=" fa fa-calendar" aria-hidden="true"></i> <span class="pubDate"><?php echo date('j F l H:i', $Posts->publicationDate)?>  </span>
</span>

      </div>

      <p class="summ" > <?php echo  $Posts->summary ?></p>

        </div>

</div><br>
 -->





<?php } ?>
<p><a href="./?action=archive"  class="d-flex aligns-items-center justify-content-center">Pristupi arhivi članaka</a></p>  

  </div>
  


  </div>
</div>



<?php include "inc/footer.php"; ?>