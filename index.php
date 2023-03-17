<?php
require "DatabaseConnection/DataBase.php";
if(isset($_GET['Gname'])){
    $db_username =$_GET['Gname'];
}
if(!empty($_POST['email'])&&!empty($_POST['pass'])){
    $cemail=mysqli_real_escape_string($con,$_POST['email']);
    $cpass=mysqli_real_escape_string($con,$_POST['pass']);

   $sqli=("select * from register where email1='".$cemail."' AND pass2='".$cpass."'limit 1");
  
    $result=mysqli_query($con,$sqli);
    $rnum=mysqli_num_rows($result);

    if($rnum!=0){
        while($row=mysqli_fetch_assoc($result)){
            $db_username =$row['uname1'];
            $db_email=$row['email1'];
        }
        }
    else{
        echo "<script type='text/javascript'>
                         alert('check your email/password enter correctly'); 
			 window.location.href='Login.html';
              </script>";
    } 
}
?>
 <?php {?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    
    <style>
        
* {
    margin: 0;
    padding: 0;
}
.body{
    background-image: url("image/homebgfinal.jpg");
   padding-top: 100px;
    height: 1000px;
    width: auto;
}



.firstsection {
    background-color: rgb(255, 255, 255);
    height: 400px;
}

.secondsection {
    background-color: rgb(255, 255, 255);
    height: 400px;
}

.box-main {
    display: flex;
    justify-content: center;
    align-items: center;
    color: black;
    max-width: 80%;
    margin: auto;
    height: 80%;
}

.firsthalf {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.secondhalf {
    width: 30%;
}

.secondhalf img {
    width: 70%;
    background-image: url('new/image/hbg.jpg');
    border-radius: 150px;
    display: block;
    margin: auto;
}

.text-big {
    font-family: 'Piazzolla', serif;
    font-weight: bold;
    font-size: 35px;
}

.text-small {
    font-size: 18px;
}

  
  
.section {
    height: 400px;
    display: flex;
    align-items: center;
    justify-content: center;
    max-width: 90%;
    margin: auto;
}

.section-Left {
    flex-direction:row-reverse;
}

.paras {
    padding: 0px 65px;
}

.thumbnail img {
    width: 250px;
    border: 2px solid black;
    border-radius: 26px;
    margin-top: 19px;
}

.center {
    text-align: center;
}

.text-footer {
    text-align: center;
    padding: 20px 0;
    font-family: 'Ubuntu', sans-serif;
    display: flex;
    justify-content: center;
    color: white;
}

::-webkit-scrollbar{
    width:10px;
    background:black;
}
::-webkit-scrollbar-thumb{
    background:white;
    border-radius:10px;
    opacity: 5px;
}
    
/* ----------nav bar------------------------------------------------------------------------------------------ */
.navbarmain{
    margin: 0;
    padding: 0;
}
.navbar {
display: flex;
width:-webkit-fill-available;
align-items: center;
justify-content: center;
position: fixed;
top: 0;
cursor: pointer;
border-radius: 15px;
}

.background {
background: black;
background-blend-mode: darken;
background-size: cover;
z-index: 9;
}

.nav-list {
width: 89%;
display: flex;
align-items: center;
}
.logo {
display: flex;
justify-content: center;
align-items: center;
}
.logo img {
width: 180px;
border-radius: 50px;
}
.nav-list li {
list-style: none;
padding: 26px 15px;
}

.nav-list li a {
text-decoration: none;
color: white;
}
.nav-list li a:hover {
color: grey;
}
.rightnav {
width: 30%;
text-align: right;
}
#search {
padding: 10px;
border-radius: 5px;
border: 1px solid #ccc;
width: 70%;
margin: 10px auto;
float: right;
}
#clock{
color: white;
 text-decoration: none;
 font-weight: bolder;
 font-size: 25px;
}
#name{
float: left;
background-color: rgb(0, 0, 0);
}
.hi{
height:fit-content;
width: fit-content;
float: left;
top:-15px;
position: relative;
padding: 10px 260px 0px 10px;
font-size: 19px;
font-family:cursive;
color:rgb(233, 217, 75);
}
/* -Crop field start------------------------------------------------------- */
.CropData-float{
display:none;
}
.CropData-float ul li{
padding: 5px;
}

