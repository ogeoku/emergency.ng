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
    <title><?php echo APP_NAME; ?>SignUp page</title>
</head>
<body>
   
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
          <a class="navbar-brand " href="#"><h2>Emergency.ng</h2></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
           
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="main.php">Home</a>
                  </li>
                   
                  <li class="nav-item">
                    <a class="nav-link" href="#">FAQ</a>
                  </li>
                  
              
            </ul>
            
          </div>
        </div>
      </nav>

      </body>
</html>

<?php
                include_once "footer.php";
                ?>