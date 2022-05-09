<?php include "inc/header.php";
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";

create_post();



switch ( $action ) {

  case 'deletePosts':
    deletePosts();
    break;

}
  function deletePosts() {

$Posts = Posts::getById( (int)$_GET['PostsId'] );
    

    $Posts->delete();
    header( "Location: index.php" );
  }



?>

<form method="POST" >
<label for="naslov">Naslov:</label>
<input type="text" id="naslov" name="naslov"><br><br>
<label for="naslov">Sazetak:</label>
<input type="text" id="sazetak" name="sazetak"><br><br>

<textarea name="post_content" cols="60" rows="10" placeholder="Post content..."></textarea>


<input type="submit" value="Post" name="submit">
    </form>

