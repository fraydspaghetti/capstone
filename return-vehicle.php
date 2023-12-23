<?php
include('includes/config.php');

function insertData($Returned)
{
    // Perform any necessary validation or sanitization on the data

    // Assuming you have a table called 'users' with columns 'name' and 'email'
    $query = "INSERT INTO tblbooking ('Returned') VALUES ('$Returned')";

    $result = mysqli_query($connection, $query);

    // Check if the query was successful
    if ($result) {
        echo "Unit Returned Successfully!";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Retrieve the form data
    $Returned = $_POST['Returned'];

    // Call the insertData() function to insert the data
    insertData($Returned);
}
?>

<!-- HTML form -->
<form method="POST" action="">

    <input type="Returned" name="Returned" id="Returned"><br>

    <input class="btn btn-danger" type="submit" name="submit" value="Returned This Unit">
</form>