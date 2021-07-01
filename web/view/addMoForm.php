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
    <table class="manageTable">
        <tr>
            <td>mo id:</td>
            <td><input type="text" name="moId" autocomplete="off"/></td>
        </tr>
        <tr>
            <td>mo type:</td>
            <td><input type="text" name="moType" autocomplete="off"/></td>
        </tr>
        <tr>
            <td>mo Status:</td>
            <td><input type="text" name="moStatus" autocomplete="off"/></td>
        </tr>
        <tr>
            <td><input type="submit" value="추가"/></td>
        </tr>
    </table>
    </form>
</div>
</body>
</html>
