<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
require_once ("mysqli_conn.php");
$deleteResult = True;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_SESSION['deleteEmail'];
    $sql_orderIDs = "SELECT orderID FROM orders WHERE customerEmail='".$email."';";
    $orderIds = mysqli_query($conn, $sql_orderIDs);
    if(mysqli_num_rows($orderIds) > 0){
        while($row = mysqli_fetch_assoc($orderIds)){
            $sql_order = "DELETE FROM itemorders WHERE orderID=".$row['orderID'].";";
            if (mysqli_query($conn, $sql_order)) {
                 echo '<script>alert("delete itemorders!");</script>';
            }else{
                $deleteResult = Falsegere;
                break;
            }
        }
    }

    if($deleteResult) {
        $sql_delete_orders = "DELETE FROM orders WHERE customerEmail='".$email."';";
        if (mysqli_query($conn, $sql_delete_orders)) {
            echo '<script>alert("delete orders!");</script>';
            $sql_delete_customer = "DELETE FROM customer WHERE customerEmail='".$email."';";
            if (mysqli_query($conn, $sql_delete_customer)) {
                echo '<script>alert("delete customers!");</script>';
            }else{
                $deleteResult = False;
            }
            
        }else{
            $deleteResult = False;
        }
    }

     if ( $deleteResult) {
        echo '<script>alert("Customer has been deleted successfully !");window.location.href="../admin_customers.php";</script>';
     } else {
        echo '<script>alert("Error delete!");window.location.href="../delete_customer.php";</script>';
     }
     
}
mysqli_close($conn);
?>