.navbar ul li:hover .CropData-float{
display:block;
height: fit-content;
width: 300px;
padding: 20px;
background-color: black;
border: solid 2px white;
color: aliceblue;
position: absolute;
border-radius: 10px;
}
.paddy-list {
display: none;
}
.paddy-list ul li{
padding: 5px;
}
.CropData-float ul li:hover .paddy-list{
display: block;
height: fit-content;
width: 300px;
margin-left: -106%;
margin-top: -9%;
padding: 20px;
background-color: black;
border: solid 2px white;
color: aliceblue;
position: absolute;
border-radius: 10px;
}
.paddy-list:after {
content: " ";
position: absolute;
margin-left: 320px;
top: 6px;
border-top: 15px solid transparent;
border-left: 15px solid rgba(233, 217, 217, 0.856);
border-bottom: 15px solid transparent;
}
.wheat-list{
display: none;
}
.wheat-list ul li{
padding:5px;
}
.CropData-float ul li:hover .wheat-list{
display:block;
height: fit-content;
width: 300px;
margin-left: -106%;
margin-top: -9%;
padding: 20px;
background-color: black;
border: solid 2px white;
color: aliceblue;
position: absolute;
border-radius: 10px;
}
.wheat-list:after {
content: " ";
position: absolute;
margin-left: 320px;
top: 6px;
border-top: 15px solid transparent;
border-left: 15px solid rgba(233, 217, 217, 0.856);
border-bottom: 15px solid transparent;
}
.millets-list{
display: none;
}
.millets-list ul li{
padding:5px;
}
.CropData-float ul li:hover .millets-list{
display:block;
height: fit-content;
width: 300px;
margin-left: -106%;
margin-top: -9%;
padding: 20px;
background-color: black;
border: solid 2px white;
color: aliceblue;
position: absolute;
border-radius: 10px;
}
.millets-list:after {
content: " ";
position: absolute;
margin-left: 320px;
top: 6px;
border-top: 15px solid transparent;
border-left: 15px solid rgba(233, 217, 217, 0.856);
border-bottom: 15px solid transparent;
}
.pulses-list{
display:none;
}
.pulses-list ul li{
padding:5px;
}
.CropData-float ul li:hover .pulses-list{
display:block;
height: fit-content;
width: 314px;
margin-left:-110%;
margin-top: -9%;
padding: 20px;
background-color: black;
border: solid 2px white;
color: aliceblue;
position: absolute;
border-radius: 10px;
}
.pulses-list:after {
content: " ";
position: absolute;
margin-left: 334px;
top: 6px;
border-top: 15px solid transparent;
border-left: 15px solid rgba(233, 217, 217, 0.856);
border-bottom: 15px solid transparent;
}
/* -machine field start------------------------------------------------------- */
.ModernMachine-float{
display: none;
}
.ModernMachine-float ul li{
padding: 5px;
}
.navbar ul li:hover .ModernMachine-float{
display:block;
height: fit-content;
width: 300px;
padding: 20px;
background-color: black;
border: solid 2px white;
color: aliceblue;
position: absolute;
border-radius: 10px;
}
#login{
    height: 48px;
    width: 190px;
    background-image: url(image/loginimg.png);
    background-size: contain;
    background-repeat: no-repeat;
    margin-left:40px;
}
#login div {
    margin-left: 49px;
    margin-top: 15px;
    font-size: 13px;
}
#login div a {
    text-decoration: none;
    color: navajowhite;
}
#logout{
    height:30px;
    width:30px;
    margin-left:40px;
    background-image:url("image/logout.png");
    background-size:contain;
}
    </style>
