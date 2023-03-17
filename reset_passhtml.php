<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>repass</title>
    <style>
        *{
    margin:0;
    padding:0;
}

.cont{
    height:350px;
    width:500px;
    position: relative;
    margin: 100px auto;
    border-radius: 70px;
    box-shadow: 0px 0px 19px 9px black;
    background-color: rgb(0 0 0 / 67%);
}
html{
    background: url("image/reset.jpg");
    background-size: cover;
}
h1{
    font-size: 50px;
    font-weight: 800;
    color: black;
    text-shadow: 3px 3px 5px rgb(255, 255, 255) ;
}
.top{
    height: 10vh;
    width: 100%;
    border-radius: 20px;
    align-items: center;
    margin-top: 20px;
    font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;

}

#email{
    background-color: transparent;
    border: none;
    border-bottom: 4px solid black;
    width: 85%;
    height: 5vh;
    font-size: 23px;
    font-weight: 800;
    margin-top: 20px;
    color:white;
    outline:none;
    place-content:white;
    transition: .2s ease-in-out 0s;
}
#email:hover{
    cursor: text;
    transform: scale(1.05);
    
}
::placeholder{
    color: rgba(255, 255, 255, 0.849);
    padding-left:2px;
    font-weight: 600;
    /* text-shadow: -3px 3px 5px black; */
}
#idm{
    font-weight: 900;
    font-size: 40px;
    color: white;
    text-shadow: -3px 3px 5px black;
}
.box{
    margin-top:50px;
}
.butt{
    height: 7vh;
    width: 30% ;
    border-radius: 15px;
    border: 2px solid rgba(255, 255, 255, 0.479);
    box-shadow: 0px 0px 6px 4px black;
    margin: 20px 0px 0px 175px;
    font-size:large;
    transition: .2s ease-in-out 0s;
}
.butt:hover{
    cursor:pointer;
    transform: scale(1.05);
    color:white;
    background-color: black;
    
}
.error_mes{
    background-color: rgba(0, 128, 0, 0.377);
    border: 2px solid rgb(0, 128, 0.479);
    color: rgb(13, 226, 13);
    height:fit-content;
    width: fit-content;
    padding: 6px;
    font-size: 25px;
    font-weight: 800;
    border-radius: 3px;
}
.error_mes2{
    background-color: rgba(255, 0, 0, 0.377);
    border: 2px solid rgba(255, 0, 0, 0.479);
    color: red;
    height:fit-content;
    width: fit-content;
    padding: 6px;
    font-size: 25px;
    font-weight: 800;
    border-radius: 3px;
}
.otp_layerL{
    width: 79px;
    height: 46px;
    position: absolute;
    margin: 20px 0px 0px 171px;
}
.otp_layerR{
    width: 79px;
    height: 46px;
    position: absolute;
    margin: 20px 0px 0px 250px;
}
.otp_layerL:hover ~ .butt{
    margin-left:280px;
    font-size: small;
    border-radius: 50%;
    width: 10%;
}
.otp_layerR:hover ~ .butt{
    margin-left:170px;
    font-size: small;
    border-radius: 50%;
    width: 10%;
}

    </style>
</head>
<body>
    <div class="cont">
        <div class="top"><center><h1>Reset Password</h1></center></div>
        <form action="reset_passphp.php" method="POST">
        <?php 
        if(isset($_SESSION['status'])){
            ?>
            <center><div class="error_mes" role="alert">
            <?php  echo $_SESSION['status']; ?>
            </div></center>
            <?php
       
        unset($_SESSION['status']);
    }
        ?>
        <?php 
        if(isset($_SESSION['status2'])){
            ?>
            <center><div class="error_mes2" role="alert">
            <?php  echo $_SESSION['status2']; ?>
            </div></center>
            <?php
       
        unset($_SESSION['status2']);
    }
        ?>
            <center><div class="box">
                <lable id="idm">Email Id</lable><br>
                <input type="text" id="email" placeholder="enter registerd email id"  name="mail">
            </div></center><div id="otp_layerL" class="otp_layerL"></div><div id="otp_layerR" class="otp_layerR"></div>
            <button class="butt" name="sentotp" type="submit">Send OTP</button>
        </form>   
    </div>
    <script type=text/javascript>
        var email=document.getElementById('email');
        email.oninput=function() {
            if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value)){
                email.style.borderBottom="2px solid #e9ff91";
                email.style.color="#e9ff91";
                document.querySelector('#otp_layerL').classList.remove('otp_layerL');
                document.querySelector('#otp_layerR').classList.remove('otp_layerR');
                return true;
            }
            else{
                email.style.borderBottom="2px solid white";
                email.style.color="white";
                document.querySelector('#otp_layerL').classList.add('otp_layerL');
                document.querySelector('#otp_layerR').classList.add('otp_layerR');
                return false;
            }
        }
    </script>
</body>
</html>
