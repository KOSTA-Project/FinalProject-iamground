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
      <form method="POST" action="./index.php?action=userManage">
        <input type="submit" class="btnManage" value ="사용자 관리"/>
      </form>
      <form method="POST" action="./index.php?action=joinForm">
        <input type="submit" class="btnManage" value ="사용자 추가"/> </td>
      </form>
    </div>
  </body>
</html>
