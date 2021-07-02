<!--사용자 맵 정보를 보여주고 맵에 따른 오브젝트를 보여줍니다.-->
<?php
    srand((double)microtime()*1000000);
    header("Cache-Control: no cache");

    if(session_status() != PHP_SESSION_ACTIVE){
        session_start();
        // header(Pragma: no-cache);
        // header(Cache-Control: no-cache,must-revalidate);
    }

    $mapLists = $this->responseData;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv=Expires content=-1>
    <meta http-equiv=Pragma content=no-cache>
    <meta http-equiv=Cache-Control content=No-Cache>
    <meta charset="utf-8">
    <title>mapList</title>
    <link rel="stylesheet" href="./source/iamground.css">
    <script src="./source/iamground.js"></script>
    </head>
    <body>
        <h3>맵 정보 페이지<h3>
        <div class='container list'>
            <?
                if(isset($_SESSION['userId'])){ print $_SESSION['userId']." 님 반갑습니다.";}
                else {   header("Location:view/loginForm.php"); }
            ?>
            <? if($mapLists == NULL) : ?>
                <div> // check ///// </div>
            <? endif; ?>
            <form method="POST" action="../am/index.php?action=logout">
                <input type="submit" value="로그아웃"/>
            </form>

                <? for($i = 0; $i < count($mapLists); $i++) : ?>
                    <button class='map' style="background-image: url('./source/image/<?=rand(1, 3)?>.jpg')" onclick="getMoList('<? echo $mapLists[$i]->getMapId() ?>', <? echo $i?>)">
                        <div class='fontSize120px'><? echo $mapLists[$i]->getMapLocation(); ?></div>
                        <div class='fontSize20px'>map id : <? echo $mapLists[$i]->getMapId(); ?></div>
                    </button>
                    <div id="moList<?echo $i?>"></div>
                <? endfor; ?>

        </div>
    </body>
</html>
