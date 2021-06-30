<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h3>Add Map</h3>
    <form method="POST" action="../am/index.php?action=addMap">
    <input type="hidden" name="userId" value="<? echo $_POST['userId']?>"/>
    <table>
        <tr>
            <td>map id:</td>
            <td><input type="text" name="mapId"/></td>
        </tr>
        <tr>
            <td>map Location:</td>
            <td><input type="text" name="mapLocation"/></td>
        </tr>
        <tr>
            <td><input type="submit" value="Finish"/></td> 
        </tr>        
    </table>
    </form>
</body>
</html>
