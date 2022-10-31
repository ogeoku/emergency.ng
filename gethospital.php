<?php

   
if (isset($_REQUEST['searchstr'])) {
    include_once "myfolder/emergencyhospitals.php";

    
     $obj = new Hospital();
     // reference
    
    if (!empty($_REQUEST['searchstr'])) {
        $hospitals = $obj->searchHospital($_REQUEST['searchstr']);
        echo "<div class='container'>";
        echo "<div class='row'>";
        foreach ($hospitals as $key => $value) {
           if (empty($value['emblem'])) {
            $photo = "images/banner.jpg";
           }else {
            $photo = "emblems/".$value['emblem'];
           }
      
?>
        <div class="col-md-3" style="background-color:white;padding:10px"><a href="allhospitals.php" >
        <img src="<?php echo $photo; ?>" alt="profile image" class="img-fluid" style="width:50px; height:50px">
        <p style="font-size:10px"><?php echo $value['hospital_name']. " ". $value['hospital_type'];?></p>
        </a>
                
        </div>

<?php
  }
  echo "</div>";
  echo "</div>";
    }else {
        echo "<div class='alert alert-danger'>No input found!</div>";
    }
    
}
  
?>