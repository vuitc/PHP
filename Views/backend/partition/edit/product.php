<div class="col-12" style="min-height:80vh">
    <h1>Sửa sản phẩm</h1>
    <form method="POST" action="index.php?controller=admin&action=productUpdate&id=<?php echo $productDetails['id']; ?>">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required value="<?php echo $productDetails['name'] ?>">
        </div>
        <div class="form-group">
            <label for="id_category">ID danh mục:</label>
            <select name="id_category" id="id_category" class="form-control" required>
                <?php
                foreach ($categories as $c) {
                    extract($c);
                    echo '<option value="' . $id . '">' . $name . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Đặt biệt:</label>
            <select name="dacbiet" id="dacbiet" class="form-control" required>
                <option value="0" <?php echo ($productDetails['dacbiet'] == 0) ? 'selected' : ''; ?>>0</option>
                <option value="1" <?php echo ($productDetails['dacbiet'] == 1) ? 'selected' : ''; ?>>1</option>
            </select>
        </div>

        <div class="form-group">
            <label for="luotxem">luotxem:</label>
            <input type="number" name="luotxem" id="luotxem" class="form-control" required value="<?php echo $productDetails['luotxem'] ?>">
        </div>
        <div class="form-group">
            <label for="ngaylap">Created Date:</label>
            <input type="date" name="ngaylap" id="ngaylap" class="form-control" cols="4" required value="<?php echo $productDetails['ngaylap'] ?>">
        </div>
        <div class="form-group">
            <label for="mota">mota:</label>
            <textarea name="mota" id="mota" class="form-control" required rows="10" cols="40"><?php echo $productDetails['mota'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="chitiet">chitiet:</label>
            <textarea name="chitiet" id="chitiet" class="form-control" rows="10" cols="40" required><?php echo $productDetails['chitiet'] ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>