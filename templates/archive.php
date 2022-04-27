<h1>Posts Archive</h1>

<ul id="headlines" class="archive">

<?php foreach ( $results['Postss'] as $Posts ) { ?>

  <li>
    <h2>
      <span class="pubDate"><?php echo date('j F Y', $Posts->publicationDate)?></span><a href=".?action=viewPosts&amp;PostsId=<?php echo $Posts->id?>"><?php echo htmlspecialchars( $Posts->title )?></a>
    </h2>
    <p class="summary"><?php echo htmlspecialchars( $Posts->summary )?></p>
  </li>

<?php } ?>

</ul>

<p><?php echo $results['totalRows']?> Posts<?php echo ( $results['totalRows'] != 1 ) ? 's' : '' ?> in total.</p>

<p><a href="./">Return to Homepage</a></p>
