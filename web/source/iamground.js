function getMoList(e, index){    
    var moListDiv = document.querySelector('#moList'+index);
    var response = "";
    var responseArr;
    var html = "";
    var httpRequest = new XMLHttpRequest();
    
    httpRequest.onreadystatechange = function(){
        if(httpRequest.readyState==4 && httpRequest.status==200){
            response = httpRequest.responseText;
            // check //////////////////
            responseArr = response.split('/');
            
            var i;
            for(i = 0; i < responseArr.length; i++){
            html += "<form class='mo' method='POST' action='../am/index.php?action=monitoring'>";
            html += "<button class='btnMo' type='submit'>";
            html += "<input type='hidden' name='moId' value='"+responseArr[i]+"'/>";
            html += responseArr[i];
            html += "</button>";
            html += "</form>"
            
        }
        moListDiv.innerHTML = html;
        }   
    }
    httpRequest.open('POST', './index.php?action=moList');
    httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    httpRequest.send('mapId='+e);
}
