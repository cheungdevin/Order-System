<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>

    <link rel="stylesheet" href="style/customer.css">
</head>
<body>
    <?php include 'staff_header.php'; ?>
    <section class="form-container">

    <form action="connection\staffAddCustomer.php" method="POST">
        <h3>Add Customer</h3>
        <p>Customer’s Email</p>
        <input type="email" name="email" class="box" placeholder="Customer’s Email" required>
        <p>Customer’s Name</p>
        <input type="text" name="name" class="box" placeholder="Customer’s Name" required>
        <p>Customer’s Phone Number</p>
        <input type="text" name="phone" class="box" placeholder="Customer’s Phone Number" required>
        <input type="submit" name="submit" value="Submit" class="btn" >
    </form>

    </section>

</body>
</html>