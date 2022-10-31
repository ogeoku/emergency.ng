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
  <title><?php echo APP_NAME; ?> Dashboard</title>

  <style>
   
  </style>
	</head>

	<body>
		<!-- Home Section -->
		<section >
    <header id="header">
			
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                    <div class="container">
                      <a class="navbar-brand " href="#"><h2>Emergency.ng</h2></a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                       
                          <ul class="navbar-nav ms-auto">
                            
                              <li class="nav-item">
                                <a class="nav-link" href="dashboard.php">Dashboard</a>
                              </li>
                               <li class="nav-item">
                                <a class="nav-link" href="allusers.php">All Users</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="allhos.php">All Hospitals</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                              </li>
                        </ul>
                        
                      </div>
                    </div>
                  </nav>
                  </header>
                  <div mb-5>
                    
                  </div>
                  <div class="container">
    <div class="row">
        <div class="col">
            <h1>
                <small>Delete Hospital</small>
            </h1>
            <div class='alert alert-warning'>
   <h2> Are you sure you want to Hospital record? </h2>
   </div><form action="deletehospital.php" method="post">
    <input type="hidden" name="hospitalid" value="2">
    <input type="submit" value="Delete" name="btnDelete" class="btn btn-danger">
    <input type="submit" value="Cancel" name="btnCancel" class="btn btn-secondary">
</form>
        </div>
    </div>
</div>
<script src="bootstrap/js/bootstrap.bundle.js"></script>
<?php
                include_once "portalfooter.php";
?> 
   
</body>
                 
</html>
               
