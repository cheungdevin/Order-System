<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Customer</title>

    <link rel="stylesheet" href="style/customer.css">
</head>
<body>
    <?php include 'admin_header.php'; ?>
    <?php $deleteEmail = $_GET['customerEmail']; 
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
    ?>
    <section class="form-container">

    <form action="connection/adminDeleteCustomer.php" method="POST">
        <h3>Delete Customer</h3>
        <p>All the related records will be deleted.</p>
        <input type="text" name="itemID" class="box" <?php $_SESSION['deleteEmail']=$deleteEmail; echo "value=\"".$deleteEmail."\"";?> disabled required>
        
        <input type="submit" name="submit" value="Confirm" class="btn" >
    </form>

    </section>

</body>
</html>