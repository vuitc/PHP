<?php
session_start();
ob_start();
// echo '<pre>';
// var_dump($products);
// echo '</pre>';
// var_dump($pages);
// echo '</br>';
function renderCategory($categorys)
{
    if (is_array($categorys) && !empty($categorys)) {
        $str = '';
        foreach ($categorys as $item) {
            # code...
            extract($item);
            $str .= '<a href="index.php?controller=shop&action=show&idCatalog=' . $id . '" class="nav-item nav-link">' . $name . '</a>';
        }
        return $str;
    } else {
        throw new Exception("Error Processing Request", 1);
    }
}
?>
<script>
// Embedding PHP array into JavaScript
var findAllProduct1 = <?php echo json_encode($productss); ?>;
// Now you can use the findAllProduct variable in your JavaScript code
// console.log(findAllProduct1);
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var searchForm = document.getElementById('searchForm');
    var searchInput = document.getElementById('searchInput');
    var searchResultsContainer = document.getElementById('searchResults');
    var isMouseInSearchResults = false;

    // Dữ liệu sản phẩm để tìm kiếm
    var products = findAllProduct1;
    // console.log(products);
    // Xử lý sự kiện tìm kiếm khi thay đổi giá trị
    searchInput.addEventListener('input', function() {
        var searchTerm = searchInput.value.toLowerCase();
        var searchResults = products.filter(function(product) {
            return product['name'].toLowerCase().includes(searchTerm);
        });

        displaySearchResults(searchResults);
    });

    // Hiển thị kết quả tìm kiếm khi hover vào
    searchInput.addEventListener('mouseenter', function() {
        searchResultsContainer.style.display = 'block';
    });

    // Ẩn kết quả tìm kiếm khi hover ra khỏi ô nhập liệu
    searchInput.addEventListener('mouseleave', function() {
        setTimeout(function() {
            if (!isMouseInSearchResults) {
                searchResultsContainer.style.display = 'none';
            }
        }, 200); // Đợi 200ms trước khi ẩn kết quả
    });

    // Sự kiện khi chuột đi vào kết quả tìm kiếm
    searchResultsContainer.addEventListener('mouseenter', function() {
        isMouseInSearchResults = true;
    });

    // Sự kiện khi chuột rời khỏi kết quả tìm kiếm
    searchResultsContainer.addEventListener('mouseleave', function() {
        isMouseInSearchResults = false;
        searchResultsContainer.style.display = 'none';
    });

    // Hiển thị kết quả tìm kiếm
    function displaySearchResults(results) {
        var html = '';
        if (results.length > 0) {
            html += '<ul class="product-list" style=" list-style: none; padding: 0; margin: 0;">';
            results.forEach(function(result) {
                html += '<a href="index.php?controller=detail&id=' + result['id'] +
                    '" class="product-item" style="padding: 10px; border-bottom: 1px solid #ced4da; cursor: pointer; display:block" ' +
                    'onmouseover="this.style.backgroundColor=\'#f8f9fa\'" ' +
                    'onmouseout="this.style.backgroundColor=\'transparent\'" ' +
                    'onclick="selectProduct(\'' + result['name'] + '\')">' + result['name'] + '</a>';
            });
            // html += '</a>';
            searchResultsContainer.style.display = 'block';
        } else {
            html += '<div>Hiện tại chưa có sản phẩm phù hợp</div>';
            // searchResultsContainer.style.display = 'none';
        }
        searchResultsContainer.innerHTML = html;
    }

    // Hàm chọn sản phẩm khi người dùng click
    window.selectProduct = function(product) {
        // Xử lý logic khi sản phẩm được chọn
        console.log('Selected product:', product);
    };

    window.searchProducts = function() {
        var searchTerm = searchInput.value.toLowerCase();
        var searchResults = products.filter(function(product) {
            return product.toLowerCase().includes(searchTerm);
        });

        displaySearchResults(searchResults);
    };
    searchForm.addEventListener('submit', function(e) {
        e.preventDefault();
        searchProducts();
    });
});
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="asset/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="asset/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="asset/css/style.css" rel="stylesheet">
    <!-- Jquery  -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="index.php" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="" id="searchForm">
                    <div class="input-group" style="position: relative;">
                        <input type="text" class="form-control" id="searchInput" placeholder="Tìm kiếm sản phẩm">
                        <div class="input-group-append" style=" position: absolute; right: 0; top: 0; bottom: 0;">
                            <span class="input-group-text bg-transparent text-primary" onclick="searchProducts()">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                        <div id="searchResults"
                            style=" position: absolute;top: 110%; left: 0; z-index: 1000; width: 100%; background-color: #fff; border: 1px solid #ced4da; max-height: 200px; overflow-y: auto; display: block; ">
                            <!-- <ul class="product-list" style=" list-style: none; padding: 0; margin: 0;">
                                <li class="product-item" style="padding: 10px; border-bottom: 1px solid #ced4da;" onmouseover="this.style.backgroundColor='#f8f9fa';" onmouseout="this.style.backgroundColor='transparent';">Hi</li>
                            </ul> -->
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="index.php?controller=bill" class="btn border">
                    <i class="fas fa-file-invoice text-primary"></i>
                </a>
                <a href="index.php?controller=cart" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                    data-toggle="collapse" href="#navbar-vertical"
                    style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Danh mục sản phẩm</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
                    id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 287px">
                        <?php
                        $kq = renderCategory($categorys);
                        echo $kq;
                        ?>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span
                                class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link active">Trang chủ</a>
                            <!-- <a href="index.php?controller=shop" class="nav-item nav-link">Cửa hàng</a> -->
                            <a href="index.php?controller=detail&id=1" class="nav-item nav-link">Trang chi tiết</a>
                            <!-- <a href="index.php?controller=contact" class="nav-item nav-link">Liên hệ</a> -->
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <?php
                                $str='';
                                if (isset($_SESSION['username_S']) && $_SESSION['username_S']) {
                                    $str .= '<span  class="nav-item nav-link">' . $_SESSION['username_S'] . '</span>';
                                    $str .= '<a href="index.php?controller=register&action=change_pass" class="nav-item nav-link">Đổi mật khẩu</a>';
                                    $str .= '<a href="index.php?controller=register&action=logout" class="nav-item nav-link">Đăng xuất</a>';
                                } else {
                                    $str .= ' <a href="index.php?controller=register&action=sign_in" class="nav-item nav-link">Đăng nhập</a>
                                    <a href="index.php?controller=register" class="nav-item nav-link">Đăng kí</a>
                                    <a href="index.php?controller=register&action=change_pass" class="nav-item nav-link">Đổi mật khẩu</a>
                                    <a href="index.php?controller=register&action=change_passbymail" class="nav-item nav-link">Quên mật khẩu</a>
                                    <span  class="nav-item nav-link">Xin chào</span>
                                    
                                    ';
                                }
                                echo $str;
                            ?>
                        </div>
                    </div>
                    <!-- test -->
                </nav>

                <!-- </div>
        </div>
    </nav> -->