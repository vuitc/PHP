<div class="col-12" style="min-height:80vh">
    <?php if($binhluans): ?>
        <?php $flag = false; ?>
        <?php foreach ($binhluans as $binhluan): ?>
            <?php if($binhluan['isAccept'] == 0): ?>
                <?php $flag = true; ?>
                <?php break; ?>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php if($flag): ?>
            <h2>Bình Luận Chưa Duyệt</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>MABL</th>
                        <th>Nội dung</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($binhluans as $binhluan): ?>
                        <?php extract($binhluan); ?>
                        <?php if($isAccept == 0): ?>
                            <tr>
                                <td><?= $mabl ?></td>
                                <td><?= $content ?></td>
                                <td>
                                    <form action="index.php?controller=admin&action=binhLuanUpdate&mabl=<?= $mabl ?>"
                                        method="POST" style="display: inline-block;">
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Bạn chắc chứ?')">Duyệt</button>
                                    </form>
                                    <form action="index.php?controller=admin&action=binhLuanDestroy&mabl=<?= $mabl ?>"
                                        method="POST" style="display: inline-block;">
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Bạn chắc chứ?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        
        <h2>Bình Luận Đã Duyệt</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>MABL</th>
                    <th>Nội dung</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($binhluans as $binhluan): ?>
                    <?php extract($binhluan); ?>
                    <?php if($isAccept == 1): ?>
                        <tr>
                            <td><?= $mabl ?></td>
                            <td><?= $content ?></td>
                            <td>
                                <form action="index.php?controller=admin&action=binhLuanDestroy&mabl=<?= $mabl ?>"
                                    method="POST" style="display: inline-block;">
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Bạn chắc chứ?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    <?php else: ?>
        <div class="alert alert-info">Không tìm thấy danh mục nào.</div>
    <?php endif; ?>
</div>
