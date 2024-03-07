<div class="span-9">
    <h1>Create Category</h1>
    <form action="index.php?controller=admin&action=categoryC" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" required>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label for="parent_id" class="form-label">Img_chinh</label>
            <input type="text" class="form-control" id="parent_id" name="parent_id" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>