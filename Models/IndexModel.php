<?php
    require_once 'BaseModel.php';

    class IndexModel{
        const TABLE='img_slider';
        public $connect;
        public function __construct()
        {
            $this->connect=new BaseModel();
        }
        public function getAll(){
           $img_slider=$this->connect->getAll(self::TABLE);
           return $img_slider;
        }
        public function getAllCategory(){
            $category=$this->connect->getAll('category');
            return $category;
         }
        public function getAllProductNew() {
            $sql='SELECT DISTINCT p.id, p.name, ct.image, ct.price, ct.giamgia, ct.idColor, ct.idSize FROM product p JOIN ctproduct ct ON p.id = ct.idproduct GROUP BY p.id, p.name, ct.image LIMIT 0, 4;';
            $productNew=$this->connect->getAllSql($sql);
            return $productNew;
        }
        public function getAllProductHot() {
            $sql='SELECT distinct p.id, p.name, ct.image, ct.price, ct.giamgia, ct.idColor, ct.idSize FROM product p JOIN ctproduct ct ON p.id = ct.idproduct where ct.soluongton<=10 GROUP BY p.id, p.name, ct.image;';
            $productHot=$this->connect->getAllSql($sql);
            return $productHot;
        }
        public function getAllProductAodai(){
            $sql='SELECT p.id, ct.idColor, ct.idSize, p.name, MAX(ct.price) AS price , MAX(ct.image) AS image, MAX(ct.giamgia) AS giamgia FROM category c JOIN product p ON c.id = p.id_category JOIN ctproduct ct ON p.id = ct.idproduct WHERE c.id = 7 GROUP BY p.id, p.name;';
            $productAodai=$this->connect->getAllSql($sql);
            return $productAodai;
        }
        public function findById($id){
            return [
                'id'=>12,
                'name'=>'iphone',
            ];
        }
        public function getInfo($username){
            $sql = 'SELECT tenkh, diachi, phone, avatar from khachhang where username=:username';

            $stmt = $this->connect->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        public function updateUser($tenkh, $phone, $diachi, $username,$image){
            $table = 'khachhang';
            $data = [
                'tenkh' => $tenkh,
                'phone' => $phone,
                'diachi' => $diachi,
                'avatar'=>$image
            ];
            $condition = 'username = :username';
            $params = [':username' => $username]; 
            $updated = $this->connect->updateData($table, $data, $condition, $params);
            return $updated;    
        }
    }
?>