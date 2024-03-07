<?php
     require_once 'BaseController.php'; 
     class DetailController extends BaseController{
         private $detailModel;
         public function __construct()
         {
             $this->loadModel('DetailModel');
             $this->detailModel=new DetailModel;
         }
         public function index(){
            $id=$_GET['id'];
            if ($_SERVER['REQUEST_METHOD'] === 'POST'&&isset($_POST['btnClick1'])) {
                $content=$_POST['content']??"";
                $star=$_POST['danhgiasao']??0;
                $username = $_SESSION['username_S'] ?? "";
                $makh=$this->detailModel->findIdKH($username)['makh'];
                if($content){
                    $createBinhLuan=$this->detailModel->insertBinhLuan($id,$makh,$content,$star);
                    if($createBinhLuan>0){
                        echo '<script>alert("Thêm bình luận thành công"); </script>';
                    }else{
                        echo '<script>alert("Thêm bình luận thất bại"); </script>';
                    }
                }else{
                    echo '<script>alert("Thêm bình luận thất bại"); </script>';
                }
            }
            $findProduct= $this->detailModel->getFindProduct($id);
            $findAllProduct=$this->detailModel->getFindAllProduct($id);
            $dsColor=$this->detailModel->getFindAllColor();
            $dsSize=$this->detailModel->getFindAllSize();
            $uniqueSize = array_values(array_unique(array_column($findAllProduct, 'size')));
            $uniqueColor = array_values(array_unique(array_column($findAllProduct, 'color')));
            $productSpecial=$this->detailModel->getAllProductSpecial();
            // bình luận trả về mảng chứa binhluans,soluong
            $binhluans=$this->detailModel->getBinhLuan($id);
            return $this->view('frontend.details.index',[
                'findProduct'=>$findProduct,
                'findAllProduct'=>$findAllProduct,
                'findAllSize'=> $uniqueSize,
                'findAllColor'=> $uniqueColor,
                'dsSize'=>$dsSize,
                'dsColor'=>$dsColor,
                'binhluans'=>$binhluans,
                'productSpecial'=>[$productSpecial,"Sản phẩm có thể bạn thích"],
            ]);
         }
         public function show(){
            $id=$_GET['id'];
            $findAllProduct=$this->detailModel->getFindAllProduct($id);
            // Lấy mảng các giá trị "size" không trùng lặp
            $uniqueSizes = array_unique(array_column($findAllProduct, 'size'));
            $uniqueColor = array_unique(array_column($findAllProduct, 'color'));
            return $this->view('frontend.details.show',[
                'findAllProduct'=>$findAllProduct,
                'findAllSize'=> $uniqueSizes,
                'findAllColor'=> $uniqueColor,
            ]);
         }

         
        }

?>