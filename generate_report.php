<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Report</title>

    <link rel="stylesheet" href="style/customer.css">
</head>
<body>
    <?php include 'admin_header.php'; ?>
    <section class="form-container">

    <form action="admin_report.php" method="POST">
        <h3>Generate Report</h3>
        <p>Please input a month</p>
        <input type="month" name="month" class="box"  required>
        <input type="submit" name="submit" value="Submit" class="btn" >
    </form>

    </section>

</body>
</html>