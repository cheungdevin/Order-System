<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit item</title>

    <link rel="stylesheet" href="style/customer.css">
</head>
<body>
    <?php include 'admin_header.php'; ?>
    <?php 
        require_once ("connection/mysqli_conn.php");
        $sql = "select * from item where itemID=".$_GET['itemID'].";";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($conn);

         if(!isset($_SESSION)) { 
            session_start(); 
        } 
        $_SESSION['editItemID'] = $_GET['itemID'];
    ?>    
    <section class="form-container">

    <form action="connection/adminEditItems.php" method="POST">
        <h3>Edit: item ID</h3>
        <p>Item ID</p>
        <input type="text" name="itemID" class="box" <?php echo "value=\"".$row['itemID']."\"";?> disabled required>
        <p>Item Name</p>
        <input type="text" name="name" class="box" <?php echo "value=\"".$row['itemName']."\"";?> required>
        <p>Item Description</p>
        <input type="text" name="description" class="box"<?php echo "value=\"".$row['itemDescription']."\"";?> required>
        <p>Stock Quantity</p>
        <input type="number" name="quantity" min="0" class="box" <?php echo "value=\"".$row['stockQuantity']."\"";?> required>
        <p>Price</p>
        <input type="number" name="price" min="0" step="0.01" class="box" <?php echo "value=\"".$row['price']."\"";?>>
        <input type="submit" name="submit" value="Submit" class="btn" >
    </form>

    </section>

</body>
</html>