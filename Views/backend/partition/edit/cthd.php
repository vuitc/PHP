<div class="col-12" style="min-height:80vh">
    <h1>Sửa chi tiết hóa đơn</h1>
    <form method="POST" action="index.php?controller=admin&action=cthdUpdate">
        <label for="soluongmua">soluongmua:</label>
        <input type="number" name="soluongmua" id="soluongmua" min="1" max="<?php echo $soluongmua+$soluongton?>" value="<?php echo $soluongmua ?>" required>
        <div>Số lượng tồn kho: <?=$soluongton?></div>
        <input type="hidden" value="<?php echo $idProduct?>" name="idProduct">
        <input type="hidden" value="<?php echo $idColor?>" name="idColor">
        <input type="hidden" value="<?php echo $idSize?>" name="idSize">
        <input type="hidden" value="<?php echo $soluongmua?>" name="soluongmuacu">
        <input type="hidden" value="<?php echo $soluongton?>" name="soluongtoncu">
        <input type="hidden" value="<?php echo $masohd?>" name="masohd">

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>