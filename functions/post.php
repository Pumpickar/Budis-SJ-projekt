<?php // toto POSTUJE DO SPOKOJNYCH CUSTOMMEROV
include 'functions/DB.php';  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $commentId = $_POST['comment_id'];

    $query = "SELECT text FROM komenty WHERE idkoment = '$commentId'";
    $result = mysqli_query($connection, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $commentText = $row['text'];

        $insertQuery = "INSERT INTO top_komenty (idtopkomenty, text) VALUES ('$commentId', '$commentText')";
        $insertResult = mysqli_query($connection, $insertQuery);

        if ($insertResult) {

            echo "<div class='alert alert-success'>Comment posted successfully.</div>";
        } else {

            echo "<div class='alert alert-danger'>Error posting comment: " . mysqli_error($connection) . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Comment not found.</div>";
    }
}
?>

