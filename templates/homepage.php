
<?php foreach ( $results['Postss'] as $Posts ) { ?>

          <h2>
            <span class="pubDate"><?php echo date('j F l H:i', $Posts->publicationDate)?>  </span><a href=".?action=viewPosts&amp;PostsId=<?php echo $Posts->id?>"><?php echo htmlspecialchars( $Posts->title )?></a>
          </h2>
          <p class="summary"><?php echo htmlspecialchars( $Posts->summary )?></p>

<?php } ?>


      <p><a href="./?action=archive">Posts Archive</a></p>