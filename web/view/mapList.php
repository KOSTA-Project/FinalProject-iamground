<?php
    srand((double)microtime()*1000000);
    header("Cache-Control: no cache");
?>
<!DOCTYPE html>
<html>
  <head>
    <META http-equiv=Expires content=-1>
    <META http-equiv=Pragma content=no-cache>
    <META http-equiv=Cache-Control content=No-Cache>
    <meta charset="utf-8">
    <title>mapList</title>
    <link rel="stylesheet" href="./source/iamground.css">
    <script src="./source/iamground.js"></script>
	<?php
    	if(session_status() != PHP_SESSION_ACTIVE){
       	 session_start();
        // header(Pragma: no-cache);
        // header(Cache-Control: no-cache,must-revalidate);
   	    }
  	    if(isset($_SESSION['userId'])){
     	    if($this->action=='login'){
       	        print "<script>alert('".$this->data."');</script>";
      	    }
     	    print $_SESSION['userId']." 님 반갑습니다.<br>";
   	    } else {
   	        header("Location:view/loginForm.php");
   	    }
        $mapLists = $this->responseData;
        //var_dump($mapLists);
	?>
    
    </head>
    <body>
	<form method="POST" action="../am/index.php?action=logout">
    	<input type="submit" value="로그아웃"/>
  	</form>
        <div class='listForm'>

            <div class='list'>
            
            <? for($i = 0; $i < count($mapLists); $i++) : ?>
                <button class='map' style="background-image: url('./source/image/<?=rand(1, 3)?>.jpg')" onclick="getMoList('<? echo $mapLists[$i]->getMapId() ?>', <? echo $i?>)">
                    <div class='location'><? echo $mapLists[$i]->getMapLocation(); ?></div>
                    <div class='mapId'>map id : <? echo $mapLists[$i]->getMapId(); ?></div> 
                </button>
                <div id="moList<?echo $i?>">
                
                </div>
                                
            <? endfor; ?>

            </div>
        </div>
        
</body>
</html>
 
