<?php
     require_once 'BaseController.php'; 
     class ShopController extends BaseController{
         private $shopModel;
         private $pageModel;
         public function __construct()
         {
             $this->loadModel('ShopModel');
             $this->shopModel=new ShopModel;
             $this->loadModel('PageModel');
             $this->pageModel=new PageModel;
         }
         public function index(){
            //b1 tổng số lượng sản phẩm
            $totalCount=$this->shopModel->getCountAllProduct();
            //b2 số trang , vị trí bắt đầu
            $countPages=$this->pageModel->countPage($totalCount);
            $start=$this->pageModel->pageStart();
            //b3 hiển thị page hiện tại
            $product=$this->shopModel->getAllProductedPage($start,$this->pageModel->limit);
            // $product= $this->shopModel->getAllProduct();
            $countColor=$this->shopModel->getCountColor();
            $countSize=$this->shopModel->getCountSize();
            //b4 lấy $_get page hiện tại render
            $currentPage=isset($_GET['pages']) ? $_GET['pages'] : 1;

            return $this->view('frontend.shops.index',[
                'product'=>$product,
                'countColor'=>$countColor,
                'countSize'=>$countSize,
                'countPages'=>$countPages,
                'currentPage'=> $currentPage,
                'url'=>'index.php?controller=shop'
            ]);
         }
         public function show(){
            $idCatalog = $_GET['idCatalog'] ?? null;
            $idColor = $_GET['idColor'] ?? null;
            $idSize=$_GET['idSize']??null;
            $currentPage=isset($_GET['pages']) ? $_GET['pages'] : 1;
            if ($idCatalog) {
                $product = $this->shopModel->show($idCatalog);
                //b1 sum tổng sl sp
                $totalCount=count($product);
                //b2 đếm số trang , vị trí bắt đầu
                $countPages=$this->pageModel->countPage($totalCount);
                $start=$this->pageModel->pageStart();
                //b3 hiển thị pages hiện tại
                $product=$this->shopModel->show($idCatalog,$start,$this->pageModel->limit);
                $url='index.php?controller=shop&action=show&idCatalog='.$idCatalog;
            } elseif ($idColor) {
                $product = $this->shopModel->showByIdColor($idColor);
                //b1 sum tổng sl sp
                $totalCount=count($product);
                //b2 đếm số trang , vị trí bắt đầu
                $countPages=$this->pageModel->countPage($totalCount);
                $start=$this->pageModel->pageStart();
                //b3 hiển thị pages hiện tại
                $product=$this->shopModel->showByIdColor($idColor,$start,$this->pageModel->limit);
                $url='index.php?controller=shop&action=show&idColor='.$idColor;
            } elseif ($idSize) {
                $product = $this->shopModel->showByIdSize($idSize);
                //b1 sum tổng sl sp
                $totalCount=count($product);
                //b2 đếm số trang , vị trí bắt đầu
                $countPages=$this->pageModel->countPage($totalCount);
                $start=$this->pageModel->pageStart();
                //b3 hiển thị pages hiện tại
                $product=$this->shopModel->showByIdSize($idSize,$start,$this->pageModel->limit);
                $url='index.php?controller=shop&action=show&idSize='.$idSize;
            }
            $countColor=$this->shopModel->getCountColor();
            $countSize=$this->shopModel->getCountSize();
            //b1 đếm count product
            $productCount = is_array($product) ? count($product) : 0;

            return $this->view('frontend.shops.index',[
                'product'=>$product,
                'countColor'=>$countColor,
                'countSize'=>$countSize,
                'countPages'=>$countPages,
                'currentPage'=> $currentPage,
                'url'=>$url,
            ]);
         }
        }
?>