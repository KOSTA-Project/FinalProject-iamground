function getMoList(e, index){
    var moListDiv = document.querySelector('#moList'+index);
    var response = "";
    var responseArr;
    var splitedVal = [];
    var html = "";
    var httpRequest = new XMLHttpRequest();

    httpRequest.onreadystatechange = function(){
        if(httpRequest.readyState==4 && httpRequest.status==200){
            response = httpRequest.responseText;
            responseArr = response.split("/");

            if(responseArr.length == 1){
                alert("not exist mobile object");
            }

            var i;
            for(i = 1; i < responseArr.length; i++){
                splitedVal[i-1] = responseArr[i].split("|");
            }

            for(i = 0; i < splitedVal.length; i++){
                html += "<form class='mo' method='POST' action='../am/index.php?action=monitoring'>";
                html += "<button type='submit'>";
                html += "<input type='hidden' name='moId' value='"+splitedVal[i][0]+"'/>";
                html += splitedVal[i][0];
                html += "</button>";
                if(splitedVal[i][1] === '0'){
                    html += "<button class='btnMo' type='button' style='background-color: green'></button>";
                } else {

                    html += "<button class='btnMo' type='button' style='background-color: red'></button>";
                }
                html += "</form>";
            }
            moListDiv.innerHTML = html;
        }
    }
    httpRequest.open('POST', './index.php?action=moList');
    httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    httpRequest.send('mapId='+e);
}
