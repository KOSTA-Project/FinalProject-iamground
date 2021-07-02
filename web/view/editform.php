<!--사용자의 정보를 보여주고 추가,수정,삭제 합니다.-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Manager</title>
    <link rel="stylesheet" href="./source/iamground.css">
    <?php
        $dtoArr= $this->responseData;
    ?>

    </head>
    <body>
        <div class='container list'>
            <h3>회원 관리</h3>
            <h4>사용자 정보</h4>
            <table class="iamgroundTable width600px alineLeft">
                <form method="POST" class="displayInlineBlock" action="../am/index.php?action=updateUser">
                    <input type="hidden" name="userId" value="<?php echo $dtoArr[0]->getUserId();?>"/>
                    <tr>
                        <td>아이디:</td><td><?php echo $dtoArr[0]->getUserId();?></td>
                    </tr>
                    <tr>
                        <td>비밀번호:</td><td><input type="text" name="userPw" value="<?php echo $dtoArr[0]->getUserPw();?>"></td>
                    </tr>
                    <tr>
                        <td>권한:</td><td><input type="text" name="userType"  value="<?php echo $dtoArr[0]->getUserType();?>"></td>
                    </tr>
                    <tr>
                        <td class="alineRight" colspan="2">
                            <input type="submit" class="btnManage" value ="정보수정"/>
                </form>
                <form class="displayInlineBlock" method="POST" action="../am/index.php?action=deleteUser">
                            <input type="hidden" name="userId"  value="<?php echo $dtoArr[0]->getUserId();?>">
                            <input type="submit" class="btnManage" value ="회원 삭제"/>
                        </td>
                    </tr>
                </form>
            </table>


                <? for($i = 0; $i < count($dtoArr[1]); $i++) : ?>
                    <table class="iamgroundTable width600px alineLeft">
                        <tr>
                            <td>
                                <form class="displayInlineBlock" method="POST" action="../am/index.php?action=updateMap">
                                    <input type="hidden" name="userId"  value="<?php echo $dtoArr[0]->getUserId();?>">
                                    <input type="hidden" name="mapId" value="<?php echo $dtoArr[1][$i]->getMapId();?>"/>
                                    <input type="text" class="mapLocationText" name="mapLocation"  value="<?php echo $dtoArr[1][$i]->getMapLocation();?>">
                                    <input type="submit" class="btnManage" value="수정">
                                </form>
                                <form class="displayInlineBlock" method="POST" action="../am/index.php?action=deleteMap">
                                    <input type="hidden" name="userId" value="<?php echo $dtoArr[0]->getUserId();?>"/>
                                    <input type="hidden" name="mapId" value="<?php echo $dtoArr[1][$i]->getMapId();?>"/>
                                    <input type="submit" class="btnManage" value="삭제">
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>번호 : <?php echo $dtoArr[1][$i]->getMapId();?></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <form class="displayInlineBlock" method="POST" action="../am/index.php?action=addMoForm">
                                    <input type="hidden" name="userId" value="<?php echo $dtoArr[0]->getUserId();?>"/>
                                    <input type="hidden" name="mapId" value="<?php echo $dtoArr[1][$i]->getMapId();?>"/>
                                    <input type="submit" class="btnManage" value="오브젝트 추가">
                                </form>
                            </td>
                        </tr>
                    </table>
                    <table class="iamgroundTable width600px alineLeft">
                        <? for($j = 0; $j < count($dtoArr[2][$i]); $j++) : ?>
                            <tr>
                                                <td><h3><?php echo $j+1 ,"번 "?>오브젝트 정보</h3></td>
                            </tr>
                            <tr>
                                <td>번호 : <?php echo $dtoArr[2][$i][$j]->getMoId();?></td>
                            </tr>
                            <tr>
                                <form class="displayInlineBlock" method="POST" action="../am/index.php?action=updateMo">
                                    <input type="hidden" name="userId"  value="<?php echo $dtoArr[0]->getUserId();?>">
                                    <input type="hidden" name="moId" value="<?php echo $dtoArr[2][$i][$j]->getMoId();?>"/>
                                    <td>유형 : </td><td><input type="text" name="moType"  value="<?php echo $dtoArr[2][$i][$j]->getMoType();?>"></td>
                            </tr>
                            <tr>
                                       <td>상태 : </td><td><input type="text" name="moStatus"  value="<?php echo $dtoArr[2][$i][$j]->getMoStatus();?>"></td>
                            </tr>
                            <tr>
                                            <td>IP : </td><td><input type="text" name="moIp"  value="<?php echo $dtoArr[2][$i][$j]->getMoIp();?>"></td>
                            </tr>

                            <tr>
                                <td class="alineRight" colspan="2">
                                    <input type="submit" class="btnManage" value="수정">
                                </form>
                                <form class="displayInlineBlock" method="POST" action="../am/index.php?action=deleteMo">
                                    <input type="hidden" name="userId" value="<?php echo $dtoArr[0]->getUserId();?>"/>
                                    <input type="hidden" name="moId" value="<?php echo $dtoArr[2][$i][$j]->getMoId();?>"/>
                                    <input type="submit" class="btnManage" value="삭제">
                                </form>
                                </td>
                            </tr>
                        <? endfor; ?>
                    </table>
                <? endfor; ?>
                <table class="iamgroundTable">
                    <tr>
                        <td>
                            <form method="POST" action="../am/index.php?action=addMapForm">
                                <input type="hidden" name="userId" value="<?php echo $dtoArr[0]->getUserId();?>"/>
                                <input type="submit" class="btnManage width200px" value="맵 추가">
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form method="POST" action="../am/index.php?action=manager">
                                <input type="submit" class="btnManage width200px" value ="돌아가기"/>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
</body>
</html>
