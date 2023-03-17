<?php
session_start();
?>
<?php
require "google-api-php-client/vendor/autoload.php";

$clientId="361888226634-rqh3h0s72to0okllquq5si06jrndnokm.apps.googleusercontent.com";
$clientSecret="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";
$redirectURI="http://localhost/new/registerhtml.php";

$client =new Google_Client();
$client->setClientId($clientId);
$client->setClientSecret($clientSecret);
$client->setRedirectURI($redirectURI);
$client->addScope("email");
$client->addScope("profile");
if(isset($_GET["code"])){
  $token=$client->fetchAccessTokenWithAuthCode($_GET["code"]);
  $obj=new Google_Service_Oauth2($client);
  $data=$obj->userinfo->get();
  $name=$data->getname();
  $email=$data->getemail();
  $alpha="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@!#$%^&*";
  $pass=substr(str_shuffle($alpha),0,8);
  $Gname=base64_encode($name);
  $Gmail=base64_encode($email);
  $Gpass=base64_encode($pass);
  header("Location:Gregister.php?Gmail=".$email."&Gname=".$name."&Gpass=".$pass);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>register</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    #bg {
      background-image: url('image/groot.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      height: 100vh;
    }

    .container {
      height: 600px;
      width: 500px;
      margin: 20px auto;
      border-radius: 20px;
      box-shadow: 0px 0px 2px 2px black;
      float: left;
      margin-left: 20px;
      background-color: rgba(0, 0, 0, 0.514);
      animation: transitionIn 3s;
    }

    .container1 {
      height: 600px;
      width: 500px;
      margin: 20px auto;
      border-radius: 20px;
      box-shadow: 0px 0px 2px 2px black;
      float: left;
      margin-left: 20px;
      background-color: rgba(0, 0, 0, 0.514);
    }

    @keyframes transitionIn {
      from {
        opacity: 0;
        transform: rotateX(-10deg);
      }

      to {
        opacity: 1;
        transform: rotateX(0);
      }
    }

    .container.arrow-right {
      margin-right: 40px;
    }

    .container1.arrow-right {
      margin-right: 40px;
    }

    .reg {
      cursor: default;
      text-align: center;
      font-size: 50px;
      color: white;
      text-shadow: 2px 2px 4px black;
    }

    .GTT {
      cursor: default;
      margin-left: 50px;
      display: flex;
      flex-direction: column;
      font-size: 30px;
      margin-top: 40px;
      color: white;
      text-shadow: -1px 1px 5px black;
    }

    input {
      display: flex;
      margin: 0px 30px 0px 0px;
      font-size: 20px;
      border: none;
      border-bottom: 2px solid white;
      background: none;
      outline: none;
      color: white;
      text-shadow: -1px 1px 5px black;
      transition: .2s ease-in-out 0s;
    }

    input:hover {
      cursor: text;
      transform: scale(1.05);
    }

    .sumbut {
      width: 50%;
      font-size: 20px;
      padding: 7px;
      background: black;
      border-radius: 10px;
      text-decoration: none;
      color: white;
      margin-left: 25%;
      margin-top: 30px;
      transition: .2s ease-in-out 0s;

    }

    .sumbut:hover {
      cursor: pointer;
      transform: scale(1.05);
    }

    .sumbut1 {
      width: 50%;
      font-size: 20px;
      padding: 7px;
      background: black;
      border-radius: 10px;
      text-decoration: none;
      color: white;
      margin-left: 25%;
      margin-top: 30px;
      transition: .2s ease-in-out 0s;

    }

    .sumbut1:hover {
      cursor: pointer;
      transform: scale(1.05);
    }

    .next1 {
      position: absolute;
      text-decoration: none;
      margin-left: 20px;
      margin-top: 5px;
      color: rgba(255, 255, 255, 0.829);
      height: fit-content;
      width: fit-content;
      padding: 3px;
      background-color: rgba(0, 0, 0, 0.671);
      border-radius: 5px;
      transition: .2s ease-in-out 0s;

    }

    .next1:hover {
      cursor: pointer;
      transform: scale(1.05);
    }

    .error_box {
      background-color: rgba(255, 0, 0, 0.377);
      border: 1px solid rgba(255, 0, 0, 0.479);
      color: red;
      height: fit-content;
      margin-right: 30px;
      padding: 1px;
      font-size: 18px;
      font-weight: 800;
      border-radius: 3px;
    }

    .box {
      width: 270px;
      height: 80px;
      background-color: rgba(0, 0, 0, 0.829);
      color: rgb(255, 255, 255);
      padding: 3px;
      position: absolute;
      display: block;
      border-radius: 15px;
      visibility: hidden;

    }

    @keyframes transitionIn {
      from {
        left: 240px;
        opacity: 0;
        transform: rotateX(-10deg);
      }

      to {
        left: 294px;
        opacity: 1;
        transform: rotateX(0);
      }
    }


    .box.arrow-left {
      margin-left: 240px;
      margin-top: -64px;
    }

    .box.arrow-left:after {
      content: " ";
      position: absolute;
      left: -15px;
      top: 15px;
      border-top: 15px solid transparent;
      border-right: 15px solid rgba(233, 217, 217, 0.856);
      border-left: none;
      border-bottom: 15px solid transparent;

    }

    .ttext {
      font-size: 15px;
    }

    .tinput {
      width: 80%;
      margin-left: 30px;
      visibility: hidden;
    }

    .tinput::placeholder {
      font-size: 15px;
    }

    .tbut {
      text-decoration: none;
      height: 35px;
      width: 110px;
      font-size: larger;
      border-radius: 15px;
      padding: 3px;
      transition: 1s;
      margin-top: -20px;
      transition: 2s ease-in-out 0s;
    }

    .tbut:hover {
      transform: scale(1.2);
    }

    #sum1 {
      cursor: pointer;
      text-decoration: none;
      height: 25px;
      width: 100px;
      border-radius: 15px;
      padding: 3px;
      visibility: hidden;
      position: absolute;
      margin-top: -20px;
      margin-left: -50px;
      justify-items: center;
      transition: 2s ease-in-out 0s;
    }

    #sum1:hover {
      transform: scale(1.2);
    }

    .form2 {
      margin-left: 55%;
      margin-top: -54%;
    }

    #ticking {
      height: 40px;
      width: 40px;
      position: absolute;
      margin: 25px 0px 0px 410px;
    }



    /*  @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
    */
    .don {
      position: relative;
      height: 25px;
      width: 25px;
      display: inline-block;
      border: 2px solid rgba(255, 255, 255, 0.2);
      border-radius: 50%;
      border-left-color: #5cb85c;
      animation: rotate 1.2s linear infinite;
    }

    @keyframes rotate {
      50% {
        border-left-color: #9b59b6;
      }

      75% {
        border-left-color: #e67e22;
      }

      100% {
        transform: rotate(360deg);
      }
    }

    .don .check-icon {
      display: none;
    }

    .don .check-icon:after {
      position: absolute;
      content: "";
      top: 50%;
      left: 0px;
      transform: scaleX(-1) rotate(135deg);
      height: 16px;
      width: 8px;
      border-top: 3px solid #5cb85c;
      border-right: 3px solid #5cb85c;
      transform-origin: left top;
      animation: check-icon 2s ease;
    }

    @keyframes check-icon {
      0% {
        height: 0;
        width: 0;
        opacity: 1;
      }

      20% {
        height: 0;
        width: 8px;
        opacity: 1;
      }

      40% {
        height: 16px;
        width: 8px;
        opacity: 1;
      }

      100% {
        height: 16px;
        width: 8px;
        opacity: 1;
      }
    }

    .copy {
      display: none;
    }

    .don1 .check-icon {
      display: block;
    }

    .don1 {
      animation: none;
      border-color: #5cb85c;
      transition: border 1s ease-out;
    }

    .leftBox {
      width: 125px;
      height: 60px;
      position: absolute;
      margin: 18px 0px 0px 125.5px;
    }

    .rightBox {
      width: 125px;
      height: 60px;
      position: absolute;
      margin: 18px 0px 0px 251px;
    }

    .leftBox:hover~.sumbut {
      margin-left: 75%;
      width: 25%;
    }

    .rightBox:hover~.sumbut {
      margin-left: -0%;
      width: 25%;
    }

    .error_mess {
      height: fit-content;
      width: fit-content;
      border: 1px solid rgba(250, 39, 39, 0.863);
      background-color: rgba(250, 51, 16, 0.39);
    }

    ::-webkit-scrollbar {
      width: 10px;
      background: black;
    }

    ::-webkit-scrollbar-thumb {
      background: white;
      border-radius: 10px;
      opacity: 5px;
    }

    #layer1 {
      margin-left: 423px;
      margin-top: 25px;
      color: #ffff00b5;
      font-size: 20px;
      visibility: hidden;
      position: absolute;
    }

    .iconTop {
      background-color: black;
      position: absolute;
      font-size: 15px;
      padding: 10px;
      border-radius: 10px;
      margin-left: 435px;
      margin-top: 60px;
      visibility: hidden;
    }

    #layer1:hover~.iconTop {
      visibility: visible;
    }

    .bi-eye-slash {
      cursor: pointer;
      margin-left: 420px;
    }

    .topIcon2 {
      height: 20px;
      width: 20px;
      margin: -27px 0px 0px 448px;
      position: absolute;
    }

    .topIcon2:hover~.iconTop {
      visibility: visible;
    }

    
    /* --------------------------------------- */
 .circle-icon {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background-color: #3498db;
  display: flex;
  justify-content: center;
  align-items: center;
  animation: pulse 2s infinite;
  position:absolute;
  margin: 30px 0px 0px 420px;
}

