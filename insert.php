
<?php



$connect = new PDO("mysql:host=localhost;dbname=zrssb", "root", "");
$data = array(
    ':first_name'  => $_POST["first_name"],
    ':last_name'  => $_POST["last_name"],
    ':funkcija'  => $_POST["funkcija"],
    ':email'  => $_POST["email"],
    ':dodatna_fja'  => $_POST["dodatna_fja"],
    ':datumpristupa'  => $_POST["datumpristupa"]
   ); 
   
   $query = "
    INSERT INTO team 
   (first_name, last_name, funkcija, datumpristupa, email, dodatna_fja) 
   VALUES (:first_name, :last_name, :funkcija, :datumpristupa, :email, :dodatna_fja)
   ";
   
   $statement = $connect->prepare($query);
   
   if($statement->execute($data))
   {
    $output = array(
     'first_name' => $_POST['first_name'],
     'last_name'  => $_POST['last_name'],
     'funkcija'  => $_POST['funkcija'],
     'email'  => $_POST['email'],
     'dodatna_fja'  => $_POST['dodatna_fja'],
     'datumpristupa'  => $_POST['datumpristupa']
    );
   
    echo json_encode($output);
   }
   
   ?>
   