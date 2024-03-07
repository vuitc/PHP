<?php
    class PaymentModel{
        public $connect;
        public function __construct()
        {
            $this->connect=new BaseModel();
        }
        public function findByUser($username)
        {
            $query = "SELECT k.tenkh, k.email, k.makh, k.diachi, k.phone FROM khachhang k WHERE k.username = :username";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            $isFind = $stmt->fetch(PDO::FETCH_ASSOC);  
            if (!$isFind) {
                return false;
            }
    
            return $isFind;
        }
        public function findByEmail($email)
        {
            $query = "SELECT k.email FROM khachhang k WHERE k.email = :email";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $isFind = $stmt->fetch(PDO::FETCH_ASSOC);  
            if (!$isFind) {
                return false;
            }
    
            return $isFind;
        }
        public function insertHD($makh,$tongtien,$giam,$vanchuyen,$phone,$diachi){
            $table='hoadon';
            $ngaydat = date('Y-m-d H:i:s');
            $data = [
                "id"=>null,
                "makh"=>$makh,
                "ngaydat"=>$ngaydat,
                "tongtien"=>$tongtien,
                "giam"=>$giam,
                'vanchuyen'=>$vanchuyen,
                "phone"=>$phone,
                "diachi"=>$diachi,
            ];
            return $this->connect->insertData($table, $data);
        }
        public function insertCTHD($mahd,$idProduct, $idSize, $idColor, $soluongmua,$thanhtien){
            $table='cthoadon';
            $data=[
                'masohd'=>$mahd,
                'idProduct'=>$idProduct,
                'idSize'=>$idSize,
                'idColor'=>$idColor,
                'soluongmua'=>$soluongmua,
                'thanhtien'=>$thanhtien,	
            ];
            return $this->connect->insertData($table, $data);
        }
        public function insertKH($tenkh,$email,$diachi,$phone){
            $table='khachhang';
            $data=[
                'makh'=>null,
                'tenkh'=>$tenkh,
                'username'=>null,
                'matkhau'=>null,
                'email'=>$email,
                'diachi'=>$diachi,
                'phone'=>$phone,
            ];
            // $sql='select * from khachhang k where k.email="'.$email.'" ';
            // $result=$this->connect->getAllSql($sql);
            // if($result){
            //     return false;
            // }
            return $this->connect->insertData($table, $data);
        }
        public function findIdKH($username) {
            $sql = 'SELECT k.makh,k.email FROM khachhang k WHERE k.username = :username';
            $params = [':username' => $username];   
            $result = $this->connect->getOneSql($sql, $params);
            return $result;
        }
        public function getSoluongTon($idProduct, $idSize, $idColor){
            try {
                $sql = 'SELECT soluongton FROM ctproduct WHERE idproduct = :idProduct AND idsize = :idSize AND idcolor = :idColor';
                $params = [':idProduct' => $idProduct, ':idSize' => $idSize, ':idColor' => $idColor];
                $result = $this->connect->getOneSql($sql, $params);
                return $result['soluongton'] ?? 0; 
            } catch (PDOException $e) {
                die("Thất bại: " . $e->getMessage());
            }
        }
        public function updatedData($idProduct, $idSize, $idColor, $soluongmua){
            try {
                $currentSoluongTon = $this->getSoluongTon($idProduct, $idSize, $idColor);
                $newSoluongTon = max(0, $currentSoluongTon - $soluongmua);
                $table = 'ctproduct';
                $data = ['soluongton' => $newSoluongTon];
                $condition = 'idproduct = :idProduct AND idsize = :idSize AND idcolor = :idColor';
                $params = [':idProduct' => $idProduct, ':idSize' => $idSize, ':idColor' => $idColor];
                
                $updated = $this->connect->updateData($table, $data, $condition, $params); 
                return $updated;
            } catch (PDOException $e) {
                die("Cập nhật thất bại: " . $e->getMessage());
            }
        }
    }
?>