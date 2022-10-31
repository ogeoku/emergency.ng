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
    <title>SignUp page</title>
    
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
      <?php
    include_once "myfolder/local.php";
    $cobj = new Local();
    $lga = $cobj->getLga();

    echo "<pre>";
    print_r($_REQUEST);
    echo "</pre>";
   
    if (isset($_POST['btnhos'])) {
  
        // form validate
        $errors = array();
      
        if (empty($_POST['hospital'])) {
         $errors[] = "hospital name field is Required";
        }
        if (empty($_POST['emblem'])) {
          $errors[] = "Email field is Required";
         }
        if (empty($_POST['email'])) {
          $errors[] = "Email field is Required";
         }
         if (empty($_POST['password'])) {
          $errors[] = "Password field cannot be left empty";
         }
         if (empty($_POST['type'])) {
          $errors[] = "Email field is Required";
         }
        if (empty($_POST['lga'])) {
          $errors[] = "Please pick your Local Government";
        }
        if (empty($_POST['desc'])) {
          $errors[] = "Hospital Description field is Required";
         }
         if (empty($_POST['address'])) {
          $errors[] = "Hospital Address field is Required";
         }
         
         if (empty($_POST['phone'])) {
            $errors[] = "Phone number field is Required";
        }
        // file upload error
        if ($_FILES['emblem']['error'] > 0) {
          $errors[] = "You've not uploaded any files or file is corrupted!";
        }
        if ($_FILES['emblem']['error'] > 1048576) {
          $errors[]= "	Files size cannot be more than 1mb";
        }
        // file type
        $ext_allowed= array("jpg", "png", "webp", "gif" , "jpeg", "svg");
        $filename_arr =explode(".", $_FILES['emblem']['name']);
        $filename_ext = end($filename_arr);
        if (!in_array(strtolower($filename_ext), $ext_allowed)) {
        $errors[]= "	File type not allowed";
        }
        

        include_once "myfolder/emergencyhospitals.php";
        $hosobj = new Hospital();
    
        // reference insertClub method and pass parameters
    
        $output = $hosobj->insertHospital($_REQUEST['lga'],$_REQUEST['hospital'],$_REQUEST['emblem'],$_REQUEST['type'],$_REQUEST['email'],
      $_REQUEST['password'],$_REQUEST['desc'],$_REQUEST['address'],$_REQUEST['phone']);
        if ($output == 'success') {
            // redirect to  allhospitals.php
            $msg= "success";
            header("Location: allhospitals.php?msg=$msg");
            exit();
        }else {
            $errors[] =$output;
        }
    
     }
     
    ?>
   
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
           
            </div>
            <div class="col-md-6 pt-5">
                <h4>HOSPITAL SIGN UP FORM</h4>
            <?php

                    if(isset($errors)) {
                    foreach ($errors as $key => $value) {
                    echo "<div class='text-danger'>$value</div>";
                    }
                    }
            ?>
                <form action="hospitalsignup.php" method="post" enctype="multipart/form-data">
                  <div class="control-group form-group">
                  <div class="controls">
                       <label>Emblem:</label>
                        <input type="file" class="form-control" id="emblem" name="emblem" >
                  </div>
                  </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Hospital Name</label>
                        <input type="text" name="hospital" id="hospital" class="form-control" value="<?php
                        if (isset($_POST['hospital'])) {
                        echo $_POST['hospital'];
                        }
                      ?>">
                  </div>
                  <div class="mb-3">
                          <label for="" class="form-label">Email Address</label>
                          <input type="email" name="email" id="email" class="form-control" value="<?php
                          if (isset($_POST['email'])) {
                          echo $_POST['email'];
                          }
                          ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" value="<?php
                        if (isset($_POST['password'])) {
                          echo $_POST['password'];
                          }
                            ?>">
                    </div>
                  <div class="mb-3">
                  <div class="controls">
                          <label> LGA:</label>
                          <select name="lga" id="lga" class="form-select">
                                <option value="">Choose LGA</option>
                        <?php
                                foreach ($lga as $key => $value) {
                                $lgaid= $value['lga_id'];
                                $lganame= $value['lga_name'];
                                if (isset($_POST['lga']) && $_POST['lga'] == $lgaid) {
                                echo "<option value='$lgaid ' selected>$lganame</option>";
                                    }else{
                                echo "<option value='$lgaid'>$lganame</option>";
                            }
                        }
               
              
                      ?>
                     </select>
                </div>
                </div>
                  <div class="mb-3">
                        <label for="" class="form-label">Hospital Type:</label>
                        
                        <input type="radio" name="type" value="private" checked> Private
                        <input type="radio" name="type" value="government"> Government
                       
                  </div>

                  <div class="mb-3">
                  <div class="controls">
                        <label>Hospital Description:</label>
                        <textarea rows="5" cols="50" name="desc" class="form-control" id="desc"  maxlength="300" style="resize:none"><?php
                        if (isset($_POST['desc'])) {
                        echo $_POST['desc'];
                        }
                        ?></textarea>
                  </div>
                  </div>

                  <div class="mb-3">
                  <div class="controls">
                        <label>Address:</label>
                        <textarea rows="5" cols="50" name='address' class="form-control" id="address"  maxlength="300" style="resize:none"><?php
                        if (isset($_POST['address'])) {
                        echo $_POST['address'];
                        }
                        ?></textarea>
                  </div>
                  </div>
                  <div class="mb-3">
                        <label for="" class="form-label">Contact</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="<?php
                        if (isset($_POST['phone'])) {
                        echo $_POST['phone'];
                        }
                        ?>">
                  </div>
                 
          
                
                <input type="submit" value="Register" name="btnhos" class="btn btn-primary">
                    

                </form>
            </div>
        </div>
    </div>
    <div class="mb-3">
</div>
    <?php
    include_once "footer.php";
 ?>
</body>
</html>