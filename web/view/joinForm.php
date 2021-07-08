<!--사용자를 추가합니다.-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Manager</title>
    <link rel="stylesheet" href="./source/iamground.css">
    </head>
    <body>
        <div class='container'>
            <div>
                <h3>회원 생성</h3>
                 <form method="POST" action="./index.php?action=join">
    		<table class="iamgroundTable">
        	<tr>
            		<td class="alineRight">아이디:</td>
            		<td><input type="text" name="userId" autocomplete="off"/></td>
       		 </tr>
        	<tr>
            		<td class="alineRight">비밀번호:</td>
            		<td><input type="text" name="userPw" autocomplete="off"/></td>
        	</tr>
        	<tr>
            		<td class="alineRight">권한:</td>
            		<td><input type="text" name="userType" autocomplete="off"/></td>
        	</tr>
        	<tr>
            		<td colspan="2" class="alineCenter"><input class="btnManage width200px" type="submit" value="추가" autocomplete="off"/></td>
        	</tr>
                    </table>
                </form>
	            <form method="POST" action="../am/index.php?action=manager">
                    <input type="submit" class="btnManage" value ="돌아가기"/>
                </form>
           </div>
         </div>
    </body>
</html>
