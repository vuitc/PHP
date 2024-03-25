<?php
class BillModel
{
    public $connect;
    public function __construct()
    {
        $this->connect = new BaseModel();
    }
    public function getAll()
    {
        // return [
        //     'id'=>12,
        //     'name'=>'iphone',
        // ];
    }
    public function getHoaDon($id)
    {
        $sql = 'SELECT * FROM hoadon h  WHERE h.id = :id';
        $findProduct = $this->connect->getFind($sql, $id);
        return $findProduct;
    }
    public function getHoaDonByKhachHang($username)
    {
        $sql = 'SELECT h.id, h.ngaydat, h.tongtien, h.phone, h.diachi, k.tenkh, h.tinhtrang
            FROM hoadon h 
            JOIN khachhang k ON k.makh = h.makh 
            WHERE k.username = :username 
            ORDER BY h.id DESC';
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getCthd($id,$username)
    {
        $sql = "SELECT ct.masohd, ct.idProduct, ct.idSize, ct.idColor, ct.soluongmua, ct.thanhtien, p.name, c.color, s.size, ctp.image
        FROM cthoadon ct 
        JOIN product p ON ct.idProduct = p.id 
        JOIN ctproduct ctp ON ct.idProduct = ctp.idproduct AND ct.idSize = ctp.idsize AND ct.idColor = ctp.idcolor
        JOIN color c ON ct.idColor = c.id 
        JOIN size s ON ct.idSize = s.id
        Join hoadon hd on ct.masohd=hd.id
        Join khachhang kh on hd.makh=kh.makh
        WHERE ct.masohd = :id and kh.username=:username
        
        ";

        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':username', $username, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getHoTen($makh)
    {
        $sql = 'SELECT * FROM khachhang k WHERE k.makh = :makh';
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(':makh', $makh, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getCtHoaDon($masohd)
    {
        $sql = 'SELECT * FROM cthoadon ct JOIN ctproduct c ON ct.idProduct = c.idproduct JOIN product p ON c.idproduct = p.id join color cl on cl.id=c.idcolor
            join size s on s.id=c.idsize WHERE ct.masohd = :masohd GROUP by ct.idProduct;';
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(':masohd', $masohd, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
