<?php
    function renderPages($countPages, $current_page, $url) {
        $str = '<ul class="pagination justify-content-center mb-3">';
        // Nút Previous
        $str .= '<li class="page-item ' . (($current_page == 1) ? 'disabled' : '') . '">';
        $str .= '<a class="page-link" href="' . $url . '&pages=' . max(1, $current_page - 1) . '" aria-label="Previous">';
        $str .= '<span aria-hidden="true">&laquo;</span>';
        $str .= '<span class="sr-only">Previous</span>';
        $str .= '</a></li>';
        // Danh sách các trang
        for ($i = 1; $i <= $countPages; $i++) {
            $str .= '<li class="page-item ' . (($i == $current_page) ? 'active' : '') . '">';
            $str .= '<a class="page-link" href="' . $url . '&pages=' . $i . '">' . $i . '</a>';
            $str .= '</li>';
        }
        // Nút Next
        $str .= '<li class="page-item ' . (($current_page == $countPages) ? 'disabled' : '') . '">';
        $str .= '<a class="page-link" href="' . $url . '&pages=' . min($countPages, $current_page + 1) . '" aria-label="Next">';
        $str .= '<span aria-hidden="true">&raquo;</span>';
        $str .= '<span class="sr-only">Next</span>';
        $str .= '</a></li>';
        $str .= '</ul>';
        return $str;
    }

    function renderCountColor($count,$link='idColor'){
        /*count 2 bảng size, color tùy theo query table mới query: id, name, total*/
        $str='';
        if (is_array($count) && !empty($count)) {
            foreach ($count as $item) {
                extract($item);
                $str.='<li><a href="index.php?controller=shop&action=show&'.$link.'='.$id.'"><i class="fa fa-angle-right"></i>'.$name.' <span class="vu_count">('.$total.')</span></a></li>';
            }

        }
        return $str;
    }
    function renderProduct($product){
        $str='';
        if (is_array($product) && !empty($product)) {
            foreach ($product as $item) {
                extract($item);
                $salePrice=($price*(100-$giamgia))/100;
                $formattedSalePrice = number_format($salePrice, 0, ',', '.');
                $formattedPrice = number_format($price, 0, ',', '.');
                $str.=' <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="asset/img/'.$image.'" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">'.$name.'</h6>
                        <div class="d-flex justify-content-center">
                            <h6>'.$formattedSalePrice.'</h6><h6 class="text-muted ml-2"><del>'.$formattedPrice.'</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="index.php?controller=detail&id='.$id.'" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
                        <a href="index.php?controller=cart&action=store&id='.$id.'&idColor='.$idColor.'&idSize='.$idSize.'" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm giỏ hàng</a>
                    </div>
                </div>
            </div>';
            }

        }else{
            $str="Hiện tại chưa có sản phẩm";
        }
        return $str;
    }
?>


<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 287px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Trang cửa hàng</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="index.php">Trang chủ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Cửa hàng</p>
        </div>
    </div>
</div>
</div>
<!-- </div> -->
<div class="container-fluid">
    <div class="row">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-12">
            <!-- start -->
            <div class="vu_common-sidebar-widget">
                <h3 class="vu_sidebar-title">Màu</h3>
                <ul class="vu_sidebar-list">
                    <?php
                            $kqRenderCountColor=renderCountColor($countColor);
                            echo $kqRenderCountColor;                      
                            ?>
                    <!-- <li><a href="#" class="vu_active"><i class="fa fa-angle-right"></i>Red <span class="vu_count">(5)</span></a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Orange <span class="vu_count">(4)</span></a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Blue <span class="vu_count">(4)</span></a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Black <span class="vu_count">(4)</span></a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Green <span class="vu_count">(4)</span></a></li> -->
                </ul>
            </div>
            <div class="vu_common-sidebar-widget">
                <h3 class="vu_sidebar-title">Kích cở</h3>
                <ul class="vu_sidebar-list">
                    <?php
                            $temp='idSize';
                            $kqRenderCountSize=renderCountColor($countSize,$temp);
                            echo $kqRenderCountSize;                      
                            ?>
                    <!-- <li><a href="#"><i class="fa fa-angle-right"></i>Red <span class="vu_count">(5)</span></a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Orange <span class="vu_count">(4)</span></a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Blue <span class="vu_count">(4)</span></a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Black <span class="vu_count">(4)</span></a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Green <span class="vu_count">(4)</span></a></li> -->
                </ul>
            </div>
            <!-- Color End -->

            <!-- Size Start -->

            <!-- Size End -->
        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-12">
            <!-- <div class="vu_shop-topbar-wrapper row">
                    <div class="vu_toolbar-short-area">
                        <div class="vu_toolbar-shorter ">
                            <label>Sort By:</label>
                            <select class="vu_wide">
                                <option data-display="Select">Nothing</option>
                                <option value="Name, A to Z">Name, A to Z</option>
                                <option value="Name, Z to A">Name, Z to A</option>
                                <option value="Price, low to high">Price, low to high</option>
                                <option value="Price, high to low">Price, high to low</option>
                            </select>
                        </div>
                        <div class="vu_toolbar-shorter ">
                            <label>Show</label>
                            <select class="vu_small">
                                <option data-display="Select">10</option>
                                <option value="">20</option>
                                <option value="30">30</option>
                            </select>
                            <span>per page</span>
                        </div>
                    </div>
                </div> -->
            <div class="row pb-3">
                <!-- php -->
                <?php
                   $kqProduct=renderProduct($product);
                   echo $kqProduct;
                   ?>
            </div>
            <div class="col-12 pb-1">
                <nav aria-label="Page navigation">
                    <!-- <ul class="pagination justify-content-center mb-3">
                            <li class="page-item disabled">
                              <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                              </a>
                            </li>
                          </ul> -->
                    <?php
                          $kqRenderPages=renderPages($countPages,$currentPage,$url);
                          echo $kqRenderPages;
                          ?>
                </nav>
            </div>
        </div>
    </div>
    <!-- Shop Product End -->
</div>
</div>
</div>