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
     echo '<li><a href="#">'. $_SESSION["u_user"].'</a></li>';
     echo '<li><a href="adauga_produs.php">Adauga produs</a></li>';
 
       echo '<li><a href="logout.php">LOGOUT</a></li>';
     
	  }
else
{
  	echo '<li><a href="register.php">Inregistrare</a></li>';
    echo '<li><a href="login.php">Log in</a></li>';

}
?>
</ul>
</div>
     
<h3>CLIENTI</h3>
      <?php
$sql= "SELECT Nume_si_prenume, User, Id, Email FROM nume";
$result=mysqli_query($conn,$sql);
$resultCheck=mysqli_num_rows($result);
if($resultCheck<1)
{
    echo "<script type=\"text/javascript\">
    alert('Nu exista utilizatori');
    </script>";
}
else
{


?>	

<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

<hr>


<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">   
                        <table class="table user-list">
                            <thead>
                                <tr>
                                <th><span>Id</span></th>
                                <th><span>Nume</span></th>
                                <th class="text-center"><span>Username</span></th>
                                <th><span>Email</span></th>
                                <th>&nbsp;</th>
                                </tr>
                            </thead>
                            
<tbody>
<?php
while($row=mysqli_fetch_assoc($result))
{
?>

                            
                                <tr>
                                <td><?php echo $row["Id"]; ?> </td>
                                <td><span><?php echo $row["Nume_si_prenume"]; ?></span></td>
                                <td class="text-center"><span><?php echo $row["User"]; ?></span></td>
                                <td><span><?php echo $row["Email"]; ?></span></td>
                                    <td style="width: 20%;">
                                       <?php
                                        echo "<a href='editare_direct.php?id_selectat=$row[Id]' class='table-link'>"
                                      
                                        ?>
                                            <span class="fa-stack">
                                           <i class="fa fa-square fa-stack-2x"></i>
                                             <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                        <?php
                                        echo "<a href='stergere_direct.php?id_selectat=$row[Id]' class='table-link danger'>"
                                        ?>
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
<?php
}
?>
 
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
}
?>


<h3>PRODUSE</h3>

      <?php
$sql= "SELECT id,name,price,redus FROM Products";
$result=mysqli_query($conn,$sql);
$resultCheck=mysqli_num_rows($result);
if($resultCheck<1)
{
    echo "<script type=\"text/javascript\">
    alert('Nu exista produse!');
    </script>";
}
else
{


?>	

<hr>


<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">   
                        <table class="table user-list">
                            <thead>
                                <tr>
                                <th><span>Id</span></th>
                                <th><span>Denumire</span></th>
                                <th class="text-center"><span>Pret</span></th>
                                <th><span>Redus</span></th>
                                <th>&nbsp;</th>
                                </tr>
                            </thead>
                            
<tbody>
<?php
while($row=mysqli_fetch_assoc($result))
{
?>

                            
                                <tr>
                                <td><?php echo $row["id"]; ?> </td>
                                <td><span><?php echo $row["name"]; ?></span></td>
                                <td class="text-center"><span><?php echo $row["price"]; ?></span></td>
                                <td><span><?php echo $row["redus"]; ?></span></td>
                                    <td style="width: 20%;">
                                       <?php
                                        echo "<a href='editare_produs.php?id_selectat=$row[id]' class='table-link'>"
                                      
                                        ?>
                                            <span class="fa-stack">
                                           <i class="fa fa-square fa-stack-2x"></i>
                                             <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                        <?php
                                        echo "<a href='stergere_produs.php?id_selectat=$row[id]' class='table-link danger'>"
                                        ?>
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
<?php
}
?>
 
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
}
?>



<h3>PLATI</h3>

      <?php
$sql= "SELECT * FROM comenzi";
$result=mysqli_query($conn,$sql);
$resultCheck=mysqli_num_rows($result);
if($resultCheck<1)
{
    echo "<script type=\"text/javascript\">
    alert('Nu exista produse!');
    </script>";
}
else
{


?>	

<hr>


<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">   
                        <table class="table user-list">
                            <thead>
                                <tr>
                                <th><span>Id comanda</span></th>
                                <th><span>Id client </span></th>
                                <th class="text-center"><span>Data</span></th>
                                <th><span>Pret</span></th>
                                <th>&nbsp;</th>
                                </tr>
                            </thead>
                            
<tbody>
<?php
while($row=mysqli_fetch_assoc($result))
{
?>

                            
                                <tr>
                                <td><?php echo $row["Id_comanda"]; ?> </td>
                                <td><span><?php echo $row['Id_client']; ?></span></td>
                                <td class="text-center"><span><?php echo $row["Data"]; ?></span></td>
                                <td><span><?php echo $row["pret"]; ?></span></td>
                                   
                                    
                                </tr>
<?php
}
?>
 
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
}
?>







	