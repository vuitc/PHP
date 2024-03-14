<?php
    function renderPages($countPages, $current_page, $url) {
        $str = '<ul class="pagination justify-content-center mb-3">';
        // Nút Previous
        $str .= '<li class="page-item ' . (($current_page == 1) ? 'disabled' : '') . '">';
        $str .= '<a class="page-link" href="' . $url . '&pages=' . max(1, $current_page - 1) . '" aria-label="Previous">';
        $str .= '<span aria-hidden="true">&laquo;</span>';
        $str .= '<span class="sr-only">Previous</span>';
        $str .= '</a></li>';
        // Danh sách các trang
        for ($i = 1; $i <= $countPages; $i++) {
            $str .= '<li class="page-item ' . (($i == $current_page) ? 'active' : '') . '">';
            $str .= '<a class="page-link" href="' . $url . '&pages=' . $i . '">' . $i . '</a>';
            $str .= '</li>';
        }
        // Nút Next
        $str .= '<li class="page-item ' . (($current_page == $countPages) ? 'disabled' : '') . '">';
        $str .= '<a class="page-link" href="' . $url . '&pages=' . min($countPages, $current_page + 1) . '" aria-label="Next">';
        $str .= '<span aria-hidden="true">&raquo;</span>';
        $str .= '<span class="sr-only">Next</span>';
        $str .= '</a></li>';
        $str .= '</ul>';
        return $str;
    }
    ?>
<div class="col-12" style="min-height:80vh">
    <h1>Danh sách người dùng</h1>
    <a href="index.php?controller=admin&action=khachHangCreate" class="btn btn-primary mb-3">Tạo tài khoản quản trị</a>
    <div class="form-group">
        <form action="index.php?controller=admin&action=khachHangIndex" id="searchForm" method="post">
            <label for="search" >Tìm kiếm theo Tên Khách Hàng:</label>
            <input type="text" class="form-control" id="search" name="search" placeholder="Nhập từ khóa" required>
            <input type="submit" value="Tìm kiếm">
        </form>
    </div>
    <?php $listKhachhang = isset($listKhachhang) ? $listKhachhang : []; ?>
    <?php if ( $listKhachhang) : ?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>Tên</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Quyền</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ( $listKhachhang as $khachhang) : ?>
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
   
    <nav aria-label="Page navigation">
      <?php
        $result=renderPages($countPages,$currentPages,'index.php?controller=admin&action=khachHangIndex');
        echo $result;
     ?>
    </nav>
</div>

<script>
    document.getElementById('search').addEventListener('input', function() {
        // const searchTerm = this.value.trim().toLowerCase();
        // const rows = document.querySelectorAll('.customer-row');

        // rows.forEach(row => {
        //     const cells = row.querySelectorAll('td');
        //     let found = false;

        //     cells.forEach(cell => {
        //         if (cell.textContent.trim().toLowerCase().includes(searchTerm)) {
        //             found = true;
        //         }
        //     });

        //     if (found) {
        //         row.style.display = '';
        //     } else {
        //         row.style.display = 'none';
        //     }
        // });
        document.getElementById('search').addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Ngăn chặn hành động mặc định của phím Enter
            }
        });
    });
    document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Ngăn chặn form submit mặc định
    var searchTerm = document.getElementById('search').value;
    var url = 'index.php?controller=admin&action=khachHangIndex&search=' + encodeURIComponent(searchTerm);
    window.location.href = url; // Chuyển hướng trang với tham số tìm kiếm
});

</script>