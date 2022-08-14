<?php
    require_once ("connection/mysqli_conn.php");
    $query="SELECT * FROM staff order by staffID desc limit 1";
    $rs=mysqli_query($conn,$query) or die(mysqli_error($conn));
    $row = mysqli_fetch_array($rs);

    $lastID = $row['staffID'];
    if($lastID == " "){
        $staffID = "S0001";
    }else{
        $staffID = substr($lastID,1);
        $staffID = intval($staffID);
        $staffID++;
        $staffID = str_pad($staffID,4,"0", STR_PAD_LEFT);
        $staffID = "s" .$staffID;
    } 
?>

<?php 
require_once("connection/mysqli_conn.php");
 

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST["name"];
    $password=$_POST["pass"];
    $cpass =$_POST["cpass"];
    $check="SELECT * FROM staff WHERE staffName='".$username."'";
    if ($password != $cpass){
        $alert= "<script>alert('Confirm password not matched');</script>";
        echo $alert;
    }
    else if(mysqli_num_rows(mysqli_query($conn,$check))==0){
        $sql="INSERT INTO staff (staffID,staffName, password)
            VALUES('".$staffID."' ,'".$username."','".$password."')";
        
        if(mysqli_query($conn, $sql)){
            echo "The registration is successful! The page will be automatically jumped after 3 seconds<br>";
            echo "<a href='login.php'>Failed to jump to the page, please click here</a>";
            header("refresh:32;url=login.php");
            exit;
        }else{
            echo "Error creating table: " . mysqli_error($conn);
        }
    }
    else{
        $alert= "<script>alert('user name already exist!');</script>";
        echo $alert;
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>

    <link rel="stylesheet" href="style/customer.css">

</head>
<body>
    
    <section class="form-container">

    <form action="" method="POST">
        <h3>Register</h3>
        <input type="text" name="name" class="box" placeholder="Enter your name" required>
        <input type="password" name="pass" class="box" placeholder="Enter your password" required>
        <input type="password" name="cpass" class="box" placeholder="Confirm your password" required>
        <input type="submit" name="submit" value="Submit" class="btn" >
    </form>

    </section>

</body>
</html>