@keyframes pulse {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.2);
  }
  100% {
    transform: scale(1);
  }
}

.circle-icon i {
  font-size: 24px;
  color: #fff;
}
  </style>
  <script type='text/javascript'>
    function preback() { window.history.forward(); }
    setTimeout('preback()', 0);
    window.onload = function () { null };
  </script>
</head>

<body id="bg">
 <a href="<?=$client->createAuthUrl()?>"><img id="G" class="circle-icon" height=60px; width=60px; src="image/google.png"></a>
 <?php
        if (isset($_SESSION['Greg'])) {
          ?>
          <div class="error_box" role="alert" style="position:absolute;margin:-75px 0px 0px 145px;">
            <?php echo $_SESSION['Greg']; ?>
          </div>
          <?php
          unset($_SESSION['Greg']);
        }
        ?>
  <div class="container" id="search">
    <h1 class="reg">REGISTER</h1>
    <form id="main" action="registerphp.php" method="POST" name="form" onsubmit="return mainVerify()">
      <div class="GTT" id="id01">
        <lable>User Name</lable>
        <input type="text" id="uname" value="<?php
        if (isset($_GET['useMyName'])) {
          $emailefirst = base64_decode($_GET['useMyName']);
          echo "$emailefirst";
        }
        ?>" ; placeholder=" enter username" name="uname1" onkeyup="moveCursor(this,'email')">
        <?php
        if (isset($_SESSION['name'])) {
          ?>
          <div class="error_box" role="alert">
            <?php echo $_SESSION['name']; ?>
          </div>
          <?php
          unset($_SESSION['name']);
        }
        ?>
      </div>

      <div class="GTT" id="id02">
        <lable>Email Id</lable>
        <input type="text" value="<?php
        if (isset($_GET['nextmail'])) {
          $emailec = base64_decode($_GET['nextmail']);
          echo "$emailec";
        }
        ?>" ; id="email" placeholder=" enter email id here" name="email1" onkeyup="showBox()">
        <div id="ticking">
          <input type="checkbox" class="copy" id="check">
          <label id="hello" for="check">
            <div class="check-icon"></div>
          </label>
        </div>
        <?php
        if (isset($_SESSION['gmail'])) {
          ?>
          <div class="error_box" role="alert">
            <?php echo $_SESSION['gmail']; ?>
          </div>
          <?php
          unset($_SESSION['gmail']);
        }
        ?>
      </div>
      <div class="GTT" id="id03">
        <lable>Password</lable>
        <input type="password" id="pass01" value="<?php
        if (isset($_GET['pass001'])) {
          $emailec2 = base64_decode($_GET['pass001']);
          echo "$emailec2";
        }
        ?>" ; placeholder=" enter password" name="pass1" onkeyup="moveCursor2(this,'pass02')">
        <div id="layer1">⚠</div>
        <div id='topIcon'></div>
        <div id='topIcon1' class="iconTop">
          <p1>
            must contain one number<br>
            must contain uppercase<br>
            must contain lowercase<br>
            must contain special character
          </p1>
        </div>
      </div>
      <div class="GTT" id="id04">
        <lable>Confirm Password</lable>
        <input type="password" id="pass02" value="<?php
        if (isset($_GET['conpass002'])) {
          $emailec13 = base64_decode($_GET['conpass002']);
          echo "$emailec13";
        } ?>" ; placeholder=" re-enter password" name="pass2">
        <i class="bi bi-eye-slash" id="togglePassword"
          style="position:absolute;color:white;font-size:20px;margin-top:30px;"></i><br>
      </div>
      <div title="complete email verification" class="leftBox" id='leftBoxId'></div>
      <div title="complete email verification" class="rightBox" id='rightBoxId'></div>
      <button class="sumbut sumbut1" type="submit" id="glass" disabled>
        <center>Register</center>
      </button>

      <p><a href="Login.html" class="next1">&#8678; LogIn</a></p>

    </form>
    <form class="form2" action="regotp.php" method="POST" onsubmit="return emailGet()">
      <center>
        <div name="mailVerify" class="box arrow-left">
          <p2 class='ttext'><b>
              <?php
              if (isset($_SESSION['otp_sent'])) {
                ?>
                <div class="error_otp" role="alert">
                  <?php echo $_SESSION['otp_sent']; ?>
                </div>
                <?php
                unset($_SESSION['otp_sent']);
              }
              ?>
              <?php
              if (isset($_SESSION['otp_errOr'])) {
                ?>
                <div class="error_mess" role="alert">
                  <?php echo $_SESSION['otp_errOr']; ?>
                </div>
                <?php
                unset($_SESSION['otp_errOr']);
              }
              ?>
            </b>
            <input value="" type="hidden" name="newname" id="newin">
            <input value="" type="hidden" name="newnameUser" id="newinUser">
            <input value="" type="hidden" name="newnamePass" id="newinPass">
            <input value="" type="hidden" name="newnameConfirm" id="newinConfirm">
            </p2>
              <input type="hidden" name="getotp" value="<?php
              if (isset($_GET['geterotp'])) {
                echo $_GET['geterotp'];
              } ?>">



              <input name="boxin" onkeydown="send_otp()" class="tinput" type="text" placeholder="enter otp">
              <center><button name="butclick" type="submit" class="tbut">send otp</button></center>
              <center><button onclick="emailGet()" formaction="ver_otp.php" name="butNumber2" id="sum1">verify</button>
              </center>
        </div>
      </center>
      <?php
      if (isset($_GET['agritoy']) || isset($_GET['errOr'])) {
        echo "<script type='text/javascript'>

                    document.querySelector('#search').classList.remove('container');
                    document.querySelector('#search').classList.add('container1');
                    document.querySelector('.box').style.visibility='visible';
                    document.querySelector('.tinput').style.visibility='visible';
                    document.querySelector('.tbut').style.visibility='hidden';
                    document.querySelector('#sum1').style.visibility='visible';
                    //document.getElementById('email').disabled=true;
                    
                var uname5=document.getElementById('uname');
                 if(uname5.value.length > 2){
                     uname5.style.color='#e9ff91';
                     uname5.style.borderBottom ='2px solid #e9ff91';
                }
                
                             
              </script>";
      }
      ?>
      <?php
      if (isset($_GET['toyagri'])) {
        
        echo "<script type='text/javascript'>
                document.querySelector('#hello').classList.add('don');
                const myTimeout = setTimeout(myGreeting, 2000);
                function myGreeting(){
                document.querySelector('#hello').classList.add('don1');}
                document.getElementById('leftBoxId').outerHTML='';
                document.getElementById('rightBoxId').outerHTML='';
                document.querySelector('#search').classList.remove('container');
                document.querySelector('#search').classList.add('container1');
                document.querySelector('#glass').classList.remove('sumbut');
                document.querySelector('.sumbut1').disabled=false;
                document.getElementById('email').disabled=true;
                document.getElementById('email').style.color='#e9ff91';
                document.getElementById('email').style.borderBottom ='2px solid #e9ff91';
                    var uname5=document.getElementById('uname');
                    
                 if(uname5.value.length > 2){
                     uname5.style.color='#e9ff91';
                     uname5.style.borderBottom ='2px solid #e9ff91';
                }
                  
            </script>";
      }
      ?>

    </form>
  </div>


