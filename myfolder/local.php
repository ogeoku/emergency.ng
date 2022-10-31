<?php
// include constants

include_once "myconstants.php";

//class definition

class Local{
    //member variables

    var $mycon;


    //member functions
    function __construct(){
        // connect to database
        $this->mycon = new MySQLi(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);

        if($this->mycon->connect_error){
            die("Connection Failed: " .$this->mycon->connect_error);
        }
    }

#start get state method

function getState(){
    // prepare statement
    $stmt =$this->mycon->prepare("SELECT * FROM state");
    //execute
    $stmt->execute();
    // get the result set
    $result = $stmt->get_result();
    $data= array();
    if ($result->num_rows > 0) {
       while ($row = $result->fetch_assoc()) {
        $data[]=$row;
       }
    }
        return $data;
}

#end get state method


 #start getlga method
 function getLga($stateid){
    // prepare statement
    $stmt =$this->mycon->prepare("SELECT * FROM lga WHERE state_id=?");
    //bind parameter
    $stmt->bind_param("i", $stateid);
    //execute
    $stmt->execute();
    // get the result set
    $result = $stmt->get_result();
    $data= array();
    if ($result->num_rows > 0) {
       while ($row = $result->fetch_assoc()) {
        $data[]=$row;
       }
    }
        return $data;
}
#end getlga method

function fetchLga(){
    // prepare statement
    $stmt =$this->mycon->prepare("SELECT * FROM lga ");
    //bind parameter
    $stmt->execute();
    // get the result set
    $result = $stmt->get_result();
    $data= array();
    if ($result->num_rows > 0) {
       while ($row = $result->fetch_assoc()) {
        $data[]=$row;
       }
    }
        return $data;
}
 
#begin sanitize method
function sanitizeInput($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = addslashes($data);

    return $data;
}
 #end sanitize method  
} 
?>