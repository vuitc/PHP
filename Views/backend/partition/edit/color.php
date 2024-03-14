<div class="col-12" style="min-height:80vh">
    <h1>Edit Color</h1>

    <!-- Hiển thị thông tin chi tiết của màu sắc -->
    <form method="POST" action="index.php?controller=admin&action=colorUpdate&id=<?php echo $colorDetails['id']; ?>">
        <label for="color">Color:</label>
        <input type="text" name="color" id="color" value="<?php echo $colorDetails['color']; ?>" required>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>