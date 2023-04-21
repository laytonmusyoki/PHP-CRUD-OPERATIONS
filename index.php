<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <h1>EMPLOYEE MANAGEMENT SYSTEM</h1>
        <div class="body">
            <a href="create.php"><button type="submit" >New Employee</button></a>
           
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $servername="localhost";
                        $username="root";
                        $password='';
                        $database="client";

                        $conn=new mysqli($servername,$username,$password,$database);
                        if ($conn->connect_error){
                            die("connection failed:".$conn->connect_error);
                        }
                        $sql="SELECT * FROM data";
                        $result=$conn->query($sql);
                        if(!$result){
                            die("connection error:".$conn->error);
                        }
                        while($row=$result->fetch_assoc()){
                            echo "
                            <tr>
                            <td>$row[id]</td>
                            <td>$row[name]</td>
                            <td>$row[email]</td>
                            <td>$row[phone]</td>
                            <td>$row[address]</td>
                            <td>$row[created_at]</td>
                            <td>
                                <a href='/crud/Edit.php?id=$row[id]' class='edit'>Edit</a>
                                <a href='/crud/delete.php?id=$row[id]' class='del'>Delete</a>
                            </td>
                        </tr>
                    
                            ";
                        }
                
                        ?>
<hr>
                    </tbody>

                </table>
                <hr>
            </div>
        </div>
    </section>
    
</body>
</html>