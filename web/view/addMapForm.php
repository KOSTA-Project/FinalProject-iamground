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
    <table class="manageTable">
        <tr>
            <td>map id:</td>
            <td><input type="text" name="mapId" autocomplete="off"/></td>
        </tr>
        <tr>
            <td>map Location:</td>
            <td><input type="text" name="mapLocation" autocomplete="off"/></td>
        </tr>
        <tr>
            <td><input type="submit" value="추가" autocomplete="off"/></td>
        </tr>
    </table>
    </form>
    </div>
</body>
</html>
