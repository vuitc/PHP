<div class="span9">
    <h1>Product List</h1>
    <form id="searchForm">
        <div class="form-group">
            <label for="search">Search by Name:</label>
            <input type="text" class="form-control" id="search" name="search" placeholder="Enter product name">
        </div>
    </form>
    <?php if($products): ?>
    <a href="index.php?controller=admin&action=productCreate" class="btn btn-primary mb-3">Create Product</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category ID</th>
                <th>Special</th>
                <th>Views</th>
                <th>Created Date</th>
                <th>Description</th>
                <th>Details</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="searchResult">
            <?php foreach ($products as $product): ?>
            <?php extract($product); ?>
            <tr>
                <td>
                    <a href="index.php?controller=admin&action=ctproductIndex&id=<?=$id; ?>"><?php echo $id; ?></a>
                    
                </td>
                <td><?php echo $name; ?></td>
                <td><?php echo $id_category; ?></td>
                <td><?php echo $dacbiet; ?></td>
                <td><?php echo $luotxem; ?></td>
                <td><?php echo $ngaylap; ?></td>
                <td><?php echo $mota; ?></td>
                <td><?php echo $chitiet; ?></td>
                <td>
                    <a href="index.php?controller=admin&action=productEdit&id=<?php echo $id; ?>"
                        class="btn btn-warning">Edit</a>
                    <form action="index.php?controller=admin&action=productDestroy&id=<?php echo $id; ?>" method="POST"
                        style="display: inline-block;">
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <div class="alert alert-info">No products found.</div>
    <?php endif; ?>
</div>

<script>
    document.getElementById('search').addEventListener('input', function() {
        const searchTerm = this.value.trim().toLowerCase();
        const rows = document.querySelectorAll('#searchResult tr');

        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            let found = false;

            cells.forEach(cell => {
                if (cell.textContent.trim().toLowerCase().includes(searchTerm)) {
                    found = true;
                }
            });

            if (found) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
        document.getElementById('search').addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Ngăn chặn hành động mặc định của phím Enter
            }
        });
    });
</script>
