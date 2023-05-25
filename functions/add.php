<?php // toto PRIDAVA KOMENT DO DATABAZY
include_once("DB.php");

if(isset($_POST['Submit'])) {	
	$name = $_POST['text'];
		
	if(empty($name)) {
				
		if(empty($name)) {
			echo "<font color='red'>Nemáš koment seňor.</font><br/>";
		}

		
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 

		$result = mysqli_query($connection, "INSERT INTO komenty(text) VALUES('$name')");

		echo "<font color='green'>Dáta pridané.";
	}
}
?>