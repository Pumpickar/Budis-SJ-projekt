<?php
include 'DB.php';

$query = "SELECT idkoment FROM komenty";
$result = mysqli_query($connection, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $idkoment = $row['idkoment'];
    $deleteQuery = "DELETE FROM komenty WHERE idkoment = '$idkoment'";
    $deleteResult = mysqli_query($connection, $deleteQuery);

    if ($deleteResult) {
        echo "Comment deleted.";
    } else {
        echo "Error deleting" . mysqli_error($connection);
    }
} else {
    echo "Error retrieving" . mysqli_error($connection);
}

mysqli_close($connection);
?>
