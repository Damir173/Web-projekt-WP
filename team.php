<?php $page = 'team'; include "inc/header.php"; 


dodajclana();
intrestedInsert();



$connect = new PDO("mysql:host=localhost;dbname=zrssb", "root", "");


$query = "SELECT * FROM team ORDER BY dodatna_fja ASC";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();


?>

<div class="container-fluid" style="margin-top:10px; width:98%">

<div class="row justify-content-center">
  <div class="col-sm-4 red1">
  <h2 id = "animated-example" class = "animated bounceInUp">Želiš biti dio tima?</h2>
 <hr style="height:5px;border-width:0;color:blue;background-color:blue; width:100px;">
  <p id="onamap">
Lorem ipsum dolor sit amet, consectetur adipiscing elit. A aliquam massa tincidunt sed. Pellentesque viverra hendrerit lacus, ac ultrices libero laoreet in. Vivamus porttitor dolor vel tincidunt egestas. Fusce et placerat sem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras eget tristique augue, in aliquet magna. Fusce vitae suscipit eros, eget maximus enim. Sed enim elit, aliquet nec vulputate sed, feugiat ac lectus. Aenean eget tristique odio. Morbi rutrum ligula nisi, id gravida turpis auctor in. Ut sollicitudin justo sit amet libero imperdiet euismod. Integer vitae libero imperdiet, suscipit libero.</p>
  </div>

  <div class="col-sm-4 red2"> 


  <form method="post" id="add_details " style="padding-top:20px">
    <div class="form-group">
    <label class="spanprofil" for="first_name">(*) Ime:</label>
    <input  class="pw" type="text" name="first_name" placeholder="Vaše ime" required ><br>    
    </div>
    <div class="form-group">
    <label class="spanprofil" for="last_name">(*) Prezime:</label>
    <input  class="pw" type="text" name="last_name" placeholder="Vaše prezime" required ><br>   
    </div>
    <div class="form-group">
    <label class="spanprofil" for="email">(*) E-mail:</label>
    <input  class="pw" type="email" name="email" placeholder="E-mail adresa" required ><br>   
    </div>

    <div class="form-group">
    <label class="spanprofil" for="msg">Poruka</label>
    <textarea  class="pw" type="date" placeholder="Ukratko opišite razloge eventualnog pristupanja.. " name="msg" ></textarea>

    </div>

    <div class="form-group">
     <input type="submit" name="intrested" id="intrested" class="btn btn-primary" value="Pošalji upit" />
    </div>
   </form>
  
  </div>
  </div>
</div>
















<div class="container-fluid">
 

<div class="table table-responsive w-100 d-block d-md-table ">

<table class= "tablica table col-sm-8  text-center  mx-auto" style="padding-top:40px !important"  >
<?php if( (isset($_SESSION['email'])) && $user['id_group'] == '1'  ) { ?>
   <thead>
     <tr>
      <th>Ime</th>
      <th>Prezime</th>
      <th>Funkcija</th>
      <th>Funkcija (zbor)</th>
      <th>Datum pristupa</th>
      <th>Brisanje člana</th>

     </tr>
    </thead>
<?php } else { ?>

    <thead>
     <tr>
      <th>Ime</th>
      <th>Prezime</th>
      <th>Funkcija</th>
      <th>Funkcija (zbor)</th>
      <th>Datum pristupa</th>

     </tr>
    </thead>
<?php } ?>


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
      <td><a  href="delete.php?id='.$row["id"].'" class="button">Obriši člana</a></td></tr>
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
  if(isset($_POST['zadnji'])){
    deleteajax();
    echo "<meta http-equiv='refresh' content='0'>";
    }





  }
                      



  

     
    
    ?>
    </tbody>
   </table>

  </div>

  </div>


  
<?php  if( (isset($_SESSION['email'])) && $user['id_group'] == '1'  ) { ?>
  <div class="container-fluid" style="width:98%;">
  <div class="row adminski justify-content-center">

    <div class="col-sm-8 upisnovih ">

   <form method="post" id="add_details" style="padding-top:20px;">
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
     <input type="submit" name="add" id="add2" class="btn btn-primary" value="Dodaj novog člana" />
    </div>
   </form>
   </div>
</div>
  </div>
<?php } ?>


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
     html += '<td> <a  href="delete.php?id='+data.id+' ">Obriši člana</a></td></tr>';
     $('#table_data').prepend(html);
     $('#add_details')[0].reset();
    }
   }
  })
 });
 
});

   </script>


<?php include "inc/footer.php"; ?>