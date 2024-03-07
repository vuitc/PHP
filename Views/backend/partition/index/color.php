<div class="span-9">
    <h1>Color List</h1>

    <?php if($colors): ?>
    <a href="index.php?controller=admin&action=colorCreate" class="btn btn-primary mb-3">Create Color</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Color</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($colors as $color): ?>
            <tr>
                <td><?php echo $color['id']; ?></td>
                <td><?php echo $color['color']; ?></td>
                <td>
                    <a href="index.php?controller=admin&action=colorEdit&id=<?php echo $color['id']; ?>"
                        class="btn btn-warning">Edit</a>
                    <form action="index.php?controller=admin&action=colorDestroy&id=<?php echo $color['id']; ?>"
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
    <div class="alert alert-info">No colors found.</div>
    <?php endif; ?>
</div>