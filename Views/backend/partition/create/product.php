<div class="span9">
    <h1>Create Product</h1>
    <form action="index.php?controller=admin&action=productC" method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="id_category">Category ID:</label>
            <input type="text" name="id_category" id="id_category" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="dacbiet">dacbiet:</label>
            <input type="text" name="dacbiet" id="dacbiet" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="luotxem">luotxem:</label>
            <input type="number" name="luotxem" id="luotxem" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="ngaylap">Created Date:</label>
            <input type="date" name="ngaylap" id="ngaylap" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="mota">mota:</label>
            <textarea name="mota" id="mota" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="chitiet">chitiet:</label>
            <textarea name="chitiet" id="chitiet" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>