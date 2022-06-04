<?php 



$id = $_GET['id'];

$dbname = "zrssb";
$conn = mysqli_connect("localhost", "root", "", $dbname);


$sql = "UPDATE intrested SET isRead ='1' WHERE intrested.id = $id";



if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: administration.php'); //If book.php is your main page where you list your all records
    exit;
} 