<?php
include_once('dbh.php');
session_start();
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
               <h1>Adaugare produs nou</h1>
			 <form method="POST" action="adauga_produs.php" >


			   <div class="textbox">
						<i class="fa fa-user"></i>
						<?php
						echo'<input type="text" placeholder="Denumire" name="nume">';
						?>
                        </div>
                <div class="textbox">
				   <i class="fa fa-user"></i>
				   <?php
				   echo'<input type="text" placeholder="Pret" name="pret" >';
				   ?>
                   </div>
                   
					<div class="textbox">
					<i class="fa fa-lock"></i>
					<?php
					echo'<input type="text" placeholder="Calea imaginii" name="cale" >';
					?>
					</div>
          <div class="textbox">
				   <i class="fa fa-user"></i>
				   <?php
				   echo'<input type="text" placeholder="Code" name="code" >';
				   ?>
                   </div>

          <div class="textbox">
					<i class="fa fa-lock"></i>
					<?php
					echo'<input type="text" placeholder="Categorie" name="categorie" >';
					?>
					</div>
                <input class="btn" type="submit" name="submit" id="submit" value="Editare" >         
          </form>
          </div>
</div>

<?php

if(isset($_POST['submit'])){
        
   
    $nume=mysqli_real_escape_string($conn,$_POST['nume']);
    $pret=mysqli_real_escape_string($conn,$_POST['pret']);
    $cale=mysqli_real_escape_string($conn,$_POST['cale']);
    $code=mysqli_real_escape_string($conn,$_POST['code']);
    $categorie=mysqli_real_escape_string($conn,$_POST['categorie']);
     
    $sql1="INSERT INTO products(name, price ,image,redus,categorie,code) values ('$nume','$pret','$cale','nu','$categorie','$code');";
    $result1=mysqli_query($conn,$sql1);
    if($result1)
    {
    echo "<script type=\"text/javascript\">
   alert('The update is done');
   </script>";
    
     }
   else
    {
    echo "<script type=\"text/javascript\">
    alert('ERROR');
    </script>";
           }
       }


?>


