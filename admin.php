<?php
include 'casti_stranky/bootstrap_atd.php';
include 'casti_stranky/header.php';
include 'functions/DB.php';

// pridať check či som admin
if (!isset($_SESSION['valid']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$query = "SELECT * FROM komenty";
$result = mysqli_query($connection, $query);

if (!$result) {
    echo "Error s pridávaním do komentov" . mysqli_error($connection);
    exit();
}

?>

<style>
    table {
        width: 100%;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
</style>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<h2>Admin Rozhranie</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Comment</th>
        <th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo isset($row['idkoment']) ? $row['idkoment'] : ''; ?></td>
            <td>
                <form action="functions/edit.php" method="POST">
                    <input type="hidden" name="comment_id" value="<?php echo $row['idkoment']; ?>">
                    <input type="text" name="comment_text" value="<?php echo $row['text']; ?>">
                    <button type="submit" name="update_comment">Update</button>
                </form>
            </td>
            <td>
                <a href="functions/delete.php?id=<?php echo isset($row['idkoment']) ? $row['idkoment'] : ''; ?>">Delete</a>
                <form action="admin.php" method="POST">
                    <input type="hidden" name="comment_id" value="<?php echo $row['idkoment']; ?>">
                    <input type="hidden" name="comment_text" value="<?php echo $row['text']; ?>">
                    <button type="submit" name="post_comment">Post</button>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>

<?php

if (isset($_POST['post_comment'])) {
    $commentText = $_POST['comment_text'];


    $insertQuery = "INSERT INTO top_komenty (text) VALUES ('$commentText')";
    $insertResult = mysqli_query($connection, $insertQuery);

    if ($insertResult) {
        echo "<div class='alert alert-success'>Comment posted</div>";
    } else {
        echo "<div class='alert alert-danger'>Error posting comment " . mysqli_error($connection) . "</div>";
    }
}

include 'casti_stranky/footer.php';
include 'casti_stranky/JS.php';
?>
