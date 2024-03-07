<?php
    require_once 'BaseModel.php';
    class RegisterModel extends BaseModel{
        public $connect;
        public function __construct()
        {
            $this->connect=new BaseModel();
        }
        public function insertKH($username, $password, $name, $diachi,$email,$phone)
        {
            $saltF="G15";
            $saltL="F12";
            $password=md5($saltF.$password.$saltL);
            $table = 'khachhang';
            $data = [
                "makh"=>null,
                'username' => $username,
                'matkhau' => $password,
                'tenkh' => $name,
                'diachi' => $diachi,
                'email'=>$email,
                'phone'=>$phone,
            ];
            $sql='select * from khachhang k where k.username="'.$username.'" or k.email="'.$email.'" ';
            $result=$this->connect->getAllSql($sql);
            if($result){
                return false;
            }
            // Gọi phương thức insertData từ BaseModel
            return $this->connect->insertData($table, $data);
        }
        public function checkKH($username,$password){
            $saltF="G15";
            $saltL="F12";
            $password=md5($saltF.$password.$saltL);
            $sql='select * from khachhang k where k.username="'.$username.'" and k.matkhau="'.$password.'" ';
            $result=$this->connect->getAllSql($sql);
            var_dump($result);
            $count = count($result);
            if($count>0){
                if($result[0]['role']==1){
                    return 2;
                }else{
                    return 1;
                }
            }else{
                return 0;

            }
        }
        public function updateMK($username,$password){
            $saltF="G15";
            $saltL="F12";
            $password=md5($saltF.$password.$saltL);
            $table='khachhang';
            $dataUpdates=['matkhau'=>$password];
            $condition = 'username = :username';
            $params = [':username' => $username];
            $result=$this->connect->updateData($table,$dataUpdates,$condition,$params);
            if($result){
                return true;
            }else{
                return false;
            }
        } public function checkEmail($email){
            $sql='select * from khachhang k where k.email="'.$email.'"';
            $result=$this->connect->getAllSql($sql);
            var_dump($result);
            $count = count($result);
            if($count>0){
                return true;
            }else{
                return false;
            }
        }
        public function updatePassByMail($email,$password){
            $saltF="G15";
            $saltL="F12";
            $password=md5($saltF.$password.$saltL);
            $table='khachhang';
            $dataUpdates=['matkhau'=>$password];
            $condition = 'email = :email';
            $params = [':email' => $email];
            $result=$this->connect->updateData($table,$dataUpdates,$condition,$params);
            if($result){
                return true;
            }else{
                return false;
            }
        }
    }
?>