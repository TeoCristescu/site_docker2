<?php

if(isset($_POST['submit'])){
	include_once 'dbh.php';

	$name=mysqli_real_escape_string($conn,$_POST['name']);
	$user=mysqli_real_escape_string($conn,$_POST['user']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
	$address=mysqli_real_escape_string($conn,$_POST['adresa']);
	

	//error

	if(empty($user) || empty($email) || empty($pwd) ||empty($address) ||empty($name))
	{
		
		echo "<script type=\"text/javascript\">
		alert('Campurile cu * sunt obligatorii');
		
		</script>";
	}	
	else
	{
		if(!preg_match("/^[a-zA-Z ]*$/", $name))
		{
			echo "<script type=\"text/javascript\">
		alert('Numele trebuie sa contina doar litere');

		</script>";
		}
		else
		{
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				echo "<script type=\"text/javascript\">
				alert('Email-ul nu este valid');

				</script>";
			}
			else
			{
				$sql="SELECT * FROM nume where User='$user'";
				$result=mysqli_query($conn,$sql);
				$resultCheck=mysqli_num_rows($result);
				if($resultCheck>0)
				{
					echo "<script type=\"text/javascript\">
					alert('Username-ul este deja folosit');
					</script>";
				}
				else
				{
	


					$sql="INSERT INTO nume(Nume_si_prenume,User,Parola,Adresa,Email) VALUES ('$name','$user','$pwd','$address','$email');";
					mysqli_query($conn,$sql);
					echo "<script type=\"text/javascript\">
					alert('Te-ai inregistrat cu succes');
					</script>";
					header("Location:login.php");
					
				}
			}
		}
	}

}

?>