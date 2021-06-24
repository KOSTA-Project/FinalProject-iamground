<?php
    echo "<script> console.log('monitoring.php'); </script>";
    $dtoArr = $this->responseData;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="./source/controlByWSAD.js"></script>
</head>
<body>
    <table>
        <tr>
            <td><? echo $dtoArr[0]->getMapId();?></td>
            <td><? echo $dtoArr[0]->getUserId();?></td>
            <td><? echo $dtoArr[0]->getMapLocation();?></td>
            <td><? echo $dtoArr[1]->getMoId();?></td>
            <td><? echo $dtoArr[1]->getMoType();?></td>
        <tr>
    </table>

    <div>
        <img src="http://192.168.0.170:8090/?action=stream">
        <p>key w = forward<br>
        key s = backward<br>
        key a = left<br>
        key d = right</p>
        <p id="log" style='height: 300px'> test </p>
    </div>
</body>
</html>
