<script>
    // Embedding PHP array into JavaScript
    var findAllProduct1 = <?php echo json_encode($hoadons); ?>;
    // Now you can use the findAllProduct variable in your JavaScript code
    // console.log(findAllProduct1);
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var searchForm = document.getElementById('searchForm');
        var searchInput = document.getElementById('searchInput');
        var searchResultsContainer = document.getElementById('searchResults');
        var isMouseInSearchResults = false;

        // Dữ liệu sản phẩm để tìm kiếm
        var hoadons = findAllProduct1;
        // console.log(hoadons);
        // Xử lý sự kiện tìm kiếm khi thay đổi giá trị
        searchInput.addEventListener('input', function() {
            var searchTerm = searchInput.value.toLowerCase();
            var searchResults = hoadons.filter(function(product) {
                return product['id'].toLowerCase().includes(searchTerm);
            });

            displaySearchResults(searchResults);
        });

        // Hiển thị kết quả tìm kiếm khi hover vào
        searchInput.addEventListener('mouseenter', function() {
            searchResultsContainer.style.display = 'block';
        });

        // Ẩn kết quả tìm kiếm khi hover ra khỏi ô nhập liệu
        searchInput.addEventListener('mouseleave', function() {
            setTimeout(function() {
                if (!isMouseInSearchResults) {
                    searchResultsContainer.style.display = 'none';
                }
            }, 200); // Đợi 200ms trước khi ẩn kết quả
        });

        // Sự kiện khi chuột đi vào kết quả tìm kiếm
        searchResultsContainer.addEventListener('mouseenter', function() {
            isMouseInSearchResults = true;
        });

        // Sự kiện khi chuột rời khỏi kết quả tìm kiếm
        searchResultsContainer.addEventListener('mouseleave', function() {
            isMouseInSearchResults = false;
            searchResultsContainer.style.display = 'none';
        });

        // Hiển thị kết quả tìm kiếm
        function displaySearchResults(results) {
            var html = '';
            if (results.length > 0) {
                html += '<ul class="product-list" style=" list-style: none; padding: 0; margin: 0;">';
                results.forEach(function(result) {
                    html += '<a href="index.php?controller=admin&action=cthoadonIndex&id=' + result['id'] +
                        '" class="product-item" style="padding: 10px; border-bottom: 1px solid #ced4da; cursor: pointer; display:block" ' +
                        'onmouseover="this.style.backgroundColor=\'#f8f9fa\'" ' +
                        'onmouseout="this.style.backgroundColor=\'transparent\'" ' +
                        'onclick="selectProduct(\'' + result['id'] + '\')">' + result['id'] +'</a>';
                });
                // html += '</a>';
                searchResultsContainer.style.display = 'block';
            } else {
                html += '<div>Hiện tại chưa có sản phẩm phù hợp</div>';
                // searchResultsContainer.style.display = 'none';
            }
            searchResultsContainer.innerHTML = html;
        }

        // Hàm chọn sản phẩm khi người dùng click
        window.selectProduct = function(product) {
            // Xử lý logic khi sản phẩm được chọn
            console.log('Selected product:', product);
        };

        window.searchhoadons = function() {
            var searchTerm = searchInput.value.toLowerCase();
            var searchResults = hoadons.filter(function(product) {
                return product.toLowerCase().includes(searchTerm);
            });

            displaySearchResults(searchResults);
        };
        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            searchhoadons();
        });
    }); 
</script>
<div class="col-12" style="min-height:80vh">
    <!-- <form>
        <div class="form-group">
            <label for="search">Tìm kiếm theo ID hoặc Tên Khách Hàng:</label>
            <input type="text" class="form-control" id="search" name="search" placeholder="Nhập từ khóa">
        </div>
    </form> -->
    <form action="" id="searchForm">
        <div class="input-group" style="position: relative;">
            <input type="text" class="form-control" id="searchInput" placeholder="Tìm kiếm hóa đơn">
            <div id="searchResults" style="position: absolute; top: 110%; left: 0; z-index: 1000; width: 100%; background-color: #fff; border: 1px solid #ced4da; max-height: 200px; overflow-y: auto; display: none;">
                <ul class="product-list" style="list-style: none; padding: 0; margin: 0;"></ul>
            </div>
        </div>
    </form>
    <?php if ($listHoadon) : ?>
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
                    <th>Tình trạng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody id="searchResult">
                <?php foreach ($listHoadon as $hoadon) : ?>
                    <tr>
                        <td><a href="index.php?controller=admin&action=cthoadonIndex&id=<?= $hoadon['id'] ?>"><?= $hoadon['id'] ?></a></td>
                        <td><?= $hoadon['tenkh'] ?></td>
                        <td><?= $hoadon['ngaydat'] ?></td>
                        <td><?= number_format($hoadon['tongtien'], 0, ',', '.') ?></td>
                        <td><?= number_format($hoadon['giam'], 0, ',', '.') ?></td>
                        <td><?= $hoadon['vanchuyen'] ?></td>
                        <td><?= $hoadon['phone'] ?></td>
                        <td><?= $hoadon['diachi'] ?></td>
                        <td><?php
                            if($hoadon['tinhtrang']==0){
                                echo 'Đang chuẩn bị hàng';
                            }else if($hoadon['tinhtrang']==1){
                                echo 'Đang vận chuyển';
                            } else{
                                echo 'Đã giao';
                            }
                        ?></td>
                        <td>
                        <?php if ($hoadon['tinhtrang'] <1) : ?>
                                <form action="index.php?controller=admin&action=hoadonDestroy&id=<?= $hoadon['id'] ?>" method="POST" style="display: inline-block;">
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
    <nav aria-label="Page navigation">
      <?php
        $result=renderPages($countPages,$currentPages,'index.php?controller=admin&action=hoadonIndex');
        echo $result;
     ?>
    </nav>
</div>

<script>
//    document.getElementById('search').addEventListener('input', function(event) {
//     const searchTerm = this.value.trim().toLowerCase();
//     const rows = document.querySelectorAll('#searchResult tr');

//     rows.forEach(row => {
//         const cells = row.querySelectorAll('td');
//         let found = false;

//         cells.forEach(cell => {
//             if (cell.textContent.trim().toLowerCase().includes(searchTerm)) {
//                 found = true;
//             }
//         });

//         if (found) {
//             row.style.display = '';
//         } else {
//             row.style.display = 'none';
//         }
//     });
// });

document.getElementById('search').addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        event.preventDefault(); // Ngăn chặn hành động mặc định của phím Enter
    }
});

</script>
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
?>