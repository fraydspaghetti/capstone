<?php

include('includes/config.php');

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $amount = $_POST['amount'];
    $vehicle = $_POST['vehicle'];
    $fdate = $_POST['fdate'];
    $tdate = $_POST['tdate'];
    $vid = $_POST['vid'];


    $datetime1 = new DateTime($fdate);
    $datetime2 = new DateTime($tdate);
    $interval = $datetime1->diff($datetime2);
    $totalDays = (int) $interval->format('%a');



    $amountsql = "SELECT tb.PricePerDay,tb.VehiclesTitle 
FROM tblvehicles AS tb 
INNER JOIN tblbooking AS t ON tb.id = t.VehicleId
 WHERE t.VehicleId = :vid;
";

    $query = $pdo->prepare($amountsql);
    $query->bindParam(':vid', $vid, PDO::PARAM_INT);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
    $pricePerDay = $result['PricePerDay'];
    $finaltotal =  $totalDays * $pricePerDay;



    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO payment (users_id, vehicles_Id, amount) VALUES (:id, :vehicle, :finaltotal)";
    $stmt = $pdo->prepare($sql);

    if ($stmt) {
        // Bind parameters
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':vehicle', $vehicle, PDO::PARAM_INT);
        $stmt->bindParam(':finaltotal', $finaltotal, PDO::PARAM_INT);  // Use PARAM_INT or PARAM_STR depending on the column type

        // Execute the statement
        if ($stmt->execute()) {
            echo '<script>alert("Payment Requested!");</script>';

            echo '<script>window.location.href = "payment.php";</script>';
        } else {
            echo "Not inserted";
        }
    } else {
        echo "Error in preparing the statement";
    }
}
