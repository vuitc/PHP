<?php
require_once 'BaseController.php'; // assuming BaseController.php is in the same directory

    class ProductController extends BaseController{
        private $productModel;
        public function __construct()
        {
            $this->loadModel('ProductModel');
            $this->productModel=new ProductModel;
        }
        public function index(){
        }
        public function show(){
        }
        
        public function delete(){
           echo __METHOD__;
        }

    }
?>