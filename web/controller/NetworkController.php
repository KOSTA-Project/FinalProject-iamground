<?php
    //direction 정보가 있으면 sendKeyToMO()를 호출한다.
    if(isset($_POST["direction"])){
        sendKeyToMO();
    }

    //controlByWSAD.js에서 전달받은 키워드를 소켓을 통해 전달한다.
    function sendKeyToMO(){
        $output = $_POST["direction"];
        $address = $_POST["address"];
        echo $address;
        $port = 9001;
        try{
            //tcp소켓을 생성한다.
            $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
            if($socket === false){
                echo "socket_create() failed: reason: ".socket_strerror(socket_last_error())."\n";
            }
            // 오브젝트 서버에 접속을 시도한다.
            $result = socket_connect($socket, $address, $port);

            if($result === false){
                echo "socket_connect() failed.\nReason: ($result) ". socket_strerror(socket_last_error($socket))."\n";
            }
            // delay 0.005 seconds
            usleep(5000);
            // 메세지 전송한다.
            socket_write($socket, $output, strlen($output));
            echo $output;
        }finally{
            //소켓을 닫는다.
            socket_close($socket);
        }
    }
?>
