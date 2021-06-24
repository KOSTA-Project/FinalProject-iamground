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
                        <span><? echo '회원 생성'; ?></span>
                        <form method="POST" action="./index.php?action=join"">
                          <tr>
                              <br><td>User ID :</td>
                              <td><input type="text" name="juid"/></td>
                          </tr>
                          <tr>
                              <br><td>User PWD :</td>
                              <td><input type="text" name="jpwd"/></td>
                          </tr>
                          <tr>
                              <br><td>User Type :</td>
                              <td><input type="text" name="jtype"/></td>
                          </tr>
                              <br><input type="submit" value ="확인"/>
                        </form>
                    </div>
                 </div>
</body>
</html>
