<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
require_once ("mysqli_conn.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $name = $_SESSION["name"];
    $phone = $_POST["phone"];

    $sql = "INSERT INTO customer (customerEmail, customerName, phoneNumber)
     VALUES ('$email','$name','$phone')";
     if (mysqli_query($conn, $sql)) {
        echo '<script>alert("New Customer has been added successfully !");window.location.href="../customers.php";</script>';
     } else {
        echo '<script>alert("Error Customer Added!");</script>';
     }
     
}
mysqli_close($conn);
?>