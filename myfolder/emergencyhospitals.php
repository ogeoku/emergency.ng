<?php
    //add contant
    include_once "myconstants.php";
    // class definition
    class Hospital{
        // member variables

        var $hospitalname;
        var $emblem;
        var $email;
        var $pswd;
        var $lgaid;
        var $hospitaltype;
        var $description;
        var $address;
        var $hospitalcontact;
        var $stateid;
        var $dbcon; //database connection handler

        // member functions
        function __construct(){
            // connecting to MySQL Database
            $this->dbcon = new MySQLi(DB_HOST, DB_USERNAME, DB_PASSWORD,DB_DATABASE_NAME);

            // checking if db connection is okay

            if($this->dbcon->connect_error){
                die("connection failed".$this->dbcon->connect_error);
            }else{
                // echo "connection successful";
            }
        }

        # begin hospital method
function insertHospital($lgaid,$hname,$emblem, $htype , $email ,$pswd, $desc , $address,  $hcontact){
                        // process file upload

            $filename = $_FILES['emblem']['name'];
            $file_tmp_name = $_FILES['emblem']['tmp_name'];

            $destination = "emblems/$filename";

            if (move_uploaded_file($file_tmp_name, $destination)){

                // encrypt password
                        $password = password_hash($pswd, PASSWORD_DEFAULT);
                        // prepare statement
                    $stmt=$this->dbcon->prepare("INSERT INTO hospital(lga_id,hospital_name,emblem, hospital_type, email, password, description, address, contact) VALUES(?,?,?,?,?,?,?,?,?)");
                    
                    //bind all parameters
                    $stmt->bind_param("issssssss",$lgaid,$hname,$filename, $htype,$email,$password, $desc,$address, $hcontact );

                    //excute
                    $stmt->execute();

                    if ($stmt->error){
                        $result= "Oops! something went wrong".$stmt->error;
                    }else{
                        $result=  "success";
                    }
                    return $result;
            }else{
                return "Oops! something happened.";
            }

        }
        # end hospital method

         #start hospital login method
         function login($email, $password){
            //prepare statement
            $stmt = $this->dbcon->prepare("SELECT * FROM hospital WHERE email=?");
            //bind
            $stmt->bind_param("s",$email);
            //execute
            $stmt->execute();
            //get result set
            $result = $stmt->get_result();
            //check if email exists
            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
                if(password_verify($password, $row['password'])){
                    
                    //create session variables
                    session_start();
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['firstname'] = $row['firstname'];
                    $_SESSION['lastname'] = $row['lastname'];
                    $_SESSION['email'] = $row['email'];
                    return true;
                }else{
                    return false;
                }
            }else{
               
                return false;
            }
        }
    #end hospital login method

        #begin hospital method
        function getHospital(){
            // prepare
            $stmt=$this->dbcon->prepare("SELECT * FROM hospital");
            //execute
            $stmt->execute();
            //result
            $result= $stmt->get_result();
            
            // fetch the data from result set
            $records = array();
         if($result->num_rows > 0){
            // record exist
           
            while ($row = $result->fetch_assoc()) {
              $records[] = $row;
            
            }
            return $records;  
           
            }else{
                return $records; 
            }
            
        }
        #end  hospital method

        function getAllHospitals(){
            //3 tables
            $stmt = $this->dbcon->prepare("SELECT * FROM lga JOIN state ON lga.state_id=state.state_id JOIN hospital ON lga.lga_id=hospital.lga_id");
            $stmt->execute();
            $result = $stmt->get_result();
            $data = array();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            }
            return $data;

        }

        function getAllHospitalsById($stateid){
            //3 tables
            $stmt = $this->dbcon->prepare("SELECT * FROM lga JOIN state ON lga.state_id=state.state_id JOIN hospital ON lga.lga_id=hospital.lga_id where state.state_id=?; ");
            //bind
            $stmt->bind_param("i",$stateid);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = array();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            }
            return $data;

        }

#begin delete method
function deleteHospital($hospitalid){
    //prepare statement
    $statement = $this->dbcon->prepare("DELETE FROM hospital WHERE hospital_id=?");
    //bind parameter
    $statement->bind_param("i", $hospitalid);
    //execute
    $statement->execute();
    if ($statement->affected_rows == 1) {
       return true;
    }else {
        return false;
    }
 }
 #end delete method


 #start searchhospital method
 function searchHospital($search){
    // prepare statement
    $stmt =$this->dbcon->prepare("SELECT * FROM hospital WHERE hospital_name like ? OR hospital_type like ? ");
     //bind param
     $searchstr= "%$search%";
     $stmt->bind_param("ss",  $searchstr, $searchstr);
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

#end searchhospital method


function getAllHospitalsByDesc($hospitalid){
    //3 tables
    $stmt = $this->dbcon->prepare("SELECT * FROM lga JOIN state ON lga.state_id=state.state_id JOIN hospital ON lga.lga_id=hospital.lga_id where state.state_id=?; ");
    //bind
    $stmt->bind_param("i",$stateid);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = array();
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
    }
    return $data;

}










}





















    
 

?>