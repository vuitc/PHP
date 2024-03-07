<?php
require_once 'BaseController.php';
class CartController extends BaseController
{
    private $cartModel;
    private $productModel;
    public function __construct()
    {
        $this->loadModel('CartModel');
        $this->cartModel = new CartModel;
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;
    }
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $voucherCode = $_POST['voucher'] ?? '';
            $voucherDetails = $this->cartModel->findByCode($voucherCode);
            if ($voucherDetails) {
                $discountPercent = $voucherDetails['percent'];
                $_SESSION['giam']=$discountPercent;
                echo '<script>alert("Voucher giảm ' . $discountPercent . '. Mua ngay"); setTimeout(function() { window.location.href = "index.php?controller=cart"; }, 100);</script>';
            } else {
                echo '<script>alert("Mã voucher không hợp lệ"); setTimeout(function() { window.location.href = "index.php?controller=cart"; }, 100);</script>';
            }
        }
        $productsInCart = $_SESSION['cart'] ?? [];
        if($productsInCart){
            $products = [];
            $total = 0;
            $discountPercent = $_SESSION['giam']??0;
    
            // Tính tổng trước khi áp dụng giảm giá từ voucher
            foreach ($productsInCart as $key => $item) {
                list($id, $idColor, $idSize) = explode('a', $key);
                $id = (int)$id;
                $idColor = (int)$idColor;
                $idSize = (int)$idSize;
                $productDetails = $this->productModel->findById($id, $idColor, $idSize);
                $productDetails['qty'] = $item['qty'];
                $productDetails['ma'] = $item['ma'];
                $products[] = $productDetails;
                $total += $item['qty'] * $productDetails[0]['price'] * (1 - $productDetails[0]['giamgia'] / 100);
            }       
    
            // Áp dụng giảm giá từ voucher cho tổng
            $sum=$total;
            $total = $total * (1 - $discountPercent / 100);
            return $this->view('frontend.carts.index', [
                'page' => 'Trang cart',
                'products' => $products,
                'discountPercent' => $discountPercent,
                'total' => $total,
                'sum'=>$sum,
            ]);
        }else{
            echo '<script>alert("Chưa có sản phẩm trong giỏ hàng"); setTimeout(function() { window.location.href = "index.php"; }, 100);</script>';
        }
    }


    public function store(){
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'] ?? null;
            $idColor = $_GET['idColor'] ?? null;
            $idSize = $_GET['idSize'] ?? null;

            $key = $id . "a" . $idColor . "a" . $idSize;
            $product = $this->productModel->findById($id, $idColor, $idSize);
            if (empty($_SESSION['cart']) || !isset($_SESSION['cart'][$key])) {
                $product['qty'] = 1;
                $_SESSION['cart'][$key] = $product;
                $_SESSION['cart'][$key]['ma'] = $key;
            } else {
                $_SESSION['cart'][$key]['qty'] += 1;
            }
            // print_r($_SESSION['cart']);
            // var_dump($product);
            // session_destroy();
            header('Location: index.php?controller=cart');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnClick'])) {
            $id = $_POST['id'];
            $idColor = $_POST['color'];
            $idSize = $_POST['size'];
            $soluong = $_POST['soluong'] ?? 1;

            var_dump($id);
            var_dump($idColor);
            var_dump($idSize);
            var_dump($soluong);
            $key = $id . "a" . $idColor . "a" . $idSize;
            $product = $this->productModel->findById($id, $idColor, $idSize);
    
            if (empty($_SESSION['cart']) || !isset($_SESSION['cart'][$key])) {
                var_dump($_SESSION['cart']);
                
                if($soluong>$product[0]['soluongton']){
                    echo '<script>alert("Vượt qua số lượng tồn kho"); setTimeout(function() { window.location.href = "index.php?controller=detail&id='.$id.'"; }, 100);</script>';
                }else{
                    $product['qty'] = $soluong;
                    $_SESSION['cart'][$key] = $product;
                    $_SESSION['cart'][$key]['ma'] = $key;
                    header('Location: index.php?controller=cart');
                }
            } else {
                if( ($_SESSION['cart'][$key]['qty']+$soluong)>$_SESSION['cart'][$key][0]['soluongton']){
                    echo '<script>alert("Vượt qua số lượng tồn kho"); setTimeout(function() { window.location.href = "index.php?controller=detail&id='.$id.'"; }, 100);</script>';
                }else{
                    var_dump('<pre>');
                    var_dump($_SESSION['cart']);
                    var_dump('</pre>');
                    $_SESSION['cart'][$key]['qty'] += $soluong;
                    header('Location: index.php?controller=cart');
                }
            }
    
            // header('Location: index.php?controller=cart');
        }
    }
    public function upQuantity()
    {
        $ma = $_GET['index'] ?? null;
        if (empty($_SESSION['cart']) || !isset($_SESSION['cart'][$ma])) {
            header('Location: index.php?controller=cart');
        } else {
            $_SESSION['cart'][$ma]['qty'] += 1;
            header('Location: index.php?controller=cart');
        }
    }

    public function downQuantity()
    {
        $ma = $_GET['index'] ?? null;
        if (empty($_SESSION['cart']) || !isset($_SESSION['cart'][$ma])) {
            header('Location: index.php?controller=cart');
        } else {
            $_SESSION['cart'][$ma]['qty'] -= 1;
            if ($_SESSION['cart'][$ma]['qty'] <= 0) {
                // Nếu qty dưới hoặc bằng 0, xóa phần tử khỏi giỏ hàng
                unset($_SESSION['cart'][$ma]);
            }
            header('Location: index.php?controller=cart');
        }
    }
    public function delCart()
    {
        $ma = $_GET['index'] ?? null;
        if (empty($_SESSION['cart']) || !isset($_SESSION['cart'][$ma])) {
            header('Location: index.php?controller=cart');
        } else {
            unset($_SESSION['cart'][$ma]);
        }
        header('Location: index.php?controller=cart');
    }
}