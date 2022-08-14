<?php
// if(!isset($_SESSION)) 
//     { 
//         session_start(); 
//     } 
// require_once ("mysqli_conn.php");
// if($_SERVER["REQUEST_METHOD"] == "POST"){
//     $orderID = $_POST['orderID'];
//     $sql = "DELETE FROM Orders WHERE orderID=".$orderID.";";
//     if (mysqli_query($conn, $sql)) {
//         echo '<script>alert("The record has been deleted successfully !");window.location.href="../orders.php";</script>';
//     } else {
//         echo '<script>alert("Delete Failed!");</script>';
//     }
     
// }
// mysqli_close($conn);
?>

<?php
$orderID = $_POST['orderID'];

require_once("mysqli_conn.php");

$sql = "DELETE FROM Orders WHERE orderID = ".$orderID."";

$rs = mysqli_query($conn, $sql);

if(mysqli_affected_rows($conn)>0){
    echo '<script>alert("The record has been deleted successfully !");window.location.href="../orders.php";</script>';
}

?>