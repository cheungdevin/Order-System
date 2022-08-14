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
    <?php 
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_SESSION['manager'])){
        include 'admin_header.php';
    }
    if(isset($_SESSION['staff'])){
        include 'staff_header.php';
    }
     ?>
<form name="form" action="discount.php" method="POST">
    <table class="table">
    <tr>
        <th>Original total price</th>
        <th>New total price</th>
    </tr>
    <?php 
        if(isset($_POST['org'])){
            $org =$_POST['org'];
        }else{
            $org = 1000;
        }
        if (!extension_loaded("curl")) {
            die("enable library curl first");
        }

        $url = "http://127.0.0.1:8080/api/discountCalculator/".$org;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);   # Perform a cURL session
        curl_close($curl);

        // Assume response data is in JSON format
        $data = json_decode($response, true);

        /*
        Output on browser is :
        array (size=2)
        'para1' => string 'apple' (length=5)
        'para2' => string '30' (length=2)
        */
        
        echo '<tr><td><input name="org" type="number" step="0.01" value="'
        .$org.'"></input></td><td>'
        .$data['newTotalPrice'].'</td></tr>';
    ?>
</table>

<div style="margin-top:20px"><div>
<input type="submit" name="submit" value="Compute New Total Price" class="btn" >
</form>


</body>
</html>