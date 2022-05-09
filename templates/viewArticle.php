<h1 style="width: 75%;"><?php echo htmlspecialchars( $results['Posts']->title )?></h1>
      <div style="width: 75%; font-style: italic;"><?php echo htmlspecialchars( $results['Posts']->summary )?></div>
      <div style="width: 75%;"><?php echo $results['Posts']->content?></div>
      <p class="pubDate">Published on <?php echo date('j F Y', $results['Posts']->publicationDate)?></p>



      <?php  $user = get_user(); if( (isset($_SESSION['email'])) && $user['id_group'] == '1'  ): ?>


      <?php if ( $results['Posts']->id ) { ?>
      <p><a href="administration.php?action=deletePosts&amp;PostsId=<?php echo $results['Posts']->id ?>" onclick="return confirm('Delete This Posts?')">Delete This Posts</a></p>
<?php } ?>

    
<?php endif; ?>

<?php  
 $user = get_user($results['Posts']->user_id);
 echo "Objavio: " . $user['first_name'];


 