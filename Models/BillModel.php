<?php
    class BillModel{
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
        public function getHoaDon($id){
            $sql='SELECT * FROM hoadon h  WHERE h.id = :id';
            $findProduct=$this->connect->getFind($sql,$id);
            return $findProduct;
        }
        public function getHoTen($makh){
            $sql = 'SELECT * FROM khachhang k WHERE k.makh = :makh';
            $stmt = $this->connect->prepare($sql);
            $stmt->bindParam(':makh', $makh, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        public function getCtHoaDon($masohd){
            $sql = 'SELECT * FROM cthoadon ct JOIN ctproduct c ON ct.idProduct = c.idproduct JOIN product p ON c.idproduct = p.id join color cl on cl.id=c.idcolor
            join size s on s.id=c.idsize WHERE ct.masohd = :masohd GROUP by ct.idProduct;';
            $stmt = $this->connect->prepare($sql);
            $stmt->bindParam(':masohd', $masohd, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>