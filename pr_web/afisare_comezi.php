<?php
include_once('dbh.php');
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
   
<title>Comenzi</title>
 
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
     
        <li><a href="logout.php">LOGOUT</a></li>
	   
		

		
      </ul>
    </div>
    </div>
	




<body>


<table class="table">
<tbody>
<tr>

<td><span>Id comanda</span></td>
<td>Data</td>
<td>Numar produse</td>
<td>Pret total</td>

<br>


<?php
$user=$_SESSION['u_id'];
$sql = "SELECT * FROM comenzi WHERE Id_client=$user";
                $result=mysqli_query($conn,$sql);
                $nr=mysqli_num_rows($result);
                if($nr>0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $ordid=$row['Id_comanda'];
                        $date=$row['Data'];
                        $suma=$row['pret'];
                        $sql2 = "SELECT * FROM detalii_comenzi WHERE Id_comanda=$ordid";
                        $result2=mysqli_query($conn,$sql2);
                        $nrprod=0;
                        while($row2 = mysqli_fetch_assoc($result2))
                        {
                          $nrprod+=$row2['cantitate'];
                        }
                        echo "<tr>
                                <td>$ordid</td>
                                <td>$date</td>
                                <td>$nrprod</td>
                                <td>$suma</td>
                                
                            </tr>";
                    }
                }
                else
                {
                    echo "<tr><td colspan='5' class='center'>Nicio comanda</tr>";
                }
            ?>

