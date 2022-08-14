<?php
require_once ("connection/mysqli_conn.php");


 if(!isset($_SESSION)) { 
    session_start(); 
} 
if($_SERVER["REQUEST_METHOD"] == "POST"){
$username = $_POST["name"];
$password = $_POST["pass"];


$password_hash = password_hash($password,PASSWORD_DEFAULT);
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "SELECT * FROM staff WHERE staffName ='".$username."'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)==1 && $password==$row["password"] && $row["position"] == "Manager"){
         if(!isset($_SESSION)) { 
            session_start(); 
        } 
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $row["staffID"];
        $_SESSION["username"] = $row["staffName"];
        $_SESSION["manager"] = true;


        header("location:admin_page.php");
    }elseif(mysqli_num_rows($result)==1 && $password==$row["password"] && $row["position"] == "Staff"){
         if(!isset($_SESSION)) { 
            session_start(); 
        } 
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $row["staffID"];
        $_SESSION["username"] = $row["staffName"];
        $_SESSION["staff"] = true;


        header("location:staff_page.php");
    }else{
        $alert= "<script>alert('incorrect username or password');</script>";
        echo $alert;
    }
}
else
{
    $alert= "<script>alert('Something wrong');</script>";
    echo $alert;
}

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

    <link rel="stylesheet" href="style/customer.css">

</head>
<body>
    
    <section class="form-container">

    <form action="" method="POST">
        <h3>Login</h3>
        <input type="text" name="name" class="box" placeholder="Enter your name" required>
        <input type="password" name="pass" class="box" placeholder="Enter your password" required>
        <input type="submit" name="submit" value="Login" class="btn" >
        <p>don't have an account <a href="register.php">register now</a></p>
    </form>

    </section>

</body>
</html>