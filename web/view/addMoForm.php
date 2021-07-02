<!--오브젝트를 추가합니다.-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./source/iamground.css">
</head>
<body>
    <div class="container">
        <h3>Add Mo</h3>
        <form method="POST" action="../am/index.php?action=addMo">
            <input type="hidden" name="userId" value="<? echo $_POST['userId']?>"/>
            <input type="hidden" name="mapId" value="<? echo $_POST['mapId']?>"/>
            <table class="iamgroundTable">
                <tr>
                    <td class="alineRight">mo ID:</td>
                    <td><input type="text" name="moId" autocomplete="off"/></td>
                </tr>
                <tr>
                    <td class="alineRight">mo Type:</td>
                    <td><input type="text" name="moType" autocomplete="off"/></td>
                </tr>
                <tr>
                    <td class="alineRight">mo Status:</td>
                    <td><input type="text" name="moStatus" autocomplete="off"/></td>
                </tr>
                <tr>
                    <td class="alineRight">mo IP:</td>
                    <td><input type="text" name="moIp" autocomplete="off"/></td>
                </tr>
                <tr>
                    <td colspan="2" class="alineCenter"><input class="btnManage width200px" type="submit" value="추가"/></td>
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
