
<?php
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

	//유저아이디로 유저정보를 가져온다.
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

	//모든 유저정보를 가져온다.
     	public function selectAllId(){
            $dtoUser = array();
            $sql = "SELECT * FROM user";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $stmt->bind_result($id, $pw, $type);
            while($stmt->fetch()){
                $userDTO = new UserDTO($id, $pw, $type);
		array_push($dtoUser,$userDTO);
            }
            return $dtoUser;
        }

	//유저정보를 추가한다.
        public function InsertUser($userDTO){
            $sql = "INSERT INTO user VALUES(?,?,?)";
            $stm = $this->connection->prepare($sql);
            $stm->bind_param('sss', $userDTO->getUserId(), $userDTO->getUserPw(), $userDTO->getUserType());
            $stm->execute();
        }

	//유저정보를 수정한다.
        public function mUpdateUser($userDTO){
            echo "<script> console.log('update start'); </script>";
            $sql = "update user set  user_pwd=?, user_type=? where user_id=?";
            $stm = $this->connection->prepare ($sql);
            $stm->bind_param('sss', $userDTO->getUserPw(), $userDTO->getUserType(), $userDTO->getUserId());
            $stm->execute();
        }

	//유저정보를 삭제한다.
        public function mDeleteUser($userId){
            $sql = "delete from user where user_id=?;";
            $stm = $this->connection->prepare ($sql);
            $stm->bind_param ('s',$userId);
            $stm->execute();
        }

    }
?>
