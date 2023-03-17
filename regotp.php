
<?php

session_start();
require "DatabaseConnection/DataBase.php";
require 'phpmailer/PHPMailerAutoload.php';

$agri=rand(100000,999999);

$uname=$_POST['newnameUser'];

$pass=$_POST['newnamePass'];

$confirm=$_POST['newnameConfirm'];

$email=$_POST['newname'];

$otptoken=mysqli_real_escape_string($con,$_POST['boxin']);
$token=rand(100000,999999);
$email3=mysqli_real_escape_string($con,$_POST['newname']);
$checkEmail="SELECT * from register where email1='$email3' LIMIT 1";
    $run=mysqli_query($con,$checkEmail);
$rows=mysqli_num_rows($run);
$arr=array(nl2br("சுழன்றும்ஏர்ப் பின்னது உலகம் அதனால்\nஉழந்தும் உழவே தலை."),
nl2br("உழுவார் உலகத்தார்க்கு ஆணிஅஃ தாற்றாது\nஎழுவாரை எல்லாம் பொறுத்து."),
nl2br("உழுதுண்டு வாழ்வாரே வாழ்வார்மற் றெல்லாம்\nதொழுதுண்டு பின்செல் பவர்."),
nl2br("பலகுடை நீழலும் தங்குடைக்கீழ்க் காண்பர்\nஅலகுடை நீழ லவர்."),
nl2br("இரவார் இரப்பார்க்கொன்று ஈவர் கரவாது\nகைசெய்தூண் மாலை யவர்."),
nl2br("உழவினார் கைம்மடங்கின் இல்லை விழைவதூஉம்\nவிட்டேம்என் பார்க்கும் நிலை."),
nl2br("தொடிப்புழுதி கஃசா உணக்கின் பிடித்தெருவும்\nவேண்டாது சாலப் படும்."),
nl2br("ஏரினும் நன்றால் எருவிடுதல் கட்டபின்\nநீரினும் நன்றதன் காப்பு."),
nl2br("செல்லான் கிழவன் இருப்பின் நிலம்புலந்து\nஇல்லாளின் ஊடி விடும்."),
nl2br("இலமென்று அசைஇ இருப்பாரைக் காணின்\nநிலமென்னும் நல்லாள் நகும்."));
$N=rand(0,9);
$newMMS=$arr[$N];
if($rows != 0){
    $_SESSION['gmail']= "email register already";
    header("Location:registerhtml.php");
    die();
}else{
    send_otp_verify($email,$token,$uname,$pass,$confirm,$agri,$newMMS);
}

function send_otp_verify($email,$token,$uname,$pass,$confirm,$agri,$newMMS)
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
    $mail->addAddress($email);               
   
    $mail->isHTML(true);                                
    
    $mail->Subject = "Registration Confirmation";
    $mail->Body    = "
        <h1>Hello $uname</h1><br>
        <h2>verify your email for agritoy website</h2><br>
        <h2>$newMMS</h2><br>
        <h3>OTP:$token</h3>";
       
    if(!$mail->send()) {
      echo "no";
    } else{
        $_SESSION['otp_sent']="Check Mail For OTP Code"; 
        
        $unameEc=base64_encode($uname);
      
        $passEc=base64_encode($pass);
     
        $passConfirm=base64_encode($confirm);
       
        $emailec=base64_encode($email);
        
        $tokenec=base64_encode($token);
      
        $toy=base64_encode($agri);
    
        header("Location:registerhtml.php?nextmail=".$emailec."&agritoy=".$toy."&geterotp=".$tokenec."&useMyName=".$unameEc."&pass001=".$passEc."&conpass002=".$passConfirm);
        die();
    }
}


?>
