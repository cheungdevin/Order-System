<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Order</title>

    <link rel="stylesheet" href="style/customer.css">
</head>
<body>
    <?php include 'staff_header.php'; ?>
    <?php 
        require_once ("connection/mysqli_conn.php");
        $sql = "select * from Orders where orderID=".$_GET['orderID'].";";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($conn);

         if(!isset($_SESSION)) { 
            session_start(); 
        } 
        $_SESSION['editOrderID'] = $_GET['orderID'];
    ?>    
    <section class="form-container">
    
    <form action="connection/staffUpdateOrder.php" method="POST">
        <h3>Update Order</h3>
        <p>Order ID</p>
        <input type="text" name="orderID" class="box" <?php echo "value=\"".$row['orderID']."\"";?> disabled required>
        <p>Delivery Address</p>
        <input type="text" name="delivery-address" class="box" placeholder="Delivery Address"  <?php echo "value=\"".$row['deliveryAddress']."\"";?>>
        <p>Delivery Date</p>
        <input type="date" name="delivery-date" class="box" <?php echo "value=\"".$row['deliveryDate']."\"";?> >
        <input type="submit" name="submit" value="Submit" class="btn" >
    </form>

    </section>

</body>
</html>