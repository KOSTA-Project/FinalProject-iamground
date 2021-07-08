<!--사용자 로그인 페이지 입니다.-->
<?php
    if($_SERVER['REQUEST_METHOD']=='POST' && $this->action=='login'){
        print "<script>alert('".$this->data."');</script>";
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>iamgorund</title>
    <link rel="stylesheet" href="./source/iamground.css">
  </head>
  <body>
  <div class='container'>
    <h1 class='logo'><span class='logoI'>I</span><span class='logoAM'>AM</span><span class='logoGround'>Ground</span></h1>
    <form method="post" action="./index.php?action=login">
      <table class="iamgroundTable">
        <tr>
          <td>아이디 :</td>
          <td><input type="text" name="userId" autocomplete="off" /></td>
          <td rowspan=2><input class="btnLogin" type="submit" value="sign in"/></td>
        </tr>
        <tr>
          <td>비밀번호 : </td>
          <td><input type="password" name="userPw" /></td>
        </tr>
      </table>
      </form>
  </div>
  </body>
</html>
