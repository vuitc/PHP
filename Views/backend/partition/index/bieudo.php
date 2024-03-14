<meta charset="UTF-8">
<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<h3 class="mt-2"><?=$str?></h3>
<script type="text/javascript">
    google.load('visualization', '1.0', {
        'packages': ['corechart']
    });
    google.setOnLoadCallback(drawVisualization);

    function drawVisualization() {
        //thống kê số lượng bán hàng theo mặt hàng vẽ bieu do tron
        // b1: tạo ra được bảng tức là DataTable
        var data = new google.visualization.DataTable();
        var names = new Array();
        var soluong = new Array();
        var dataten = 0;
        var slb = 0;
        var rows = new Array();
        // rows lấy từ câu truy vấn database
        <?php
        foreach ($thongke as $item) {
            extract($item);
            echo "names.push('" . $name . "');";
            echo "soluong.push('" . $soluong . "');";
        }
        ?>
        // tạo dòng
        for (var i = 0; i < names.length; i++) {
            dataten = names[i];
            slb = parseInt(soluong[i]);
            rows.push([dataten, slb]);
        }
        console.log(rows);
        // tạo ra cột
        data.addColumn('string', 'Tên hàng hóa');
        data.addColumn('number', 'Số lượng bán');
        data.addRows(rows);
        // b2: tạo option
        var options = {
            title: 'Thống kê số lượng bán',
            'width': 800,
            'height': 400,
            'backgroundColor': '#ffffff',
            is3D: true,
        };
        //b3: tiến hành vẽ
        var chart =  new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);

    }
</script>
<div class="thongke">

    <div style=" width:100%;  float: left;" id="chart_div">dfsf</div>
    <form action="index.php?controller=admin&action=bieudoIndex" method="post">
        <div class="form-group">
          <label for="">Ngày bắt đầu</label>
          <input type="date" name="start" id="start" class="form-control" placeholder="Ngày bắt đầu">
        </div>
        <div class="form-group">
          <label for="">Ngày kết thúc</label>
          <input type="date" name="end" id="end" class="form-control" placeholder="Ngày kết thúc">
        </div>
        <input type="submit" value="Gửi">
    </form>
    <!-- <div style=" width:50%;  float: right"   id="chart_div1">dsfd</div>     -->
</div>