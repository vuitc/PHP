<div class="span9">
    <h1>Sửa chi tiết hàng hóa</h1>
    <form method="POST" action="index.php?controller=admin&action=ctproductUpdate">
        <label for="soluongton">Số lượng tồn:</label>
        <input type="number" name="soluongton" id="soluongton" value="<?php echo $slt ?>" required>
        <input type="hidden" value="<?php echo $idp?>" name="idProduct">
        <input type="hidden" value="<?php echo $idc?>" name="idColor">
        <input type="hidden" value="<?php echo $ids?>" name="idSize">
        <label for="price">Giá:</label>
        <input type="number" name="price" id="price" value="<?php echo  $p ?>" required>
        <div class="form-group">
            <label for="giamgia">Phần trăm giảm giá:</label>
            <select class="form-control" id="giamgia" name="giamgia" required>
                <?php for ($i = 10; $i <= 70; $i += 10) : ?>
                    <option value="<?= $i ?>" <?php echo ($giamgia==$i) ? 'selected' : ''; ?>><?= $i ?>%</option>
                <?php endfor; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
