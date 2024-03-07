<?php
require_once 'BaseController.php'; 
    ob_start();
    class AdminController extends BaseController{
        private $adminModel;
        public function __construct()
        {
            $this->loadModel('AdminModel');
            $this->adminModel=new AdminModel;
        }
        public function index(){
            return $this->view('backend.index',[
                'pageTitle'=>'Trang admin',         
            ]);

        }
        public function colorIndex() {
            // Lấy tất cả các màu từ model
            $colors = $this->adminModel->getAllColors();
            return $this->view('backend.partition.index.color', [
                'pageTitle' => 'Trang admin',
                'colors' => $colors,
            ]);
        }
        public function sizeIndex() {
            // Lấy tất cả các màu từ model
            $sizes = $this->adminModel->getAllSizes();
            return $this->view('backend.partition.index.size', [
                'pageTitle' => 'Trang admin',
                'sizes' => $sizes,
            ]);
        }
        public function sliderIndex() {
            // Lấy tất cả các màu từ model
            $sliders = $this->adminModel->getAllSliders();
            return $this->view('backend.partition.index.slider', [
                'pageTitle' => 'Trang admin',
                'sliders' => $sliders,
            ]);
        }
        public function categoryIndex() {
            $categories = $this->adminModel->getAllCategories();
            return $this->view('backend.partition.index.category', [
                'pageTitle' => 'Trang admin',
                'categories' => $categories,
            ]);
        }
        public function khachhangIndex() {
            $khachhangs = $this->adminModel->getAllKhachHangs();
            return $this->view('backend.partition.index.khachhang', [
                'pageTitle' => 'Trang admin',
                'khachhangs' => $khachhangs,
            ]);
        }
        public function binhLuanIndex() {
            $binhluans = $this->adminModel->getAllBinhLuans();
            return $this->view('backend.partition.index.binhluan', [
                'pageTitle' => 'Trang admin',
                'binhluans' =>$binhluans,
            ]);
        }

        public function productIndex() {
            $products = $this->adminModel->getAllProducts();
            return $this->view('backend.partition.index.product', [
                'pageTitle' => 'Trang admin',
                'products' => $products,
            ]);
        }
        public function voucherIndex() {
            $vouchers = $this->adminModel->getAllVouchers();
            return $this->view('backend.partition.index.voucher', [
                'pageTitle' => 'Trang admin',
                'vouchers' => $vouchers,
            ]);
        }
        public function hoadonIndex() {
            $hoadons = $this->adminModel->getAllHoaDons();
            return $this->view('backend.partition.index.hoadon', [
                'pageTitle' => 'Trang admin',
                'hoadons' => $hoadons,
            ]);
        }
        public function cthoadonIndex() {
            $masohd=$_GET['id'];
            $cts = $this->adminModel->getAllcthds($masohd);
            return $this->view('backend.partition.index.cthoadon', [
                'pageTitle' => 'Trang admin',
                'cts' => $cts,
            ]);
        }
        public function ctproductIndex() {
            $idproduct=$_GET['id'];
            $ctproducts = $this->adminModel->getAllctps($idproduct);
            return $this->view('backend.partition.index.ctproduct', [
                'pageTitle' => 'Trang admin',
                'ctproducts' => $ctproducts,
            ]);
        }
        public function colorCreate() {
            $colors = $this->adminModel->getAllColors();
            return $this->view('backend.partition.create.color', [
                'pageTitle' => 'Trang admin',
                'colors' => $colors,
            ]);
        }
        public function sizeCreate() {
            $sizes = $this->adminModel->getAllSizes();
            return $this->view('backend.partition.create.size', [
                'pageTitle' => 'Trang admin',
                'sizes' => $sizes,
            ]);
        }
        public function sliderCreate() {
            $sliders = $this->adminModel->getAllSliders();
            return $this->view('backend.partition.create.slider', [
                'pageTitle' => 'Trang admin',
                'sliders' => $sliders,
            ]);
        }
        public function categoryCreate() {
            $categories = $this->adminModel->getAllCategories();
            return $this->view('backend.partition.create.category', [
                'pageTitle' => 'Trang admin',
                'categories' => $categories,
            ]);
        }
        public function khachHangCreate() {
            $khachhangs = $this->adminModel->getAllKhachHangs();
            return $this->view('backend.partition.create.khachhang', [
                'pageTitle' => 'Trang admin',
                'khachhangs' => $khachhangs,
            ]);
        }
        public function productCreate() {
            $products = $this->adminModel->getAllProducts();
            return $this->view('backend.partition.create.product', [
                'pageTitle' => 'Trang admin',
                'products' => $products,
            ]);
        }
        public function voucherCreate() {    
            return $this->view('backend.partition.create.voucher', [
                'pageTitle' => 'Trang admin',            
            ]);
        }
        
        public function colorC(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $color = $_POST['color'] ?? '';
                $created = $this->adminModel->createColor($color);
                if ($created) {
                    echo '<script>alert("Màu đã được tạo mới thành công"); setTimeout(function() { window.location.href = "index.php?controller=admin"; }, 100);</script>';
                } else {
                    echo '<script>alert("Màu đã tồn tại hoặc đã xảy ra lỗi khi tạo màu"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=colorCreate"; }, 100);</script>';
                }
            }
        }
        public function sizeC(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $size = $_POST['size'] ?? '';
                $created = $this->adminModel->createSize($size);
                if ($created) {
                    echo '<script>alert("Kích cở đã được tạo mới thành công"); setTimeout(function() { window.location.href = "index.php?controller=admin"; }, 100);</script>';
                } else {
                    echo '<script>alert("Kích cở đã tồn tại hoặc đã xảy ra lỗi khi tạo màu"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=sizeCreate"; }, 100);</script>';
                }
            }
        }
        public function sliderC() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $uploadDirectory = 'asset/img/';
                    if (!file_exists($uploadDirectory)) {
                        mkdir($uploadDirectory, 0777, true); // Tạo thư mục với quyền truy cập 0777
                    }
                    $imageName = $_FILES['image']['name'];
                    $imagePath = $uploadDirectory . $imageName;
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
                        $title1 = $_POST['title1'];
                        $title2 = $_POST['title2'];
                        $type = $_POST['type'];
                        $result = $this->adminModel->createSlider($imageName, $title1, $title2, $type);
                        if ($result) {
                            echo '<script>alert("Slider đã được tạo mới thành công"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=sliderIndex"; }, 100);</script>';
                        } else {
                            echo '<script>alert("Slider đã tồn tại hoặc đã xảy ra lỗi khi tạo Slider"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=sliderCreate"; }, 100);</script>';
                        }
                    } else {
                        echo '<script>alert("Đã xảy ra lỗi khi di chuyển ảnh vào thư mục.");</script>';
                    }
                } else {
                    echo '<script>alert("Đã xảy ra lỗi khi tải lên ảnh.");</script>';
                }
            }
        }
        
        public function categoryC() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'] ?? '';
                $slug = $_POST['slug'] ?? '';
                $parentId = $_POST['parent_id'] ?? null;
                // Khởi tạo biến $mainImage
                $mainImage = '';
                // Kiểm tra nếu đã nhận file hình ảnh từ form và không có lỗi khi upload
                if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $uploadDirectory = 'asset/img/';
                    if (!file_exists($uploadDirectory)) {
                        mkdir($uploadDirectory, 0777, true); // Tạo thư mục với quyền truy cập 0777
                    }
                    // $mainImage = $uploadDirectory . $_FILES['image']['name'];
                    $mainImage =  $_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], $mainImage);
                }
                // Gọi hàm createCategory với các tham số tương ứng
                $success = $this->adminModel->createCategory($name, $slug, $mainImage, $parentId);
                if ($success) {
                    echo '<script>alert("Danh mục đã được tạo mới thành công."); window.location.href = "index.php?controller=admin&action=categoryIndex";</script>';
                } else {
                    echo '<script>alert("Đã xảy ra lỗi khi tạo danh mục."); window.location.href = "index.php?controller=admin&action=categoryCreate";</script>';
                }
            }
        }
        public function khachHangC() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $tenkh = $_POST['tenkh'] ?? '';
                $username = $_POST['username'] ?? '';
                $password = $_POST['password'] ?? '';
                $email = $_POST['email'] ?? '';
                $diachi = $_POST['diachi'] ?? '';
                $phone = $_POST['phone'] ?? '';   
                if ($tenkh && $username && $password && $email && $diachi && $phone) {
                        $created = $this->adminModel->createAdmin($tenkh, $username, $password, $email, $diachi, $phone);
                        if ($created) {
                            echo '<script>alert("Tạo admin thành công"); window.location.href = "index.php?controller=admin&action=khachhangIndex";</script>';
                        } else {
                            echo '<script>alert("Đã xảy ra lỗi khi tạo admin"); window.location.href = "index.php?controller=admin&action=khachHangCreate";</script>';
                        }
                    } else {
                        echo '<script>alert("Username hoặc Email đã tồn tại"); window.location.href = "index.php?controller=admin&action=khachHangCreate";</script>';
                    }
                } else {
                    echo '<script>alert("Vui lòng điền đầy đủ thông tin"); window.location.href = "index.php?controller=admin&action=khachHangCreate";</script>';
                }
        } 
        public function productC() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'] ?? '';
                $id_category = $_POST['id_category'] ?? '';
                $dacbiet = $_POST['dacbiet'] ?? '';
                $luotxem = $_POST['luotxem'] ?? '';
                $ngaylap = $_POST['ngaylap'] ?? '';
                $mota = $_POST['mota'] ?? '';
                $chitiet = $_POST['chitiet'] ?? '';
                if ($name && $id_category && $dacbiet && $luotxem && $ngaylap && $mota && $chitiet) {
                     $created = $this->adminModel->createProduct($name, $id_category, $dacbiet, $luotxem, $ngaylap, $mota, $chitiet);
                    if($created){
                        echo '<script>alert("Tạo sản phẩm thành công"); window.location.href = "index.php?controller=admin&action=productIndex";</script>';
                        
                    }else{
                        echo '<script>alert("Vui lòng điền đầy đủ thông tin"); window.location.href = "index.php?controller=admin&action=productCreate";</script>';
                    }
                } else {
                    echo '<script>alert("Ko"); window.location.href = "index.php?controller=admin&action=productCreate";</script>';
                }
            } else {
                echo '<script>alert("Yêu cầu không hợp lệ"); window.location.href = "index.php?controller=admin&action=productCreate";</script>';
            }
        }
        public function voucherC() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $code = $_POST['code'] ?? '';
                $percent = $_POST['percent'] ?? '';
                $ngayhethan = $_POST['ngayhethan'] ?? '';
                $trangthai=$_POST['trangthai']??"";
                if ($code&&$percent&&$ngayhethan&&$trangthai) {
                     $created = $this->adminModel->createVoucher($code,$percent,$ngayhethan,$trangthai);
                    if($created){
                        echo '<script>alert("Tạo thành công"); window.location.href = "index.php?controller=admin&action=voucherIndex";</script>';
                        
                    }else{
                        echo '<script>alert("Vui lòng điền đầy đủ thông tin"); window.location.href = "index.php?controller=admin&action=voucherCreate";</script>';
                    }
                } else {
                    echo '<script>alert("Ko"); window.location.href = "index.php?controller=admin&action=voucherCreate";</script>';
                }
            } else {
                echo '<script>alert("Yêu cầu không hợp lệ"); window.location.href = "index.php?controller=admin&action=voucherCreate";</script>';
            }
        }

        public function colorEdit() {
            $colorId = $_GET['id'] ?? null;
    
            if ($colorId) {
                $colorDetails = $this->adminModel->getColorDetails($colorId);
                return $this->view('backend.partition.edit.color', [
                    'pageTitle' => 'Edit Color',
                    'colorDetails' => $colorDetails
                ]);
            } else {
                echo '<script>alert("Không tìm thấy 404"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=colorIndex"; }, 100);</script>';
            }
        }
        public function sizeEdit() {
            $sizeId = $_GET['id'] ?? null;
            if ($sizeId) {
                $sizeDetails = $this->adminModel->getSizeDetails($sizeId);
                return $this->view('backend.partition.edit.size', [
                    'pageTitle' => 'Edit Size',
                    'sizeDetails' => $sizeDetails
                ]);
            } else {
                echo '<script>alert("Không tìm thấy 404"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=sizeIndex"; }, 100);</script>';
            }
        }
        public function sliderEdit(){
            $sliderId = $_GET['id'] ?? null;
            if ($sliderId) {
                $sliderDetails = $this->adminModel->getSliderDetails($sliderId);
                if ($sliderDetails) {
                    return $this->view('backend.partition.edit.slider', [
                        'pageTitle' => 'Edit Slider',
                        'sliderDetails' => $sliderDetails
                    ]);
                } else {
                    echo '<script>alert("Không tìm thấy 404"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=sliderIndex"; }, 100);</script>';
                }
            } else {
                echo '<script>alert("Không tìm thấy ID trên 404"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=sliderIndex"; }, 100);</script>';
            }
        }
        public function productEdit(){
            $id = $_GET['id'] ?? null;
            if ($id) {
                $productDetails = $this->adminModel->getProductDetails($id);
                if ($productDetails) {
                    return $this->view('backend.partition.edit.product', [
                        'pageTitle' => 'Edit Slider',
                        'productDetails' => $productDetails
                    ]);
                } else {
                    echo '<script>alert("Không tìm thấy 404"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=productIndex"; }, 100);</script>';
                }
            } else {
                echo '<script>alert("Không tìm thấy ID trên 404"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=productIndex"; }, 100);</script>';
            }
        }
        public function cthdEdit() {
            $masohd = $_GET['mshd'] ?? null;
            $idProduct = $_GET['idp'] ?? null;
            $idSize = $_GET['ids'] ?? null;
            $idColor = $_GET['idc'] ?? null;
            $soluongmua=$_GET['slm']??null;
            $soluongton=$this->adminModel->getSoLuongTon($idProduct,$idColor,$idSize);
            if ($masohd&&$idProduct&&$idSize&&$idColor&&$soluongmua) {
                return $this->view('backend.partition.edit.cthd', [
                    'pageTitle' => 'Edit Color',
                    'masohd'=>$masohd,
                    'idProduct'=>$idProduct,
                    'idSize'=>$idSize,
                    'idColor'=>$idColor,
                    'soluongmua'=>$soluongmua,
                    'soluongton'=>$soluongton,
                ]);
            } else {
                echo '<script>alert("Không tìm thấy 404"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=hoadonIndex"; }, 100);</script>';
            }
        }
        public function ctproductEdit() {
            $idp = $_GET['idp'] ?? null;
            $idc = $_GET['idc'] ?? null;
            $ids = $_GET['ids'] ?? null;
            $p = $_GET['p'] ?? null;
            $slt = $_GET['slt'] ?? null;
            $giamgia = $_GET['giamgia'] ?? null;
            if ($idp&&$idc&&$ids&&$slt&&$giamgia) {
                $sizeDetails = $this->adminModel->getSizeDetails($idp&&$idc&&$ids&&$slt&&$giamgia);
                return $this->view('backend.partition.edit.ctproduct', [
                    'pageTitle' => 'Edit Size',
                    'idp'=>$idp,
                    'idc'=>$idc,
                    'ids'=>$ids,
                    'slt'=>$slt,
                    'p'=>$p,
                    'giamgia'=>$giamgia
                ]);
            } else {
                echo '<script>alert("Không tìm thấy 404"); setTimeout(function() { window.location.href = "index.php?controller=admin&ctproductIndex&id='.$idp.'"; }, 100);</script>';
            }
        }
        public function colorUpdate() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $colorId = $_GET['id'] ?? null;
                $colorName = $_POST['color'] ?? '';
    
                if ($colorId && $colorName) {
                    $updated = $this->adminModel->updateColor($colorId, $colorName);
                    if ($updated) {
                        echo '<script>alert("Đã cập nhật thành công"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=colorIndex"; }, 100);</script>';
                    } else {
                        echo '<script>alert("Cập nhật thất bại"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=colorIndex"; }, 100);</script>';
                    }
                } else {
                    echo '<script>alert("Cập nhật thất bại. Chưa đủ thông tin"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=colorIndex"; }, 100);</script>';
                }
            } 
        }
        public function sizeUpdate() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $sizeId = $_GET['id'] ?? null;
                $sizeName = $_POST['size'] ?? '';
    
                if ($sizeId && $sizeName) {
                    $updated = $this->adminModel->updateSize($sizeId, $sizeName);
                    if ($updated) {
                        echo '<script>alert("Đã cập nhật thành công"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=sizeIndex"; }, 100);</script>';
                    } else {
                        echo '<script>alert("Cập nhật thất bại"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=sizeIndex"; }, 100);</script>';
                    }
                } else {
                    echo '<script>alert("Cập nhật thất bại. Chưa đủ thông tin"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=sizeIndex"; }, 100);</script>';
                }
            } 
        }
        public function sliderUpdate(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $sliderId = $_GET['id'] ?? null;
                if ($sliderId) {
                    $sliderDetails = $this->adminModel->getSliderDetails($sliderId);
                    $oldImage = $sliderDetails['img'];
                    $oldImagePath = 'asset/img/' . $oldImage;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
                        $uploadDirectory = 'asset/img/';
                        if (!file_exists($uploadDirectory)) {
                            mkdir($uploadDirectory, 0777, true); // Tạo thư mục với quyền truy cập 0777
                        }
                        $imagePath = $uploadDirectory . $_FILES['img']['name'];
                        move_uploaded_file($_FILES['img']['tmp_name'], $imagePath);
                    }
                    // Lấy dữ liệu từ form
                    $title1 = $_POST['title1'] ?? '';
                    $title2 = $_POST['title2'] ?? '';
                    $type = $_POST['type'];
        
                    // Cập nhật thông tin slider
                    $success = $this->adminModel->updateSlider($sliderId, $imagePath, $title1, $title2, $type);
                    if ($success) {
                        echo '<script>alert("Đã cập nhật thành công"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=sliderIndex"; }, 100);</script>';
                    } else {
                        echo '<script>alert("Cập nhật thất bại"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=sliderEdit"; }, 100);</script>';
                    }
                } 
            } 
        }
        public function productUpdate() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id=$_GET['id'];
                $name = $_POST['name'] ?? '';
                $id_category = $_POST['id_category'] ?? '';
                $dacbiet = $_POST['dacbiet'] ?? '';
                $luotxem = $_POST['luotxem'] ?? '';
                $ngaylap = $_POST['ngaylap'] ?? '';
                $mota = $_POST['mota'] ?? '';
                $chitiet = $_POST['chitiet'] ?? '';
    
                if ($id&&$name && $id_category&& $dacbiet &&$luotxem &&$ngaylap&&$mota&&$chitiet) {
                    $updated = $this->adminModel->updateProduct($id,$name,$id_category,$dacbiet,$luotxem,$ngaylap,$mota,$chitiet);
                    if ($updated) {
                        echo '<script>alert("Đã cập nhật thành công"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=productIndex"; }, 100);</script>';
                    } else {
                        echo '<script>alert("Cập nhật thất bại"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=productIndex"; }, 100);</script>';
                    }
                } else {
                    echo '<script>alert("Cập nhật thất bại. Chưa đủ thông tin"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=productIndex"; }, 100);</script>';
                }
            } 
        }
        public function ctproductUpdate() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Lấy dữ liệu từ biểu mẫu
                $idp = $_POST['idProduct'];
                $idc = $_POST['idColor'];
                $ids = $_POST['idSize'];
                $soluongton = $_POST['soluongton'];
                $giamgia = $_POST['giamgia'];
                $price = $_POST['price'];
                $updated = $this->adminModel->updateCtproduct($idp, $idc, $ids, $soluongton, $giamgia, $price);
                if ($updated) {
                    echo '<script>alert("Đã cập nhật thành công"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=ctproductIndex&id='.$idp.'"; }, 100);</script>';
                } else {            
                    echo '<script>alert("Cập nhật thất bại"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=ctproductIndex&id='.$idp.'"; }, 100);</script>';
                }
            } else {              
                echo "Phương thức yêu cầu không hợp lệ!";
            }
        }
        public function binhLuanUpdate() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $mabl=$_GET['mabl'];
                if ($mabl) {
                    $updated = $this->adminModel->updateBinhLuan($mabl);
                    if ($updated) {
                        echo '<script>alert("Đã duyệt thành công"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=binhLuanIndex"; }, 100);</script>';
                    } else {
                        echo '<script>alert("Duyệt thất bại"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=binhLuanIndex"; }, 100);</script>';
                    }
                } else {
                    echo '<script>alert("Duyệt thất bại."); setTimeout(function() { window.location.href = "index.php?controller=admin&action=binhLuanIndex"; }, 100);</script>';
                }
            } 
        }
        public function voucherUpdate() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id']) && isset($_GET['tt'])) {
                $id=$_GET['id'];
                $tt=$_GET['tt'];
                if ($id) {
                    $updated = $this->adminModel->updateVoucher($id,$tt);
                    if ($updated) {
                        echo '<script>alert("Đã duyệt thành công"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=voucherIndex"; }, 100);</script>';
                    } else {
                        echo '<script>alert("Duyệt thất bại"); setTimeout(function() { window.location.href = "index.php?controller=admin&action=voucherIndex"; }, 100);</script>';
                    }
                } else {
                    echo '<script>alert("Duyệt thất bại."); setTimeout(function() { window.location.href = "index.php?controller=admin&action=voucherIndex"; }, 100);</script>';
                }
            } 
        }

        public function colorDestroy() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
                $colorId = $_GET['id'];
                $deleted = $this->adminModel->deleteColor($colorId);
                if ($deleted) {
                    echo '<script>alert("Xóa màu sắc thành công."); window.location.href = "index.php?controller=admin&action=colorIndex";</script>';
                } else {
                    echo '<script>alert("Đã xảy ra lỗi khi xóa màu sắc."); window.location.href = "index.php?controller=admin&action=colorIndex";</script>';
                }
            }
        }
        public function sizeDestroy() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
                $sizeId = $_GET['id'];
                $deleted = $this->adminModel->deleteSize($sizeId);
                if ($deleted) {
                    echo '<script>alert("Xóa màu sắc thành công."); window.location.href = "index.php?controller=admin&action=sizeIndex";</script>';
                } else {
                    echo '<script>alert("Đã xảy ra lỗi khi xóa màu sắc."); window.location.href = "index.php?controller=admin&action=sizeIndex";</script>';
                }
            }
        }
        // Trong file AdminController.php

    public function sliderDestroy() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
            $sliderId = $_GET['id'];
            $deleted = $this->adminModel->deleteSlider($sliderId);
            if ($deleted) {
                echo '<script>alert("Xóa slider thành công."); window.location.href = "index.php?controller=admin&action=sliderIndex";</script>';
            } else {
                echo '<script>alert("Đã xảy ra lỗi khi xóa slider."); window.location.href = "index.php?controller=admin&action=sliderIndex";</script>';
            }
        }
    }
    public function khachHangDestroy() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['makh'])) {
            $makh= $_GET['makh'];
            $deleted = $this->adminModel->deleteKhachHang($makh);
            if ($deleted) {
                echo '<script>alert("Xóa thành công."); window.location.href = "index.php?controller=admin&action=khachHangIndex";</script>';
            } else {
                echo '<script>alert("Đã xảy ra lỗi khi xóa slider."); window.location.href = "index.php?controller=admin&action=khachHangIndex";</script>';
            }
        }
    }
    public function productDestroy() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
            $id= $_GET['id'];
            $deleted = $this->adminModel->deleteProduct($id);
            if ($deleted) {
                echo '<script>alert("Xóa thành công."); window.location.href = "index.php?controller=admin&action=productIndex";</script>';
            } else {
                echo '<script>alert("Đã xảy ra lỗi khi xóa slider."); window.location.href = "index.php?controller=admin&action=productIndex";</script>';
            }
        }
    }
    public function binhLuanDestroy() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['mabl'])) {
            $mabl= $_GET['mabl'];
            $deleted = $this->adminModel->deleteBinhLuan($mabl);
            if ($deleted) {
                echo '<script>alert("Xóa thành công."); window.location.href = "index.php?controller=admin&action=binhLuanIndex";</script>';
            } else {
                echo '<script>alert("Đã xảy ra lỗi khi xóa."); window.location.href = "index.php?controller=admin&action=binhLuanIndex";</script>';
            }
        }
    }
    public function voucherDestroy() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
            $id= $_GET['id'];
            $deleted = $this->adminModel->deleteVoucher($id);
            if ($deleted) {
                echo '<script>alert("Xóa thành công."); window.location.href = "index.php?controller=admin&action=voucherIndex";</script>';
            } else {
                echo '<script>alert("Đã xảy ra lỗi khi xóa."); window.location.href = "index.php?controller=admin&action=voucherIndex";</script>';
            }
        }
    }
    public function ctproductDestroy() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['idp'])&& isset($_GET['idc'])&& isset($_GET['ids'])) {
            $idp= $_GET['idp'];
            $idc= $_GET['idc'];
            $ids= $_GET['ids'];
            $deleted = $this->adminModel->deleteCtproduct($idp,$idc,$ids);
            if ($deleted) {
                echo '<script>alert("Xóa thành công."); window.location.href = "index.php?controller=admin&action=ctproductIndex&id='.$idp.'";</script>';
            } else {
                echo '<script>alert("Đã xảy ra lỗi khi xóa."); window.location.href = "index.php?controller=admin&action=ctproductIndex&id='.$idp.'";</script>';
            }
        }
    }

    }
?>