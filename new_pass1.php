
<?php
session_start();

    $host ="localhost";
    $dbusername ="root";
    $dbpassword ="";
    $db ="startup";

$con=mysqli_connect($host,$dbusername,$dbpassword,$db);
$mpass=mysqli_real_escape_string($con,$_POST['mpass']);
$cpass=mysqli_real_escape_string($con,$_POST['cpass']);
$token1=mysqli_real_escape_string($con,$_POST['token1']);             
$token=md5(rand());
$sqli=("SELECT * from register where tokennum='$token1' limit 1");
  
    $result=mysqli_query($con,$sqli);
    $rnum=mysqli_num_rows($result);

    if($rnum != 0){
        $update_pass="UPDATE register SET pass1='$mpass',pass2='$cpass' WHERE tokennum='$token1' LIMIT 1";
        $tokenRun=mysqli_query($con,$update_pass);
       
        if($tokenRun){
            $update_pass1="UPDATE register SET tokennum='$token' WHERE tokennum='$token1' LIMIT 1";
            $tokenRun1=mysqli_query($con,$update_pass1);
            if($tokenRun1){
                $_SESSION['errorind']="reset successful!";
                header("Location:new_passhtml.php");
                die();
            }
        }

}else{
    $_SESSION['errorind2']="Link not valid";
    header("Location:new_passhtml.php");
    die();
}


?>