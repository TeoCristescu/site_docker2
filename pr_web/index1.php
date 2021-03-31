 
<title>MAGAZIN ARTICOLE VANATOARE</title>
<?php
session_start();
include('dbh.php');
?>
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



    <form method="post" action="">
  <select name="Pret">
    <option value="cresc">Crescator</option>
    <option value="desc">Descrescator</option>
    
  </select>
  <input type="submit" value=" Cauta dupa pret "/>
</form>
<?php
if(isset($_GET['cat']))
    {
      $categorie=mysqli_real_escape_string($conn,$_GET['cat']);
      
    }
       
?>


<?php


    if(isset($_POST['Pret']))
    {
      $pret=$_POST['Pret'];
    
     
    

    if($pret=='cresc')
    {
      if ($categorie=='toate')
      {
        $sql1 = "SELECT * FROM products order by price ASC";
      }
      else
      {
      $sql1 = "SELECT * FROM products where categorie = '$categorie' order by price ASC";
      }
    }
    else if($pret=='desc') {
      if ($categorie=='toate')
      {
        $sql1 = "SELECT * FROM products  order by price DESc";
      }
      else
      {
      $sql1 = "SELECT * FROM products where categorie = '$categorie' order by price DESC";
      }
    }
 
      
      $result1=mysqli_query($conn,$sql1);
      $resultCheck=mysqli_num_rows($result1);
      if($resultCheck>0)
     {
     
      while($row = mysqli_fetch_assoc($result1))
      {
        echo "<div class='product_wrapper'>
        <form method='post' action=''>
        <input type='hidden' name='id' value=".$row['id']." />
        <div class='image'><a href='product.php?id_selectat=$row[id]'/><img src='".$row['image']."' ></a></div>
        <div class='name'>".$row['name']."</div>
        <div class='price'>$".$row['price']."</div>
        <button type='submit' class='buy'>Adauga in cos</button>
      </form>
        </div>
       
        ";
      }
    }
  }
  else if(isset($_POST['submit']))
  {
       $cautare=$_POST['search'];
       $cautaree=$_POST['search'];
     $cautare='%'.$cautare;
     $cautare=$cautare.'%';
     

      $sql1 = "SELECT * FROM products where name like '$cautare'";
      $result1=mysqli_query($conn,$sql1);
      $resultCheck=mysqli_num_rows($result1);
      if($resultCheck>0)
     {
      echo "Rezultatul cautarii $cautaree";
      while($row = mysqli_fetch_assoc($result1))
      {
        echo "<div class='product_wrapper'>
        <form method='post' action=''>
        <input type='hidden' name='id' value=".$row['id']." />
        <div class='image'><a href='product.php?id_selectat=$row[id]'/><img src='".$row['image']."' ></a></div>
        <div class='name'>".$row['name']."</div>
        <div class='price'>$".$row['price']."</div>
        <button type='submit' class='buy'>Adauga in cos</button>
      </form>
        </div>
       
        ";
      }
      

     }
    else
   { 
    echo "Nu exista rezultate pentru cautarea dumneavoastra!";
    $result = mysqli_query($conn,"SELECT * FROM `products`");
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

  
      }  }
    }
    else
    {
      
     

      if ($categorie=='toate')
      {
        $sql1 = "SELECT * FROM products  ";
      }
      else
      {
      $sql1 = "SELECT * FROM products where categorie = '$categorie'";
      }


      $result1=mysqli_query($conn,$sql1);
      $resultCheck=mysqli_num_rows($result1);
      if($resultCheck>0)
     {
     
         
         while($row = mysqli_fetch_assoc($result1)){
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
         
             ;}
         }
         }
                
        
          
     ?>
 
<div style="clear:both;"></div>
 
<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>





          
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
                   <img src="img/d2.png">
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

  </body>