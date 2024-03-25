<?php
function uploadImage()
{
    $target_dir = __DIR__."../../asset/img/";
    $target_file = $target_dir . basename($_FILES['image']['name']);
    $upload = 1;

    // Kiểm tra phương thức gửi form
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // if (!file_exists($target_dir)) {
        //     mkdir($target_dir, 0777, true); // Tạo thư mục với quyền truy cập 0777
        // }
        // Kiểm tra lỗi upload
        if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            echo '<script>alert("Có lỗi khi tải lên hình ảnh")</script>';
          return   $upload = 0;
        }

        // Kiểm tra dung lượng
        if ($_FILES['image']['size'] > 5000000) {
            echo '<script>alert("Hình vượt quá dung lượng")</script>';
           return  $upload = 0;
        }

        // Kiểm tra định dạng file
        $allowed_formats = array('jpg', 'jpeg', 'png', 'gif');
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (!in_array($imageFileType, $allowed_formats)) {
            echo '<script>alert("Không phải định dạng hình ảnh hợp lệ")</script>';
            return $upload = 0;
        }

        // Kiểm tra hình ảnh đã tồn tại
        if (file_exists($target_file)) {
            echo '<script>alert("Hình đã tồn tại")</script>';
          return   $upload = 1;
        }

        // Kiểm tra hình ảnh bằng getimagesize
        $check = getimagesize($_FILES['image']['tmp_name']);
        if ($check === false) {
            echo '<script>alert("File không phải là hình ảnh hợp lệ")</script>';
             return $upload = 0;
        }

        // Di chuyển hình ảnh vào thư mục đích
        if ($upload && move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            echo '<script>alert("Upload hình thành công")</script>';
        } else {
            echo '<script>alert("Upload hình không thành công")</script>';
        }
        return $upload;
    }

}


?>
