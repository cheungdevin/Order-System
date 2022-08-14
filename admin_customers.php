<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>

    <link rel="stylesheet" href="style/customer.css">
</head>
<body>
    <?php include 'admin_header.php'; ?>

    <table class="table">
    <tr>
        <th>Email</th>
        <th>Name</th>
        <th>Phone Number</th>
        <th></th>
    </tr>
    <?php 
    require_once("connection/mysqli_conn.php");

    $result = mysqli_query($conn,"SELECT * FROM Customer");
    
    while($row = mysqli_fetch_assoc($result)){
        $results[] = $row;
    }

    foreach ($results as $key => $res) {
        echo '<tr><td>'
        .$res['customerEmail'].'</td><td>'
        .$res['customerName'].'</td><td>'
        .$res['phoneNumber'].'</td><td>'
        .'<button onclick="location.href=\'delete_customer.php?customerEmail='.$res['customerEmail'].'\'">delete</button></td></tr>';
    }
    ?>
</table>



</body>
</html>