<div class="col-12" style="min-height:80vh">
    <form>
        <div class="form-group">
            <label for="search">Tìm kiếm theo Tên SP:</label>
            <input type="text" class="form-control" id="search" name="search" placeholder="Nhập từ khóa">
        </div>
    </form>

    <?php if ($cts) : ?>
        <h2>Danh sách Chi tiết Hóa Đơn</h2>
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên SP</th>
                    <th>Số lượng mua</th>
                    <th>Thành tiền</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody id="searchResult">
                <?php foreach ($cts as $ct) : ?>
                    <tr>
                        <td><?= $ct['masohd'] ?></td>
                        <td><?php echo  $ct['name'] . '_' . $ct['color'] . '_' . $ct['size'] ?></td>
                        <td><?= $ct['soluongmua'] ?></td>
                        <td><?= number_format($ct['thanhtien'], 0, ',', '.') ?></td>
                        <td>
                        <?php if ($tt <1) : ?>
                            <a href="index.php?controller=admin&action=cthdEdit&mshd=<?php echo $ct['masohd']; ?>&idp=<?php echo $ct['idProduct']; ?>&ids=<?php echo $ct['idSize']; ?>&idc=<?php echo $ct['idColor']; ?>&slm=<?php echo $ct['soluongmua']; ?>" class="btn btn-warning">Edit</a>
                            <form action="index.php?controller=admin&action=cthdDestroy&mshd=<?php echo $ct['masohd']; ?>&idp=<?php echo $ct['idProduct']; ?>&ids=<?php echo $ct['idSize']; ?>&idc=<?php echo $ct['idColor']; ?>" method="POST" style="display: inline-block;">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn chắc chứ?')">Xóa</button>
                            </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <div class="alert alert-info">Không tìm thấy hóa đơn nào.</div>
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