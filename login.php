<?php
include 'casti_stranky/bootstrap_atd.php';
include 'casti_stranky/header.php';

include 'functions/DB.php';

if (isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($connection, $_POST['username']);
    $pass = mysqli_real_escape_string($connection, $_POST['password']);

    if ($user == "" || $pass == "") {
        echo "<div class='center'>";
        echo "Všetky polia musia byť vyplnené.";
        echo "<br/>";
        echo "<a href='login.php'>Krok späť</a>";
        echo "</div>";
    } else {
        $result = mysqli_query($connection, "SELECT * FROM user WHERE username='$user' AND password=md5('$pass')")
            or die("select nefunguje");

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['id'] = $row['id'];
            $_SESSION['iduser'] = $row['iduser'];
            $_SESSION['valid'] = true;
            $_SESSION['name'] = $row['name'];

            if ($row['is_admin'] == 1) {
                $_SESSION['role'] = 'admin';

                $cookie_name = "login_session";
                $cookie_value = session_id();
                $cookie_expiry = time() + (259200);
                $cookie_path = '/';
                setcookie($cookie_name, $cookie_value, $cookie_expiry, $cookie_path);

                header('Location: admin.php');
                exit();
            } else {
                $_SESSION['role'] = 'user';

                $cookie_name = "login_session";
                $cookie_value = session_id();
                $cookie_expiry = time() + (259200);
                $cookie_path = '/';
                setcookie($cookie_name, $cookie_value, $cookie_expiry, $cookie_path);

                header('Location: index.php');
                exit();
            }
        } else {
            echo "<div class='center'>";
            echo "Nesprávne meno alebo heslo";
            echo "<br/>";
            echo "<a href='login.php'>Krok späť</a>";
            echo "</div>";
        }
    }
}
?>


<style>
    .center {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
</style>

<div class="center">
    <form name="form1" method="post" action="">
        <table width="75%" border="0">
            <tr>
                <td width="10%">Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</div>

<?php
include 'casti_stranky/footer.php';
include 'casti_stranky/JS.php';
?>
