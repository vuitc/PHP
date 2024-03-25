<div class="col-12" style="min-height:80vh">
    <h1>Sửa danh mục</h1>
    <form method="POST" action="index.php?controller=admin&action=categoryUpdate&id=<?php echo $categoryDetails['id']; ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Tên danh mục:</label>
            <input type="text" name="name" id="name" class="form-control" required value="<?php echo $categoryDetails['name'] ?>">
        </div>
        <div class="form-group">
            <label for="duongdan">Tên đường dẫn:</label>
            <input type="text" name="duongdan" id="duongdan" class="form-control" required value="<?php echo $categoryDetails['slug'] ?>">
        </div>
        <div class="form-group">
          <label for="">Chọn ảnh</label>
          <input type="hidden" name="imagecu" value="<?php echo $categoryDetails['img_chinh'] ?>">
          <input type="file" class="form-control-file" name="image" id="" placeholder="" aria-describedby="fileHelpId">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>