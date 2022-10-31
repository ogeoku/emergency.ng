<?php
    
    include_once "myfolder/myconstants.php";
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo APP_NAME; ?>Login Page</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="fontawesome/css/all.css" />
    <link href="style.css" rel="stylesheet">
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
                  <li class="nav-item">
                    <a class="nav-link" href="signup.php">Sign Up</a>
                  </li>
                 
              
            </ul>
            
          </div>
        </div>
      </nav>
      <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //do validation
            // echo "<pre>";
            // print_r($_SERVER);
            // echo "</pre>";
            // exit;
            include_once "myfolder/emergencyusers.php";
            //create object
            $userobj = new User();
            $response = $userobj->login($_REQUEST['email'], $_REQUEST['password']);
            
            if ($_REQUEST['email'] == "annabelle162002@gmail.com" &&  $_REQUEST['password'] == 123456) {
                // echo "<pre>";
                // print_r($_REQUEST);
                // echo "</pre>";
                // exit;
                header("Location: portalheader.php");
                exit();
            }
            if($response === true){
                #redirect to dashboard
                header("Location: dashuser.php");
                exit();
            }else{
                $error = "Invalid email address or password";
            }
        }
    ?>
   
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
               
            </div>
            <div class="col-md-6 pt-5">
                <h4> LOGIN FORM </h4>
                <?php if (isset($error)) {
                    echo "<div class='text-danger'>$error</div>";
                }?>
            <input type="radio" id="radio1"  name="login" value="new"> Hospitals <br>
            <input type="radio"  id="radio2" name="login" value="existing"> Users
                <form action="" method="post" id="contact-form">
                    
                    <div class="mb-3">
                        <label for="" class="form-label">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <input type="submit" value="Login" name="btnlogin" class="btn btn-primary">
                    <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
                        Registered? <a href="usersignup.php" class="text-dark fw-bold"> Create an
                          Account</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
    
    <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //do validation
            include_once "myfolder/emergencyhospitals.php";
            //create object
            $userobj = new Hospital();
            $response = $userobj->login($_REQUEST['email'], $_REQUEST['password']);
            
            if($response === true){
                #redirect to dashboard
                header("Location: allhospitals.php");
                exit();
            }else{
                $error = "Invalid email address or password";
            }
        }
    ?>
   
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
               
            </div>
            <div class="col-md-6 pt-5">
                
                <?php if (isset($error)) {
                    echo "<div class='text-danger'>$error</div>";
                }?>
            
                <form action="" method="post" id="contact-form2" style="display:none">
                    
                    <div class="mb-3">
                        <label for="" class="form-label">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <input type="submit" value="Login" name="btnlogin" class="btn btn-primary">
                    <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
                        Registered? <a href="usersignup.php" class="text-dark fw-bold"> Create an
                          Account</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <div class="mb-3">
       
    </div>
<?php
include_once "footer.php";
?>
<script src="bootstrap/js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="js/jquery.min.js.js"></script>
<script type="text/javascript" language="javascript">
    $(document).ready(function (){
        
      
      $('#radio1').click(function(){
            $('#contact-form2').show(function(){
                $('#contact-form').hide(function(){
                   
                });
            });
   
      });
      $('#radio2').click(function(){
            $('#contact-form').show(function(){
                $('#contact-form2').hide(function(){
                   
                });
            });
   
      });

     

    });

</script>
    </body>
</html>

