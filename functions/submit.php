<?php

session_start();

include("DB.php");

if (isset($_POST['message'])) {
    $message = mysqli_real_escape_string($connection, $_POST['message']);

    $query = "INSERT INTO komenty (text) VALUES ('$message')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "Message uploaded successfully.";
    } else {
        echo "Error uploading message: " . mysqli_error($connection);
    }
}

if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    header("Location: admin.php");
    exit();
}



?>
