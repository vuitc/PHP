<?php
    // var_dump($khachhang);
    // echo '<pre>';
    // var_dump($cart);
    // echo '</pre>';
    // var_dump($discountPercent);
    function renderCart($carts,$discountPercent){
        $str = '';
        $sum=0;
        if (is_array($carts) && !empty($carts)) {
            foreach ($carts as $key=> $product) {
                $qty = isset($product['qty']) ? $product['qty'] : '';
                $ma = isset($product['ma']) ? $product['ma'] : '';
                $price=$product[0]['price']*(1-$product[0]['giamgia']/100);
                $total=$qty*$price;
                $sum+=$total;
                
                $total=number_format($total, 0, ',', '.');
                $price = number_format($price, 0, ',', '.');
                
                $str.=' <ul class="list-group mb-3">';
                $str.='<li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">'.$product[0]['name'].'_'.$product[0]['color'].'_'.$product[0]['size'].'</h6>
                                    <small class="text-muted">'.$price.'x '.$qty.'</small>
                                </div>
                                <span class="text-muted">'.$total.'</span>
                            </li>';
                         
            }
            $giam=$sum*($discountPercent/100);
            $thanhToan=$sum-$giam;
            $giam=number_format($giam, 0, ',', '.');
            $thanhToan=number_format($thanhToan, 0, ',', '.');
            $str .= '<li class="list-group-item d-flex justify-content-between">
            <span>Voucher giảm</span>
            <strong>'.$giam.'</strong>
        </li>
        <li class="list-group-item d-flex justify-content-between">
            <span>Phí ship</span>
            <strong>';
            if ($sum > 1000000) {
                $str .= "Miễn phí vận chuyển";
            } else {
                $phiShip = 30000;
                $str .= "30.000";
            }
            $str .= '</strong>
        </li>
        <li class="list-group-item d-flex justify-content-between">
            <span>Tổng thành tiền</span>
            <strong>'.$thanhToan.'</strong>
        </li>
    </ul>';
return $str;

        }

    }
?>
<div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 287px">
            <div class="d-inline-flex">
            <div class="py-5 text-center">
                    <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
                    <h2>Thanh toán</h2>
                    <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
    <!-- end header -->
    <main role="main">
        <div class="container mt-4">
            <form class="needs-validation" name="frmthanhtoan" method="post"
                action="index.php?controller=payment&action=save">
                <input type="hidden" name="kh_tendangnhap" value="dnpcuong">

               

                <div class="row">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Giỏ hàng</span>
                            <span class="badge badge-secondary badge-pill"><?=count($cart)?></span>
                        </h4>
                        <?php
                            $kq=renderCart($cart,$discountPercent);
                            echo $kq;
                        ?>
                    </div>
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Thông tin khách hàng</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="kh_ten">Họ tên</label>
                                <input type="text" class="form-control" name="kh_ten" id="kh_ten"
                                value="<?=$khachhang['tenkh']??""?>" <?=isset($khachhang['tenkh']) ? 'readonly' : ''?>>

                            </div>
                            <div class="col-md-12">
                                <label for="kh_diachi">Địa chỉ</label>
                                <input type="text" class="form-control" name="kh_diachi" id="kh_diachi"
                                    value="<?=$khachhang['diachi']??""?>" >
                            </div>
                            <div class="col-md-12">
                                <label for="kh_dienthoai">Điện thoại</label>
                                <input type="text" class="form-control" name="kh_dienthoai" id="kh_dienthoai"
                                    value="<?=$khachhang['phone']??""?>" >
                            </div>
                            <div class="col-md-12">
                                <label for="kh_email">Email</label>
                                <input type="text" class="form-control" name="kh_email" id="kh_email"
                                value="<?=$khachhang['email']??""?>" <?=isset($khachhang['email']) ? 'readonly' : ''?>>
                            </div>
                        </div>

                        <h4 class="mb-3">Hình thức thanh toán</h4>

                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="httt-1" name="httt_ma" type="radio" class="custom-control-input" required=""
                                    value="1">
                                <label class="custom-control-label" for="httt-1">Tiền mặt</label>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnDatHang">Đặt hàng</button>

                    </div>
                </div>
            </form>

        </div>
        <!-- End block content -->
    </main>