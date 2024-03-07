<div class="span-9">
    <?php if($vouchers): ?>
        <?php $flag = false; ?>
        <?php foreach ($vouchers as $voucher): ?>
            <?php if($voucher['trangthai'] == 1): ?>
                <?php $flag = true; ?>
                <?php break; ?>
            <?php endif; ?>
        <?php endforeach; ?>
        <a href="index.php?controller=admin&action=voucherCreate" class="btn btn-primary mb-3">Create Voucher</a>
        <?php if($flag): ?>
            <h2>Voucher Đã Phát Hành</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Percent</th>
                        <th>Ngày Hết Hạn</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vouchers as $voucher): ?>
                        <?php if($voucher['trangthai'] == 1): ?>
                            <tr>
                                <td><?= $voucher['id'] ?></td>
                                <td><?= $voucher['code'] ?></td>
                                <td><?= $voucher['percent'] ?></td>
                                <td><?= $voucher['ngayhethan'] ?></td>
                                <td>
                                    <form action="index.php?controller=admin&action=voucherUpdate&id=<?= $voucher['id'] ?>&tt=<?=$voucher['trangthai']?>"
                                        method="POST" style="display: inline-block;">
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Bạn chắc chứ?')">Ngưng</button>
                                    </form>
                                    <form action="index.php?controller=admin&action=voucherDestroy&id=<?= $voucher['id'] ?>"
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

        <?php $flag1 = false; ?>
        <?php foreach ($vouchers as $voucher): ?>
            <?php if($voucher['trangthai'] == 0): ?>
                <?php $flag1 = true; ?>
                <?php break; ?>
            <?php endif; ?>
        <?php endforeach; ?>
       
        <?php if($flag1): ?>
            <h2>Voucher Chưa Phát Hành</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Percent</th>
                        <th>Ngày Hết Hạn</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vouchers as $voucher): ?>
                        <?php if($voucher['trangthai'] == 0): ?>
                            <tr>
                                <td><?= $voucher['id'] ?></td>
                                <td><?= $voucher['code'] ?></td>
                                <td><?= $voucher['percent'] ?></td>
                                <td><?= $voucher['ngayhethan'] ?></td>
                                <td>
                                    <form action="index.php?controller=admin&action=voucherUpdate&id=<?= $voucher['id'] ?>&tt=<?=$voucher['trangthai']?>"
                                        method="POST" style="display: inline-block;">
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Bạn chắc chứ?')">Duyệt</button>
                                    </form>
                                    <form action="index.php?controller=admin&action=voucherDestroy&id=<?= $voucher['id'] ?>"
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
        
    <?php else: ?>
        <div class="alert alert-info">Không tìm thấy voucher nào.</div>
    <?php endif; ?>
</div>