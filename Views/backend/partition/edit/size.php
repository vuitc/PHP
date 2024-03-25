<div class="col-12" style="min-height:80vh">
    <h1>Sửa màu sắc</h1>

    <!-- Hiển thị thông tin chi tiết của màu sắc -->
    <form method="POST" action="index.php?controller=admin&action=sizeUpdate&id=<?php echo $sizeDetails['id']; ?>">
        <label for="size">Size:</label>
        <input type="text" name="size" id="size" value="<?php echo $sizeDetails['size']; ?>" required>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>