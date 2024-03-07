<div class="span9">
    <?php if ($ctproducts) : ?>
        <h2>Danh sách Chi tiết Sản phẩm</h2>
        <a href="index.php?controller=admin&action=ctproductCreate" class="btn btn-primary mb-3">Tạo</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Sản phẩm</th>
                    <th>Màu sắc</th>
                    <th>Kích cỡ</th>
                    <th>Giá</th>
                    <th>Số lượng tồn</th>
                    <th>Ảnh</th>
                    <th>Giảm giá</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ctproducts as $ctproduct) : ?>
                    <tr>
                        <td><?= $ctproduct['idproduct'] ?></td>
                        <td><?= $ctproduct['idcolor'] ?></td>
                        <td><?= $ctproduct['idsize'] ?></td>
                        <td><?= $ctproduct['price'] ?></td>
                        <td><?= $ctproduct['soluongton'] ?></td>
                        <td><?= $ctproduct['image'] ?></td>
                        <td><?= $ctproduct['giamgia'] ?></td>
                        <td>
                            <a href="index.php?controller=admin&action=ctproductEdit&idp=<?=$ctproduct['idproduct']; ?>&idc=<?=$ctproduct['idcolor']; ?>&ids=<?=$ctproduct['idsize']; ?>&p=<?=$ctproduct['price']; ?>&slt=<?=$ctproduct['soluongton']; ?>&giamgia=<?=$ctproduct['giamgia']; ?>" class="btn btn-warning">Sửa</a>
                            <form action="index.php?controller=admin&action=ctproductDestroy&idp=<?= $ctproduct['idproduct']; ?>&idc=<?= $ctproduct['idcolor']; ?>&ids=<?= $ctproduct['idsize']; ?>" method="POST" style="display: inline-block;">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn chắc chứ?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <div class="alert alert-info">Không tìm thấy chi tiết sản phẩm nào.</div>
    <?php endif; ?>
</div>