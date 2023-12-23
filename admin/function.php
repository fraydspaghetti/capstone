<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    if ($action === 'login') {
        login();
    } else if ($action === 'updateContactinfo') {
        updateContactinfo();
    }
}

// index
function login()
{

    include('includes/config.php');

    $email = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT UserName, Password FROM admin WHERE UserName=:email AND Password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
        $_SESSION['alogin'] = $_POST['username'];
        $response = array('success' => true, 'admin' => 'admin success');
    } else {
        $response = array('success' => true, 'error' => 'not valid');
    }

    echo json_encode($response);
}

function updateContactinfo()
{ {
        include('includes/config.php');
        $address = $_POST['address'];
        $email = $_POST['email'];
        $contactno = $_POST['contactno'];
        $sql = "update tblcontactusinfo set Address=:address,EmailId=:email,ContactNo=:contactno";
        $query = $dbh->prepare($sql);
        $query->bindParam(':address', $address, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':contactno', $contactno, PDO::PARAM_STR);
        $query->execute();
        $response = array('success' => true);

        echo json_encode($response);
    }
}
