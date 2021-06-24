<?php
    echo "<script> console.log('molist.php'); </script>";
    $moLists = $this->responseData;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./source/iamground.css">
</head>
<body>
    <div class='listForm'>
        <div class='list'>
        <? for($i = 0; $i < count($moLists); $i++) : ?>
            <form class="mo" method="POST" action="../am/index.php?action=monitoring">
                <button class="btnMo">
                <input type="hidden" name="moId" value="<? echo $moLists[$i]->getMoId() ?>"/>
                <div><? echo $moLists[$i]->getMoId() ?></div>
                </button>
            </form>
            <? endfor; ?>
        </div>
    </div>
</body>
</html>
