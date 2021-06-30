<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Manager</title>
    <link rel="stylesheet" href="./source/iamground.css">
    <?php
        echo "<script> console.log('edit form'); </script>";
        $dtoArr= $this->responseData;
        //var_dump($dtoArr);        
    ?>
   
    </head>
    <body>
        <div class='container'>
            <div>
                <h3>회원 관리</h3>
                <form method="POST" action="../am/index.php?action=updateUser">
                    <input type="hidden" name="userId" value="<?php echo $dtoArr[0]->getUserId();?>"/>
                    <table class="editTable">
                        <tr>
                            <td>User ID :</td>
                            <td><?php echo $dtoArr[0]->getUserId();?></td>
                        </tr>
                        <tr>
                            <td>User PWD :</td>
                            <td><input type="text" name="userPw" value="<?php echo $dtoArr[0]->getUserPw();?>"></td>
                            <td id="pwChanged"></td>
                        </tr>
                        <tr>
                            <td>User Type :</td>
                            <td><input type="text" name="userType"  value="<?php echo $dtoArr[0]->getUserType();?>"></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value ="정보수정"/></td>
                        </tr>
                    </table>
                </form>
                    <form method="POST" action="../am/index.php?action=addMapForm">
                        <input type="hidden" name="userId" value="<?php echo $dtoArr[0]->getUserId();?>"/>
                        <input type="submit" value="+">
                    </form>

                    <? for($i = 0; $i < count($dtoArr[1]); $i++) : ?>
                    <table class="editTable">
                        <tr>
                            <td><?php echo $dtoArr[1][$i]->getMapId();?></td>
                            <td>
                                <form method="POST" action="../am/index.php?action=updateMap">
                                <input type="hidden" name="userId"  value="<?php echo $dtoArr[0]->getUserId();?>">
                                <input type="hidden" name="mapId" value="<?php echo $dtoArr[1][$i]->getMapId();?>"/>
                                <input type="text" name="mapLocation"  value="<?php echo $dtoArr[1][$i]->getMapLocation();?>">
                                <input type="submit" value="alt">
                                </form>
                            </td>
                            <td>
                                <form method="POST" action="../am/index.php?action=deleteMap">
                                    <input type="hidden" name="userId" value="<?php echo $dtoArr[0]->getUserId();?>"/>
                                    <input type="hidden" name="mapId" value="<?php echo $dtoArr[1][$i]->getMapId();?>"/>
                                    <input type="submit" value="-">
                                </form>
                            <td>                            
                            <td>
                                <form method="POST" action="../am/index.php?action=addMoForm">
                                    <input type="hidden" name="userId" value="<?php echo $dtoArr[0]->getUserId();?>"/>
                                    <input type="hidden" name="mapId" value="<?php echo $dtoArr[1][$i]->getMapId();?>"/>
                                    <input type="submit" value="+">
                                </form>
                            <td>
                        </tr>
                        
 				            <? for($j = 0; $j < count($dtoArr[2][$i]); $j++) : ?>
                                 <tr>
                                 <td><?php echo $dtoArr[2][$i][$j]->getMoId();?></td>
                                <td>
                                    <form method="POST" action="../am/index.php?action=updateMo">
                                    <input type="hidden" name="userId"  value="<?php echo $dtoArr[0]->getUserId();?>">
                                    <input type="hidden" name="moId" value="<?php echo $dtoArr[2][$i][$j]->getMoId();?>"/>
                                    <input type="text" name="moType"  value="<?php echo $dtoArr[2][$i][$j]->getMoType();?>">
                                    <input type="submit" value="alt">
                                </form>
                                </td>
                                <td>
                                    <form method="POST" action="../am/index.php?action=deleteMo">
                                        <input type="hidden" name="userId" value="<?php echo $dtoArr[0]->getUserId();?>"/>
                                        <input type="hidden" name="moId" value="<?php echo $dtoArr[2][$i][$j]->getMoId();?>"/>
                                        <input type="submit" value="-">
                                    </form>
                                </td>
                            	</tr>
                           	<? endfor; ?>	
                            </tr>
                       	   
                        
                    </table>
                    <? endfor; ?>
                    
                  
		        <form method="POST" action="../am/index.php?action=deleteUser">
                        <input type="hidden" name="userId"  value="<?php echo $dtoArr[0]->getUserId();?>"></td>
		            <input type="submit" value ="회원 삭제"/>
		        </form>
                        <form method="POST" action="../am/index.php?action=manager">
                            <input type="submit" value ="돌아가기"/>
                        </form>
            </div>
        </div>
</body>
</html>
