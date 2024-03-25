<div class="col-12" style="min-height:80vh">
    <h1>Tạo sản phẩm</h1>
    <form action="index.php?controller=admin&action=productC" method="POST">
        <div class="form-group">
            <label for="name">Tên:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="dacbiet">Đặc biệt:</label>
              <select class="form-control" name="dacbiet" id="">
                <option value="0" selected>0</option>
                <option value="1">1</option>
              </select>     
        </div>
        <div class="form-group">
            <label for="luotxem">Lượt xem:</label>
            <input type="number" name="luotxem" id="luotxem" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="ngaylap">Ngày tạo:</label>
            <input type="date" name="ngaylap" id="ngaylap" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="mota">Mô tả:</label>
            <textarea name="mota" id="mota" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="chitiet">Chi tiết:</label>
            <textarea name="chitiet" id="chitiet" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="id_category">ID danh mục:</label>
            <select name="id_category" id="id_category" class="form-control" required>
                <?php
                    foreach ($categories as $c){
                        extract($c);
                        echo '<option value="'.$id.'">'.$id.'</option>';
                    }
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>