</head>
<body>
<nav class="navbar background">
    <ul class="nav-list">
        <div class="logo">
            <img src= "image/download.png">
        </div>
        <div class="hi"><b>Hi</b><div id="namer" style="padding:0;position:absolute;"></div></div>
        <li class="dropbtn"><a onclick="Home()" href="#">Home</a></li>
        <li><a href="#CropsData">Crops Data</a>
            <div class="CropData-float">
                <ul>
                    <li><a href="#">Paddy</a>
                        <div class="paddy-list">
                            <ul>
                                <li><a onclick="BasmathiRice()" href="#">Basmati rice</a></li>
                                <li><a onclick="Annapoornna()" href="#">Annapoornna</a></li>
                                <li><a onclick="PonniRice()" href="#">Ponni Rice</a></li>
                                <li><a onclick="SonaMasuri()" href="#">Sona Masuri</a></li>
                                <li><a onclick="IdlyRice()" href="#">Idly Rice – short grain</a></li>
                                <li><a onclick="ChampaRice()" href="#">Champa Rice</a></li>
                                <li><a onclick="BarmaBlackRice()" href="#">Barma Black Rice</a></li>
                                <li><a onclick="HMTRice()" href="#">HMT Rice</a></li>
                                <li><a onclick="AizonRice()" href="#">Aizon Rice</a></li>
                            </ul>
                         </div>	
                    </li>
                    <li><a href="#">Wheat</a>
                        <div class="wheat-list">
                            <ul>
                                <li><a href="#">Common wheat</a><li>
                                <li><a href="#">Durum</a><li>	
                                <li><a href="#">Spelt</a><li>
                                <li><a href="#">Emmer</a><li>
                                <li><a href="#">Khorasan wheat</a><li>
                                <li><a href="#">Einkorn wheat</a><li>
                                <li><a href="#">Triticum compactum</a><li>
                                <li><a href="#">Triticum turgidum</a><li>
                                <li><a href="#">Triticum polonicum</a><li>
                                <li><a href="#">Triticum timopheevii</a><li>
                             </ul>
                        </div>	
                    </li>
                    <li><a href="#">Millets</a>
                        <div class="millets-list">
                            <ul>
                                <li><a href="#">Sorghum (Jowar)</a><li>
                                <li><a href="#">Pearl Millet (Bajra)</a><li>	
                                <li><a href="#">Finger Millet (Ragi/Mandua)</a><li>
                                <li><a href="#">Minor Millets i.e. Foxtail Millet (Kangani/Kakun)</a><li>
                                <li><a href="#">Proso Millet (Cheena)</a><li>
                                <li><a href="#">Kodo Millet (Kodo)</a><li>
                                <li><a href="#">Barnyard Millet (Sawa/Sanwa/ Jhangora)</a><li>
                                <li><a href="#">Little Millet (Kutki)</a><li>
                                <li><a href="#">two Pseudo Millets (Buck-wheat (Kuttu) and Ameranthus (Chaulai))</a><li>
                             </ul>
                        </div>	
                    </li>
                    <li><a href="#">Pulses</a>
                        <div class="pulses-list">
                            <ul>
                                <li><a href="#">Dry Beans</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#">Lupins</a><li>
                                <li><a href="#">Lentils</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#">Vetches</a><li>	
                                <li><a href="#">Faba Beans</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#">Black beans</a><li>
                                <li><a href="#">Dry Peas</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#">Red Kidney beans</a><li>
                                <li><a href="#">Chickpeas</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#">Adzuki beans</a><li>
                                <li><a href="#">Cowpeas</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#">Black gram</a><li>
                                <li><a href="#">Bambara Beans</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#">Navy beans</a><li>
                                <li><a href="#">Pigeon Peas</a><li>
                             </ul>
                        </div>
                    </li>
                    <li><a href="#">Tea</a></li>
                    <li><a href="#">Coffee</a></li>
                    <li><a href="#">Sugarcane</a></li>
                    <li><a href="#">Cotton and Jute</a></li>
                    <li><a href="#">Corn</a></li>
                    <li><a href="#">Tomato</a></li>
                    <li><a href="#">Onion</a></li>
                    <li><a href="#">Potato</a></li>
                </ul>
             </div>	
        </li>
        <li><a href="#ModernMachine">Modern Machine</a>
            <div class="ModernMachine-float">
                <ul>
                    <li><a onclick="TractorPage()" href="#">Tractor</a></li>
                    <li><a href="#">Cultivator</a></li>
                    <li><a href="#">Sprayer</a></li>
                    <li><a href="#">Baler</a></li>
                    <li><a href="#">Seed Drill</a></li>
                    <li><a href="#">Cultipicker</a></li>
                    <li><a href="#">Cotton Picker</a></li>
                    <li><a href="#">Sickle</a></li>
                    <li><a href="#">Disk Harrow</a></li>
                    <li><a href="#">Grain</a></li>
                    <li><a href="#">Skid-Steer Loader</a></li>
                    <li><a href="#">Potato Harvester</a></li>
                    <li><a href="#">Mulcher</a></li>
                    <li><a href="#">Threshing Machine</a></li>
                    <li><a href="#">Post Hole Digger</a></li>
                    <li><a href="#">Combine Harvester</a></li>
                    <li><a href="#">Plough</a></li>
                </ul>
             </div>
        </li>
        <div class="rightNav">
<form action="https://www.google.com/search" method="get" >
<input type="search" name="q" placeholder="Search Google" id="search">
</form>
    </div>
    <div id="login" style="display:none;"><div><a href="Login.html">Login/SignUp</a></div></div>
    <div onclick="Logout()" id="logout"style="display:none;"></div>
    </ul>
    <div id="clock"></div>
</nav>
<nav id="nav" class="nav"></nav>
    <sub-body class="subBody"></sub-body>
	<footer class="background">
		<p class="text-footer">
			Copyright ©-All rights are reserved
		</p>
	</footer>
    <script type="text/javascript">
        setInterval(displayclock,200);
