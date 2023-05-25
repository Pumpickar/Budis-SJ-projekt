<?php
include 'DB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $commentId = $_POST['comment_id'];
    $commentText = $_POST['comment_text'];

    $query = "UPDATE komenty SET text = '$commentText' WHERE idkoment = '$commentId'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "Comment updated.";
    } else {
        echo "Error updating comment " . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>
