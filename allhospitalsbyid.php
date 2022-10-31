<?php

    include_once "header2.php";
    include_once "myfolder/myconstants.php";
    include_once "myfolder/emergencyhospitals.php";



 

$cobj = new Hospital;

$obj=$cobj->getAllHospitalsById($_REQUEST["id"]);

// echo "<pre>";
// print_r($obj);
//  echo "</pre>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo APP_NAME; ?> Hospitals</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <hr size:30>
          <h1 style="color:black; padding:10px" class="text-center">Emergency Registered Hospitals</h1>  
          <hr size:30>
            <?php
            foreach ($obj as $key => $value) {
               
            ?>
            <div class="col-md-4" style=" padding: 20px">
            
            <img style="width:200px; height:200px" class="img-fluid" src="emblems/<?php echo $value['emblem'] ?>" alt="hospital image" class="img-fluid">
                <p style="font-size:20px">
                    <b><?php echo $value['hospital_name'] ?></b> <br>
                    <?php echo $value['hospital_type'] ?> <br>
                    <b><?php echo $value['state_name'] ?>  - <?php echo $value['lga_name'] ?></b>
                </p>
                <a href="usersignup.php" class="btn btn-primary" >View More</a>
            </div>
                
            <?php
                }
            ?>
            






        </div>








    </div>
<?php
include_once "footer.php";
?>
</body>
</html>