<?php
function renderProduct($product){
    $str='';
    if (is_array($product) && !empty($product)) {
        $str.=' <div class="container-fluid pt-5">
                    <div class="text-center mb-4">
                        <h2 class="section-title px-5"><span class="px-2" style="font-family:cursive">'.$product[1].'</span></h2>
                    </div>
                    <div class="row px-xl-5 pb-3">
                        ';
        foreach ($product[0] as $item) {
            extract($item);
            $salePrice=($price*(100-$giamgia))/100;
            $formattedSalePrice = number_format($salePrice, 0, ',', '.');
            $formattedPrice = number_format($price, 0, ',', '.');
            $str.='<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="asset/img/'.$image.'" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">'.$name.'</h6>
                            <div class="d-flex justify-content-center">
                                <h6>'.$formattedSalePrice.'</h6>
                                <h6 class="text-muted ml-2"><del>'.$formattedPrice.'</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="index.php?controller=detail&id='.$id.'" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
                            <a href="index.php?controller=cart&action=store&id='.$id.'&idColor='.$idColor.'&idSize='.$idSize.'" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm giỏ hàng</a>
                        </div>
                        </div>
                    </div>';
        }
    }
    $str.='
    </div>';
    return $str;
}
function renderCarousel($img_slider) {
    $str = "";
    if (is_array($img_slider) && !empty($img_slider)) {
        foreach ($img_slider as $key => $item) {
            extract($item);
            //truong=1 là carousel, 2 là sale
            if($truong==1){
            $activeClass = ($key === 0) ? 'active' : ''; // Add 'active' class for the first $key
            $str .= '<div class="carousel-item ' . $activeClass . '" style="height: 410px;">
                        <img class="img-fluid" src="asset/img/' . $img . '" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">' . $title1 . '</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">' . $title2 . '</h3>
                                <a href="index.php?controller=shop" class="btn btn-light py-2 px-3">Shop Now</a>
                            </div>
                        </div>
                    </div>';
            }
        }
    } else {
        $str .= '<p>No slider data available</p>';
    }
    return $str;
}
function renderImgSale($img_slider) {
    $str = "";
    if (is_array($img_slider) && !empty($img_slider)) {
        foreach ($img_slider as $key => $item) {
            extract($item);
            //truong=1 là carousel, 2 là sale
            if($truong==2){
            $str.= '<div class="col-md-6 pb-4">
                        <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                            <img src="asset/img/'.$img.'" alt="">
                            <div class="position-relative" style="z-index: 1;">
                                <h5 class="text-uppercase text-primary mb-3">'.$title1.'</h5>
                                <h1 class="mb-4 font-weight-semi-bold">'.$title2.'</h1>
                                <a href="index.php?controller=shop" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                            </div>
                        </div>
                    </div>';
            }
        }
    } else {
        $str .= '<p>No slider data available</p>';
    }
    return $str;
}
function renderImgCategorys($categorys){
    $str='';
    if (is_array($categorys) && !empty($categorys)) {
        $str='';
        foreach ($categorys as $item) {
            # code...
            extract($item);
            $str.=' <div class="col-lg-3 col-md-6 pb-1">
                        <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                            <a href="index.php?controller=shop&action=show&idCatalog='.$id.'" class="cat-img position-relative overflow-hidden mb-3">
                                <img class="img-fluid" src="asset/img/'.$img_chinh.'" alt="">
                            </a>
                            <h5 class="font-weight-semi-bold m-0">'.$name.'</h5>
                        </div>
                    </div>';
        }
    }else{
        $str .= '<p>No slider data available</p>'; 
    }
    return $str;
}
function renderVender($img_slider){
    $str = "";
    if (is_array($img_slider) && !empty($img_slider)) {
        foreach ($img_slider as $key => $item) {
            extract($item);
            //truong=1 là carousel, 2 là sale
            if($truong==3){
            $str.= '<div class="vendor-item border p-4">
                        <img src="asset/img/'.$img.'" alt="">
                    </div>';
            }
        }
    } else {
        $str .= '<p>No slider data available</p>';
    }
    return $str;
}
?>
<div id="header-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php
        echo renderCarousel($img_slider);
        ?>
    </div>
    <!-- php -->
    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-prev-icon mb-n2"></span>
        </div>
    </a>
    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-next-icon mb-n2"></span>
        </div>
    </a>
</div>
</div>
</div>
</div>
<!-- Navbar End -->


<!-- Featured Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->


<!-- Categories Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <?php
            $kqImgChinh=renderImgCategorys($categorys);
            echo $kqImgChinh;
            ?>
    </div>
</div>
<!-- Categories End -->
<!-- Offer Start -->
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <?php
        $kqImgSale=renderImgSale($img_slider);
        echo $kqImgSale;
        ?>

    </div>
</div>
<!-- Offer End -->


<!-- Products Start -->
<!-- render Product mới nhất -->
<?php
$kqProductNew=renderProduct($productNew);
echo $kqProductNew;

?>
</div>
<!-- Products End -->


<!-- Subscribe Start -->
<div class="container-fluid bg-secondary my-5">
    <div class="row justify-content-md-center py-5 px-xl-5">
        <div class="col-md-6 col-12 py-5">
            <div class="text-center mb-2 pb-2">
                <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2" style="font-family:cursive">Cập Nhật Thường Xuyên</span></h2>
                <p>Luôn cập nhật những thông tin mới nhất</p>
                <p>Đừng bỏ lỡ những tin tức và cập nhật quan trọng!</p>
            </div>
            <form action="">
                <div class="input-group">
                    <input type="text" class="form-control border-white p-4" placeholder="Email Goes Here">
                    <div class="input-group-append">
                        <button class="btn btn-primary px-4">Đăng kí ngay</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Subscribe End -->


<!-- Products Start -->
<!-- sản phẩm bán chạy -->
<?php
    $kqProductHot=renderProduct($productHot);
    echo $kqProductHot;
?>
</div>

<?php
    $kqrenderAoDai=renderProduct($productAoDai);
    echo $kqrenderAoDai;
?>
</div>
<!-- Products End -->


<!-- Vendor Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel vendor-carousel">
                <?php
                    $kqImgVender=renderVender($img_slider);
                    echo $kqImgVender;
                ?>

            </div>
        </div>
    </div>
</div>
<!-- Vendor End -->