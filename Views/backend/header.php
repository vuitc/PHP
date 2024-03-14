<?php
// session_start();
ob_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Title</title>
</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php?controller=admin">Quản trị</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php?controller=admin&action=khachHangIndex">Khách hàng</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?controller=admin&action=categoryIndex">Danh mục sản phẩm</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?controller=admin&action=productIndex">Sản phẩm</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?controller=admin&action=hoadonIndex">Hóa đơn</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?controller=admin&action=binhLuanIndex">Bình luận</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Xem thêm
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="index.php?controller=admin&action=sliderIndex">Quản lí hiển thị</a></li>
                <li><a class="dropdown-item" href="index.php?controller=admin&action=sizeIndex">Kích cở</a></li>
                <li><a class="dropdown-item" href="index.php?controller=admin&action=colorIndex">Màu sắc</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="index.php?controller=admin&action=voucherIndex">Khuyến mãi</a></li>
                <li><a class="dropdown-item" href="index.php?controller=admin&action=bieudoIndex">Thống kê</a></li>
              </ul>
            </li>
            
          </ul>
         <div class="d-flex">
            <a href="index.php?controller=admin" class="nav-link text-dark"><?=$_SESSION['username_S']?></a>
           <a href="index.php?controller=register&action=logout" class="nav-link text-dark">Đăng xuất</a>
         </div>
        </div>
      </div>
    </nav>
    
   
