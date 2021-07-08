<!--회원을 관리합니다.-->
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
            <table class="iamgroundTable alineRight">
                <tr>
		            <td>
                        <form method="POST" action="../am/index.php?action=userInfo">
                            <input type="text" name="userId" autocomplete="off"/> 
                            <input type="submit" class="btnManage" value ="검색"/>
                        </form>
                    </td>
                </tr>
            </table>
            <table class="iamgroundTable">
		<h4>모든 사용자 아이디</h4>
		<?php $num=0; ?>
                <? for($i = 0; $i < count($userDTO); $i++) :?>
	           <? if($userDTO[$i]->getUserType()==2) {continue;}?>
                    <tr>
                        <form method="POST" action="../am/index.php?action=userInfo">
                            <input type="hidden" name="userId" value="<?php echo $userDTO[$i]->getUserId();?>"/>
                            <td class="alineLeft"><?php echo ++$num,"."?></td>
                            <td class="alineRight"><?php echo $userDTO[$i]->getUserId();?></td>
                            <td class="alineRight"><input type="submit" class="btnManage" value ="선택"/></td>
                        </form>
                    </tr>
                <? endfor; ?>
            </table>
            <form method="POST" action="../am/index.php?action=manager">
                <input type="submit" class="btnManage width200px" value ="돌아가기"/>
            </form>
        </div>
</body>
</html>
