<?php
if (isset($_REQUEST['btnCancel'])) {
    //redirect
    header("Location: allhos.php");
    exit;
}

if (isset($_REQUEST['btnDelete'])) {
    # add club class
   include_once "myfolder/emergencyhospitals.php";

   // create object of class club
$obj = new Hospital();
$output = $obj->deleteHospital($_REQUEST['hospitalid']);

if ($output == true) {
    $status= "success";
   $msg = "hospital was successfully deleted";
}else {
    $status ="failed";
    $msg = "Oops! something went wrong, try it later";


    //redirect
    header("Location: allhos.php?msg=$msg&status=$status");
    exit;
}

}

?>