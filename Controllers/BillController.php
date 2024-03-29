<?php
require_once 'BaseController.php'; 

    class BillController extends BaseController{
        private $billModel;
        public function __construct()
        {
            $this->loadModel('BillModel');
            $this->billModel=new BillModel;
        }
        public function index(){
            if(isset($_SESSION['mahd'])){
               $hd=$this->billModel->getHoaDon($_SESSION['mahd']);
               $makh=$hd['makh']??'';
               $cthds=$this->billModel->getCtHoaDon($_SESSION['mahd']);
               $hotenkh=$this->billModel->getHoTen($makh);
               return $this->view('frontend.bills.index',[
                   'pageTitle'=>'Trang bill',
                   'hd'=>$hd,
                   'hotenkh'=>$hotenkh,
                   'cthds'=>$cthds,
               ]);
            }else{
                echo '<script>alert("Không tìm thấy hoá đơn."); setTimeout(function() { window.location.href = "index.php"; }, 100);</script>';
            }

        }
        public function hd(){
            if(isset($_SESSION['username_S'])){
                $username=$_SESSION['username_S'];
                $hds=$this->billModel->getHoaDonByKhachHang($username);
                return $this->view('frontend.bills.hd',[
                    'pageTitle'=>'Trang bill',
                    'hds'=>$hds,
                ]);
            }else{
                echo '<script>alert("Không tìm thấy hoá đơn."); setTimeout(function() { window.location.href = "index.php"; }, 100);</script>';
            }
        }
        public function cthd(){
            if(isset($_SESSION['username_S'])){
                $username=$_SESSION['username_S'];
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    $cthds=$this->billModel->getCthd($id,$username);
                    return $this->view('frontend.bills.cthd',[
                        'pageTitle'=>'Trang bill',
                        'cthds'=>$cthds,
                    ]);
                }else{
                    echo '<script>alert("Không tìm thấy hoá đơn."); setTimeout(function() { window.location.href = "index.php"; }, 100);</script>';
                }
            }
        }
        public function show(){
        //  $product= $this->productModel->findById(1);
        //     return $this->view('frontend.products.show',[
        //         'product'=>$product,
        //     ]);

        }
        
        public function delete(){
           echo __METHOD__;
        }

    }
?>