<?php
    require_once 'BaseModel.php';
    class ShopModel extends BaseModel{
        public $connect;
        public function __construct()
        {
            $this->connect=new BaseModel();
        }
        public function getAllProduct() {
            $sql='SELECT DISTINCT p.id, ct.idColor,ct.idSize, p.name, ct.image, ct.price, ct.giamgia FROM product p JOIN ctproduct ct ON p.id = ct.idproduct GROUP BY p.id, p.name, ct.image ORDER BY p.id DESC';
            $product=$this->connect->getAllSql($sql);
            return $product;
        }
        public function getCountAllProduct(){
            $sql='SELECT DISTINCT p.id, ct.idColor,ct.idSize, p.name, ct.image, ct.price, ct.giamgia FROM product p JOIN ctproduct ct ON p.id = ct.idproduct GROUP BY p.id, p.name, ct.image ORDER BY p.id DESC';
            $count=$this->connect->getCount($sql);
            return $count;
        }
        public function getAllProductedPage($start,$limit){
            $sql = 'SELECT DISTINCT p.id,ct.idColor,ct.idSize, p.name, ct.image, ct.price, ct.giamgia FROM product p JOIN ctproduct ct ON p.id = ct.idproduct GROUP BY p.id, p.name, ct.image ORDER BY p.id DESC LIMIT ' . $start . ', ' . $limit;
            $products = $this->connect->getAllSql($sql);
            return $products;
        }
        public function show($idCatalog,$start=0,$limit=20){
            if($idCatalog==null){
                return null;
            }
            $sql='SELECT DISTINCT p.id,ct.idColor,ct.idSize, p.name, ct.image, ct.price, ct.giamgia FROM product p JOIN ctproduct ct ON p.id = ct.idproduct and p.id_category Join category c on c.id=p.id_category WHERE c.id=:id GROUP BY p.id, p.name, ct.image ORDER BY p.id DESC LIMIT ' . $start . ', ' . $limit;
            $product=$this->connect->getFindAll($sql,$idCatalog);
            return $product;
        }
        public function showByIdColor($id,$start=0,$limit=20){
            if($id==null){
                return null;
            }
            $sql='SELECT p.id, ct.idColor,ct.idSize, p.name, ct.image, ct.price, ct.giamgia FROM color c JOIN ctproduct ct ON c.id = ct.idcolor JOIN product p ON p.id = ct.idproduct WHERE c.id=:id GROUP by p.id LIMIT ' . $start . ', ' . $limit;
            $product=$this->connect->getFindAll($sql,$id);
            return $product;
        }
        public function showByIdSize($id,$start=0,$limit=20){
            if($id==null){
                return null;
            }
            $sql='SELECT p.id, ct.idColor, ct.idSize, p.name, ct.image, ct.price, ct.giamgia FROM size s JOIN ctproduct ct ON s.id=ct.idSize JOIN product p ON p.id = ct.idproduct WHERE s.id=:id GROUP BY p.id LIMIT ' . $start . ', ' . $limit;
            $product=$this->connect->getFindAll($sql,$id);
            return $product;
        }
        // show idColor SELECT * FROM color c JOIN ctproduct ct ON c.id = ct.idcolor JOIN product p ON p.id = ct.idproduct WHERE c.id=1 GROUP by ct.idproduct;
        // show idSize SELECT p.id, p.name, ct.image, ct.price, ct.giamgia FROM size s JOIN ctproduct ct ON ct.idsize = s.id JOIN product p ON p.id = ct.idproduct WHERE s.id=1 GROUP BY p.id;
        public function getAllColor(){
            $sql='SELECT * FROM `color`;';
            $colors=$this->connect->getAllSql($sql);
            return $colors;
        }
        public function getCountColor(){
            $sql='SELECT c.id,c.color as name, COUNT(*) AS total FROM color c JOIN ctproduct ct ON ct.idcolor = c.id JOIN product p ON p.id = ct.idproduct JOIN category ca ON ca.id = p.id_category GROUP BY c.color ORDER by c.id asc;';
            $countColor=$this->connect->getAllSql($sql);
            return $countColor;
        }
        public function getCountSize(){
            $sql='SELECT s.id,s.size as name, COUNT(*) AS total FROM size s JOIN ctproduct ct ON ct.idsize = s.id JOIN product p ON p.id = ct.idproduct JOIN category ca ON ca.id = p.id_category GROUP BY s.size ORDER by s.id asc;';
            $countSize=$this->connect->getAllSql($sql);
            return $countSize;
        }
        
    }
?>