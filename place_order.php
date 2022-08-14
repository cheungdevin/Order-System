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
    <title>Place Order</title>

    <link rel="stylesheet" href="style/customer.css">
</head>
<body>
    <?php include 'staff_header.php'; ?>
    <section class="form-container">

    <form action="submit_order.php" method="POST">
        <h3>Place Order</h3>

        <table class="table" style="margin-top:10px;">
        <tr>
            <th>Item ID</th>
            <th>Name</th>
            <th>Stock Quantity</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
            <?php 
            require_once("connection/mysqli_conn.php");

            $result = mysqli_query($conn,"SELECT * FROM Item");
            
            while($row = mysqli_fetch_assoc($result)){
                $results[] = $row;
            }

            foreach ($results as $key => $res) {
                if($res['stockQuantity']>0){
                    echo '<tr><td>'
                    .$res['itemID'].'</td><td>'
                    .$res['itemName'].'</td><td>'
                    .$res['stockQuantity'].'</td><td>'
                    .$res['price'].'</td>'
                    .'<td><input name="'.$res['itemID'].'" type="number" placeholder="0" min="0" max="'.$res['stockQuantity'].'"></input></td></tr>';
                }
            }
            ?>
        </table>
        
        <input type="submit" name="submit" value="Next Step" class="btn" >
    </form>

    </section>

</body>
</html>