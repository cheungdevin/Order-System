<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add item</title>

    <link rel="stylesheet" href="style/customer.css">
</head>
<body>
    <?php include 'admin_header.php'; ?>
    <section class="form-container">

    <form action="connection\adminAddItems.php" method="POST">
        <h3>Add item</h3>
        <p>Item Name</p>
        <input type="text" name="name" class="box" placeholder="Item Name" required>
        <p>Item Description</p>
        <input type="text" name="description" class="box" placeholder="Item Description" required>
        <p>Stock Quantity</p>
        <input type="number" name="quantity" min="0" class="box" placeholder="Stock Quantity" required>
        <p>Price</p>
        <input type="number" name="price" min="0" step="0.01" class="box" placeholder="Price">
        <input type="submit" name="submit" value="Submit" class="btn" >
    </form>

    </section>

</body>
</html>