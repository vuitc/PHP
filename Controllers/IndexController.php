<?php
    require_once 'BaseController.php'; 
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