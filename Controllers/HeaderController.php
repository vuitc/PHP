<?php
require_once 'BaseController.php'; // assuming BaseController.php is in the same directory
    class HeaderController extends BaseController{
        private $headerModel;
        public function __construct()
        {
            $this->loadModel('HeaderModel');
            $this->headerModel=new HeaderModel;
        }
        public function index(){
            $categorys=$this->headerModel->getAllCategory();
            $pages=$this->headerModel->getAllPages();
            $productss=$this->headerModel->getAllProduct();      
            return $this->view('frontend.partitions.header',[
                'pageTitle'=>'Header',
                'categorys'=>$categorys,
                'pages'=>$pages,
                'productss'=>$productss,
            ]);

        }
        public function show(){
            
        }
        public function delete(){
           echo __METHOD__;
        }

    }
?>