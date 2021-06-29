<!DOCTYPE html>
<html>
<?php
header("Cache-Control: no cache");
?>
  <head>
    <meta charset="utf-8">
    <title>Manager</title>
    <link rel="stylesheet" href="./source/iamground.css">
  </head>
  <body>
    <div class='container'>
      <h3>회원 관리</h3>
      <form method="POST" action="../am/index.php?action=userInfo">
        <table class="manageTable">
          <tr><td>User Id</td></tr>
        <tr>          
          <td><input type="text" name="userId"/></td>
        </tr>
        <tr>
          <td><input type="submit" class="btnManage" value ="Search"/></td>
        </tr>
        </table>
      </form>     
      <form method="POST" action="./index.php?action=joinForm">
        <table class="manageTable">
        <tr>
          <td><input type="submit" class="btnManage" value ="User 추가"/> </td>
        </tr>
        </table>
      </form>
    </div>
  </body>
</html>
