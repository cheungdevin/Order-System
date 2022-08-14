<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
require_once ("mysqli_conn.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $description = $_SESSION["description"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];

    $sql = "INSERT INTO item (itemName, itemDescription, stockQuantity,price)
     VALUES ('$name','$description','$quantity','$price')";
     if (mysqli_query($conn, $sql)) {
        echo '<script>alert("New item has been added successfully !");window.location.href="../items.php";</script>';
     } else {
        echo '<script>alert("Error Item Insert!");</script>';
     }
     
}
mysqli_close($conn);
?>