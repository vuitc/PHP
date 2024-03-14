<div class="col-12" style="min-height:80vh">
    <h2>Tạo Voucher Mới</h2>
    <form action="index.php?controller=admin&action=voucherC" method="POST">
        <div class="form-group">
            <label for="code">Mã Voucher:</label>
            <input type="text" class="form-control" id="code" name="code" required>
        </div>
        <div class="form-group">
            <label for="percent">Phần trăm giảm giá:</label>
            <select class="form-control" id="percent" name="percent" required>
                <?php for ($i = 10; $i <= 70; $i += 10) : ?>
                    <option value="<?= $i ?>"><?= $i ?>%</option>
                <?php endfor; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="ngayhethan">Ngày Hết Hạn:</label>
            <input type="date" class="form-control" id="ngayhethan" name="ngayhethan" required>
        </div>
        <div class="form-group">
            <label for="trangthai">Trạng Thái:</label>
            <select class="form-control" id="trangthai" name="trangthai" required>
                <option value="1">Đã Phát Hành</option>
                <option value="0">Chưa Phát Hành</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tạo Voucher</button>
    </form>
</div>