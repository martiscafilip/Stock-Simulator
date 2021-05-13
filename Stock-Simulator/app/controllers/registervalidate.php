<?php
    require_once '../models/ConnectionManager.php';
    require_once '../models/putUserr.php';
    
    $manager = new ConnectionManager;
    $conn = $manager->get_conn();

    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $fullname = $_POST["fullname"];
    $country=$_POST["country"];
    
     $ok = true;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        $ok=false;
    }
 
 
    if (!preg_match("/^(?=^.{0,40}$)^[a-zA-Z-]+\s[a-zA-Z-]+$/",$fullname)) {
         echo "Only letters, first name and last name separated by a space ";
         $ok=false;
    }

    if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
        echo  "Only letters and white space allowed";
        $ok=false;
    }

    if (!empty($_POST["username"]) || !empty($_POST["password"]) || !empty($_POST["email"]) || !empty($_POST["fullname"]) || !empty($_POST["country"])) {

        if($ok){
        putUser($username,hash("md5", $password) ,$email ,$fullname,$country );  
        header('Location: /public/home/login');
        }
        
    }
?>