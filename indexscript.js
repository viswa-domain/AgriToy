

var form=document.getElementById("form1");
var name1=document.getElementById("inname");
var pass1=document.getElementById("inpass");

name1.addEventListener('textInput',nameVerify);
pass1.addEventListener('textInput',passVerify);


function moveCursor(current,nextFied){
    var input1=document.getElementById('inname');
    input1.addEventListener('keyup',(e) => {
if(e.keyCode === 13){
document.getElementById(nextFied).focus();
}
});
}

function mainCheck(){
    if(name1.value.length < 14){
        form.email.style.color="white";
        form.email.style.borderBottom='2px solid red';
        return false;
    }
    if(pass1.value.length < 6){
        form.pass.style.borderBottom ='2px solid red';
        return false;
    }
}

function nameVerify(mail){
    if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.email.value)){
        document.getElementById("inname").style.border="none";
        document.getElementById("inname").style.borderBottom="2px solid #e9ff91";
        document.getElementById("inname").style.color="#e9ff91"
        return true;
        
    }
}
function passVerify(){
    if(pass1.value.length > 4){
        document.getElementById("inpass").style.border="none";
        document.getElementById("inpass").style.borderBottom="2px solid #e9ff91";
        return true;
    }
}




