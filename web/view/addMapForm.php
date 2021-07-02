<!--맵을 추가 합니다.-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./source/iamground.css">

</head>
<body>
    <div class='container'>
    <h3>Add Map</h3>
    <form method="POST" action="../am/index.php?action=addMap">
    <input type="hidden" name="userId" value="<? echo $_POST['userId']?>"/>
    <table class="iamgroundTable">
        <tr>
            <td class="alineRight">map id:</td>
            <td><input type="text" name="mapId" autocomplete="off"/></td>
        </tr>
        <tr>
            <td class="alineRight">map Location:</td>
            <td><input type="text" name="mapLocation" autocomplete="off"/></td>
        </tr>
        <tr>
            <td colspan="2" class="alineCenter"><input class="btnManage width200px" type="submit" value="추가" autocomplete="off"/></td>
        </tr>
    </table>
    </form>
            <form method="POST" action="../am/index.php?action=userInfo">
                <input type="hidden" name="userId" value="<? echo $_POST['userId']?>"/>
                <input type="submit" class="btnManage width200px" value ="돌아가기"/>
            </form>
    </div>
</body>
</html>
