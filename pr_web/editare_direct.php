<?php

include_once('dbh.php');
session_start();
if(isset($_GET['id_selectat']))
{
	$id=mysqli_real_escape_string($conn,$_GET['id_selectat']);
	echo $id;

}
?>

<!doctype html>
<html lang="en">
  <head>
   
<title>ADMINISTRARE</title>
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
  </head> 

    <div class="top-nav-bar">
    <div class="search-box">
      <i class="fa fa-bars" id="menu-btn" onclick="openmenu()"></i>
      <i class="fa fa-times" id="close-btn" onclick="closemenu()"></i>
      <a href="proiect.php"> <img src="img/2.jpg" class="logo"></a>
    <input type="text" class="form-control">
    <span class="input-group-text"><i class="fa fa-search"></i></span>
    </div>

    <div class="menu-bar">
      <ul>
      
     
<?php
	if(!empty($_SESSION['u_user']))
{
     echo '<li><a href="pagadmin.php"> '. $_SESSION["u_user"].'</a></li>';
     echo '<li><a href="editareadmin.php">Editare clienti</a></li>';
     echo '<li><a href="stergereadmin.php">Stergere clienti</a></li>';
     echo '<li><a href="logout.php">LOGOUT</a></li>';
     
}
else
{
  	echo '<li><a href="register.php">Inregistrare</a></li>';
    echo '<li><a href="login.php">Log in</a></li>';

}
?>




<div class="admin-box">

        
         
       <form method="POST" action="editare_direct.php" >
      
       <h1>Editare Date client cu id <?php echo $id ?></h1>

			   <div class="textbox">

         <input type='hidden' name='id' value="<?php echo $id ?>" />
        
						<i class="fa fa-user"></i>
						<?php
						echo'<input type="text" placeholder="Nume si prenume noi" name="name">';
						?>
                        </div>
                <div class="textbox">
				   <i class="fa fa-user"></i>
				   <?php
				   echo'<input type="text" placeholder="Username nou" name="user" >';
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
					   echo'<input type="text" placeholder="Email nou" name="email" >';
					   ?>
						  </div>
						  
			 <div class="textbox">
						<i class="fa fa-user"></i>
						<?php
						echo'<input type="text" placeholder="Adresa noua" name="addr">';
						?>
            </div>			
                       
             <input class="btn" type="submit" name="submit" id="submit" value="Editare" >         
          </form>
          </div>
</div>

<?php

if(isset($_POST['submit']))
{
  
    $id=mysqli_real_escape_string($conn,$_POST['id']);
    echo $id;
    $nume_nou=mysqli_real_escape_string($conn,$_POST['name']);
    $username_nou=mysqli_real_escape_string($conn,$_POST['user']);
    $pwd_nou=mysqli_real_escape_string($conn,$_POST['pwdn']);
    $email_nou=mysqli_real_escape_string($conn,$_POST['email']);
    $adresa_noua=mysqli_real_escape_string($conn,$_POST['addr']);


  
     $sql1="UPDATE nume SET Nume_si_prenume='$nume_nou', User= '$username_nou', Email='$email_nou',Adresa='$adresa_noua',Parola='$pwd_nou' WHERE Id='$id'";
     $result1=mysqli_query($conn,$sql1);
     if($result1)
     {
     echo "<script type=\"text/javascript\">
    alert('The update is done');
    </script>";
    header("location: pagadmin.php");
     
      }
    else
     {
     echo "<script type=\"text/javascript\">
     alert('ERROR');
     </script>";
    }

}


?>

