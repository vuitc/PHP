<div class="span-9">
    <h1>Edit Slider</h1>
    <form action="index.php?controller=admin&action=sliderUpdate&id=<?php echo $sliderDetails['id']; ?>" method="POST">
        <div class="mb-3">
            <label for="img" class="form-label">Image</label>
            <img src="asset/img/<?php echo $sliderDetails['img'] ?>" alt="" style="width:50px">
        </div>
        <div class="mb-3">
            <input type="file" class="form-control" id="img" name="img">
        </div>
        <div class="mb-3">
            <label for="title1" class="form-label">Title 1</label>
            <input type="text" class="form-control" id="title1" name="title1"
                value="<?php echo $sliderDetails['title1']; ?>">
        </div>
        <div class="mb-3">
            <label for="title2" class="form-label">Title 2</label>
            <input type="text" class="form-control" id="title2" name="title2"
                value="<?php echo $sliderDetails['title2']; ?>">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-select" id="type" name="type">
                <option value="1" <?php echo $sliderDetails['truong'] == 1 ? 'selected' : ''; ?>>Carousel</option>
                <option value="2" <?php echo $sliderDetails['truong'] == 2 ? 'selected' : ''; ?>>Sale</option>
                <option value="3" <?php echo $sliderDetails['truong'] == 3 ? 'selected' : ''; ?>>Brand</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>