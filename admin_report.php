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
    <caption>Report for 
        <?php             
            echo $_POST['month'];        ?> 
    </caption>
    <tr>
        <th>staff ID</th>
        <th>staff Name</th>
        <th>Numbers of order records</th>
        <th>Total sales amount</th>
    </tr>
    <?php 
    require_once("connection/mysqli_conn.php");

    $staff = mysqli_query($conn,"SELECT * FROM staff");
    
    while($row = mysqli_fetch_assoc($staff)){
        $staffs[] = $row;
    }

 
    foreach ($staffs as $key => $res) {
        $staffID = $res['staffID'];
        $res_sql = "SELECT COUNT(*) as cnt, SUM(totalPrice) as totalSales FROM orders where staffID ='$staffID' and MONTH(dateTIme)='".substr($_POST['month'], 5,2)."' and YEAR(dateTime)='".substr($_POST['month'], 0,4)."'";
        
        $result = mysqli_query($conn,$res_sql);
        $cur_res = mysqli_fetch_assoc($result);
        $cnt = $cur_res['cnt'];
        $totalSales = $cur_res['totalSales'];
       
        echo '<tr><td>'
        .$res['staffID'].'</td><td>'
        .$res['staffName'].'</td><td>'
        .$cnt.'</td><td>'
        .$totalSales.'</td>'
        .'</tr>';
    }
   
    ?>
</table>


</body>
</html>