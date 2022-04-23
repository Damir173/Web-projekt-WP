<?php include "inc/header.php";


listArticles();
?>
<?php if( (isset($_SESSION['email'])) && ( $user['id_group'] == '1')) :?> 

    <?php create_post(); ?>
    <form method="POST">

    <textarea name="post_content"  cols="60" rows="10" placeholder="Post content...."> </textarea>
    <input type="submit" value="Post" name="submit">
    </form>


<?php else:  {
    echo 'Čibe odavde, za 5 sekundi ideš automatski!!!!';
    header( "refresh:5;url='index.php'" );
    exit();
}

?>

<?php endif;?>


<?php


function listArticles() {
    $results = array();
    $data = Article::getList();
    $results['articles'] = $data['results'];
    $results['totalRows'] = $data['totalRows'];
    $results['pageTitle'] = "All Articles";
  
    if ( isset( $_GET['error'] ) ) {
      if ( $_GET['error'] == "articleNotFound" ) $results['errorMessage'] = "Error: Article not found.";
    }
  
    if ( isset( $_GET['status'] ) ) {
      if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Your changes have been saved.";
      if ( $_GET['status'] == "articleDeleted" ) $results['statusMessage'] = "Article deleted.";
    }
  
    require( TEMPLATE_PATH . "/listArticles.php" );
  }
  
 