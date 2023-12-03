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
                $sql = "UPDATE tblbooking SET Status = '0' WHERE id = :id";

                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();

                echo 'Unit with ID ' . $id . ' has been returned, and the database has been updated.';
            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
    } else {
        echo 'ID not provided in the URL.';
    }
}
?>

