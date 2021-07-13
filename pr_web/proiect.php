<?php
include_once('dbh.php');
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
   
<title>MAGAZIN ARTICOLE VANATOARE</title>
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/search_bar.css">
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

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="css/search_bar.css">

<form class="example" method="POST" action="index1.php?cat=toate">
  <input type="text" placeholder="Search.." name="search">
  <button type="submit"  name="submit"><i class="fa fa-search"></i></button>
</form>

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

echo '<li><a href="logout.php">LOGOUT</a></li>';
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


$status="";
if (isset($_POST['id']) && $_POST['id']!="")
{
if(!empty($_SESSION['u_user']))
{
  $user=$_SESSION['u_id'];

$idd = $_POST['id'];

$sql1= "SELECT * FROM cart WHERE Id_produs=$idd AND Id_client=$user";
$result = mysqli_query($conn,$sql1);
$cant1=1;
$resultCheck=mysqli_num_rows($result);
if($resultCheck<1)
{
  $sqll="INSERT INTO cart(Id_produs,Id_client,cantitate) VALUES ('$idd','$user','$cant1');";
  mysqli_query($conn,$sqll);  
}
else
{
  $row=mysqli_fetch_assoc($result);
      $cantitate=$row['cantitate'];
				$cantitate++;
        $sql = "UPDATE cart SET cantitate=$cantitate WHERE Id_produs='$idd' and Id_client='$user'";
        mysqli_query($conn,$sql);
}
}
else
{
  echo "<script type=\"text/javascript\">
  alert('Trebuie sa fiti logat pentru a adauga un produs in cos!');
  </script>";
}
}

?>
       
      </ul>
    </div>
    </div>
  
    <section class="header">
           

    </div>
    <section class="header">
      <div class="side-menu" id="side-menu">
        <ul>
          <li><a href="index1.php?cat=toate">Toate produsele</a> <i class="fa fa-angle-double-right"></i>

        </li>
          <li>Articole vanatoare <i class="fa fa-angle-double-right"></i>
          <ul>
            <li><a href="index1.php?cat=arma">Arme </a></li>
            <li>Camasi</li>
            <li><a href="index1.php?cat=palarie">Palarii</a></li>
            <li>Veste</li>
            <li><a href="index1.php?cat=geaca">Geci</a></li>
            <li>Tricouri</li>
          </ul>

        </li>
          <li>Incaltaminte vanatoare <i class="fa fa-angle-double-right"></i>
          <ul>
            <li>Accesorii </li>
            <li><a href="index1.php?cat=bocanci">Bocanci</a></li>
            <li>Cizme</li>
            <li>Ghete</li>
            <li>Pantofi</li>        
          </ul>

        </li>
          <li>Articole Optice <i class="fa fa-angle-double-right"></i>
          <ul>
            <li>Accesorii </li>
            <li>Binocluri</li>
            <li>Camere</li>
            <li>Lampi</li>
            <li>Lanterne</li>
            <li>Lunete</li>
          </ul>

        </li>
          
        </ul>
        </div>




</form>

      <div class ="slider">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="img/v1.jpg" class="d-block w-100" >
            </div>
            <div class="carousel-item">
              <img src="img/v2.jpg" class="d-block w-100">
            </div>
            <div class="carousel-item">
              <img src="img/v3.jpg" class="d-block w-100" >
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>


      </div>
    </section>
    <section class="featured-categories">
      <div class="containter">
        <div class="row">
          <div class="col-md-4">
            <img src="img/c1.jpg">  
          </div>
          <div class="col-md-4">
            <img src="img/c2.jpg">  
          </div>
          <div class="col-md-4">
            <img src="img/c3.jpg">  
          </div>

        </div>
        </div>

    </section>

    <section class="on-sale">
      <div class="title-box">
        <h2>test 3 practic</h2>
      </div>

<?php
     
      $result = mysqli_query($conn,"SELECT * FROM `products` where redus='da'");
        while($row = mysqli_fetch_assoc($result)){
          echo "<div class='product_wrapper'>
          <form method='post' action=''>
          <input type='hidden' name='id' value=".$row['id']." />
          <div class='image'><a href='product.php?id_selectat=$row[id]'/><img src='".$row['image']."' ></a></div>
          <div class='name'>".$row['name']."</div>
          <div class='price'>$".$row['price']."</div>
          <button type='submit' class='buy'>Adauga in cos</button>
        </form>
          </div>
         
          "
      
          ;
              }
      
      ?>


    </section>

<?php

mysqli_close($conn);

?>


    <section class="website-features">
      <div class="container">
      <div class="row">
        <div class="col-md-3 feature-box">
          <img src="img/f1.png">
          <div class="feature-text">
            <p><b>100% Calitate</b></p>
          </div>
        </div>

        <div class="col-md-3 feature-box">
          <img src="img/f2.png">
          <div class="feature-text">
            <p><b>Retur gratuit in 30 zile</b></p>
          </div>
        </div>
        <div class="col-md-3 feature-box">
          <img src="img/f3.png">
          <div class="feature-text">
            <p><b>Livrare gratuita</b></p>
          </div>
        </div>
        <div class="col-md-3 feature-box">
          <img src="img/f4png.png">
          <div class="feature-text">
            <p><b>Mai multe metode de plataaa</b></p>
          </div>
        </div>




      </div>
      </div>
    </section>

























    

    <section class="footer">
     <div clas="container text-center" >
      <div class="row">
        <div class="col-md-3">
          <h1>Linkuri utile</h1>
          <p>Termeni si conditii</p>
          <p>Conditii retur</p>
          <p>Discounturi</p>
          <p>Privacy policy</p>
          </div>
          <div class="col-md-3">
            <h1>Companie</h1>
            <p>Despre noi</p>
            <p>Contact</p>
            <p>Cariera</p>
            <p>Colaborari</p>
            </div>


            <div class="col-md-3">
              <h1>Follow us on</h1>
              <p><i class="fa fa-facebook-official"></i> Facebook</p>
              <p><i class="fa fa-youtube-play"></i> Youtube</p>
              <p><i class="fa fa-instagram"></i> Instagram</p>
              <p><i class="fa fa-twitter"></i> Twitter</p>
              </div>


              <div class="col-md-3 footer-image">
                <h1>Download app</h1>
                <img src="img/And.png">
                </div>
              </div>
                <hr>
                <p class="copyright">Made by Teo</p>
     
    </div>

    </section>

    
    <script>
      function openmenu()
      {
        document.getElementById("side-menu").style.display="block";
        document.getElementById("menu-btn").style.display="none";
        document.getElementById("close-btn").style.display="block";
      }
      function closemenu()
      {
        document.getElementById("side-menu").style.display="none";
        document.getElementById("menu-btn").style.display="block";
        document.getElementById("close-btn").style.display="none";
      }
    </script>



<script>

$(function(){
    $(".btn-toggle-menu").click(function() {
        $("#wrapper").toggleClass("toggled");
    });
})
</script>

</body>
</html>
