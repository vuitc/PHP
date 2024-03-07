<?php
    require_once 'BaseModel.php';
    class CartModel extends BaseModel{
        public $connect;
        public function __construct()
        {
            $this->connect=new BaseModel();
        }
        public function findByCode($voucherCode)
        {
            $query = "SELECT * FROM vouchers WHERE code = :code AND trangthai = 1 AND ngayhethan >= CURDATE()";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':code', $voucherCode, PDO::PARAM_STR);
            $stmt->execute();
            $voucherDetails = $stmt->fetch(PDO::FETCH_ASSOC);  
            if (!$voucherDetails) {
                return false;
            }
    
            return $voucherDetails;
        }
    }
?>