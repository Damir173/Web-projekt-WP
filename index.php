<?php $page = 'index'; include "inc/header.php";

$action = isset( $_GET['action'] ) ? $_GET['action'] : "";

switch ( $action ) {
  case 'archive':
    archive();
    break;
  case 'viewPosts':
    viewPosts();
    break;
  default:
    homepage();
}


function archive() {
  $results = array();
  $data = Posts::getList();
  $results['Postss'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = "Posts Archive | Widget News";
  require( TEMPLATE_PATH . "/archive.php" );
}

function viewPosts() {
  if ( !isset($_GET["PostsId"]) || !$_GET["PostsId"] ) {
    homepage();
    return;
  }

  $results = array();
  $results['Posts'] = Posts::getById( (int)$_GET["PostsId"] );
  require( TEMPLATE_PATH . "/viewArticle.php" );
}

function homepage() {
  $results = array();
  $data = Posts::getList( HOMEPAGE_NUM_PostsS );
  $results['Postss'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  require( TEMPLATE_PATH . "/homepage.php" );
}



?>





