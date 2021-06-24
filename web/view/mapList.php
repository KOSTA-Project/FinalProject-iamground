<?php
    srand((double)microtime()*1000000);

    //$imageArr = array("warehouse1.jpg", "warehouse2.jpg", "restaurant1.jpg");
    //$random = time()%count($imageArr);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>mapList</title>
    <link rel="stylesheet" href="./source/iamground.css">
        <?php
        if(session_status() != PHP_SESSION_ACTIVE){
         session_start();
            }
            if(isset($_SESSION['userId'])){
            if($this->action=='login'){
                print "<script>alert('".$this->data."');</script>";
            }
            print $_SESSION['userId']." login ing...<br>";
            } else {
                header("Location:view/loginForm.php");
            }
        $mapLists = $this->responseData;
        //var_dump($this->responseData);
        ?>
    </head>
    <body>
        <div class='listForm'>
            <div class='list'>
            <? for($i = 0; $i < count($mapLists); $i++) : ?>
                <form method="POST" action="../am/index.php?action=moList">
                <input type="hidden" name="mId" value="<? echo $mapLists[$i]->getMapId() ?>"/>
                <button class='map' style="background-image: url('./source/image/<?=rand(1, 3)?>.jpg')">
                    <div class='location'><? echo $mapLists[$i]->getMapLocation(); ?></div>
                    <div class='mapId'>map id : <? echo $mapLists[$i]->getMapId(); ?></div>
                </button>
                </form>
            <? endfor; ?>
            </div>
        </div>

</body>
</html>
