<div class="col-12" style="min-height:80vh">
    <h1>Danh mục hiển thị</h1>
    <?php if($sliders): ?>
    <a href="index.php?controller=admin&action=sliderCreate" class="btn btn-primary mb-3">Tạo sliders</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Title 1</th>
                <th>Title 2</th>
                <th>Loại</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sliders as $slider): ?>
            <tr>
                <td><?php echo $slider['id']; ?></td>
                <td><img src="asset/img/<?php echo $slider['img']; ?>" alt="Slider Image" style="width: 50px;"></td>
                <td><?php echo $slider['title1']; ?></td>
                <td><?php echo $slider['title2']; ?></td>
                <td>
                    <?php 
                        switch ($slider['truong']) {
                            case 1:
                                echo 'Carousel';
                                break;
                            case 2:
                                echo 'Sale';
                                break;
                            case 3:
                                echo 'Brand';
                                break;
                            default:
                                echo 'Unknown';
                                break;
                        }
                    ?>
                </td>
                <td>
                    <a href="index.php?controller=admin&action=sliderEdit&id=<?php echo $slider['id']; ?>"
                        class="btn btn-warning">Sửa</a>
                    <form action="index.php?controller=admin&action=sliderDestroy&id=<?php echo $slider['id']; ?>"
                        method="POST" style="display: inline-block;">
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Bạn chắc chứ?')">Xóa</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <div class="alert alert-info">Không tìm thấy</div>
    <?php endif; ?>
</div>