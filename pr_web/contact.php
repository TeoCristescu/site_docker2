<?php
include_once('dbh.php');
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
   
<title>CONTACT</title>
 
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
     
  if ($_SESSION['u_user']!='Admin')
  {
    echo '<li><a href="#"> '. $_SESSION["u_user"].'</a></li>';
     echo '<li><a href="EditProf.php">Editare</a></li>';
     echo '<li><a href="logout.php">LOGOUT</a></li>';
     echo '<li><a href="afisare_comezi.php">Comenzi</a></li>';
$user=$_SESSION['u_id'];
$sql1= "SELECT * FROM cart WHERE  Id_client=$user";
$result = mysqli_query($conn,$sql1);
$resultCheck=mysqli_num_rows($result);
if($resultCheck)
{

    ?>
    <li><a href="cart.php"><i class="fa fa-cart-arrow-down"> <?php echo mysqli_num_rows($result); ?> </i></li><span>
    </span></a>
<?php
   
}
}
else
{
  echo '<li><a href="logout.php">LOGOUT</a></li>';
  echo '<li><a href="PagAdmin.php">Administrare</a></li>';
}
}
else
{
  	echo '<li><a href="register.php">Inregistrare</a></li>';
    echo '<li><a href="login.php">Log in</a></li>';
    echo '<li><a href="contact.php">Contact</a></li>';
}

       ?>
      </ul>
    </div>
    </div>
<body>
<div class="contacte">
		<h1>CONTACT:</h1>
		<table>
		<tr>
			<td>
				<p>Phone Number:</p>
				<p>0453 542 543</p>
				<p>0243 123 432</p>

				<p>Fax:</p>
				<p>+44 161 999 8888</p>
				<p>+44 208 123 4567</p>

				<p>Email:</p>
				<p>Magazin_vanatoare@gmail.com</p>

				<p>Business Hours:</p>
				<p>M-F: 09-18, </p>
				<p>Saturday: 09-14, </p>
				<p>Sunday: Close. </p>


			</td>
			<td>
			<img src="img/int.jpg" class="magazin">
			<p class="cc22"> Address: George Cosbuc Street, Number 5</p>
			</td>
		</tr>
		</table>
    </div>
</body>
