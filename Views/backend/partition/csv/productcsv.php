<?php
if (isset($_POST['submit_excel'])) {
    require "./Models/BaseModel.php";
    $data = new BaseModel();
    $products = $data->getAllSql('select * from product');
    
    // Tạo một output buffer để chứa dữ liệu CSV
    ob_start();

    // Mở luồng ghi văn bản với mã hóa UTF-8
    $output = fopen("php://output", "w");
    fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF)); // BOM (Byte Order Mark) để đảm bảo mã hóa UTF-8
    foreach ($products as $product) {
        // Chuyển dữ liệu về UTF-8 nếu cần thiết
        fputcsv($output, $product, ',');
    }

    // Đóng luồng ghi
    fclose($output);

    // Lấy dữ liệu từ output buffer
    $content = ob_get_clean();

    // Set header cho file CSV
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="export.csv"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . strlen($content));

    // Output dữ liệu
    echo $content;
    exit;
}
?>
