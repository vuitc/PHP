<div class="span9">
    <h1>Customer List</h1>
    <a href="index.php?controller=admin&action=khachHangCreate" class="btn btn-primary mb-3">Create Admin</a>

    <div class="form-group">
        <label for="search">Tìm kiếm theo Tên Khách Hàng:</label>
        <input type="text" class="form-control" id="search" name="search" placeholder="Nhập từ khóa" required>
    </div>

    <?php if ($khachhangs) : ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($khachhangs as $khachhang) : ?>
                    <?php extract($khachhang); ?>
                    <tr class="customer-row">
                        <td><?php echo $makh; ?></td>
                        <td><?php echo $tenkh; ?></td>
                        <td><?php echo $username; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $diachi; ?></td>
                        <td><?php echo $phone; ?></td>
                        <td><?php echo $role; ?></td>
                        <td>
                            <form action="index.php?controller=admin&action=khachHangDestroy&makh=<?php echo $makh; ?>" method="POST" style="display: inline-block;">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn chắc chứ?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <div class="alert alert-info">No customers found</div>
    <?php endif; ?>
</div>

<script>
    document.getElementById('search').addEventListener('input', function() {
        const searchTerm = this.value.trim().toLowerCase();
        const rows = document.querySelectorAll('.customer-row');

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