<div class="span-9">
    <form>
        <div class="form-group">
            <label for="search">Tìm kiếm theo ID hoặc Tên Khách Hàng:</label>
            <input type="text" class="form-control" id="search" name="search" placeholder="Nhập từ khóa">
        </div>
    </form>

    <?php if ($hoadons) : ?>
        <h2>Kết quả tìm kiếm</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Khách Hàng</th>
                    <th>Ngày Đặt</th>
                    <th>Tổng Tiền</th>
                    <th>Giảm Giá</th>
                    <th>Vận Chuyển</th>
                    <th>Phone</th>
                    <th>Địa Chỉ</th>
                </tr>
            </thead>
            <tbody id="searchResult">
                <?php foreach ($hoadons as $hoadon) : ?>
                    <tr>
                        <td><a href="index.php?controller=admin&action=cthoadonIndex&id=<?= $hoadon['id'] ?>"><?= $hoadon['id'] ?></a></td>
                        <td><?= $hoadon['tenkh'] ?></td>
                        <td><?= $hoadon['ngaydat'] ?></td>
                        <td><?= number_format($hoadon['tongtien'], 0, ',', '.') ?></td>
                        <td><?= number_format($hoadon['giam'], 0, ',', '.') ?></td>
                        <td><?= $hoadon['vanchuyen'] ?></td>
                        <td><?= $hoadon['phone'] ?></td>
                        <td><?= $hoadon['diachi'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <div class="alert alert-info">Không tìm thấy hóa đơn nào.</div>
    <?php endif; ?>
</div>

<script>
   document.getElementById('search').addEventListener('input', function(event) {
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
});

document.getElementById('search').addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        event.preventDefault(); // Ngăn chặn hành động mặc định của phím Enter
    }
});

</script>
