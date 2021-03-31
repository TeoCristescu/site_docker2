<?php
	include_once('dbh.php');
	session_start();
?>
<?php
if(isset($_POST['qty']))
		{
			$uid = $_SESSION['u_id'];
			$pid = $_POST['ppid'];
			$qty = $_POST['qty'];
			
			$stmt = $conn->prepare("UPDATE cart SET cantitate = " .$qty . " WHERE Id_client = " . $uid ." and Id_produs = " .$pid);
			$stmt->execute();
		}
?>