<div class="col-12" style="min-height:80vh">
    <h1>Kích cở</h1>
    <?php if($sizes): ?>
    <a href="index.php?controller=admin&action=sizeCreate" class="btn btn-primary mb-3">Create Size</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Màu sắc</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($sizes as $size): ?>
            <tr>
                <td><?php echo $size['id']; ?></td>
                <td><?php echo $size['size']; ?></td>
                <td>
                    <a href="index.php?controller=admin&action=sizeEdit&id=<?php echo $size['id']; ?>"
                        class="btn btn-warning">Sửa</a>
                    <form action="index.php?controller=admin&action=sizeDestroy&id=<?php echo $size['id']; ?>"
                        method="POST" style="display: inline-block;">
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Bạn chắc chứ?')">Xóa</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <div class="alert alert-info">Không tìm thấy</div>
    <?php endif; ?>
</div>