function displayclock(){
    var time=new Date();
    var hrs=time.getHours();
    var min=time.getMinutes();
    var sec=time.getSeconds();
    var pe="AM";

    if(hrs>11){
        pe="PM";
    }
    if(hrs>12){
        hrs=hrs-12;
    }
    if(hrs==0){
        hrs=12;
    }
    if(hrs<10){
        hrs='0'+hrs;
    }
    if(min<10){
        min='0'+min;
    }
    if(sec<10){
        sec='0'+sec;
    }
    var username="game";

    document.getElementById('clock').innerHTML=hrs+':'+min+':'+sec+' '+pe;
}


    function Logout(){
        window.location="index.php";
    }
    window.onbeforeunload=function(){
    window.location.reload();
    }
        const nav=document.querySelector('.subBody')
        
	fetch('HomeBody.html')
	.then(res=>res.text())
	.then(data=>{
		nav.innerHTML=data
	})
    function Home(){
	fetch('HomeBody.html')
	.then(res=>res.text())
	.then(data=>{
		document.querySelector('.subBody').innerHTML=data
	})
    }
    function TractorPage(){
        const nav=document.querySelector('.subBody')
	fetch('newBody.php')
	.then(res=>res.text())
	.then(data=>{
		nav.innerHTML=data})
    }
    function BasmathiRice(){
	fetch('subBody/basmati.html')
	.then(res=>res.text())
	.then(data=>{
		document.querySelector('.subBody').innerHTML=data})
    }
    function basmatiCost(){
        fetch('subBody/basmatiCost.html')
	.then(res=>res.text())
	.then(data=>{
		document.querySelector('.subBody').innerHTML=data})
    }
    function Annapoornna(){
	fetch('subBody/basmati.html')
	.then(res=>res.text())
	.then(data=>{
		document.querySelector('.subBody').innerHTML=data})
    }
    function AnnapoornnaCost(){
        fetch('subBody/basmatiCost.html')
	.then(res=>res.text())
	.then(data=>{
		document.querySelector('.subBody').innerHTML=data})
    }
    function PonniRice(){
	fetch('subBody/basmati.html')
	.then(res=>res.text())
	.then(data=>{
		document.querySelector('.subBody').innerHTML=data})
    }
    function PonniRiceCost(){
        fetch('subBody/basmatiCost.html')
	.then(res=>res.text())
	.then(data=>{
		document.querySelector('.subBody').innerHTML=data})
    }
    function SonaMasuri(){
	fetch('subBody/basmati.html')
	.then(res=>res.text())
	.then(data=>{
		document.querySelector('.subBody').innerHTML=data})
    }
    function SonaMasuriCost(){
        fetch('subBody/basmatiCost.html')
	.then(res=>res.text())
	.then(data=>{
		document.querySelector('.subBody').innerHTML=data})
    }
    function IdlyRice(){
	fetch('subBody/basmati.html')
	.then(res=>res.text())
	.then(data=>{
		document.querySelector('.subBody').innerHTML=data})
    }
    function IdlyRiceCost(){
        fetch('subBody/basmatiCost.html')
	.then(res=>res.text())
	.then(data=>{
		document.querySelector('.subBody').innerHTML=data})
    }
    function ChampaRice(){
	fetch('subBody/basmati.html')
	.then(res=>res.text())
	.then(data=>{
		document.querySelector('.subBody').innerHTML=data})
    }
    function ChampaRiceCost(){
        fetch('subBody/basmatiCost.html')
	.then(res=>res.text())
	.then(data=>{
		document.querySelector('.subBody').innerHTML=data})
    }
    function BarmaBlackRice(){
	fetch('subBody/basmati.html')
	.then(res=>res.text())
	.then(data=>{
		document.querySelector('.subBody').innerHTML=data})
    }
    function BarmaBlackRiceCost(){
        fetch('subBody/basmatiCost.html')
	.then(res=>res.text())
	.then(data=>{
		document.querySelector('.subBody').innerHTML=data})
    }
    function HMTRice(){
	fetch('subBody/basmati.html')
	.then(res=>res.text())
	.then(data=>{
		document.querySelector('.subBody').innerHTML=data})
    }
    function HMTRiceCost(){
        fetch('subBody/basmatiCost.html')
	.then(res=>res.text())
	.then(data=>{
		document.querySelector('.subBody').innerHTML=data})
    }
    function AizonRice(){
	fetch('subBody/basmati.html')
	.then(res=>res.text())
	.then(data=>{
		document.querySelector('.subBody').innerHTML=data})
    }
    function AizonRiceCost(){
        fetch('subBody/basmatiCost.html')
	.then(res=>res.text())
	.then(data=>{
		document.querySelector('.subBody').innerHTML=data})
    }
    </script>
 </body>
</html>
<?php }?>
<?php
if(isset($db_username)){
$myuname=$db_username;}
else{
    $myuname="guest"; 
}
?>
<script type="text/javascript">
    var geting="<?php print($myuname); ?>";
    document.getElementById('namer').innerHTML=geting;
    if(geting!="guest"){
    document.getElementById('logout').style.display="block";
    }else{
        document.getElementById('login').style.display="block";
    }
</script>
