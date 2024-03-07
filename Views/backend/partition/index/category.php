<div class="span-9">
    <h1>Category List</h1>
    <?php if($categories): ?>
    <a href="index.php?controller=admin&action=categoryCreate" class="btn btn-primary mb-3">Create Category</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Main Image</th>
                <th>Actions</th>
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