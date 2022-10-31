<?php
    //add contant
    include_once "myconstants.php";
    // class definition
    class User{
        // member variables

        var $firstname;
        var $lastname;
        var $email;
        var $password;
        var $phone;
        var $dob;
        var $address;
        var $lgaid;
        var $gender;
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

        # begin user method
        function insertUsers($fname, $lname, $email, $password, $phone, $dob, $address,$lgaid, $gender){
            // encrypt password
            $password = password_hash($password, PASSWORD_DEFAULT);
            // prepare statement
        $stmt=$this->dbcon->prepare("INSERT INTO user(firstname, lastname, email, password, phone,dob,address,lga_id,gender) VALUES(?,?,?,?,?,?,?,?,?)");

        //bind all parameters
        $stmt->bind_param("sssssssis",$fname, $lname, $email, $password, $phone, $dob, $address,$lgaid, $gender);

        //excute
        $stmt->execute();

        if ($stmt->error){
            $result= "Oops! something went wrong".$stmt->error;
        }else{
            $result=  "success";
        }
        return $result;

        }
        # end user method

         #start user login method
         function login($email, $password){
            //prepare statement
            $stmt = $this->dbcon->prepare("SELECT * FROM user WHERE email=?");
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
    #end user login method
    function getProfile($userid){
             //prepare statement
            $stmt = $this->dbcon->prepare("SELECT * FROM user WHERE user_id=?");
            //bind
            $stmt->bind_param("i",$userid);
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
        
    #begin user method
        function getUsers(){
            // prepare
            $stmt=$this->dbcon->prepare("SELECT * FROM user");
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
        #end  getstudent method

#begin logout method
function logout(){
    session_start();
    session_destroy();

    //redirect
    header("Location: userlogin.php");
    exit();
}
#end logout method









    }
    
 

?>