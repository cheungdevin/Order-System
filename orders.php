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
    <?php include 'staff_header.php'; ?>

    <table class="table">
    <tr>
        <th>order ID</th>
        <th>Email</th>
        <th>staff ID</th>
        <th>date Time</th>
        <th>delivery Address</th>
        <th>delivery Date</th>
        <th>total Price</th>
        <th>Price After Discount</th>
        <th>View Details</th>
        <th>Update</th>
        <!-- <th>Action</th> -->
    </tr>
    <?php 
    require_once("connection/mysqli_conn.php");

    $result = mysqli_query($conn,"SELECT * FROM Orders");
    
    while($row = mysqli_fetch_assoc($result)){
        $results[] = $row;
    }

    foreach ($results as $key => $res) {
        $org = $res['totalPrice'];
        if (!extension_loaded("curl")) {
            die("enable library curl first");
        }
        $url = "http://127.0.0.1:8080/api/discountCalculator/".$org;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);   # Perform a cURL session
        curl_close($curl);
        $data = json_decode($response, true);
        // $ntp = $data['newTotalPrice'];

        echo '<tr><td>'
        .$res['orderID'].'</td><td>'
        .$res['customerEmail'].'</td><td>'
        .$res['staffID'].'</td><td>'
        .$res['dateTime'].'</td><td>'
        .$res['deliveryAddress'].'</td><td>'
        .$res['deliveryDate'].'</td><td>'
        .$res['totalPrice'].'</td><td>'
        // .$ntp.'</td><td>'
        .'<button onclick="location.href=\'receipt.php?orderID='.$res['orderID'].'\'">receipt</button></td><td>'
        .'<button onclick="location.href=\'update_order.php?orderID='.$res['orderID'].'\'">update</button></td><td>'
        .'<button onclick="location.href=\'connection/delete_order.php?orderID='.$res['orderID'].'\'">delete</button></td></tr>';
    }
    ?>
</table>

<div style="margin-top:20px"><div>
<a href="place_order.php"><div class="btn" style="width:20%;display:inline-block;">Place Order</div></a>


</body>
</html>