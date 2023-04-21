<?php
if(isset($_GET["id"])){
    $id=$_GET['id'];

    $servername="localhost";
    $username="root";
    $password='';
    $database="client";

    $conn=new mysqli($servername,$username,$password,$database);

    $sql="DELETE FROM data WHERE id=$id";
    $conn->query($sql);
}
header("location:index.php");
exit;
?>