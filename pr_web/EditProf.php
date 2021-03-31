<?php
include_once('dbh.php');
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
   
<title>Editare Profil</title>
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
  </head> 
  <body>
    <div class="top-nav-bar">
    <div class="search-box">
      <i class="fa fa-bars" id="menu-btn" onclick="openmenu()"></i>
      <i class="fa fa-times" id="close-btn" onclick="closemenu()"></i>
    <a href="proiect.php"> <img src="img/2.jpg" class="logo"></a>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="css/search_bar.css">

<form class="example" method="POST" action="index1.php">
  <input type="text" placeholder="Search.." name="search">
  <button type="submit"  name="submit"><i class="fa fa-search"></i></button>
</form>
    </div>

    <div class="menu-bar">
      <ul>
        <?php
		 echo '<li><a href="#"> '. $_SESSION["u_user"].'</a></li>';
		 if(!empty($_SESSION["shopping_cart"])) 
    {
    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
    ?>
    <li><a href="cart.php"><i class="fa fa-cart-arrow-down"> Cos : <?php echo $cart_count; ?> produse </i></li><span>
    </span></a>
   <?php
    }
		?>
        <li><a href="logout.php">LogOut</a></li>
	   
		

		
      </ul>
    </div>
    </div>
	




<body>

<div class="login-box">
               <h1>Editare Date</h1>
			  <form method="POST" action="EditProf.php" >
			   <div class="textbox">
						<i class="fa fa-user"></i>
						<?php
						echo'<input type="text" placeholder="Nume si prenume" name="name" value='. $_SESSION["u_name"].'>';
						?>
                        </div>
               <div class="textbox">
				   <i class="fa fa-user"></i>
				   <?php
				   echo'<input type="text" placeholder="User" name="user" value='. $_SESSION["u_user"].' readonly>';
				   ?>
                   </div>
                   <div class="textbox">
					<i class="fa fa-lock"></i>
					<?php
					echo'<input type="password" placeholder="Parola veche" name="pwdo" >';
					?>
					</div>
					<div class="textbox">
					<i class="fa fa-lock"></i>
					<?php
					echo'<input type="password" placeholder="Parola noua" name="pwdn" >';
					?>
					</div>
                       
                      <div class="textbox">
						<i class="fa fa-envelope-open"></i>
						<?php
					   echo'<input type="text" placeholder="Email nou" name="email" value='. $_SESSION["u_email"].'>';
					   ?>
						  </div>
						  
			 <div class="textbox">
						<i class="fa fa-user"></i>
						<?php
						echo'<input type="text" placeholder="Adresa noua" name="addr" value='. $_SESSION["u_addr"].'>';
						?>
                        </div>			
                       
             <input class="btn" type="submit" name="submit" id="submit" value="Editare" >         
</form>
</div>



</body>

</html>


<?php


if(isset($_POST['submit'])){
			$id=$_SESSION["u_id"];
			$pwdo=mysqli_real_escape_string($conn,$_POST['pwdo']);
			$pwdn=mysqli_real_escape_string($conn,$_POST['pwdn']);
			if($pwdo==$_SESSION['u_pwd'])
			{
				if(empty($pwdn))
				{
					echo "<script type=\"text/javascript\">
					alert('New password is empty');
					</script>";
				}
				else
				{
					$sql1="UPDATE nume SET Nume_si_prenume='$_POST[name]',Email='$_POST[email]',Adresa='$_POST[addr]',Parola='$_POST[pwdn]' WHERE Id='$id'";
					$result1=mysqli_query($conn,$sql1);
					if($result1)
					{
						echo "<script type=\"text/javascript\">
						alert('The update is done');
						</script>";
					$sql="SELECT * FROM nume where Id='$id'";
					$result=mysqli_query($conn,$sql);
					$resultCheck=mysqli_num_rows($result);
					$row=mysqli_fetch_assoc($result);
					$_SESSION['u_id']=$row['Id'];
					$_SESSION['u_user']=$row['User'];
					$_SESSION['u_name']=$row['Nume_si_prenume'];
					$_SESSION['u_email']=$row['Email'];
					$_SESSION['u_pwd']=$row['Parola'];
					$_SESSION['u_addr']=$row['Adresa'];				

					}
					else
					{
						echo "<script type=\"text/javascript\">
							alert('ERROR');
							</script>";
					}
				}
			}
			else
			{
				if(!empty($pwdo))
				{
					echo "<script type=\"text/javascript\">
					alert('Wrong password');
					</script>";
				}
				else
				{
					$sql1="UPDATE nume SET Nume_si_prenume='$_POST[name]',Email='$_POST[email]',Adresa='$_POST[addr]',Parola='$_POST[pwdn]' WHERE ID='$id'";
				$result1=mysqli_query($conn,$sql1);
				if($result1)
				{
					echo "<script type=\"text/javascript\">
				alert('The update is done');
				</script>";
				$sql="SELECT * FROM nume where Id='$id'";
				$result=mysqli_query($conn,$sql);
				$resultCheck=mysqli_num_rows($result);
				$row=mysqli_fetch_assoc($result);
				$_SESSION['u_id']=$row['Id'];
				$_SESSION['u_user']=$row['User'];
				$_SESSION['u_name']=$row['Nume_si_prenume'];
				$_SESSION['u_email']=$row['Email'];
				$_SESSION['u_pwd']=$row['Parola'];
				$_SESSION['u_addr']=$row['Adresa'];	

				}
				else
				{
					echo "<script type=\"text/javascript\">
					alert('ERROR');
					</script>";
				}
				}

			}
			
		}


?>
<!-- <script>
$("#submit").click(function(){
  alert("Te-ai inregistrat!");
  
});</script> -->