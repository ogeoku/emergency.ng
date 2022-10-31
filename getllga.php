<?php
if (isset($_REQUEST['stateid'])) {
    include_once "myfolder/local.php";
   
    $myobj = new Local();
    
    // you access getlga method
    $lgas= $myobj->getLga($_REQUEST['stateid']);
    $myoptions = "<option value=''> Slect LGA</option>";
    foreach ($lgas as $key => $value) {
   $lgaid = $value['lga_id'];
   $lganame= $value['lga_name'];

   $myoptions .="<option value='$lgaid'>$lganame</option>";

}
echo $myoptions;

}



?>