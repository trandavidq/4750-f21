<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'db_settings.php';
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $password = $_POST['password'];
    $hashed_password = md5($_POST['password']);
    
    // echo $hashed_password;
    
    $authenticate_query = "SELECT * FROM User WHERE firstName= '$firstName' and lastName = '$lastName'";
    $query_result = mysqli_query($conn,$authenticate_query);
    
    
    if(mysqli_num_rows($query_result)!=0){
        if(strcmp($password,mysqli_fetch_assoc($query_result)['password'])==0){
            //Successful authentication
            
        }
    }    
    else{
        //echo 'registering user';
        $insert_query = $conn->prepare("INSERT INTO User (password,firstName,lastName) VALUES (?,?,?);");
        echo $hashed_password;
        $insert_query->bind_param("sss",$password,$firstName,$lastName);
        echo 'Registering user';
        if($insert_query->execute()){
            echo 'Registered user successfully!';
        }
    }
        
}

?>
