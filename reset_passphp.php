<?php
session_start();
require "DatabaseConnection/DataBase.php";
require 'phpmailer/PHPMailerAutoload.php';
function send_password_reset($getName,$getEmail,$token)
{
    $mail = new PHPMailer;
    $mail->SMTPDebug = 3;                               
    $mail->isSMTP();                                      
    $mail->Host = 'smtp.gmail.com';   
    $mail->SMTPAuth = true;                               
    $mail->Username = 'agritoy2022@gmail.com';                
    $mail->Password = 'urocchxzkrjrhmzv';                           
    $mail->SMTPSecure = 'tls';                             
    $mail->Port = 587;                                
    
    $mail->setFrom('agritoy2022@gmail.com', 'agritoy');
    $mail->addAddress($getEmail);               
   
    $mail->isHTML(true);                                
    
    $mail->Subject = "Password Reset";
    $mail->Body    = "
        <h1>Hello $getName</h2><br>
        <h2>this masssege to reset your agritoy website password</h2><br>
        <a href='http://localhost/new/new_passhtml.php?token=$token' style=' text-decoration: none;
            background-color:green;
            color: white;
            padding: 5px;
            border-radius: 5px;'>Click to set new password</a><br>";
    if(!$mail->send()) {
    $_SESSION['status2'] ="check network connection";
        header('location:reset_passhtml.php');
    } else{
        $_SESSION['status'] ="check mail for reset link";
        header('location:reset_passhtml.php');
        die();
    }
}



 if(isset($_POST['sentotp'])){
    $email=mysqli_real_escape_string($con,$_POST['mail']);
    $token=md5(rand());



    $checkEmail="SELECT * from register where email1='$email' LIMIT 1";
    $run=mysqli_query($con,$checkEmail);

    if(mysqli_num_rows($run) > 0){
        $row1=mysqli_fetch_array($run);
        $getName= $row1['uname1'];                                              
        $getEmail=$row1['email1'];
    
    $updateToken="UPDATE register SET tokennum='$token' WHERE email1='$getEmail' LIMIT 1";
    $tokenRun=mysqli_query($con,$updateToken);

    if($tokenRun){
        send_password_reset($getName,$getEmail,$token); 
        
    }else{
        $_SESSION['status2']="somthing went wrong contact host. #1";
        header("Loation:reset_passhtml.php");
        exit();
    }
    }
    else{
    $_SESSION['status2']="email not found";
    header("Location:reset_passhtml.php");
    exit();
    }
}

?>