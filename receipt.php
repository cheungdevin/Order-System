<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>

    <link rel="stylesheet" href="style/customer.css">
</head>
<body>
    <?php include 'staff_header.php'; ?>

    <table class="table">

    <?php 
    require_once("connection/mysqli_conn.php");

    $oid = $_GET['orderID'];   

    $res_orders = mysqli_query($conn,"SELECT * FROM Orders WHERE orderID=".$oid.";");
    while($row = mysqli_fetch_assoc($res_orders)){
        $orderID = $row['orderID'];
        $customerEmail = $row['customerEmail'];
        $staffID = $row['staffID'];
        $dateTime = $row['dateTime'];
        $deliveryAddress = $row['deliveryAddress'];
        $deliveryDate = $row['deliveryDate'];
        $totalPrice = $row['totalPrice'];
    }

    $res_customers = mysqli_query($conn,"SELECT * FROM Customer WHERE customerEmail='".$customerEmail."';");
    while($row = mysqli_fetch_assoc($res_customers)){
        $customerName = $row['customerName'];
        $phoneNumber = $row['phoneNumber'];
       
    }

    $res_staff = mysqli_query($conn,"SELECT * FROM Staff WHERE staffID='".$staffID."';");
    while($row = mysqli_fetch_assoc($res_staff)){
        $staffName = $row['staffName'];
    }

    if (!extension_loaded("curl")) {
        die("enable library curl first");
    }
    $url = "http://127.0.0.1:8080/api/discountCalculator/".$totalPrice;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);   # Perform a cURL session
    curl_close($curl);
    $data = json_decode($response, true);
    $ntp = $data['newTotalPrice'];

    echo 
    '<tr><th>Order ID:</th><td>'.$orderID.'</td></tr>'
    .'<tr><th>Customer’s Email:</th><td>'.$customerEmail.'</td></tr>'
    .'<tr><th>Customer’s Name:</th><td>'.$customerName.'</td></tr>'
    .'<tr><th>Customer’s Phone Number:</th><td>'.$phoneNumber.'</td></tr>'
    .'<tr><th>Staff ID:</th><td>'.$staffID.'</td></tr>'
    .'<tr><th>Staff Name:</th><td>'.$staffName.'</td></tr>'
    .'<tr><th>Order Date & Time:</th><td>'.$dateTime.'</td></tr>'
    .'<tr><th>Delivery Address:</th><td>'.$deliveryAddress.'</td></tr>'
    .'<tr><th>Delivery Date:</th><td>'.$deliveryDate.'</td></tr>'
    .'<tr><th>Total Price:</th><td>'.$totalPrice.'</td></tr>'
    .'<tr><th>After Discount:</th><td>'.$ntp.'</td></tr>';
    echo '</table><table class="table">';
    echo '<caption>Order Details</caption>';
    echo ' <tr>
        <th>Item ID</th>
        <th>Item Name</th>
        <th>Order Quantity</th>
    </tr>';
    $res_orders = mysqli_query($conn,"SELECT item.itemId, itemorders.orderQuantity, item.itemName FROM itemorders, item WHERE item.itemID = itemorders.itemID and itemorders.orderID=".$oid.";");
    while($row = mysqli_fetch_assoc($res_orders)){
        echo '<tr><td>'
        .$row['itemId'].'</td><td>'
        .$row['itemName'].'</td><td>'
        .$row['orderQuantity'].'</td><td></tr>';
    }
    ?>
</table>

<div style="margin-top:20px"><div>



</body>
</html>