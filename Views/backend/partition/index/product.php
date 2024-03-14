<script>
    // Embedding PHP array into JavaScript
    var findAllProduct1 = <?php echo json_encode($products); ?>;
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
        var products = findAllProduct1;
        // console.log(products);
        // Xử lý sự kiện tìm kiếm khi thay đổi giá trị
        searchInput.addEventListener('input', function() {
            var searchTerm = searchInput.value.toLowerCase();
            var searchResults = products.filter(function(product) {
                return product['name'].toLowerCase().includes(searchTerm);
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
                    html += '<a href="index.php?controller=admin&action=ctproductIndex&id=' + result['id'] +
                        '" class="product-item" style="padding: 10px; border-bottom: 1px solid #ced4da; cursor: pointer; display:block" ' +
                        'onmouseover="this.style.backgroundColor=\'#f8f9fa\'" ' +
                        'onmouseout="this.style.backgroundColor=\'transparent\'" ' +
                        'onclick="selectProduct(\'' + result['name'] + '\')">' + result['name'] + '</a>';
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

        window.searchProducts = function() {
            var searchTerm = searchInput.value.toLowerCase();
            var searchResults = products.filter(function(product) {
                return product.toLowerCase().includes(searchTerm);
            });

            displaySearchResults(searchResults);
        };
        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            searchProducts();
        });
    });
</script>
<div class="col-12" style="min-height: 80vh;">
    <h1>Danh sách sản phẩm</h1>
    <form action="" id="searchForm">
        <div class="input-group" style="position: relative;">
            <input type="text" class="form-control" id="searchInput" placeholder="Tìm kiếm sản phẩm">
            <div id="searchResults" style="position: absolute; top: 110%; left: 0; z-index: 1000; width: 100%; background-color: #fff; border: 1px solid #ced4da; max-height: 200px; overflow-y: auto; display: none;">
                <ul class="product-list" style="list-style: none; padding: 0; margin: 0;"></ul>
            </div>
        </div>
    </form>
    <?php if ($listProduct) : ?>
        <a href="index.php?controller=admin&action=productCreate" class="btn btn-primary mb-3">Tạo</a>
        <form action="index.php?controller=no&action=productFile" method="post" enctype="multipart/form-data">
            <input type="submit" name="submit_excel" value="Export">
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Thuộc danh mục</th>
                    <th>Đặc biệt</th>
                    <th>Lượt xem</th>
                    <th>Ngày tạo</th>
                    <th>Mô tả</th>
                    <th>Chi tiết</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody id="searchResult">
                <?php foreach ($listProduct as $product) : ?>
                    <?php extract($product); ?>
                    <tr>
                        <td><a href="index.php?controller=admin&action=ctproductIndex&id=<?= $id; ?>"><?php echo $id; ?></a></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $id_category; ?></td>
                        <td><?php echo $dacbiet; ?></td>
                        <td><?php echo $luotxem; ?></td>
                        <td><?php echo $ngaylap; ?></td>
                        <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?php echo $mota; ?></td>
                        <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?php echo $chitiet; ?></td>
                        <td>
                            <a href="index.php?controller=admin&action=productEdit&id=<?php echo $id; ?>" class="btn btn-warning">Sửa</a>
                            <form action="index.php?controller=admin&action=productDestroy&id=<?php echo $id; ?>" method="POST" style="display: inline-block;">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn chắc chứ?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <div class="alert alert-info">Không tìm thấy.</div>
    <?php endif; ?>
    <nav aria-label="Page navigation">
        <?php
        $result = renderPages($countPages, $currentPages, 'index.php?controller=admin&action=productIndex');
        echo $result;
        ?>
    </nav>
</div>
<?php
function renderPages($countPages, $current_page, $url)
{
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