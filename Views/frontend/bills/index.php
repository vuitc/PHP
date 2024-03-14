<?php
    ob_start();
    // echo '<pre>';
    // var_dump($cthds);
    // echo '</pre>';
?>
 
 <?php if (!empty($cthds)) : ?> 
<div class="table-responsive">
    <form action="" method="post">
      <table class="table table-bordered" border="0">           
       <tr>
          <td colspan="4">
            <h2 style="color: red;">HÓA ĐƠN MỚi NHẤT</h2>
          </td>
        </tr>
      <tr>
          <td colspan="2">Số Hóa đơn: <?php echo $_SESSION['mahd']; ?></td>
          <td colspan="2"> Ngày lập:<?php echo $hd['ngaydat']; ?></td>
        </tr>
       <tr>
          <td colspan="2">Họ và tên:<?php echo $hotenkh['tenkh']; ?></td>
          <td colspan="2"></td>
        </tr>
       <tr>
          <td colspan="2">Địa chỉ: <?php echo $hd['diachi']; ?> </td>
          <td colspan="2"></td>
        </tr>
        <tr>
          <td colspan="2">Số điện thoại: <?php echo $hd['phone']; ?></td>
          <td colspan="2"></td>
        </tr>
      </table>
     <!-- Kiểm tra xem có chi tiết hóa đơn không -->
      <!-- Thông tin sản phẩm -->
      <table class="table table-bordered">
        <thead>

          <tr class="table-success">
            <th>Số TT</th>
            <th>Thông Tin Sản Phẩm</th>
            <th>Tùy Chọn Của Bạn</th>
            <th>Giá</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $str='';
          $sum=0;
            foreach($cthds as $key=>$item){
              extract($item);
              $salePrice=($price*(100-$giamgia))/100;
              $formattedSalePrice = number_format($salePrice, 0, ',', '.');
              $sum+=$salePrice*$soluongmua;
              $str.='
                <tr>           
                  <td>'.($key+1).'</td>
                  <td>'.$name.'</td>
                  <td>Màu: '.$color.' Size:'.$size.' </td>
                  <td>Đơn Giá:'.$formattedSalePrice.'  - Số Lượng:'.$soluongmua.' <br />
                  </td>
                </tr>
              ';
            }
            echo $str;
          ?>
          
          
          <tr>
            <td colspan="2">
              <b>Tổng:  <?php
                echo number_format($sum, 0, ',', '.');
              ?></b>
            </td>
            <td>
               <b>Giảm voucher:
                <?php
                  if($hd['giam']>0){
                    echo number_format($hd['giam'], 0, ',', '.');
                  } else{
                    echo "Không dùng voucher";
                  }
                ?>
               </b>
            </td>
            <td>
                <b>Vận chuyển:</b>
                <?php
                  if($hd['vanchuyen']>0){
                    echo number_format($hd['vanchuyen'], 0, ',', '.');
                  } else{
                    echo "Miễn phí giao hàng";
                  }
                ?>
            </td>
           
          </tr>
          <tr>
            <td colspan="3">
              <b>Tổng Tiền</b>
            </td>
            <td style="float: right;">
            <?php
                  if($hd['tongtien']>0){
                    echo number_format($hd['tongtien'], 0, ',', '.');
                  }
                ?>
              <b> <sup><u>đ</u></sup></b>
            </td>
           
          </tr>
        </tbody>
      </table>
      <?php else : ?>
      <p>Chưa có hóa đơn mới nhất.</p>
      <?php endif; ?>
    </form>