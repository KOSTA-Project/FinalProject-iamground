// start with DOM loading finish
document.addEventListener("DOMContentLoaded", function(){
    // get element object by id
    var log = document.querySelector('#log');
     

    // set keypress event and function
    document.addEventListener('keypress', sendKeyToPhp);
    document.addEventListener('keyup', sendXToPhp);  
});

function isWASD(e){
    var wasdCheck = true;
    
    if(e.key!=='w' && e.key!=='s' && e.key!=='a' && e.key!=='d'){
        alert("please press key between 'w', 's', 'a', 'd'");
        wasdCheck = false;            
    } else {
        wasdCheck = true;
    }    
    return wasdCheck;
}

function sendWithAJAX(key){
    var httpRequest = new XMLHttpRequest();

    httpRequest.onreadystatechange = function(){
        log.textContent = "called onreadystatechange..   ";

        if(httpRequest.readyState==4 && httpRequest.status == 200){
            // get response data to server (is it null now)
            // var response = JSON.parse(httpRequest.responseText);
            log.textContent = "press button"+httpRequest.responseText;                
        } 
    };

    httpRequest.open('POST', './controller/NetworkController.php');
    httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    httpRequest.send('direction=' + key+ '&address='+'192.168.0.21');
}    

// when key wsad pressed send key word to MO
function sendKeyToPhp(e){
    if(isWASD(e)===false){
        return;
    }      
    
    sendWithAJAX(e.key);
    changeBtnColor(e.key, 'o');        
}

// when key wsad up send key x to MO
function sendXToPhp(e){
    if(isWASD(e)===false){
        return;
    }  

    sendWithAJAX('x');
    changeBtnColor(e.key, 'x');
}

function changeBtnColor(e, ox){
    if(ox === 'x'){
        var btnColor = "grey"; 
    } else if(ox === 'o'){
        var btnColor = "red";
    }
    document.getElementById(e).style.backgroundColor = btnColor;      
}

function sendKeyByMouse(btnValue){
    sendWithAJAX(btnValue);
    changeBtnColor(btnValue, 'o');
}

function sendXByMouse(btnValue){
    sendWithAJAX('x');
    changeBtnColor(btnValue, 'x');

}

