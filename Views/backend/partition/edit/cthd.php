<div class="span-9">
    <h1>Edit  CTHD</h1>
    <form method="POST" action="index.php?controller=admin&action=cthdUpdate">
        <label for="soluongmua">soluongmua:</label>
        <input type="number" name="soluongmua" id="soluongmua" min="1" max="<?php echo $soluongmua+$soluongton?>" value="<?php echo $soluongmua ?>" required>
        <div>Số lượng tồn kho: <?=$soluongton?></div>
        <input type="hidden" value="<?php echo $idProduct?>" name="idProduct">
        <input type="hidden" value="<?php echo $idColor?>" name="idColor">
        <input type="hidden" value="<?php echo $idSize?>" name="idSize">
        <input type="hidden" value="<?php echo $soluongmua?>" name="soluongmuacu">
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>