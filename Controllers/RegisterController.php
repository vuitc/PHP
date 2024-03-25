<?php
require_once 'BaseController.php'; // assuming BaseController.php is in the same directory

    class RegisterController extends BaseController{
        private $registerModel;
        public function __construct()
        {
            session_start();
            $this->loadModel('RegisterModel');
            $this->registerModel=new RegisterModel;
        }
        public function index(){          
            return $this->view('frontend.registers.dangki',[
                'pageTitle'=>'Trang đăng kí',               
            ]);
        }
        public function sign_in(){
            ob_start();
            $page = $_GET['page'] ?? null;
            $id = $_GET['id'] ?? null;
            if($page&&$id){
                $_SESSION['page']=$page;
                $_SESSION['idpage']=$id;
            }
            return $this->view('frontend.registers.dangnhap',[
                'pageTitle'=>'Trang đăng nhập',               
            ]);
        }
        public function change_pass(){
            return $this->view('frontend.registers.quenMK',[
                'pageTitle'=>'Trang đổi mật khẩu',               
            ]);
        }
        public function change_passbymail(){
            return $this->view('frontend.registers.mailchangeMK',[
                'pageTitle'=>'Trang đổi mật khẩu b1',               
            ]);
        }
        public function change_passbymail2(){
            return $this->view('frontend.registers.mailchangeMK2',[
                'pageTitle'=>'Trang đổi mật khẩu b2',               
            ]);
        }

        public function dangki_act(){        
            if (isset($_POST['btnClick'])) {
                // Lấy dữ liệu từ form
                $username = isset($_POST["username"]) ? $_POST["username"] : "";
                $password = isset($_POST["password"]) ? $_POST["password"] : "";
                $name = isset($_POST["name"]) ? $_POST["name"] : "";
                $diachi = isset($_POST["diachi"]) ? $_POST["diachi"] : "";
                $email = isset($_POST["email"]) ? $_POST["email"] : "";
                $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
                if (empty($username) || empty($password) || empty($name) || empty($diachi) || empty($email) || empty($phone)) {
                    echo '<script>alert("Vui lòng nhập đầy đủ thông tin"); setTimeout(function() { window.location.href = "index.php?controller=register"; }, 100);</script>';
                }else{
                    $insertedUserId = $this->registerModel->insertKH($username, $password, $name, $diachi, $email, $phone);
                    if ($insertedUserId) {
                       
                        echo '<script>alert("Đăng kí thành công"); setTimeout(function() { window.location.href = "index.php?controller=register&action=sign_in"; }, 100);</script>';
                    } else {
                        echo '<script>alert("Username hoặc email đã tồn tại"); setTimeout(function() { window.location.href = "index.php?controller=register"; }, 100);</script>';
                    }
                }
            }
            
        }
        public function dangnhap_act(){
            // session_start();
            ob_start();
            if (isset($_POST['btnClick'])) {
                // Lấy dữ liệu từ form
                $username = isset($_POST["username"]) ? $_POST["username"] : "";
                $password = isset($_POST["password"]) ? $_POST["password"] : "";
                var_dump( $username ,$password);
                // Kiểm tra xem username và password có rỗng không
                if (empty($username) || empty($password)){
                    echo '<script>alert("Vui lòng nhập đầy đủ thông tin"); setTimeout(function() { window.location.href = "index.php?controller=register&action=sign_in"; }, 100);</script>';
                } else {
                    // Gọi hàm kiểm tra tài khoản từ model
                    $isValidUser = $this->registerModel->checkKH($username, $password);
                    if ($isValidUser>0) {
                        // Nếu đăng nhập thành công, thiết lập session và chuyển hướng
                        var_dump($isValidUser);
                        if($isValidUser==2){
                            $_SESSION['role']=1;
                            $_SESSION['username_S'] = $username;
                            $kq='<script>alert("Đăng nhập thành công"); setTimeout(function() { window.location.href = "index.php?controller=admin"; }, 100);</script>'; 
                        }else{
                            $_SESSION['username_S'] = $username;
                            if( $_SESSION['page']&&$_SESSION['idpage']){
                                $web = 'index.php?controller=' . $_SESSION["page"] . '&id=' . $_SESSION["idpage"];
                                unset($_SESSION['page']);
                                unset($_SESSION['idpage']);
                                // $kq=$web;
                              $kq= '<script>alert("Đăng nhập thành công"); setTimeout(function() { window.location.href = "'.$web.'"; }, 100);</script>';
                            }else{
                                // $kq="ko";
                               $kq='<script>alert("Đăng nhập thành công"); setTimeout(function() { window.location.href = "index.php"; }, 100);</script>';
                            }
                        }
                        echo $kq;
                    } else {
                        // Nếu thông tin đăng nhập không đúng, hiển thị thông báo lỗi
                        echo '<script>alert("Tài khoản hoặc mật khẩu không đúng"); setTimeout(function() { window.location.href = "index.php?controller=register&action=sign_in"; }, 100);</script>';
                    }
                }
            }
        }
        public function logout(){
            ob_start();
            unset($_SESSION['username_S']);
            unset($_SESSION['giam']);
            unset($_SESSION['role']);
            header('Location:index.php');
        }
        public function changePass_act(){;
            ob_start();
            if (isset($_POST['btnClick'])) {
                if(isset($_SESSION['username_S'])&&$_SESSION['username_S']){
                    $username=$_SESSION['username_S'];
                }else{
                    $username = isset($_POST["username"]) ? $_POST["username"] : "";
                }
                $password = isset($_POST["password"]) ? $_POST["password"] : "";
                $password1 = isset($_POST["password1"]) ? $_POST["password1"] : "";
                $password2 = isset($_POST["confirm-password"]) ? $_POST["confirm-password"] : "";
                if($password1!=$password2){
                    echo '<script>alert("Xác nhận password mới không đúng"); setTimeout(function() { window.location.href = "index.php?controller=register&action=change_pass"; }, 100);</script>';
                }else{
                    $isValidUser = $this->registerModel->checkKH($username, $password);
                    if($isValidUser){
                        $isValidChange=$this->registerModel->updateMK($username,$password1);
                        if($isValidChange){
                            echo '<script>alert("Đổi mật khẩu thành công"); setTimeout(function() { window.location.href = "index.php?controller=register&action=sign_in"; }, 100);</script>';
                        }else{
                            echo '<script>alert("Có lỗi cập nhật mật khẩu. Kiểm tra lại"); setTimeout(function() { window.location.href = "index.php?controller=register&action=change_pass"; }, 100);</script>';
                        }
                    }else{
                        echo '<script>alert("Username hoặc mật khẩu cũ chưa đúng"); setTimeout(function() { window.location.href = "index.php?controller=register&action=change_pass"; }, 100);</script>';
                    }
                }
            }
        }
        public function mailPass_act(){
            ob_start();
            if (isset($_POST['btnClick'])) {
                $email=$_POST['email'];
                $_SESSION['email']=array();
                $kq=$this->registerModel->checkEmail($email);
                if($kq>0){
                    $code=random_int(100000,999999);
                    $item=array(
                        'id'=>$code,
                        'email'=>$email,
                    );
                    $_SESSION['email'][]=$item;
                    include_once 'mail/class.phpmailer.php';
                    include_once 'mail/class.smtp.php';
                    $mail=new PHPMailer();
                    $mail->CharSet = "utf-8";
                    $mail->IsSMTP();
                    // enable SMTP authentication
                    $mail->SMTPAuth = true;
                    // GMAIL username to:
                    // $mail->Username = "php22023@gmail.com";//
                    $mail->Username = 'ganh998811@gmail.com'; //
                    // GMAIL password
                    // $mail->Password = "php22023ngoc";
                    $mail->Password = "jhor dnfv kqys nekm"; //Phplytest20@php
                    $mail->SMTPSecure = "ssl";  // tls
                    // sets GMAIL as the SMTP server
                    $mail->Host = "smtp.gmail.com";
                    // set the SMTP port for the GMAIL server
                    $mail->Port = "465"; // 587
                    $mail->From = 'ganh998811@gmail.com';
                    $mail->FromName = 'Vũ';
                    // $getemail là địa chỉ mail mà người nhập vào địa chỉ của họ đã đăng ký trong trang web
                    // $mail->AddAddress($email, 'reciever_name');
                    $mail->AddAddress($email, 'ganh998811@gmail.com');
                    $mail->Subject = 'Reset Password';
                    $mail->IsHTML(true);
                    $mail->Body = 'Cấp lại mã code ' . $code . '';
                    if ($mail->Send()) {
                        echo '<script>alert("Địa chỉ email  tồn tại"); setTimeout(function() { window.location.href = "index.php?controller=register&action=change_passbymail2"; }, 100);</script>';
                    } else {
                        echo "Mail Error - >" . $mail->ErrorInfo;
                        echo '<script>alert("Địa chỉ email không tồn tại"); setTimeout(function() { window.location.href = "index.php?controller=register&action=change_passbymail"; }, 100);</script>';
                    }
                }else{
                    echo '<script>alert("Địa chỉ email không tồn tại"); setTimeout(function() { window.location.href = "index.php?controller=register&action=change_passbymail"; }, 100);</script>';
                }
            }
        } 
        public function mailPass_act2(){   
            ob_start();
            if (isset($_POST['btnClick'])) {
                $pass=$_POST['pass'];
                foreach($_SESSION['email'] as $key =>$item){
                    if($item['id']==$pass){
                        $emailold=$item['email'];
                        $result=$this->registerModel->updatePassByMail($emailold,$pass);
                        if($result){
                            echo '<script>alert("Đã đổi mật khẩu thành công"); setTimeout(function() { window.location.href = "index.php?controller=register&action=sign_in"; }, 100);</script>';
                        }else{
                            echo '<script>alert("Đã đổi mật khẩu thành công"); setTimeout(function() { window.location.href = "index.php?controller=register&action=change_passbymail2"; }, 100);</script>';
                        }
                    }
                }
            }
        }    
        public function delete(){
           echo __METHOD__;
        }

    }
?>
