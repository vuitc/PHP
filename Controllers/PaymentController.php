<?php
require_once 'BaseController.php';
class PaymentController extends BaseController
{
    private $paymentModel;
    private $productModel;
    public function __construct()
    {
        $this->loadModel('PaymentModel');
        $this->paymentModel = new PaymentModel;
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;
    }
    public function index()
    {
        $username = $_SESSION['username_S'] ?? "";
        $khachhang = $this->paymentModel->findByUser($username);
        $cart = $_SESSION['cart'] ?? "";
        $discountPercent = $_SESSION['giam'] ?? 0;
        return $this->view('frontend.payments.index', [
            'pageTitle' => 'Trang phương thức thanh toán',
            'khachhang' => $khachhang,
            'cart' => $cart,
            'discountPercent' => $discountPercent,
        ]);
    }
    public function save()
    {
        if (isset($_SESSION['username_S'])) {
            // khách hàng đã đăng nhập
            $username = $_SESSION['username_S'] ?? "";
            $khachhang = $this->paymentModel->findByUser($username);
            $emailKh = $khachhang['email'];
            $carts = $_SESSION['cart'] ?? "";
            $discountPercent = $_SESSION['giam'] ?? 0;

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $diachi = $_POST['kh_diachi'] ?? '';
                $phone = $_POST['kh_dienthoai'] ?? "";
                if (!empty($diachi) && !empty($phone)) {
                    $total = $this->productModel->total($carts);
                    $phiShip = $this->productModel->phiShip($total);
                    $phiGiamByVoucher = $this->productModel->tinhGiamByVoucher($total, $discountPercent);
                    $phiBill = $this->productModel->tinhBill($total, $phiShip, $phiGiamByVoucher);
                    $createHD = $this->paymentModel->insertHD($khachhang['makh'], $phiBill, $phiGiamByVoucher, $phiShip, $phone, $diachi);
                    if ($createHD > 0) {
                        if (is_array($carts) && !empty($carts)) {
                            foreach ($carts as $key => $product) {
                                $idProduct = $product[0]['id'];
                                $idSize = $product[0]['idSize'];
                                $idColor = $product[0]['idColor'];
                                $soluongmua = $product['qty'] ?? 0;
                                $thanhtien = $soluongmua * ($product[0]['price'] * (1 - ($product[0]['giamgia']) / 100));
                                // giảm số lượng 
                                $updatedDatabase = $this->paymentModel->updatedData($idProduct, $idSize, $idColor, $soluongmua);
                                if ($updatedDatabase) {
                                    $createCTHD = $this->paymentModel->insertCTHD($createHD, $idProduct, $idSize, $idColor, $soluongmua, $thanhtien);
                                }
                                // sai thì hiển thị cho người dùng sản phẩm nào ko cập nhật được
                            }
                        }
                        unset($_SESSION['cart']);
                        require_once 'mail/class.phpmailer.php';
                        require_once 'mail/class.smtp.php';
                        $mail = new PHPMailer();
                        $mail->CharSet = 'utf-8';
                        $mail->IsSMTP();
                        $mail->SMTPAuth = true;
                        $mail->Username = 'ganh998811@gmail.com';
                        $mail->Password = "xybl dawz oajq rerq";// Đây là mật khẩu ứng dụng cho ứng dụng của bạn, không phải là mật khẩu của tài khoản email chính
                        $mail->SMTPSecure = "ssl";
                        $mail->Host = "smtp.gmail.com";
                        $mail->Port = "465";
                        $mail->From = 'ganh998811@gmail.com';
                        $mail->FromName = 'Vũ';
                        $mail->AddAddress($email, 'ganh998811@gmail.com');
                        $mail->Subject = 'Hóa đơn mua hàng';
                        $mail->IsHTML(true);
                        $mail->Body = 'Cấp lại mã code';
                        if ($mail->Send()) {
                            echo '<script>alert("Gửi mail thành công"); setTimeout(function() { window.location.href = "index.php?controller=register&action=change_passbymail2"; }, 100);</script>';
                        } else {
                            echo "Mail Error - >" . $mail->ErrorInfo;
                            echo '<script>alert("Gửi mail không tồn tại"); setTimeout(function() { window.location.href = "index.php?controller=register&action=change_passbymail"; }, 100);</script>';
                        }


                        echo '<script>alert("Thanh toán thành công"); setTimeout(function() { window.location.href = "index.php"; }, 100);</script>';
                    } else {
                        echo '<script>alert("Thất bại"); setTimeout(function() { window.location.href = "index.php?controller=payment"; }, 100);</script>';
                    }
                } else {
                    echo '<script>alert("Nhập thông tin chưa hợp lệ"); setTimeout(function() { window.location.href = "index.php?controller=payment"; }, 100);</script>';
                }
            }
            return $this->view('frontend.payments.save', [
                'pageTitle' => 'Trang save hóa đơn',
                'khachhang' => $khachhang,
                'cart' => $carts,
                'discountPercent' => $discountPercent,
                'diachi' => $diachi,
                'phone' => $phone,
                'username' => $username,
                'total' => $total,
                // 'createHD' => $createHD,
            ]);
        } else {
            //khach hàng chưa đăng nhập
            $carts = $_SESSION['cart'] ?? "";
            $discountPercent = $_SESSION['giam'] ?? 0;

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $diachi = $_POST['kh_diachi'] ?? '';
                $phone = $_POST['kh_dienthoai'] ?? "";
                $tenkh = $_POST['kh_ten'] ?? "";
                $email = $_POST['kh_email'] ?? "";
                $total = $this->productModel->total($carts);
                $phiShip = $this->productModel->phiShip($total);
                $phiGiamByVoucher = $this->productModel->tinhGiamByVoucher($total, $discountPercent);
                $phiBill = $this->productModel->tinhBill($total, $phiShip, $phiGiamByVoucher);
                if (!empty($diachi) && !empty($phone) && !empty($tenkh) && !empty($email)) {
                    $isEmail = $this->paymentModel->findByEmail($email);
                    if ($isEmail) {
                        // Thất bại tồn tại user đã đăng kí email này rồi
                        echo '<script>alert("Email đã tồn tại. Vui lòng chọn email khác để thanh toán"); setTimeout(function() { window.location.href = "index.php?controller=payment"; }, 100);</script>';
                    } else {
                        $createKH = $this->paymentModel->insertKH($tenkh, $email, $diachi, $phone);
                        $createHD = $this->paymentModel->insertHD($createKH, $phiBill, $phiGiamByVoucher, $phiShip, $phone, $diachi);
                        if ($createHD > 0) {
                            if (is_array($carts) && !empty($carts)) {
                                foreach ($carts as $key => $product) {
                                    $idProduct = $product[0]['id'];
                                    $idSize = $product[0]['idSize'];
                                    $idColor = $product[0]['idColor'];
                                    $soluongmua = $product['qty'] ?? 0;
                                    $thanhtien = $soluongmua * ($product[0]['price'] * (1 - ($product[0]['giamgia']) / 100));
                                    $createCTHD = $this->paymentModel->insertCTHD($createHD, $idProduct, $idSize, $idColor, $soluongmua, $thanhtien);
                                }
                            }
                            unset($_SESSION['cart']);
                            echo '<script>alert("Thanh toán thành công"); setTimeout(function() { window.location.href = "index.php"; }, 100);</script>';
                        } else {
                            echo '<script>alert("Thất bại"); setTimeout(function() { window.location.href = "index.php?controller=payment"; }, 100);</script>';
                        }
                    }
                } else {
                    // nhập dữ liệu ko hợp lệ
                    echo '<script>alert("Nhập thông tin chưa hợp lệ"); setTimeout(function() { window.location.href = "index.php?controller=payment"; }, 100);</script>';
                }
            }
            return $this->view('frontend.payments.save', [
                'pageTitle' => 'Trang save hóa đơn',
            ]);
        }
    }
    public function delete()
    {
        echo __METHOD__;
    }
}
