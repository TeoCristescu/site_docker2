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
    <img src="img/2.jpg" class="logo">
    <input type="text" class="form-control">
    <span class="input-group-text"><i class="fa fa-search"></i></span>
    </div>

    <div class="menu-bar">
      <ul>
      
     
<?php
	if(!empty($_SESSION['u_user']))
{
     echo '<li><a href="pagadmin.php">conectat: '. $_SESSION["u_user"].'</a></li>';
     echo '<li><a href="editareadmin.php">Editare date clienti</a></li>';
     echo '<li><a href="stergereadmin.php">Stergere clienti</a></li>';
       echo '<li><a href="logout.php">LOGOUT</a></li>';
     
	  }
else
{
  	echo '<li><a href="register.php">Inregistrare</a></li>';
    echo '<li><a href="login.php">Log in</a></li>';

}
?>

<div class="admin-box2">
              
			 <form method="POST" action="stergere_produs.php" >
             <h1>Sterge produs cu id <?php echo $id ?></h1>
             <div class="textbox">

<input type='hidden' name='id' value="<?php echo $id ?>" />
            
                       
             <input class="btn" type="submit" name="submit" id="submit" value="Stergere" >         
          </form>
          </div>
</div>


<?php

if(isset($_POST['submit'])){
        
    $id=mysqli_real_escape_string($conn,$_POST['id']);
    


  
     $sql1="DELETE from products WHERE id='$id'";
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


