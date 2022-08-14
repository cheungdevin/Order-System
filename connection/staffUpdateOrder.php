<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
require_once ("mysqli_conn.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $id = $_SESSION['editOrderID'];
    $da = $_POST["delivery-address"];
    $dd = $_POST["delivery-date"];

    $sql = "UPDATE orders SET deliveryAddress='".$da."', deliveryDate='$dd' where orderID=".$id.";";

     if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Order has been update successfully !");window.location.href="../orders.php";</script>';
     } else {
        echo '<script>alert("Error Update!");window.location.href="../update_order.php"</script>';
     }
     
}
mysqli_close($conn);
?>