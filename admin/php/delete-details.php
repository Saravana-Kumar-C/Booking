<?php 
if(isset($_GET["did"])){
    $id=$_GET["did"];
    $centre=$_GET["centre"];

    $servername="localhost";
    $username="root";
    $password="";
    $database="mydb";

    $connection = new mysqli($servername,$username,$password,$database);

    $sql = "DELETE FROM details WHERE id=$id";
    $connection->query($sql);
    $sql = "UPDATE centre SET totcount = totcount-1 WHERE name='$centre'";
    $connection->query($sql);
}
header("Location: ../pages/profile.html");
// header("Location: search.php");
// exit;
?>