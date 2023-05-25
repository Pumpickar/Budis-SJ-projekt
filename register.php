
<?php

include 'casti_stranky\bootstrap_atd.php';
include 'casti_stranky\header.php';
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
  <?php
  include("functions\DB.php");

if(isset($_POST['submit'])) {
    $user = $_POST['username'];
	$email = $_POST['email'];
	$pass = $_POST['password'];

	if($user == "" || $pass == "" || $email == "") {
		echo "Všetky polia musia byť vyplnené.";
		echo "<br/>";
		echo "<a href='register.php'>  Krok späť</a>";
	} else {
		mysqli_query($connection, "INSERT INTO user(iduser,email, username, password) VALUES('','$email', '$user', md5('$pass'))")
			or die("insert zase nefunguje");
			
		echo "Registrácia úspešná";
		echo "<br/>";
		echo "<a href='login.php'>Login</a>";
	}
} else {
?>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>			
			<tr> 
				<td>Username</td>
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
<?php
}
?>

</div>

<?php
include 'casti_stranky/footer.php';
include 'casti_stranky/JS.php';
?>