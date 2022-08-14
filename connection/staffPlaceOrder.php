<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
require_once ("mysqli_conn.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $sid = $_SESSION["id"];
    $otd = $_POST["odt"];
    $da = $_POST["delivery-address"];
    $dd = $_POST["delivery-date"];
    $price = $_SESSION['itemsTotalPrice'];

    $sql = "INSERT INTO orders (customerEmail,staffID,dateTime,deliveryAddress, deliveryDate,totalPrice)
     VALUES ('$email','$sid','$otd','$da','$dd','$price')";
     //insert into orders tables
     if (mysqli_query($conn, $sql)) {
        $last_id = $conn->insert_id;
        foreach ($_SESSION['items']as $key => $value) {
            $cur_item_id = $key;
            $cur_item_qty = $value;

            $price_sql ="SELECT price from item where itemID = '$cur_item_id';";
            $result_p = mysqli_query($conn, $price_sql);
            if (mysqli_num_rows($result_p) > 0)
            {
                $row_p = $result_p->fetch_assoc();  
                $cur_price= $row_p['price']*$cur_item_qty;

                $cur_sql = "INSERT INTO itemorders (orderID,itemID,orderQuantity,price) VALUES ('$last_id','$cur_item_id','$cur_item_qty','$cur_price')";
                if (mysqli_query($conn, $cur_sql)) {

                }else{
                    $sql_delete = "DELETE FROM orders where orderID = '$last_id' ";
                    mysqli_query($conn, $sql_delete);
                    $sql_delete = "DELETE FROM itemorders where orderID = '$last_id' ";
                    mysqli_query($conn, $sql_delete);
                    echo '<script>alert("Error Insert!");</script>';
                    break;
                }
            }
            
        }
        echo '<script>alert("New record has been added successfully !");window.location.href="../orders.php";</script>';
     } else {
        echo '<script>alert("Error Insert!");</script>';
     }
     
}
mysqli_close($conn);
?>