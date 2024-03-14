<?php
    if (isset($_POST['submit_excel'])) {
        require "./Models/BaseModel.php";
        $data=new BaseModel();
        $colors=$data->getAllSql('select * from color');
        header("Content-Type: application/octet-stream");
        header('Content-Transfer-Encoding: Binary');
        header('Content-disposition: attachment; filename="export.csv"');
        $out = fopen("php://output", "w");

        foreach ($colors as $color) {
            fputcsv($out, $color);
        }

        fclose($out);
        exit;
        header("location:index.php?controller=admin&action=colorIndex");
    }
?>
