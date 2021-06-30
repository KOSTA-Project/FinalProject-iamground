<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h3>Add Mo</h3>
    <form method="POST" action="../am/index.php?action=addMo">
    <input type="hidden" name="userId" value="<? echo $_POST['userId']?>"/>
    <input type="hidden" name="mapId" value="<? echo $_POST['mapId']?>"/>
    <table>
        <tr>
            <td>mo id:</td>
            <td><input type="text" name="moId"/></td>
        </tr>
        <tr>
            <td>mo type:</td>
            <td><input type="text" name="moType"/></td>
        </tr>
        <tr>
            <td><input type="submit" value="Finish"/></td> 
        </tr>        
    </table>
    </form>
</body>
</html>
