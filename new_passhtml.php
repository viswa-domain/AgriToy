<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set New Pasword</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <style>
        *{
    margin: 0;
    padding: 0;
}
#cont{
    height:350px;
    width:500px;
    position: relative;
    margin: 100px auto;
    
    border-radius: 70px;
    box-shadow: -3px 3px 5px black;
    background-color: rgba(7, 7, 7, 0.753);
}
html{
    background: url("image/reset.jpg");
    background-size: cover;
}
button{
    height: 7vh;
    width: 30% ;
    border-radius: 15px;
    border: none;
    margin-top: 20px;
    font-size:large;
    transition: .2s ease-in-out 0s;
    border: 2px solid rgba(255, 255, 255, 0.479);
    box-shadow: 0px 0px 6px 4px black;
}
button:hover{
    cursor: pointer;
    transform: scale(1.05);
    color:white;
    background-color: black;
    
}
.layer{
    height: 11vh;
    width: 30% ;
    margin-top: 7px;
    position: absolute;
    background-color: transparent;
    margin-left: 35%;
}
.layer:hover ~ button{
     width: 0px;
     color: transparent;
}
input{
    background-color: transparent;
    border: none;
    border-bottom: 2px solid white;
    width: 85%;
    height: 5vh;
    font-size: 23px;
    margin-top: 20px;
    color:white;
    outline:none;
    place-content: white;
    transition: .2s ease-in-out 0s;
}
input:hover{
    cursor: text;
    transform: scale(1.05);
    
}
::placeholder{
    color: rgba(255, 255, 255, 0.644);
    padding-left:2px;
    font-weight: 600;
    text-shadow: -3px 3px 5px black;
}
label{
    color: rgb(7, 7, 7);
}
.link{
    text-decoration: none;
    background-color:green;
    color: white;
    padding: 5px;
    border-radius: 5px;
}
.no{
    bottom: -21%;
    left: 10%;
}
#hid{
    visibility: hidden;
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
.error_mes1{
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
.icon1{
    font-size: 20px;
    color: rgb(248, 248, 12);
    position: absolute;
    margin:-29px 0px 0px 450px;
    transition: 0.5s;
}
.iconTop{
    height:80px;
    width:250px;
    padding: 5px;
    border-radius: 10px;
    margin: 10px 0px 0px 440px;
    color: white;
    border: 1.5px solid black;
    background-color: rgba(3, 3, 3, 0.644);
    visibility: hidden; 
    position: absolute;
}
.topIcon2{
    height: 20px;
    width: 20px;
    margin:-27px 0px 0px 448px;
    position:absolute;
}
.topIcon2:hover ~ .iconTop{
    visibility: visible;
}


    </style>
</head>
<body>
        <form id="cont" method="POST" action="new_pass1.php">
            <center><br><br>
            <?php 
        if(isset($_SESSION['errorind'])){
            ?>
            <center><div class="error_mes" role="alert">
            <?php  echo $_SESSION['errorind']; ?>
            </div></center>
            <?php
       
        unset($_SESSION['errorind']);
    }
        ?>
    <?php 
      if(isset($_SESSION['errorind2'])){
            ?>
            <center><div class="error_mes1" role="alert">
            <?php  echo $_SESSION['errorind2']; ?>
            </div></center>
            <?php
       
        unset($_SESSION['errorind2']);
    }
     ?>  
            <br><div class="triangle1">
<span class="warn warning"></span>
</div>
            <input id="pass1" type="text" placeholder="Password" name="mpass"><br>
            <div id="layer1" style='visibility:hidden; position:absolute;'>⚠</div>
            <div id='topIcon' ></div>
            <div id='topIcon1' class="iconTop"> 
                <p1>
                    Must contain one number<br>
                    Must contain uppercase<br>
                    Must contain lowercase<br>
                    Must contain special character
                </p1>
            </div>
            <input id="pass2" type="password" placeholder="Confirm Password" name="cpass">
            <i class="bi bi-eye-slash" id="togglePassword" style="position:absolute;color:white;font-size:20px;margin-top:30px;"></i><br>
            <div id="hid"><input type="text" value="<?php if(isset($_GET['token'])){echo $_GET['token'];} ?>" name="token1"></div>
            <div title="enter password" class="layer" id="layer"></div>
            <button class="no" type="submit" name="okdone">Submit</button>
</center>
        </form>
        <script type='text/javascript'>
            const togglePassword = document.querySelector("#togglePassword");
            const password = document.querySelector("#pass2");
            togglePassword.addEventListener("click", function (){
            const type = pass2.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            this.classList.toggle("bi-eye");
        });
            
            var pass1=document.getElementById('pass1');
            var pass2=document.getElementById('pass2');
            pass1.oninput=function(){
                if(7 <= pass1.value.length){
                   var number=/[0-9]/g;
                   var upperCase=/[A-Z]/g;
                   var lowerCase=/[a-z]/g;
                   var pass10=pass1.value;
if(pass10.match(upperCase) && pass10.match(lowerCase) && pass10.match(number) 
 && (pass10.includes('!') || pass10.includes('~') || pass10.includes('|') || pass10.includes('@')
 || pass10.includes('$') || pass10.includes('%') || pass10.includes('^') || pass10.includes('&') 
 || pass10.includes('*') || pass10.includes('(') || pass10.includes(')') || pass10.includes('-') 
 || pass10.includes('_') || pass10.includes('+') || pass10.includes('/') || pass10.includes(':') 
 || pass10.includes('.') || pass10.includes(',') || pass10.includes('>') || pass10.includes('<') 
 || pass10.includes('?') || pass10.includes('#'))){

                    if(pass1.value.length < 12){
                pass1.style.borderBottom="2px solid #e9ff91";
                pass1.style.color="#e9ff91";
                document.querySelector('#layer1').classList.remove('icon1');
                document.querySelector('#layer1').style.visibility='hidden';
                document.querySelector('#topIcon').classList.remove('topIcon2');
                return true;
                }else{
                pass1.style.borderBottom ='2px solid red';
                pass1.style.color='red';
                document.querySelector('#layer1').classList.add('icon1'); 
                document.querySelector('#topIcon').classList.add('topIcon2'); 
                document.querySelector('#layer1').style.visibility='visible';           
                document.querySelector('#layer').classList.add('layer');
                return false;
                }}else{
                pass1.style.borderBottom ='2px solid red';
                pass1.style.color='red';
                document.querySelector('#layer1').classList.add('icon1'); 
                document.querySelector('#topIcon').classList.add('topIcon2');
                document.querySelector('#layer1').style.visibility='visible';                       
                document.querySelector('#layer').classList.add('layer');
                return false;
                }
                }
                else{
                pass1.style.borderBottom ='2px solid white';
                pass1.style.color='white';
                document.querySelector('#layer').classList.add('layer');
                document.querySelector('#layer1').classList.remove('icon1');
                document.querySelector('#topIcon').classList.remove('topIcon2');
                document.querySelector('#layer1').style.visibility='hidden';
                return false;
                }}
            pass2.oninput=function(){
                var number=/[0-9]/g;
                var upperCase=/[A-Z]/g;
                var lowerCase=/[a-z]/g;
  if(pass1.value === pass2.value && pass2.value.match(upperCase) && pass2.value.match(lowerCase) && pass2.value.match(number) 
 && (pass2.value.includes('!') || pass2.value.includes('~') || pass2.value.includes('|') || pass2.value.includes('@')
 || pass2.value.includes('$') || pass2.value.includes('%') || pass2.value.includes('^') || pass2.value.includes('&') 
 || pass2.value.includes('*') || pass2.value.includes('(') || pass2.value.includes(')') || pass2.value.includes('-') 
 || pass2.value.includes('_') || pass2.value.includes('+') || pass2.value.includes('/') || pass2.value.includes(':') 
 || pass2.value.includes('.') || pass2.value.includes(',') || pass2.value.includes('>') || pass2.value.includes('<') 
 || pass2.value.includes('?') || pass2.value.includes('#'))){
                    pass2.style.borderBottom="2px solid #e9ff91";
                    pass2.style.color="#e9ff91";
                    document.querySelector('#layer').classList.remove('layer');
                    document.getElementById('pass1').disabled=true;
                    return true;
                }else{
                    pass2.style.borderBottom ='2px solid red';
                    pass2.style.color='red';
                    document.querySelector('#layer1').classList.add('icon1');     
                    document.querySelector('#topIcon').classList.add('topIcon2');                   
                    document.querySelector('#layer').classList.add('layer');
                    document.getElementById('pass1').disabled=false;
                    return false;
                }
            }
            
        </script> 
</body>
</html>


