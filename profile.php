<?php $page = 'profile'; include "inc/header.php";
user_restrictions();

updatepw();
updateusername();
updateemail();
uploadprofilna();
?>




<div class="container-fluid ">
   <div class="ime col-sm-3"> <p>Profil od: <?php $user = get_user(); echo $user['username'];?>  </p></div>
  <div class="row justify-content-center "> 
    <div class="col-sm-3 profilni d-flex aligns-items-center justify-content-center">
    <img src= "<?php $user = get_user(); echo $user['p_image'];?> " class="profilnaslika ">
  </div>
  
    <div class="podaciprofil col-sm-5">
    <div class="ime"> <p> Korisnički podaci </p></div>
    <span class="spanprofil" > Korisničko ime: </span> <span id="podacispan"><?php $user = get_user(); echo $user['username'];?></span><br>
    
    <span class="spanprofil"> Ime: </span> <span id="podacispan"><?php $user = get_user(); echo $user['first_name'];?> </span><br>
    <span class="spanprofil"> Prezime: </span> <span id="podacispan"><?php $user = get_user(); echo $user['last_name'];?> </span><br>
    <span class="spanprofil"> E-mail: </span> <span id="podacispan"><?php $user = get_user(); echo $user['email'];?></span><br>
    <span class="spanprofil"> Funkcija: </span> <span id="podacispan"> <?php if($user['id_group'] == '1'){ echo "administrator";} else {echo  "član";}?> </p></span><br><hr>



    <div class="ime"> <p> Promjena lozinke </p></div>
    
    <form  method="POST">

    <label class="spanprofil" for="old_password">Stara lozinka:</label>
<input  class="pw" type="password" name="old_password" placeholder="Stara lozinka" required ><br>      
<label class="spanprofil" for="password">Nova lozinka:</label> <input class="pw" type="password" name="password" placeholder="Nova lozinka" required><br>
<label class="spanprofil" for="confirm_password">Potvrda (nova): </label> <input class="pw" type="password" name="confirm_password" placeholder="Potvrda nove lozinke" required ><br>

<input type = "submit" name="change_pw" value="Promjeni lozinku" style="margin:0px auto; display:block; width:50%;"  class="btn btn-primary">

          </form>
  

          <div class="ime"> <p> Promjena korisničkog imena </p></div>
          <form  method="POST">
<label class="spanprofil" for="username">Novo kor. ime: </label>
<input type = "text" name="username" placeholder="Username" class="pw" required>   
<input type = "submit" name="change_username" value="Promjeni username" style="margin:0px auto; display:block; width:50%;"  class="btn btn-primary">

</form>

<div class="ime"> <p> Promjena mail adrese </p></div>

<form  method="POST">

<label class="spanprofil" for="email">Nova e-mail adresa: </label>
<input type = "email" name="email" class="pw" placeholder="Email" required>    
<input type = "submit" name="change_email" value="Promijeni e-mail" style="margin:0px auto; display:block; width:50%;"  class="btn btn-primary">

</form>

<div class="ime"> <p> Promjena profilne slike </p></div>

<form method="POST" enctype="multipart/form-data">

<input class="form-control" name="profilna_file" type="file" id="formFile" style="margin-bottom:5px;" required>
    

<input type="submit" value="Učitaj sliku" style="margin:0px auto; display:block; width:50%;"  name="submit_profilna" class="btn btn-primary">
</form>


</div>





<!-- 
          <form method="POST" enctype="multipart/form-data">

        <input type="file" name="profilna_file" required>
        <input type="submit" value="Učitaj sliku" name="submit_profilna">
        </form>


                  <form  method="POST">

        <input class="pw" type="password" name="old_password" placeholder="Stara lozinka" required >      
        <input class="pw" type="password" name="password" placeholder="Nova lozinka" required>
        <input class="pw" type="password" name="confirm_password" placeholder="Potvrda nove lozinke" required >

        <input type = "submit" name="change_pw" value="Promjeni lozinku">

                  </form>
                  <form  method="POST">

        <input type = "text" name="username" placeholder="Username" required>   
        <input type = "submit" name="change_username" value="Promjeni username">

        </form>


        <form  method="POST">

        <input type = "email" name="email" placeholder="Email" required>    
        <input type = "submit" name="change_email" value="Promjeni e-mail" >

        </form> -->


    </div>


  </div>
</div>




<br>
