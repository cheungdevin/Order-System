<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Order</title>

    <link rel="stylesheet" href="style/customer.css">
</head>
<body>
    <?php include 'staff_header.php'; ?>
    <section class="form-container">
   

    <form action="connection\staffPlaceOrder.php" method="POST">
        <h3>Place Order</h3>

        <p>Customer’s Email</p>
        <select name="email" class="box" required>
            <option value="">--- Customer Email ---</option>
            <?php
                require_once ("connection/mysqli_conn.php");
                $sql = "SELECT customerEmail FROM `customer`;";
                $result = mysqli_query($conn,$sql);
                if($result){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<option value="'.$row["customerEmail"].'"> ' . $row["customerEmail"]. '</option>';
                    }
                }
} 
            ?>
        </select>
        <p>Staff id</p>
        <input type="text" name="sid" class="box" 
                <?php 
                    echo 'value="'.$_SESSION["id"].'"'; 
                ?> 
                required disabled>
        <p>Order Date & Time</p>
        <input type="datetime-local" name="odt" class="box" placeholder="Order Date & Time" required>
        <p>Delivery Address</p>
        <input type="text" name="delivery-address" class="box" placeholder="Delivery Address">
        <p>Delivery Date</p>
        <input type="date" name="delivery-date" class="box">
        <p>Total Price</p>
         <?php
        require_once ("connection/mysqli_conn.php");
        $totalPrice = 0;
        $sql = "SELECT * FROM `Item`;";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
                $results[] = $row;
        }
        $_SESSION['items']= array();
        foreach ($results as $key => $res) {
            if($_POST[$res['itemID']]>0){
                $totalPrice = $totalPrice + $res['price']*$_POST[$res['itemID']];
                // echo '<input type="hidden" name="'.$res['itemID'].'" class="box" value="'.$_POST[$res['itemID']].'" disabled>';
                $_SESSION['items'][$res['itemID']] = $_POST[$res['itemID']];
                
            }
        }
        $_SESSION['itemsTotalPrice'] = $totalPrice;
    ?>
        <input type="number" name="price" class="box" <?php echo "value='".$totalPrice."'"; ?> disabled>
        <!-- <input type="button" onclick="location.href='place_order.php'" name="lastStep" value="Last Step" class="btn" > -->
        <p> After Discount</p>
        <input type="number" name="ntp" class="box" <?php 
        $org = $totalPrice;
        if (!extension_loaded("curl")) {
            die("enable library curl first");
        }
        $url = "http://127.0.0.1:8080/api/discountCalculator/".$org;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);   # Perform a cURL session
        curl_close($curl);
        $data = json_decode($response, true);
        $ntp = $data['newTotalPrice'];
        echo "value='".$ntp."'"; ?> disabled>
        
        <input type="submit" name="submit" value="Submit" class="btn" >
    </form>

    </section>

</body>
</html>