
<?php {?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <nav class="nav"></nav>
    <p>jvkjebrjbeqrjwkjrekjwrtwrbretbretbrt
        erynbreybnreybnreynrenreynerynrenrtrt
        nsapi_response_headersretnernrynreneryneryn
        eyneyrneyneryneryneyrnrenern
    </p>
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

const nav=document.querySelector('.nav')
	fetch('index.php')
	.then(res=>res.text())
	.then(data=>{
		nav.innerHTML=data
	})
    </script>
</body>
</html>
<?php }?>






    

   
