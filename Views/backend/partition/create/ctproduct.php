<div class="col-12" style="min-height:80vh">
    <h1>Chi tiết sản phẩm</h1>
    <form action="index.php?controller=admin&action=ctproductC" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="idproduct" value="<?=$_GET['id']?>">
            <label for="">Màu sắc</label>
            <select class="form-control" name="idcolor" id="">
                <?php
                $str = '';
                foreach ($colors as $item) {
                    extract($item);
                    $str .= '<option value="' . $id . '">' . $color . '</option>';
                }
                echo $str;
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="gia">Kích cở</label>
            <select class="form-control" name="idsize" id="">
                <?php
                $str = '';
                foreach ($sizes as $item) {
                    extract($item);
                    $str .= '<option value="' . $id . '">' . $size . '</option>';
                }
                echo $str;
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="gia">Giá</label>
            <input type="text" id="price" name="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="soluongton">Số lượng tồn</label>
            <input type="text" id="soluongton" name="soluongton" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="giamgia">Phần trăm giảm giá:</label>
            <select class="form-control" id="giamgia" name="giamgia" required>
                <?php for ($i = 10; $i <= 70; $i += 10) : ?>
                    <option value="<?= $i ?>"><?= $i ?>%</option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="form-group">
          <label for="">Chọn ảnh</label>
          <input type="file" class="form-control-file" name="image" id="" placeholder="" aria-describedby="fileHelpId">
        </div>
        <button type="submit" class="btn btn-primary">Tạo</button>
    </form>
</div>