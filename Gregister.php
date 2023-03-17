<?php
session_start();
require "DatabaseConnection/DataBase.php";
require 'phpmailer/PHPMailerAutoload.php';

// $Gname = base64_decode($_GET['Gname']);

// $Gmail = base64_decode($_GET['Gmail']);

// $Gpass = base64_decode($_GET['Gpass']);
$Gname = $_GET['Gname'];

$Gmail = $_GET['Gmail'];

$Gpass = $_GET['Gpass'];

$token=md5(rand());
if(!empty($Gmail) || !empty($Gname) || !empty($Gpass)){
    if(mysqli_connect_error()){
            die('Connect Error('.mysqli_connect_errno().') '. mysqli_connect_error());
    }else{
        
    $SELECT ="SELECT email1 From register Where email1 =? Limit 1";
    $INSERT ="INSERT Into register (uname1 , email1 , pass1 , pass2,tokennum)values(?,?,?,?,?)";

    $stmt =$con->prepare($SELECT);
    $stmt->bind_param("s",$Gmail);
    $stmt->execute();
    $stmt->bind_result($Gmail);
    $stmt->store_result();
    $rnum =$stmt->num_rows;

    if($rnum==0){
  
        $stmt = $con->prepare($INSERT);
        $stmt->bind_param("sssss",$Gname,$Gmail,$Gpass,$Gpass,$token);
        $stmt->execute();

        header("Location:index.php?Gname=".$Gname);
          die();


}else{
    $_SESSION['Greg']="Google mail already exist";
        header('Location:registerhtml.php');
        die();
    }
}
}else{
    $_SESSION['Greg']= "NULL data in your google account";
    header("Location:registerhtml.php");
}

?>