<?php
    class ProductModel{
        public $connect;
        public function __construct()
        {
            $this->connect=new BaseModel();
        }
        public function getAll(){
            // return [
            //     'id'=>12,
            //     'name'=>'iphone',
            // ];
        }
        // public function findById($id,$idColor,$idSize){
        //     $sql='SELECT p.id,ct.idColor, ct.idSize, c.color, s.size, p.name, ct.price, ct.soluongton, ct.image, ct.giamgia FROM product p JOIN ctproduct ct ON p.id = ct.idproduct JOIN color c ON c.id = ct.idcolor JOIN size s ON s.id = ct.idsize WHERE p.id = ".$id." and c.id=".$idColor." and s.id=".$idSize.";';
        //     $product=$this->connect->getAllSql($sql);
        //     return $product;
        // }
        public function findById($id, $idColor, $idSize) {
            try {
                $sql = 'SELECT p.id, ct.idColor, ct.idSize, c.color, s.size, p.name, ct.price, ct.soluongton, ct.image, ct.giamgia
                        FROM product p
                        JOIN ctproduct ct ON p.id = ct.idproduct
                        JOIN color c ON c.id = ct.idcolor
                        JOIN size s ON s.id = ct.idsize
                        WHERE p.id = :id AND c.id = :idColor AND s.id = :idSize';
        
                $stmt = $this->connect->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->bindParam(':idColor', $idColor, PDO::PARAM_INT);
                $stmt->bindParam(':idSize', $idSize, PDO::PARAM_INT);
        
                $stmt->execute();
                $productDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
                return $productDetails;
            } catch (PDOException $e) {
                die("Query failed: " . $e->getMessage());
            }
        }
        public function phiShip($total)
        {
            $str = 0;
            if ($total > 1000000) {
                $str = 0;
            } else {
                $str = 30000;
            }
            return $str;
        }
        function convertMoney($money){
            return number_format($money, 0, ',', '.');
        }
        public function total($carts)
        {
            $sum=0;
            if (is_array($carts) && !empty($carts)) {
                foreach ($carts as $key => $product) {
                    $qty = isset($product['qty']) ? $product['qty'] : '';
                    $ma = isset($product['ma']) ? $product['ma'] : '';
                    $price = $product[0]['price'] * (1 - $product[0]['giamgia'] / 100);
                    $total = $qty * $price;
                    $sum+=$total;
                }
                return $sum;
            }
        }
        public function tinhGiamByVoucher($total, $voucher = 0) {
            return $total * ($voucher / 100);
        }
        public function tinhBill($total,$phiShip=0,$phiGiamVoucher=0){
            return $total-$phiShip-$phiGiamVoucher;
        }
        
    }
?>