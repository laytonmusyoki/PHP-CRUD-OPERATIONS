<?php

      $servername="localhost";
      $username="root";
      $password='';
      $database="client";

      $conn=new mysqli($servername,$username,$password,$database);

$id="";
$name="";
$email="";
$phone="";
$address="";

$error_message="";
$success_message="";

if($_SERVER['REQUEST_METHOD']=='GET'){
    if(!isset($_GET['id'])){
        header("location:index.php");
        exit;
    }
    $id=$_GET['id'];

    $sql="SELECT * FROM data WHERE id=$id";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();

    if(!$row){
        header("location:index.php");
        exit;
    }
    $name=$row['name'];
    $email=$row['email'];
    $phone=$row['phone'];
    $address=$row['address'];
}
else{
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];

    do{
        if(empty($name)||empty($email)||empty($phone)||empty($address)){
            $error_message="All fields are required";
            break;
        }
        $sql="UPDATE data SET name='$name',email='$email',phone='$phone',address='$address'WHERE id=$id";
        $result=$conn->query($sql);

        if(!$result){
      $error_message="Something went wrong";
      break;
    }

      header("location:index.php?>$success_message=Employee updated successfully");
    }
    while(false);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content">
        <div class="inputs">
            <div class="heading">
            <h1>Edit Employee</h1>
            </div>

            <?php
            if(!empty($error_message)){
                echo "
                <div class='error'>
                <strong>$error_message</strong>
                </div>
                ";
            }
                if(!empty($success_message)){
                    echo "
                    <div class='success'>
                    <strong>$success_message</strong>
                    </div>
                    ";
            }
            ?>

            <form action="" method="POST">
                <input type="hidden"name="id" value="<?php echo $id ;?>">
                <input type="text" name="name" placeholder="Enter name" value="<?php echo $name ;?>"><br><br>
                <input type="text" name="email" placeholder="Enter email" value="<?php echo $email ;?>"><br><br>
                <input type="text" name="phone" placeholder="Enter phone" value="<?php echo $phone;?>"><br><br>
                <input type="text" name="address" placeholder="Enter address" value="<?php echo $address;?>"><br><br>
                <input type="submit" class="btn" value="Update Employee">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="index.php"><input type="button" class="btn" value="Cancel"></a>
            </form>
        </div>
    </div>
</body>
</html>