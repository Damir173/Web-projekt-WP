<ul id="headlines">

<?php foreach ( $results['Postss'] as $Posts ) { ?>

        <li>
          <h2>
            <span class="pubDate"><?php echo date('j F', $Posts->publicationDate)?></span><a href=".?action=viewPosts&amp;PostsId=<?php echo $Posts->id?>"><?php echo htmlspecialchars( $Posts->title )?></a>
          </h2>
          <p class="summary"><?php echo htmlspecialchars( $Posts->summary )?></p>
        </li>

<?php } ?>

      </ul>

      <p><a href="./?action=archive">Posts Archive</a></p>