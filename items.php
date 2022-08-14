<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items</title>

    <link rel="stylesheet" href="style/customer.css">
</head>
<body>
    <?php include 'admin_header.php'; ?>

    <table class="table">
    <tr>
        <th>Item ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Price</th>
        <th></th>
    </tr>
    <?php 
    require_once("connection/mysqli_conn.php");

    $result = mysqli_query($conn,"SELECT * FROM Item");
    
    while($row = mysqli_fetch_assoc($result)){
        $results[] = $row;
    }
    // echo json_encode($results);

    foreach ($results as $key => $res) {
        echo '<tr><td>'
        .$res['itemID'].'</td><td>'
        .$res['itemName'].'</td><td>'
        .$res['itemDescription'].'</td><td>'
        .$res['stockQuantity'].'</td><td>'
        .$res['price'].'</td>'
        .'<td><button onclick="location.href=\'edit_item.php?itemID='.$res['itemID'].'\'">edit</button></td></tr>';
    }
    ?>
</table>

<div style="margin-top:20px"><div>
<a href="add_item.php"><div class="btn" style="width:20%;display:inline-block;">Add Item</div></a>


</body>
</html>