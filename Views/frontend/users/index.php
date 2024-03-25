<div class="container-fluid bg-secondary mb-5">
    <h2 class="text-center py-4">Thay đổi thông tin</h2>
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 287px">
        <form action="index.php?controller=index&action=changeInfo" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Tên:</label>
                <input type="text" name="tenkh" id="tenkh" class="form-control" placeholder="" aria-describedby="helpId" value="<?=$thongtin[0]['tenkh']?>" required>
            </div>
            <div class="form-group">
                <label for="">Địa chỉ:</label>
                <input type="text" name="diachi" id="diachi" class="form-control" placeholder="" aria-describedby="helpId" value="<?=$thongtin[0]['diachi']?>" required>
            </div>
            <div class="form-group">
                <label for="">Số điện thoại:</label>
                <input type="number" name="phone" id="phone" class="form-control" placeholder="" aria-describedby="helpId" value="<?=$thongtin[0]['phone']?>" required>
            </div>
            <div class="form-group">
                <img src="asset/img/<?=$thongtin[0]['avatar']?>" alt="" style="width:50px; border-radius:50%">
                <label for="">Chọn ảnh</label>
                <input type="file" class="form-control-file" name="image" id="" placeholder="" aria-describedby="fileHelpId">
            </div>
            <input type="submit" value="Thay đổi">
        </form>
    </div>
</div>

</div>
</div>
</div>