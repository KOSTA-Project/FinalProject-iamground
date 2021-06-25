<?php    
    echo "<script> console.log('monitoring.php'); </script>";    
    $dtoArr = $this->responseData;    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">    
    <title>Document</title>
    <link rel="stylesheet" href="./source/iamground.css">
    <script src="./source/controlByWSAD.js"></script>
</head>
<body>
    <div class="listForm">
        
        <table>
            <tr>
                <td><? echo $dtoArr[0]->getMapId();?></td>
                <td><? echo $dtoArr[0]->getUserId();?></td>
                <td><? echo $dtoArr[0]->getMapLocation();?></td>
                <td><? echo $dtoArr[1]->getMoId();?></td>
                <td><? echo $dtoArr[1]->getMoType();?></td>
            <tr>
        </table>
        <div id="navi">
        </div>
        <div id="blackbox">
            <img src="http://192.168.0.154:8090/?action=stream">       
        </div>

        <div class="directionBtns">
            <button type="button" class="btnForward" id="w" onmousedown="sendKeyByMouse(this.id)" onmouseup="sendXByMouse(this.id)">forward</button>
            <button type="button" class="btnLeft" id="a" onmousedown="sendKeyByMouse(this.id)" onmouseup="sendXByMouse(this.id)">left</button>
            <button type="button" class="btnRight" id="d" onmousedown="sendKeyByMouse(this.id)" onmouseup="sendXByMouse(this.id)">right</button>
            <button type="button" class="btnBackward" id="s" onmousedown="sendKeyByMouse(this.id)" onmouseup="sendXByMouse(this.id)">backward</button>
        </div>
        <p id="log"> test </p>
    </div>
</body>
</html>
