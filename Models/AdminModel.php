<?php
     require_once 'BaseModel.php';
    class AdminModel extends BaseModel {
        public function __construct()
        {
            parent::__construct();
        }
    
        public function getAllColors() {
            $sql = 'SELECT * FROM color';
            $colors = $this->getAllSql($sql);
            return $colors;
        }
        public function getAllSizes() {
            $sql = 'SELECT * FROM size';
            $sizes = $this->getAllSql($sql);
            return $sizes;
        }
        public function getAllSliders() {
            $sql = 'SELECT * FROM img_slider';
            $silders = $this->getAllSql($sql);
            return $silders;
        }
        public function getAllCategories() {
            $sql = 'SELECT * FROM category';
            $categories = $this->getAllSql($sql);
            return $categories;
        }
        public function getAllKhachHangs() {
            $sql = 'SELECT * FROM khachhang';
            $khachhangs = $this->getAllSql($sql);
            return $khachhangs;
        }
        public function getAllProducts() {
            $sql = 'SELECT * FROM product';
            $khachhangs = $this->getAllSql($sql);
            return $khachhangs;
        }
        public function getAllBinhLuans() {
            $sql = 'SELECT * FROM binhluan';
            $binhluans = $this->getAllSql($sql);
            return $binhluans;
        }
        public function getAllVouchers() {
            $sql = 'SELECT * FROM vouchers';
            $vouchers = $this->getAllSql($sql);
            return $vouchers;
        }
        public function getAllHoaDons() {
            $sql = 'SELECT h.id, h.makh, h.ngaydat, h.tongtien, h.giam, h.vanchuyen, h.phone, h.diachi, k.tenkh FROM hoadon h JOIN khachhang k ON h.makh = k.makh';
            $hoadons = $this->getAllSql($sql);
            return $hoadons;
        }
        public function getAllctps($idp) {
            $sql = 'SELECT * from ctproduct where idproduct='.$idp;
            $ctproducts = $this->getAllSql($sql);
            return $ctproducts;
        }
        public function getAllcthds($id) {
            $sql = "SELECT ct.masohd, ct.idProduct, ct.idSize, ct.idColor, ct.soluongmua, ct.thanhtien, p.name, c.color, s.size 
                    FROM cthoadon ct 
                    JOIN product p ON ct.idProduct = p.id 
                    JOIN color c ON ct.idColor = c.id 
                    JOIN size s ON ct.idSize = s.id
                    WHERE ct.masohd = '$id'";
            $cts = $this->getAllSql($sql);
            return $cts;
        }
        
        public function createColor($color){
            $existingColor = $this->getOneSql("SELECT * FROM color WHERE color = :color", [':color' => $color]);
            if (!$existingColor) {
                $data = [
                    "id"=>null,
                    'color'=>$color,
                ];
                $this->insertData('color', $data);
                return true;
            } else {
                return false;
            }
        }
        public function createSize($size){
            $existing = $this->getOneSql("SELECT * FROM size WHERE size = :size", [':size' => $size]);
            if (!$existing) {
                $data = [
                    "id"=>null,
                    'size'=>$size,
                ];
                $this->insertData('size', $data);
                return true;
            } else {
                return false;
            }
        }
        public function createSlider($image, $title1, $title2, $type){
            try {
                $data = [
                    "img" => $image,
                    "title1" => $title1,
                    "title2" => $title2,
                    "truong" => $type
                ];
                $this->insertData('img_slider', $data);
                return true;
            } catch (PDOException $e) {
                return false;
            }
        }
        public function createCategory($name, $slug, $mainImage) {
            try {
                $data = [
                    "name" => $name,
                    "slug" => $slug,
                    "img_chinh" => $mainImage
                ];
                $this->insertData('category', $data);
                return true;
            } catch (PDOException $e) {
                return false;
            }
        }
        public function createAdmin($tenkh, $username, $password, $email, $diachi, $phone) {
            try {
                $existing = $this->getOneSql("SELECT * FROM khachhang WHERE username = :username or email=:email", [':username' => $username,':email'=>$email]);
                if(!$existing){
                    $saltF="G15";
                    $saltL="F12";
                    $password=md5($saltF.$password.$saltL);
                    $data = [
                        "tenkh" => $tenkh,
                        "username" => $username,
                        "matkhau" => $password,
                        "email" => $email,
                        "diachi" => $diachi,
                        "phone" => $phone,
                        "role" => '1' 
                    ];
                    $this->insertData('khachhang', $data); 
                    return true; 
                }else{
                    return false; 
                }
            } catch (PDOException $e) {
                return false; 
            }
        }
        public function createProduct($name, $id_category, $dacbiet, $luotxem, $ngaylap, $mota, $chitiet) {
            try {
                $existing = $this->getOneSql("SELECT * FROM product WHERE name = :name", [':name' =>$name]);
                if(!$existing){
                    $data = [
                        "name" => $name,
                        "id_category" => $id_category,
                        "dacbiet" => $dacbiet,
                        "luotxem" => $luotxem,
                        "ngaylap" => $ngaylap,
                        "mota" => $mota,
                        "chitiet" => $chitiet
                    ];
                    $this->insertData('product', $data); 
                    return true; 
                }else{
                    return false; 
                }
            } catch (PDOException $e) {
                return false; 
            }
        }
        public function createVoucher($code,$percent,$ngayhethan,$trangthai) {
            try {
                $existing = $this->getOneSql("SELECT * FROM vouchers WHERE code = :code", [':code' =>$code]);
                if(!$existing){
                    $data = [
                        "code" => $code,
                        "percent"=>$percent,
                        "ngayhethan"=>$ngayhethan,
                        "trangthai"=>$trangthai,
                    ];
                    $this->insertData('vouchers', $data); 
                    return true; 
                }else{
                    return false; 
                }
            } catch (PDOException $e) {
                return false; 
            }
        }
        
        public function getColorDetails($colorId) {
            $sql = "SELECT * FROM color WHERE id = :id";
            $colorDetails = $this->getOneSql($sql, [':id' => $colorId]);
            return $colorDetails;
        }
        public function getSizeDetails($sizeId) {
            $sql = "SELECT * FROM size WHERE id = :id";
            $details = $this->getOneSql($sql, [':id' => $sizeId]);
            return $details;
        }
        public function getSliderDetails($sliderId) {
            $sql = "SELECT * FROM img_slider WHERE id = :id";
            $sliderDetails = $this->getOneSql($sql, [':id' => $sliderId]);
            return $sliderDetails;
        }
        public function getProductDetails($id) {
            $sql = "SELECT * FROM product WHERE id = :id";
            $productDetails = $this->getOneSql($sql, [':id' => $id]);
            return $productDetails;
        }
        public function updateColor($colorId, $colorName) {
            $table = 'color';
            $data = ['color' => $colorName];
            $condition = 'id = :id';
            $params = [':color' => $colorName, ':id' => $colorId];
            $updated = $this->updateData($table, $data, $condition, $params);
            return $updated;
        }
        public function updateSize($sizeId, $sizeName) {
            $table = 'size';
            $data = ['size' => $sizeName];
            $condition = 'id = :id';
            $params = [':size' => $sizeName, ':id' => $sizeId];
            $updated = $this->updateData($table, $data, $condition, $params);
            return $updated;
        }
        public function updateSlider($sliderId, $img, $title1, $title2,$truong){
            $table = 'img_slider';
            $data = [
                'img' => $img,
                'title1' => $title1,
                'title2' => $title2,
                'truong' => $truong,
            ];
            $condition = 'id = :id';
            $params = [':img' => $img, ':id' => $sliderId,':title1'=>$title1,':title2'=>$title2,':truong'=>$truong];
            $updated = $this->updateData($table, $data, $condition, $params);
            return $updated;    
        }
        public function updateProduct($id, $name, $id_category, $dacbiet, $luotxem, $ngaylap, $mota, $chitiet){
            $table = 'product';
            $data = [
                'name' => $name,
                'id_category' => $id_category,
                'dacbiet' => $dacbiet,
                'luotxem' => $luotxem,
                'ngaylap' => $ngaylap,
                'mota' => $mota,
                'chitiet' => $chitiet,
            ];
            $condition = 'id = :id';
            $params = [':id' => $id]; // Only one parameter needed for the condition
            $updated = $this->updateData($table, $data, $condition, $params);
            return $updated;    
        }
        public function updateBinhLuan($mabl){
            $table = 'binhluan';
            $data = [
                'isAccept' => 1,
            ];
            $condition = 'mabl = :mabl';
            $params = [':mabl' => $mabl]; 
            $updated = $this->updateData($table, $data, $condition, $params);
            return $updated;    
        }
        public function updateVoucher($id,$tt){
            $table = 'vouchers';
            $new_tt = $tt == 1 ? 0 : 1;
            
            $data = [
                'trangthai' => $new_tt,
            ];
            $condition = 'id = :id';
            $params = [':id' => $id]; 
            $updated = $this->updateData($table, $data, $condition, $params);
            return $updated;    
        }
        public function updateCtproduct($idp, $idc, $ids, $soluongton, $giamgia, $price){
            $table = 'ctproduct';      
            $data = [
                'soluongton' => $soluongton,
                'giamgia' => $giamgia,
                'price' => $price
            ];
            $condition = 'idproduct = :idp AND idcolor = :idc AND idsize = :ids';
            $params = [':idp' => $idp, ':idc' => $idc, ':ids' => $ids]; 
            $updated = $this->updateData($table, $data, $condition, $params);
            return $updated;    
        }
        
        

        public function deleteColor($colorId) {
            $sql = "DELETE FROM color WHERE id = :colorId";
            return $this->deleteData($sql, [':colorId' => $colorId]);
        }
        public function deleteSize($sizeId) {
            $sql = "DELETE FROM size WHERE id = :sizeId";
            return $this->deleteData($sql, [':sizeId' => $sizeId]);
        }
        public function deleteSlider($sliderId) {
            $sql = "DELETE FROM img_slider WHERE id = :id";
            $deleted = $this->deleteData($sql, [':id' => $sliderId]);
            return $deleted;
        }
        public function deleteKhachHang($makh) {
            $sql = "DELETE FROM khachhang WHERE makh = :makh";
            $deleted = $this->deleteData($sql, [':makh' => $makh]);
            return $deleted;
        }
        public function deleteProduct($id) {
            $sql = "DELETE FROM product WHERE id = :id";
            $deleted = $this->deleteData($sql, [':id' => $id]);
            return $deleted;
        }
        public function deleteBinhLuan($mabl) {
            $sql = "DELETE FROM binhluan WHERE mabl = :mabl";
            $deleted = $this->deleteData($sql, [':mabl' => $mabl]);
            return $deleted;
        }
        public function deleteVoucher($id) {
            $sql = "DELETE FROM vouchers WHERE id = :id";
            $deleted = $this->deleteData($sql, [':id' => $id]);
            return $deleted;
        }
        public function deleteCtproduct($idp, $idc, $ids) {
            $sql = "DELETE FROM ctproduct WHERE idproduct = :idp AND idcolor = :idc AND idsize = :ids";
            $deleted = $this->deleteData($sql, [':idp' => $idp, ':idc' => $idc, ':ids' => $ids]);
            return $deleted;
        }
        
        public function getSoLuongTon($idp, $idc, $ids) {
            $sql = "SELECT * FROM ctproduct WHERE idproduct=$idp AND idsize=$ids AND idcolor=$idc";
            $result = $this->getAllSql($sql);
        
            if (!empty($result)) {
                $soluongton = $result[0]['soluongton'];
                return max($soluongton, 0); 
            } else {
                return 0; 
            }
        }
        
    }
?>