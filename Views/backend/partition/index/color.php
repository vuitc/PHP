<?php

?>
<div class="col-12" style="min-height:80vh">
    <h1>Danh sách màu sắc</h1>

    <?php if ($colors) : ?>
        <a href="index.php?controller=admin&action=colorCreate" class="btn btn-primary mb-3">Thêm màu</a>
        <form action="index.php?controller=admin&action=colorCsv" method="post" enctype="multipart/form-data">
            <input type="file" name="file" id="">
            <input type="submit" name="submit_file" value="Inport">
        </form>
        <form action="index.php?controller=no&action=file" method="post" enctype="multipart/form-data">
            <input type="submit" name="submit_excel" value="Export">
        </form>
        <p style="color:yellow"><?php echo $str ?></p>
        <table class="table">
            <thead>
                <tr>
                    <th>Mã</th>
                    <th>Màu</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($colors as $color) : ?>
                    <tr>
                        <td><?php echo $color['id']; ?></td>
                        <td><?php echo $color['color']; ?></td>
                        <td>
                            <a href="index.php?controller=admin&action=colorEdit&id=<?php echo $color['id']; ?>" class="btn btn-warning">Sửa</a>
                            <form action="index.php?controller=admin&action=colorDestroy&id=<?php echo $color['id']; ?>" method="POST" style="display: inline-block;">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn chắc chứ?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <div class="alert alert-info">Không tìm thấy danh sách màu sắc.</div>
    <?php endif; ?>

</div>
