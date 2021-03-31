<?php
session_start();
if(isset($_POST['submit'])){
	include_once 'dbh.php';

	$user=mysqli_real_escape_string($conn,$_POST['User']);
	$pwd=mysqli_real_escape_string($conn,$_POST['Parola']);


	if(empty($user) ||  empty($pwd))
	{
		
		echo "<script type=\"text/javascript\">
		alert('Username sau parola necompletate');
		</script>";
	}	
	else
	{
		$sql="SELECT * FROM nume where User='$user'";
		$result=mysqli_query($conn,$sql);
		$resultCheck=mysqli_num_rows($result);
		if($resultCheck<1)
		{
			echo "<script type=\"text/javascript\">
			alert('Username necunoscut');
			</script>";
		}
		else
		{
			if($row=mysqli_fetch_assoc($result))
			{
				if($pwd!=$row['Parola'])
				
				{
					echo "<script type=\"text/javascript\">
					alert('Parola gresita');
					</script>";
				}
				else
				{
					$_SESSION['u_id']=$row['Id'];
					$_SESSION['u_user']=$row['User'];
					$_SESSION['u_name']=$row['Nume_si_prenume'];
					$_SESSION['u_email']=$row['Email'];
					$_SESSION['u_pwd']=$row['Parola'];
					$_SESSION['u_addr']=$row['Adresa'];
					
					if($user=='Admin')
					{
						echo "<script type=\"text/javascript\">
					alert('Te-ai logat cu succes!');
					</script>";
					header("Location:pagadmin.php");
					}
					else
					{

					echo "<script type=\"text/javascript\">
					alert('Te-ai logat cu succes!');
					</script>";
					header("Location:proiect.php");
					}
				}
			}
		}
	
	
	}
}
?>