<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>admin page</title>

	<link rel="stylesheet" href="style/customer.css">
</head>
<body>
	
<?php include 'admin_header.php'; ?>
<?php include 'connection/mysqli_conn.php'; ?>

<section class="dashboard">

	<h1 class="tilte">dashboard</h1>

	<div class="box-container">
		<div class="box">
			<h3>staffs</h3>
		<h3><?php 
            $query = "SELECT COUNT(*) FROM staff";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn)); 
            while ($row = mysqli_fetch_array($result)) {
                echo "$row[0]";
            }
            ?></h3>
			<p>Record(s)</p>
			<!-- <a href="admin_staff.php" class="btn">see staff</a> -->
		</div>

		<div class="box">
		<h3>customers</h3>
		<h3><?php 
            $query = "SELECT COUNT(*) FROM customer";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn)); 
            while ($row = mysqli_fetch_array($result)) {
                echo "$row[0]";
            }
            ?></h3>
			<p>Record(s)</p>
			<!-- <a href="admin_customer.php"class="btn">see customer</a> -->
		</div>

		<div class="box">
		<h3>items</h3>
		<h3><?php 
            $query = "SELECT COUNT(*) FROM item";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn)); 
            while ($row = mysqli_fetch_array($result)) {
                echo "$row[0]";
            }
            ?> </h3>
			<p>Record(s)</p>
			<!-- <a href="admin_item.php"class="btn">see item</a> -->
		</div>

		<div class="box">
		<h3>orders</h3>
		<h3><?php 
            $query = "SELECT COUNT(*) FROM itemorders";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn)); 
            while ($row = mysqli_fetch_array($result)) {
                echo "$row[0]";
            }
            ?></h3>
			<p>Record(s)</p>
			<!-- <a href="admin_order.php"class="btn">see order</a> -->
		</div>

		
	</div>
</section>

</body>
</html>
