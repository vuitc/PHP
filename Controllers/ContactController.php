<?php
require_once 'BaseController.php'; 

    class ContactController extends BaseController{
        private $contactModel;
        public function __construct()
        {
            $this->loadModel('ContactModel');
            $this->contactModel=new ContactModel;
        }
        public function index(){
            return $this->view('frontend.contacts.index',[
                'pageTitle'=>'Trang contact',
                
            ]);

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