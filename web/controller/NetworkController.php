<?php    
    if(isset($_POST["direction"])){
        sendKeyToMO();
    }

    // socket connect and send key word which get from controlByWSAD.js
    function sendKeyToMO(){
        $output = $_POST["direction"];
        $address = $_POST["address"];     // hard coding need to change
        echo $address;
        $port = 9001;
        try{   
            //echo $output;            
            $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
            if($socket === false){
                echo "socket_create() failed: reason: ".socket_strerror(socket_last_error())."\n";
            }
            
            // try connect to raspberry pi server
            $result = socket_connect($socket, $address, $port);
            
            if($result === false){
                echo "socket_connect() failed.\nReason: ($result) ". socket_strerror(socket_last_error($socket))."\n";
            }
            // delay 0.5 seconds
            usleep(5000);   
            // send message                 
            socket_write($socket, $output, strlen($output));    
            echo $output;    
        }finally{
            socket_close($socket);                
        }
    }
?>
