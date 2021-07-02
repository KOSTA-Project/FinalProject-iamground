<!--관리자 페이지 입니다.--> <!DOCTYPE html> <html> <?php header("Cache-Control: no cache"); ?>
  <head>
    <meta charset="utf-8">
    <title>Manager</title>
    <link rel="stylesheet" href="./source/iamground.css">
  </head>
  <body>
    <h3>관리자 페이지</h3>
    <div class='container'>
      <h3>회원 관리</h3>
      <table class="iamgroundTable">
        <tr>
          <td>
            <form method="POST" action="./index.php?action=userManage">
              <input type="submit" class="btnManage width200px" value ="사용자 관리"/>
            </form>
          </td>
        </tr>
        <tr>
          <td>
            <form method="POST" action="./index.php?action=joinForm">
              <input type="submit" class="btnManage width200px" value ="사용자 추가"/> </td>
            </form>
          </td>
        </tr>
        <tr>
          <td>
            <form method="POST" action="./index.php?action=logout">
              <input type="submit" class="btnManage width200px" value ="관리자 로그아웃"/> </td>
            </form>
          </td>
        </tr>
      </table>
    </div>
  </body>
</html>
