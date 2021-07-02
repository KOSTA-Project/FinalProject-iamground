<!--사용자 오브젝트 정보를 보여줍니다.-->
<?php
    header("Cache-Control: no cache");
    session_cache_limiter("private_no_expire");
    $moLists = $this->responseData;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=Expires content=-1>
        <meta http-equiv=Pragma content=no-cache>
        <meta http-equiv=Cache-Control content=No-Cache>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="./source/iamground.css">
    </head>
    <body>
        <div class='listForm'>
            <div class='list'>
            <? for($i = 0; $i < count($moLists); $i++) : ?>
                <!-- need to change condition with MO situation -->
                <? if($moLists[$i]->getMoId()%2 === 0) : ?>
                    <form class="mo" method="POST" action="../am/index.php?action=monitoring">
                        <button class="btnMo" style="background-color:green;">
                            <input type="hidden" name="moId" value="<? echo $moLists[$i]->getMoId() ?>"/>
                        </button>
                        <div><? echo $moLists[$i]->getMoId() ?></div>
                        <!-- need to change condition with MO situation -->
                        <div>waiting</div>
                    </form>
                <? else: ?>
                    <form class="mo" method="POST" action="../am/index.php?action=monitoring">
                        <button class="btnMo" style="background-color:red;">
                            <input type="hidden" name="moId" value="<? echo $moLists[$i]->getMoId() ?>"/>
                        </button>
                        <div><? echo $moLists[$i]->getMoId() ?></div>
                        <!-- need to change condition with MO situation -->
                        <div>working</div>
                    </form>
                <? endif; ?>
            <? endfor; ?>
            </div>
        </div>
    </body>
</html>