<script type="text/javascript">
    const togglePassword = document.querySelector("#togglePassword");
    const cpassword = document.querySelector("#pass02");
    const password = document.querySelector("#pass01");

    var form = document.getElementById("main");
    var uname = document.getElementById("uname");
    var email = document.getElementById("email");
    var pass1 = document.getElementById("pass01");
    var pass2 = document.getElementById("pass02");
    
    function mainVerify() {
          //document.getElementById('email').disabled = false;
         
          if (uname.value.length < 3) {
            uname.style.borderBottom = '2px solid red';
            uname.style.color = '#ffffff';
            return false;
          }
          
          
            var number = /[0-9]/g;
            var upperCase = /[A-Z]/g;
            var lowerCase = /[a-z]/g;
            var pass10 = pass1.value;
            if (pass10.match(upperCase) && pass10.match(lowerCase) && pass10.match(number)
              && (7 <= pass1.value.length)&&(pass1.value.length < 12)&&(pass10.includes('!') || pass10.includes('~') || pass10.includes('|') || pass10.includes('@')
                || pass10.includes('$') || pass10.includes('%') || pass10.includes('^') || pass10.includes('&')
                || pass10.includes('*') || pass10.includes('(') || pass10.includes(')') || pass10.includes('-')
                || pass10.includes('_') || pass10.includes('+') || pass10.includes('/') || pass10.includes(':')
                || pass10.includes('.') || pass10.includes(',') || pass10.includes('>') || pass10.includes('<')
                || pass10.includes('?') || pass10.includes('#'))) {

            } else {
              pass1.style.borderBottom = '2px solid red';
              pass1.style.color = '#ffffff';
              return false;
            }
          
          if (pass1.value != pass2.value) {
            form.pass2.style.borderBottom = '2px solid red';
            form.pass2.style.color = '#ffffff';
            return false;
          }
          document.getElementById('email').disabled = false;
          return true;
        }

    togglePassword.addEventListener("click", function () {
          const type = cpassword.getAttribute("type") === "password" ? "text" : "password";
          cpassword.setAttribute("type", type);
          password.setAttribute("type", type);
          this.classList.toggle("bi-eye");
        });
    
        function showBox() {
          if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.email.value)) {
            element = document.querySelector('.box');
            element.style.visibility = 'visible';
            element.style.animation = 'transitionIn 2s'; <?php $_SESSION['otp_sent'] = 'Email Verification'; ?>

          }
        }
        function emailGet() {
          if (email.value != '') {
            document.getElementById('newin').value = email.value;
          }
          if (uname.value != '') {
            document.getElementById('newinUser').value = uname.value;
          }
          if (pass1.value != '') {
            document.getElementById('newinPass').value = pass1.value;
          }
          if (pass2.value != '') {
            document.getElementById('newinConfirm').value = pass2.value;
          }
          if (uname.value.length < 3) {
            uname.style.borderBottom = '2px solid red';
            uname.style.color = '#ffffff';
            return false;
          }
            return true;
        }


    uname.oninput = function () {
          var uname2 = uname.value.trim();
          if (uname2.length >= 3) {
            document.getElementById("uname").style.borderBottom = "2px solid #e9ff91";
            document.getElementById("uname").style.color = "#e9ff91";
            return true;
          } else {
            document.getElementById("uname").style.borderBottom = "2px solid white";
            document.getElementById("uname").style.color = "white";
            return false;
          }
        }
    pass1.oninput = function () {
          if (pass1.value === pass2.value) {
            pass2.style.borderBottom = "2px solid #e9ff91";
            pass2.style.color = "#e9ff91";
          } else {
            pass2.style.borderBottom = '2px solid red';
            pass2.style.color = 'red';
          }
          if (7 <= pass1.value.length) {
            var number = /[0-9]/g;
            var upperCase = /[A-Z]/g;
            var lowerCase = /[a-z]/g;
            var pass10 = pass1.value;
            if (pass10.match(upperCase) && pass10.match(lowerCase) && pass10.match(number)
              && (pass10.includes('!') || pass10.includes('~') || pass10.includes('|') || pass10.includes('@')
                || pass10.includes('$') || pass10.includes('%') || pass10.includes('^') || pass10.includes('&')
                || pass10.includes('*') || pass10.includes('(') || pass10.includes(')') || pass10.includes('-')
                || pass10.includes('_') || pass10.includes('+') || pass10.includes('/') || pass10.includes(':')
                || pass10.includes('.') || pass10.includes(',') || pass10.includes('>') || pass10.includes('<')
                || pass10.includes('?') || pass10.includes('#'))) {

              if (pass1.value.length < 12) {
                pass1.style.borderBottom = "2px solid #e9ff91";
                pass1.style.color = "#e9ff91";
                document.querySelector('#layer1').classList.remove('icon1');
                document.querySelector('#layer1').style.visibility = 'hidden';
                document.querySelector('#topIcon').classList.remove('topIcon2');
                return true;
              } else {
                pass1.style.borderBottom = '2px solid red';
                pass1.style.color = 'red';
                document.querySelector('#layer1').classList.add('icon1');
                document.querySelector('#topIcon').classList.add('topIcon2');
                document.querySelector('#layer1').style.visibility = 'visible';
                document.querySelector('#layer').classList.add('layer');
                return false;
              }
            } else {
              pass1.style.borderBottom = '2px solid red';
              pass1.style.color = 'red';
              document.querySelector('#layer1').classList.add('icon1');
              document.querySelector('#topIcon').classList.add('topIcon2');
              document.querySelector('#layer1').style.visibility = 'visible';
              document.querySelector('#layer').classList.add('layer');
              return false;
            }
          }
          else {
            pass1.style.borderBottom = '2px solid white';
            pass1.style.color = 'white';
            document.querySelector('#layer1').classList.remove('icon1');
            document.querySelector('#layer1').style.visibility = 'hidden';
            document.querySelector('#topIcon').classList.remove('topIcon2');
            return false;
          }
        }

    pass2.oninput = function () {
          var number = /[0-9]/g;
          var upperCase = /[A-Z]/g;
          var lowerCase = /[a-z]/g;
          if (pass1.value === pass2.value && pass2.value.match(upperCase) && pass2.value.match(lowerCase) && pass2.value.match(number)
            && (pass2.value.includes('!') || pass2.value.includes('~') || pass2.value.includes('|') || pass2.value.includes('@')
              || pass2.value.includes('$') || pass2.value.includes('%') || pass2.value.includes('^') || pass2.value.includes('&')
              || pass2.value.includes('*') || pass2.value.includes('(') || pass2.value.includes(')') || pass2.value.includes('-')
              || pass2.value.includes('_') || pass2.value.includes('+') || pass2.value.includes('/') || pass2.value.includes(':')
              || pass2.value.includes('.') || pass2.value.includes(',') || pass2.value.includes('>') || pass2.value.includes('<')
              || pass2.value.includes('?') || pass2.value.includes('#'))) {
            pass2.style.borderBottom = "2px solid #e9ff91";
            pass2.style.color = "#e9ff91";
            document.querySelector('#layer').classList.remove('layer');
            document.getElementById('pass1').disabled = true;
            return true;
          } else {
            pass2.style.borderBottom = '2px solid red';
            pass2.style.color = 'red';
            document.querySelector('#layer1').classList.add('icon1');
            document.querySelector('#topIcon').classList.add('topIcon2');
            document.querySelector('#layer').classList.add('layer');
            document.getElementById('pass1').disabled = false;
            return false;
          }
        }
  
</script>
</body>

</html>