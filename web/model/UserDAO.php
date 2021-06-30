
<?php
    //echo "<script> console.log('userdao load'); </script>";
    require_once 'UserDTO.php';
    require_once 'MapDTO.php';
    require_once 'MoDTO.php';
    require_once 'DBConnector.php';
      
    class UserDAO{
        //private static $instance = new UserDAO();
        private static $instance = null;
        private $connection = null;        

        private function __construct(){                        
            $dbConnector = DBConnector::getInstance();                                  
            $this->connection = $dbConnector->getConnection();
            
        }

        public static function getInstance(){
            if(self::$instance == null){
                self::$instance = new self;
            } 
            return self::$instance;
                     
        }        
        
        public function selectById($userId){
            $userDTO = null;
            $sql = "SELECT * FROM user WHERE user_id=?";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param('s', $userId);           
            $stmt->execute();
            $stmt->bind_result($id, $pw, $type);
            if($stmt->fetch()){
                $userDTO = new UserDTO($id, $pw, $type);
            }
            return $userDTO;
        }

        public function mSelectAllByUserId($userId){
            $dtoArr = array();
            $sql = "SELECT u.user_id, u.user_pwd, u.user_type, m.map_id, m.map_location , mo.mo_id , mo.mo_type
         	FROM user u INNER JOIN map m ON m.user_id = u.user_id LEFT OUTER JOIN mobile_object mo ON mo.user_id = u.user_id
         	WHERE u.user_id = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param('s', $userId);
            $stmt->execute();
            $stmt->bind_result($uid,$upwd, $utype, $mid, $mlocation, $moid, $motype);
            while($stmt->fetch()){
                $userDTO = new UserDTO($uid,$upwd,$utype);
                $mapDTO = new MapDTO($mid , null, $mlocation);
                $moDTO = new MoDTO($moid, null, null, $motype);
	            array_push($dtoArr, $userDTO);
                array_push($dtoArr, $mapDTO);
                array_push($dtoArr, $moDTO);
            }
            return $dtoArr;
        }

        public function insertUser($m){
            $sql = "INSERT INTO user VALUES(?,?,?)";
            $stm = $this->connection->prepare($sql);
            $stm->bind_param('sss',$_POST['userId'],$_POST['userPw'],$_POST['userType']);
            $stm->execute();
        }
        
        public function mUpdateUser($userDTO){
            echo "<script> console.log('update start'); </script>";
            $sql = "update user set  user_pwd=?, user_type=? where user_id=?";		
            $stm = $this->connection->prepare ($sql);
            $stm->bind_param('sss', $userDTO->getUserPw(), $userDTO->getUserType(), $userDTO->getUserId());
            $stm->execute();									
        }
        
        public function mDeleteUser($userId){
            $sql = "delete from user where user_id=?;";
            $stm = $this->connection->prepare ($sql);
            $stm->bind_param ('s',$userId);
            $stm->execute();
        }

    }
?>
