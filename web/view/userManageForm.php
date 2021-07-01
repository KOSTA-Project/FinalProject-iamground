<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Manager</title>
    <link rel="stylesheet" href="./source/iamground.css">
    <?php
        $userDTO= $this->responseData;
    ?>

    </head>
    <body>
        <div class ="container">
            <h3>사용자 관리</h3>
            <h4> 모든 사용자 아이디</h4>
            <? for($i = 0; $i < count($userDTO); $i++) :?>
                <div><?php echo $i+1,"."?> <?php if($userDTO[$i]->getUserType()=='2') $i+=1; ?> <?php echo $userDTO[$i]->getUserId();?></div>
            <? endfor; ?>
            <form method="POST" action="../am/index.php?action=userInfo">
                <h4>조회 및 수정</h4>
                    <div>아이디 : <input type="text" name="userId" autocomplete="off"/></div>
                    <input type="submit" class="btnManage" value ="검색"/>
                </form>
            <form method="POST" action="../am/index.php?action=manager">
                <input type="submit" class="btnManage" value ="돌아가기"/>
            </form>
        </div>
</body>
</html>
