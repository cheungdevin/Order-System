<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
require_once ("mysqli_conn.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_SESSION['editItemID'];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];

    $sql = "UPDATE item set itemName='".$name."', itemDescription='".$description."', stockQuantity='".$quantity."', price='".$price."' where itemID=".$id.";";
    echo $sql;
     if (mysqli_query($conn, $sql)) {
        echo '<script>alert("item has been updated successfully !");window.location.href="../items.php";</script>';
     } else {
        echo '<script>alert("Error Item Update!");</script>';
     }
     
}
mysqli_close($conn);
?>