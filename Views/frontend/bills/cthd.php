<?php
    ob_start();
?>
 
 <?php if (empty($cthds)): ?>
    <?php header("Location: index.php"); ?>
<?php else: ?>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Hình</th>
                    <th>Số lượng mua</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cthds as $hoadon): ?>
                    <tr>
                        <td><?php echo $hoadon['name'].'_'.$hoadon['size'].'_'.$hoadon['color']; ?></td>
                        <td><img src="<?='asset/img/'.$hoadon['image']?>" alt="" style="width:50px"></td>
                        <td><?php echo $hoadon['soluongmua']; ?></td>
                        <td><?php echo $hoadon['thanhtien']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

      </div>
      </div>
      </div>