<?php 



$id = $_GET['id'];

$dbname = "zrssb";
$conn = mysqli_connect("localhost", "root", "", $dbname);

if($id == 'undefined') {
    $sql = "DELETE from team WHERE id = (SELECT MAX(ID) FROM team) ";
}
else

$sql = "DELETE FROM team WHERE id = $id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: team.php'); //If book.php is your main page where you list your all records
    exit;
} 