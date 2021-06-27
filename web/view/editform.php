<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Manager</title>
    <link rel="stylesheet" href="./source/iamground.css">
        <?php
            echo "<script> console.log('edit form'); </script>";
            $userDTO = $this->responseData;
        ?>
    </head>
    <body>
                <div class='container'>
                    <div>
                        <span><? echo '회원 관리'; ?></span>
                        <form method="POST" action="../am/index.php?action=edit">
                          <tr>
                              <br><td>User ID :</td>
                              <td><input type="text" name="Uuid"  value="<?php echo $userDTO->getUserId();?>"></td>
                          </tr>
                          <tr>
                              <br><td>User PWD :</td>
                              <td><input type="text" name="Upwd"  value="<?php echo $userDTO->getUserPw();?>"></td>
                          </tr>
                          <tr>
                              <br>User Type :</td>
                              <td><input type="text" name="Utype"  value="<?php echo $userDTO->getUserType();?>"></td>
                          </tr>
                              <br><input type="submit" value ="정보수정"/>
                        </form>
		<form method="POST" action="../am/index.php?action=delete">
            <input type="hidden" name="Duid"  value="<?php echo $userDTO->getUserId();?>"></td>
		      <input type="submit" value ="회원 삭제"/>
		</form>
                    </div>
                 </div>
</body>
</html>
