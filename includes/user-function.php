<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'user-login') {
        UserLogin();
    }
}


function UserLogin()
{
    include 'config.php';
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT EmailId,Password,FullName FROM tblusers WHERE EmailId=:email and Password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        $_SESSION['login'] = $_POST['email'];
        $_SESSION['id'] = $results->id;
        $_SESSION['fname'] = $results->FullName;
        $currentpage = $_SERVER['REQUEST_URI'];
        echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
        // $response = array('success'=> true , 'correct' => 'loginsuccess');
    } else {

        echo "<script>alert('Invalid Details');</script>";
        // $response = array('success'=> true , 'error' => 'wrongcredentials');

    }
    echo json_encode($response);
}
