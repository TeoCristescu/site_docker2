 
<title>Cos Cumparaturi</title>
 <?php
 session_start();
 include_once('dbh.php');
 require_once("plasare_comanda.php");


?>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
 
 <link rel="stylesheet" href="css/style.css">
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
 <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 

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
 if(!empty($_SESSION['u_user']))
{
  echo '<li><a href="#"> '. $_SESSION["u_user"].'</a></li>';
  echo '<li><a href="EditProf.php">Editare</a></li>';
    echo '<li><a href="logout.php">LOGOUT</a></li>';
    echo '<li><a href="#"></a><i class="fa fa-cart-arrow-down"> Cos cumparaturi</i></li>';
}
else
{
echo '<li><a href="register.php">Inregistrare</a></li>';
 echo '<li><a href="login.php">Log in</a></li>';
 echo '<li><a href="contact.php">Contact</a></li>';

}

$user=$_SESSION['u_id'];
?>
    
   </ul>
 </div>
 </div>

<?php
 
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove")
{
$id_de_sters=$_POST["id_produs"];

$sql1= "DELETE FROM cart WHERE Id_client=$user and Id_produs=$id_de_sters";
mysqli_query($conn,$sql1);

      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";

}
 



?>


<div class="cart">
<?php

    $total_price = 0;
?>
<table class="table">
<tbody>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr> 
<?php 




$sql1= "SELECT * FROM cart WHERE Id_client=$user";
$result = mysqli_query($conn,$sql1);
$resultCheck=mysqli_num_rows($result);
if($resultCheck>0)
{

while($produs_cos = mysqli_fetch_assoc($result))
{
$id_produs=$produs_cos['Id_produs'];
$cantitate_produs=$produs_cos['cantitate'];
$sql2="SELECT * from products where id = $id_produs";
$result2= mysqli_query($conn,$sql2);
$row = $result2->fetch_assoc()



?>
<tr>
<td>
<img src='<?php echo $row["image"]; ?>' width="50" height="40" />
</td>
<td><?php echo $row["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='id_produs' value="<?php echo $id_produs; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td>

<div class="quantity">
			<input type="hidden" class="id_produs" value="<?php echo $id_produs; ?>" />
          <input type="number" value="<?php echo $produs_cos['cantitate']?>" min="1" class="quantity-field itemQty">
        </div>

</td>
<td><?php echo "$".$row["price"]; ?></td>
<td><?php echo "$".$row["price"]*$produs_cos['cantitate']; ?></td>
</tr>
<?php
$total_price += ($row["price"]*$produs_cos["cantitate"]);
}

?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table> 
  <?php
}
else
{
 echo "<h3>Your cart is empty!</h3>";
 }
?>


<div class="login-box">
<form action ="<?= $_SERVER['PHP_SELF'];?>" method="POST">   
    
<input type='hidden' name='id_user' value="<?php echo $user; ?>" />

             <input class="btn" type="submit" name="plaseaza_comanda" value="Plaseaza comanda" >    

             </form>			 
</div>
 
 </div>
<div style="clear:both;"></div>
 
<div class="message_box" style="margin:10px 0px;">

</div>

<script>
	$(document).ready(function(){
		$(".itemQty").on('change',function(ev){
			var $el = $(this).closest(".quantity");
			var ppid = $el.find(".id_produs").val();
			var qty = $el.find(".itemQty").val();
			 $.ajax({
				url: "modifica_cantitate.php",
				type: "POST",
				data: {qty:qty,ppid:ppid },                   
				success: function(response)
							{
								console.log(response);
								location.reload(true);
							}
        });
	});
	});
</script>   