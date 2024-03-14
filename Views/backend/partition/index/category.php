<div class="col-12" style="min-height:80vh">
    <h1>Danh mục chính</h1>
    <?php if($categories): ?>
    <a href="index.php?controller=admin&action=categoryCreate" class="btn btn-primary mb-3">Tạo danh mục</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Tên đường dẫn</th>
                <th>Ảnh chính</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
            <tr>
                <td><?php echo $category['id']; ?></td>
                <td><?php echo $category['name']; ?></td>
                <td><?php echo $category['slug']; ?></td>
                <td><img src="asset/img/<?php echo $category['img_chinh']; ?>" alt="Main Image" style="width: 50px;">
                </td>
                <td>
                    <a href="index.php?controller=admin&action=categoryEdit&id=<?php echo $category['id']; ?>"
                        class="btn btn-warning">Edit</a>
                    <form action="index.php?controller=admin&action=categoryDestroy&id=<?php echo $category['id']; ?>"
                        method="POST" style="display: inline-block;">
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Bạn chắc chứ?')">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <div class="alert alert-info">Không tìm thấy danh mục nào.</div>
    <?php endif; ?>
</div>