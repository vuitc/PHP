<?php
    require_once 'BaseController.php'; 
    require_once 'fn.php';
    ob_start();
    class IndexController extends BaseController{
        private $indexModel;
        public function __construct()
        {
            $this->loadModel('IndexModel');
            $this->indexModel=new IndexModel;
        }
        public function index(){
            $img_slider=$this->indexModel->getAll();
            $categorys=$this->indexModel->getAllCategory();
            $productNew=$this->indexModel->getAllProductNew();
            $productHot=$this->indexModel->getAllProductHot();
            $productAoDai=$this->indexModel->getAllProductAodai();
            return $this->view('frontend.homes.index',[
                'pageTitle'=>'Trang chủ',
                'img_slider'=>$img_slider,
                'categorys'=>$categorys,
                'productNew'=>[$productNew,"Sản phẩm mới nhất"],
                'productHot'=>[$productHot,"Sản phẩm bán chạy"],
                'productAoDai'=>[$productAoDai,"Áo dài"]
            ]);

        }
        public function info(){
            if(isset($_SESSION['username_S'])){
                $username=$_SESSION['username_S'];
                $thongtin=$this->indexModel->getInfo($username);
                return $this->view('frontend.users.index',[
                    'thongtin'=>$thongtin,
                ]);
            }
        }
        public function changeInfo(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $tenkh = $_POST['tenkh'];
                $phone = $_POST['phone'];
                $diachi = $_POST['diachi'];
                $username=isset($_SESSION['username_S'])?$_SESSION['username_S']:'';         
                if ($tenkh && $phone && $diachi && $username) {
                    $image = $_FILES['image']['name'];
                    $uploadResult = uploadImage();
                    if ($uploadResult == 1) {
                        $created = $this->indexModel->updateUser($tenkh, $phone, $diachi, $username,$image);
                        echo '<script>alert("Tạo thành công"); window.location.href = "index.php?controller=index&action=info";</script>';
                        
                    } else {
                        header('Location: index.php?controller=index&action=info');
                        exit;
                    }
                }
            }
        }
        public function show(){
         $product= $this->indexModel->findById(1);
            return $this->view('frontend.homes.show',[
                'product'=>$product,
            ]);

        }
        public function delete(){
           echo __METHOD__;
        }

    }
?>