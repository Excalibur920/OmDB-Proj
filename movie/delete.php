<?php
	require "./includes/connect.php";
?>

<!DOCTYPE html>
<?php
	if (isset($_GET['dex'])) {
		$dex = $_GET['dex'];
		$sql_del = "DELETE FROM searched WHERE dex = $dex";
		$result = mysqli_query($link_db, $sql_del);	
	}

	header('location: ./history.php');
	exit;

?>