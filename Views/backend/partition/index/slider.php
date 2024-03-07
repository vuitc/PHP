<div class="span-9">
    <h1>Image Slider List</h1>
    <?php if($sliders): ?>
    <a href="index.php?controller=admin&action=sliderCreate" class="btn btn-primary mb-3">Create Slider</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title 1</th>
                <th>Title 2</th>
                <th>Type</th>
                <th>Actions</th>
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
                        class="btn btn-warning">Edit</a>
                    <form action="index.php?controller=admin&action=sliderDestroy&id=<?php echo $slider['id']; ?>"
                        method="POST" style="display: inline-block;">
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Bạn chắc chứ?')">Delete</button>
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