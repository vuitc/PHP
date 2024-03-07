<div class="span-9">
    <h1>Edit Product</h1>
    <form method="POST" action="index.php?controller=admin&action=productUpdate&id=<?php echo $productDetails['id']; ?>">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required value="<?php echo $productDetails['name'] ?>">
        </div>
        <div class="form-group">
            <label for="id_category">Category ID:</label>
            <input type="text" name="id_category" id="id_category" class="form-control" required value="<?php echo $productDetails['id_category'] ?>">
        </div>
        <div class="form-group">
            <label for="dacbiet">dacbiet:</label>
            <input type="text" name="dacbiet" id="dacbiet" class="form-control" required value="<?php echo $productDetails['dacbiet'] ?>">
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