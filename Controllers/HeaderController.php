<?php
require_once 'BaseController.php'; // assuming BaseController.php is in the same directory
ob_start();
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
            if(isset($_SESSION['username_S'])){
                $username1=$_SESSION['username_S'];
                echo '<script>alert("' . $username1 . '");</script>';

                // $avatarH=$this->headerModel->getAvatar($username);
                require_once './Models/IndexModel.php';
                $db=new IndexModel();
                $avatarH=$db->getInfo($username1);
            }else{
                $avatarH='';
            }
            return $this->view('frontend.partitions.header',[
                'pageTitle'=>'Header',
                'categorys'=>$categorys,
                'pages'=>$pages,
                'productss'=>$productss,
                'avatarH'=>$avatarH,
            ]);

        }
        public function show(){
          
        }
        public function delete(){
           echo __METHOD__;
        }

    }
?>