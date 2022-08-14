<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
require_once ("mysqli_conn.php");
if(isset($_GET['orderID'])){
    $delete_id = $_GET['orderID'];
    
    $sql_delete = "DELETE FROM itemorders where orderID = '$delete_id' ";
    if(mysqli_query($conn, $sql_delete)){
        $sql_delete = "DELETE FROM orders where orderID = '$delete_id' ";
        if(mysqli_query($conn, $sql_delete)){
            echo '<script>alert("delete successfully!");window.location.href="../orders.php";</script>';
        }else{
            echo '<script>alert("delete fail!");window.location.href="../orders.php";</script>';
        }
        
    }else{
        echo '<script>alert("delete fail!");window.location.href="../orders.php";</script>';
    }
    
        
    
}else{
     echo '<script>alert("delete fail!");window.location.href="../orders.php";</script>';
}

mysqli_close($conn);
?>