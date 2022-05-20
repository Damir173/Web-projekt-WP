<?php $page = 'administration'; include "inc/header.php";
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";

user_restrictions();
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

<!-- <form method="POST" >
<label for="naslov"><img src="../Web-projekt-WP/images/title.png" class="title_icon" >
</label>
<input type="text" id="naslov" name="naslov"><br><br>
<label for="naslov">Sazetak:</label>
<input type="text" id="sazetak" name="sazetak"><br><br>

<textarea name="post_content" cols="60" rows="10" placeholder="Post content..."></textarea>


<input type="submit" value="Post" name="submit">
    </form> -->



   <div class="adminwp col-xs-12 col-md-6 box">
   <img src= "../Web-projekt-WP/images/adminwp.png" width="100%" class="slikawp" >

   </div>
<div class="container-fluid h-100 cf col-xs-12 col-md-6 box">

		<div class="d-flex justify-content-center h-100 ">

			<div class="user_card_admin">
  				<p id="adminobavijest">Dobrodošli u Administratorski portal! <br> Ovdje imate mogućnost objavljivati postove koji će se nalaziti na naslovnoj stranici..</p>
				<div class="d-flex justify-content-center form_container_a">
                <form  method="POST" class="admin4"  >
						<div class="input-group mb-2 grupa1">
							<div class="input-group-append  ">
								<span class="input-group-text"><i class="fas fa-quote-right "></i></span>
							</div>
              <input size="100" type="text" id="naslov" name="naslov" placeholder="Naslov" required><br><br>
						</div>


						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-sticky-note"></i></span>
							</div>
              <input type="text" id="sazetak" name="sazetak" placeholder="Sažetak"><br><br>
						</div>


            <div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-list-alt"></i></span>
							</div>
              <textarea name="post_content" cols="30" rows="10" placeholder="Sadržaj posta....." required></textarea>
						</div>


            <input type="submit" value="Objavi post" id="sub" name="submit">
			<div class="objavipost"> </div>

					</form> 	
				</div>
		

				
				</div>
			</div>

		</div>
	</div>


