<div class="col-12" style="min-height:80vh">
    <h1>Tạo danh mục</h1>
    <form action="index.php?controller=admin&action=categoryC" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Tên danh mục:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Đường dẫn</label>
            <input type="text" class="form-control" id="slug" name="slug" required>
        </div>
        <div class="form-group">
            <label for="image">Ảnh:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>
        <!-- <div class="mb-3">
            <label for="parent_id" class="form-label">Img_chinh</label>
            <input type="text" class="form-control" id="parent_id" name="parent_id" required>
        </div> -->
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>