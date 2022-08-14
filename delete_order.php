<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Order</title>

    <link rel="stylesheet" href="style/customer.css">
</head>
<body>
    <?php include 'staff_header.php'; ?>
    <?php $deleteOrderID = $_GET['orderID']; ?>
    <section class="form-container">

    <form action="connection/staffDeleteOrder.php" method="POST">
        <h3>Delete Order</h3>
        <p>This order record will be deleted.</p>
        <p>Order ID</p>
        <input type="text" name="orderID" class="box" <?php echo "value=\"".$deleteOrderID."\"";?> disabled required>
        
        <input type="submit" name="submit" value="Confirm" class="btn" >
    </form>

    </section>

</body>
</html>