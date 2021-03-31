<?php 
require_once("signup.php");
?>

<!doctype html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <title>REGISTER</title>
       
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
        
        <li><a href="register.php">Inregistrare</a></li>
        <li><a href="login.php">Log in</a></li>
      </ul>
    </div>
    </div>
    
           <div class="login-box">
               <h1>Register</h1>
			  <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
			   <div class="textbox">
                        <i class="fa fa-user"></i>
                        <input type="text" placeholder="Nume si prenume" name="name" value="">
                        </div>
               <div class="textbox">
                   <i class="fa fa-user"></i>
                   <input type="text" placeholder="User" name="user" value="">
                   </div>
                   <div class="textbox">
                       <i class="fa fa-lock"></i>
                       <input type="password" placeholder="Password" name="pwd" value="">
					    </div>
                       
                      <div class="textbox">
                                <i class="fa fa-envelope-open"></i>
                                <input type="text" placeholder="Email" name="email" value="">
                                </div>
			 <div class="textbox">
                        <i class="fa fa-user"></i>
                        <input type="text" placeholder="Adresa" name="adresa" value="">
                        </div>			                       
             <input class="btn" type="submit" name="submit" id="submit" value="Sign in" >         
          </form>
		  </div>
          
<script>

$("#submit").click(function(){
  alert("Te-ai inregistrat!");
  
});
</script>

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
      </html>