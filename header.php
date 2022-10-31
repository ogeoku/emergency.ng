<?php
  include_once "myfolder/myconstants.php";
 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="fontawesome/css/all.css" />
  <link href="style.css" rel="stylesheet">
  <title><?php echo APP_NAME; ?></title>

  <style>
   
  </style>
	</head>

	<body>
		<!-- Home Section -->
		<section >
    <header id="header">
			
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                    <div class="container">
                      <a class="navbar-brand " href="main.php"><h2>Emergency.ng</h2></a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                       
                          <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="main.php">Home</a>
                              </li>
                               <li class="nav-item">
                                <a class="nav-link" href="#">About</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#">FAQ</a>
                              </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Account
                            </a>
                            <ul class="dropdown-menu" style="color:burlywood">
                      
                              <li><a class="dropdown-item" href="userlogin.php">Have an account? Sign in</a></li>
                              <li><a class="dropdown-item" href="usersignup.php">New Here? Sign Up</a></li>
                              
                            </ul>
                          </li>
                          
                        </ul>
                        
                      </div>
                    </div>
                  </nav>
                  <!--banner begins-->
                  <div class="container-fluid">
                  <div class="row">
                  <div id="home" class="col-md-2 col-sm-4 col-xs-6">
                    <div class="col-md-8" id="banner_writeup">
                      <h1>Find Your Nearest <span style=color:red>Hospital</span></h1>
                    </div>
                    <div id="banner_search" class="col-md-2 col-sm-4 col-xs-6">
                      <form action="allhospitals.php" method="post">
                      <input type="search" placeholder="Search for the Nearest Hospital" id="txtsearch" name="txtsearch" size="34">  <button type="submit" class="btn btn-primary btn-lg">Find Hospital</button>
                      <div id="result" class= "mt-3" style= "overflow: auto; width: 455px;height:200px;padding:10px">

                    </div>
                     
                      </form>
                    </div>
                  </div>
                </div>
                </div>
                  <!--banner ends-->
                </header>
                <script src="bootstrap/js/bootstrap.bundle.js"></script>
                <script type="text/javascript" src="js/jquery.min.js.js"></script>
                <script type="text/javascript" language="javascript">
                  $(document).ready(function(){
                      $('#txtsearch').keyup(function(){
                        var search = $(this).val();  

                        $.ajax({
                          url: "gethospital.php",
                          data: "searchstr="+search,
                          type: "POST",
                          
                          success: function(response) {
                              // console.log(response);
                              $('#result').html(response);
                          },
                          error: function(err) {
                              console.log(err);
                          }

                          });
                      });
                  });
                </script>
                  </body>
                  </html>



 



