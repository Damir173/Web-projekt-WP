
<div class="container-fluid d-flex aligns-items-center justify-content-center">
<div class="col-sm-8" style="margin-top:10px" >
<main class="Prose" style="margin-bottom:10px;">
<h1 style="padding-top:10px;   text-align: justify;"><?php echo htmlspecialchars( $results['Posts']->title )?><br>
  <small><a href=""> www.zrssb.hr</a></small>
  </h1>
  
  <p><em style="font-size:110%;"><?php echo  $results['Posts']->summary?> </em></p>


<div class="Prose-splash damir">

<img style="margin-top:5px;"src= "<?php $user = get_user($results['Posts']->user_id); echo $user['p_image'];?> " class="profilnaslika">
    <span class="d-flex aligns-items-center justify-content-center" style=" font-weight:500; padding-top:5px;padding-bottom:5px; color:white;">Autor: <?php echo getUName($results['Posts']->user_id) ?></span>
</div>



  
  
<p style="padding-top:5px;   text-align: justify;"><?php echo $results['Posts']->content?></p>

 <p> Datum objave: <?php echo date('j F Y', $results['Posts']->publicationDate)?></p>
   <blockquote class="Prose-splash">
    <inner>
    <button class="clipboard btn btn-primary">Kopiraj URL posta</button>
    <script>
var $temp = $("<input>");
var $url = $(location).attr('href');

$('.clipboard').on('click', function() {
  $("body").append($temp);
  $temp.val($url).select();
  document.execCommand("copy");
  $temp.remove();
})
    </script>

    <?php  $user = get_user(); if( (isset($_SESSION['email'])) && $user['id_group'] == '1'  ): 


 if ( $results['Posts']->id ) { ?>
<button class="clipboard btn btn-primary"><a href="administration.php?action=deletePosts&amp;PostsId=<?php echo $results['Posts']->id ?>" onclick="return confirm('Delete This Posts?')">Delete This Posts</a></button>
<?php } ?>
<?php endif; ?>

  
    </inner>
  </blockquote>
  
</main>
</div>

</div>
<!-- 
<h1 style="width: 75%;"><?php echo htmlspecialchars( $results['Posts']->title )?></h1>
      <div style="width: 75%; font-style: italic;"><?php echo htmlspecialchars( $results['Posts']->summary )?></div>
      <div style="width: 75%;"><?php echo $results['Posts']->content?></div>
      <p class="pubDate">Published on <?php echo date('j F Y', $results['Posts']->publicationDate)?></p>



      <?php  $user = get_user(); if( (isset($_SESSION['email'])) && $user['id_group'] == '1'  ): ?>


      <?php if ( $results['Posts']->id ) { ?>
      <p><a href="administration.php?action=deletePosts&amp;PostsId=<?php echo $results['Posts']->id ?>" onclick="return confirm('Delete This Posts?')">Delete This Posts</a></p>
<?php } ?>
  -->

    
<?php endif; ?>

<?php  
//  $user = get_user($results['Posts']->user_id);
//  echo "Objavio: " . $user['first_name'];

?>

