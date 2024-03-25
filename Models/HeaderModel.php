<?php
    require_once 'BaseModel.php';
    ob_start();
    class HeaderModel{
        const TABLE_1='category';
        const TABLE_2='pages';
        public $connect;
        public function __construct()
        {
            $this->connect=new BaseModel();
        }
        public function getAllCategory(){
           $category=$this->connect->getAll(self::TABLE_1);
           return $category;
        }
        public function getAllPages(){
           $pages=$this->connect->getAll(self::TABLE_2);
           return $pages;
        }
        public function getAllProduct() {
            $sql='SELECT p.id, p.name, ct.image, ct.price, ct.giamgia, ct.idColor, ct.idSize FROM product p JOIN ctproduct ct ON p.id = ct.idproduct group by p.id;';
            $product=$this->connect->getAllSql($sql);
            return $product;
        }
        public function findById($id){
            return [
                'id'=>12,
                'name'=>'iphone',
            ];
        }
        public function getAvatar($username){
            $sql = 'SELECT tenkh, diachi, phone, avatar from khachhang where username=:username';
            $stmt = $this->connect->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>