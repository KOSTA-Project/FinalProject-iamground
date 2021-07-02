<!--오브젝트를 모니터링하고 컨트롤 합니다.-->
<?php
    $dtoArr = $this->responseData;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./source/iamground.css">
    <script src="./source/controlByWSAD.js"></script>
    <script type="text/javascript" src="http://static.robotwebtools.org/EaselJS/current/easeljs.min.js"></script>
    <script type="text/javascript" src="http://static.robotwebtools.org/EventEmitter2/current/eventemitter2.min.js"></script>
    <script type="text/javascript" src="http://static.robotwebtools.org/roslibjs/current/roslib.min.js"></script>
    <script type="text/javascript" src="http://static.robotwebtools.org/ros2djs/current/ros2d.min.js"></script>
    <script type="text/javascript" src="http://static.robotwebtools.org/nav2djs/current/nav2d.min.js"></script>
    
    <script type="text/javascript">
    /**
     * Setup all GUI elements when the page is loaded
     */
    function init(){
        // Connect to ROS.
        // create a Ros node object to communicate with a rosbridge v2.0 server.
        var ros = new ROSLIB.Ros({
            url : 'ws://192.168.0.16:9090'
        });

        // create the main viewer.
        // create a 2D viewer for th navigation widget.
        // provide the dimensions as well as the HTML div where the viewer will be placed.
        var viewer = new ROS2D.Viewer({
            divID : 'nav',
            width : 750,
            height : 800
        });
        
        // Setup the nav client.
        // create the actual OccupancyGridClientNav object.
        // provide the Ros node object created above,
        // the viewer to render to, and the name of the action server to send navigation commands to.
        var nav = NAV2D.OccupancyGridClientNav({
            ros : ros,
            rootObject : viewer.scene,
            viewer : viewer,
            serverName : '/pr2_move_base'
        });
    }
    </script>
</head>
<body>
    <div class="listForm">
        <table>
            <tr>
                <td><? echo $dtoArr[0]->getMapId();?></td>
                <td><? echo $dtoArr[0]->getUserId();?></td>
                <td><? echo $dtoArr[0]->getMapLocation();?></td>
                <td><? echo $dtoArr[1]->getMoId();?></td>
                <td><? echo $dtoArr[1]->getMoType();?></td>
		        <td><? echo $dtoArr[1]->getMoStatus();?></td>
            <tr>
        </table>
        <div id="navi1">
            <div id="blackbox">
                <img src="http://192.168.0.21:8090/?action=stream">
                <div class="directionBtns">
                    <button type="button" class="btnForward" id="w" onmousedown="sendKeyByMouse(this.id)" onmouseup="sendXByMouse(this.id)">forward</button>
                    <button type="button" class="btnLeft" id="a" onmousedown="sendKeyByMouse(this.id)" onmouseup="sendXByMouse(this.id)">left</button>
                    <button type="button" class="btnRight" id="d" onmousedown="sendKeyByMouse(this.id)" onmouseup="sendXByMouse(this.id)">right</button>
                    <button type="button" class="btnBackward" id="s" onmousedown="sendKeyByMouse(this.id)" onmouseup="sendXByMouse(this.id)">backward</button>
                </div>
                <p id="log"> test </p>
            </div>
        </div>
        <div id="nav"></div>
    </div>
</body>
</html>
