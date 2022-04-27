<?php include "inc/header.php";
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";



switch ( $action ) {

  case 'deletePosts':
    deletePosts();
    break;

}





  function deletePosts() {

    if ( !$Posts = Posts::getById( (int)$_GET['PostsId'] ) ) {
      header( "Location: admin.php?error=PostsNotFound" );
      return;
    }

    $Posts->delete();
    header( "Location: index.php" );
  }



?>
