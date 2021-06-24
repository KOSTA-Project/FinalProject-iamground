<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Manager</title>
    <link rel="stylesheet" href="./source/iamground.css">
        <?php

        ?>
    </head>
    <body>
                <div class='container'>
                    <div>
                        <span><? echo '회원 관리 페이지'; ?></span>
                       <form method="POST" action="./index.php?action=joinform">
                           <br> <input type="submit" value ="User 추가"/> <br>
                       </form>

                        <form method="POST" action="../am/index.php?action=moList">
                          <tr>
                              <td>User ID :</td>
                              <td><input type="text" name="uid"/></td>
                          </tr>
                              <input type="submit" value ="User 조회"/>
                        </form>
                    </div>
                 </div>
</body>
</html>
