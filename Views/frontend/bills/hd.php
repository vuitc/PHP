<?php
    ob_start();
    // echo '<pre>';
    // var_dump($cthds);
    // echo '</pre>';
?>
 
 <div class="table-responsive">
  <table class="table">
    <thead>
        <tr>
            <th>MAHD</th>
            <th>Tên khách hàng</th>
            <th>Ngày đặt</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($hds as $hoadon): ?>
            <tr>
                <td><a href="index.php?controller=bill&action=cthd&id=<?=$hoadon['id'];?>"><?php echo $hoadon['id']; ?></a></td>
                <td><?php echo $hoadon['tenkh']; ?></td>
                <td><?php echo $hoadon['ngaydat']; ?></td>
                <td><?php echo $hoadon['phone']; ?></td>
                <td><?php echo $hoadon['diachi']; ?></td>
                <td><?php echo $hoadon['tongtien']; ?></td>
                <td><?php 

                    $b=$hoadon['tinhtrang']; 
                    if($b==0){
                        echo 'Đang chuẩn bị hàng';
                    }
                    if($b==1){
                        echo 'Đang giao';
                    }
                    if($b==2){
                        echo 'Đã giao hàng';
                    }
                ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
  </table>
</div>
      </div>
      </div>
      </div>