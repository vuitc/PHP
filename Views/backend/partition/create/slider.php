<div class="col-12" style="min-height:80vh">
    <h1>Tạo danh mục hiển thị</h1>
    <form action="index.php?controller=admin&action=sliderC" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="image">Ảnh:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>
        <div class="form-group">
            <label for="title1">Chi tiết 1:</label>
            <input type="text" id="title1" name="title1" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="title2">Chi tiết 2:</label>
            <input type="text" id="title2" name="title2" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="type">Loại:</label>
            <select id="type" name="type" class="form-control" required>
                <option value="1">Carousel</option>
                <option value="2">Sale</option>
                <option value="3">Brand</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>