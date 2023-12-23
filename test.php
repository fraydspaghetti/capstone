<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'prototype');

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $unit_id = $_POST["unit_id"];

        if ($unit_id === '0') {
            try {
                $sql = "UPDATE tblbooking SET Status = '0', `Returned` = '1' WHERE id = :id";

                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();

                // Check if the update was successful
                $rowsAffected = $stmt->rowCount();

                if ($rowsAffected > 0) {
                    echo '<script>alert("Update successful!");</script>';
                    echo '<script>window.location.href = "my-booking.php";</script>';
                } else {
                    echo 'Update failed. No rows were affected.';
                }
            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
    } else {
        header('location:my-booking.php');
    }
}
