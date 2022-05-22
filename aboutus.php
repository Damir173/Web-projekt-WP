<?php $page = 'aboutus'; include "inc/header.php"; dodajclana();

$connect = new PDO("mysql:host=localhost;dbname=zrssb", "root", "");


$query = "SELECT * FROM team ORDER BY dodatna_fja ASC";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();


?>


    <div class="col-sm-6 upisnovih ">

   <form method="post" id="add_details">
    <div class="form-group">
    <label class="spanprofil" for="first_name">Ime člana:</label>
    <input  class="pw" type="text" name="first_name" placeholder="Ime člana" required ><br>    
    </div>
    <div class="form-group">
    <label class="spanprofil" for="last_name">Prezime člana:</label>
    <input  class="pw" type="text" name="last_name" placeholder="Prezime člana" required ><br>   
    </div>
    <div class="form-group">
    <label class="spanprofil" for="funkcija">Funkcija:</label>
    <select id="fja" name="funkcija">
        <option value="Sudac">Sudac</option>
        <option value="Nadzornik">Nadzornik</option>
        <option value="mjvr">Mj. vremena/zapisničar</option>
    </select><br>
    </div>

    <div class="form-group">
    <label class="spanprofil" for="email">E-mail:</label>
    <input  class="pw" type="email" name="email" placeholder="E-mail adresa" required ><br>   
    </div>

    <div class="form-group">
    <label class="spanprofil" for="dodatna_fja">Funkcija (zbor):</label>
    <select id="fja" name="dodatna_fja">
        <option value="Clan">Član</option>
        <option value="Tajnik">Tajnik</option>
        <option value="Blagajnik">Blagajnik</option>
        <option value="Predsjednik">Predsjednik &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</option>

    </select><br>
    </div>

    <div class="form-group">
    <label class="spanprofil" for="datumpristupa">Datum pristupa:</label>
    <input  class="pw" type="date" name="datumpristupa" required ><br><br>  

    </div>

    <div class="form-group">
     <input type="submit" name="add" id="add" class="btn btn-success" value="Add" />
    </div>
   </form>
   </div>


   <div class="col-sm-8 tablica ">

   <table class="table team table-striped table-bordered">
    <thead>
     <tr>
      <th>Ime</th>
      <th>Prezime</th>
      <th>Funkcija</th>
      <th>Funkcija (zbor)</th>
      <th>Datum pristupa</th>
     </tr>
    </thead>
    <tbody id="table_data">
    <?php
    foreach($result as $row)
    {
        if( (isset($_SESSION['email'])) && $user['id_group'] == '1'  ){
     echo '
     <tr>
      <td>'.$row["first_name"].'</td>
      <td>'.$row["last_name"].'</td>
      <td>'.$row["funkcija"].'</td>
      <td>'.$row["dodatna_fja"].'</td>
      <td>'.$row["datumpristupa"].'</td> 
    <td>  <form  method="POST">
      <input type="submit" value="Obrisi clana" name="'.$row["id"] . '" />
      </form>
    </td>
      
     </tr>
     ';
    }

    else{
        echo '
        <tr>
         <td>'.$row["first_name"].'</td>
         <td>'.$row["last_name"].'</td>
         <td>'.$row["funkcija"].'</td>
         <td>'.$row["dodatna_fja"].'</td>
         <td>'.$row["datumpristupa"].'</td> 
         
        </tr>
        ';

    }
}
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST[$row["id"]])){
        deleteuser($row["id"]);
        echo "<meta http-equiv='refresh' content='0'>";
        }

        if(isset($_POST['zadnji'])){
            deleteajax();
            echo "<meta http-equiv='refresh' content='0'>";
            }
    



    }

     
    
    ?>
    </tbody>
   </table>
</div>


<!-- 
<div class="container ">
  <div class="row "> 
    <div class="col-sm-6 upisnovih ">

    
    <form  method="POST">

    <label class="spanprofil" for="a_ime">Ime člana:</label>
    <input  class="pw" type="text" name="a_ime" placeholder="Ime člana" required ><br>    
    <label class="spanprofil" for="a_prezime">Prezime člana:</label>
    <input  class="pw" type="text" name="a_prezime" placeholder="Prezime člana" required ><br>   
    <label class="spanprofil" for="fja">Funkcija:</label>
    <select id="fja" name="fja">
        <option value="Sudac">Sudac</option>
        <option value="Nadzornik">Nadzornik</option>
        <option value="mjvr">Mj. vremena/zapisničar</option>
    </select><br>

    <label class="spanprofil" for="a_email">E-mail:</label>
    <input  class="pw" type="email" name="a_email" placeholder="E-mail adresa" required ><br>   
    <label class="spanprofil" for="a_dodatna">Funkcija (zbor):</label>
    <select id="fja" name="a_dodatna">
        <option value="Clan">Član</option>
        <option value="Tajnik">Tajnik</option>
        <option value="Blagajnik">Blagajnik</option>
        <option value="Predsjednik">Predsjednik &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</option>

    </select><br>
    <label class="spanprofil" for="a_datum">Datum pristupa:</label>
    <input  class="pw" type="date" name="a_datum" required ><br><br>  





<input type = "submit" name="dodaj_clana" value="Dodaj novog člana" style="margin:0px auto; display:block;">

          </form>

  </div> -->
  
<script>
$(document).ready(function(){
 
 $('#add_details').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"insert.php",
   method:"POST",
   data:$(this).serialize(),
   dataType:"json",

   beforeSend:function(){
    $('#add').attr('disabled', 'disabled');
   },
   success:function(data){
    $('#add').attr('disabled', false);
    if(data.first_name)
    {
     var html = '<tr>';
     html += '<td>'+data.first_name+'</td>';
     html += '<td>'+data.last_name+'</td>';
     html += '<td>'+data.funkcija+'</td>';
     html += '<td>'+data.dodatna_fja+'</td>';
     html += '<td>'+data.datumpristupa+'</td>';
     html += '<td> <form  method="POST"><input type="submit" value="Obrisi clana" name="zadnji" /></form></td></tr>';
     $('#table_data').prepend(html);
     $('#add_details')[0].reset();
    }
   }
  })
 });
 
});
</script>

