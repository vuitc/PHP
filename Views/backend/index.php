 <!--/.span3-->
 <div class="col-12">
     <h1 class="text-center my-2">Chào mừng bạn đến với trang quản trị Admin</h1>
 </div>
 <div class="container">
    <div class="row">
        <!-- Card người dùng -->
        <div class="col-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-user fa-5x text-primary"></i> <!-- Icon người dùng -->
                    <h4 class="card-text"><?=$demUser?></h4>
                </div>
            </div>
        </div>
        
        <!-- Card sản phẩm -->
        <div class="col-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-box fa-5x text-primary"></i> <!-- Icon sản phẩm -->
                    <h4 class="card-text"><?=$demProduct?></h4>
                </div>
            </div>
        </div>
        
        <!-- Card tổng thành tiền -->
        <div class="col-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-dollar-sign fa-5x text-primary"></i> <!-- Icon tổng thành tiền -->
                    <h4 class="card-text"><?= number_format($profit, 0, ',', '.') ?></h4>

                </div>
            </div>
        </div>
    </div>
</div>
 <div class="container mt-4">
     <div class="row">
         <div class="col-6">
             <meta charset="UTF-8">
             <h4 class="mt-2 text-danger">Top 10 mặt hàng bán chạy trong tháng</h4>
             <div class="thongke">
                 <div style="width:80%;" id="chart_div">dfsf</div>
             </div>
         </div>

         <div class="col-6">
             <meta charset="UTF-8">
             <h4 class="mt-2 text-danger">Top 10 khách hàng mua nhiều trong tháng</h4>
             <div class="thongke">
                 <div style="width:80%;" id="chart_div1">dfsf</div>
             </div>
         </div>
         <div class="col-6">
             <meta charset="UTF-8">
             <h4 class="mt-2 text-danger">Tỷ trọng mua hàng theo tháng trong năm</h4>
             <div class="thongke">
                 <div style="width:80%;" id="chart_div2">dfsf</div>
             </div>
         </div>
         <div class="col-6">
             <meta charset="UTF-8">
             <h4 class="mt-2 text-danger">Tỷ trọng mua hàng theo quý trong năm</h4>
             <div class="thongke">
                 <div style="width:80%;" id="chart_div3">dfsf</div>
             </div>
         </div>
         <div class="col-6">
             <meta charset="UTF-8">
             <h4 class="mt-2 text-danger">Tỷ trọng 3 năm gần nhất</h4>
             <div class="thongke">
                 <div style="width:80%;" id="chart_div4">dfsf</div>
             </div>
         </div>

         <script type="text/javascript" src="https://www.google.com/jsapi"></script>
         <script type="text/javascript">
             google.load('visualization', '1.0', {
                 'packages': ['corechart']
             });
             google.setOnLoadCallback(function() {
                 drawVisualization();
                 drawVisualizationKH();
                 drawVisualizationTT();
                 drawVisualizationTQ();
                 drawVisualizationTN();
             });

             function drawVisualization() {
                 var data = new google.visualization.DataTable();
                 var names = [];
                 var soluong = [];
                 var dataten = 0;
                 var slb = 0;
                 var rows = [];

                 // Dữ liệu từ câu truy vấn database được đưa vào mảng JavaScript
                 <?php
                    foreach ($thongkeHT as $item) {
                        extract($item);
                        echo "names.push('" . $name . "');";
                        echo "soluong.push('" . $soluong . "');";
                    }
                    ?>

                 // Tạo các dòng dữ liệu cho biểu đồ cột
                 for (var i = 0; i < names.length; i++) {
                     dataten = names[i];
                     slb = parseInt(soluong[i]);
                     rows.push([dataten, slb]);
                 }

                 // Thêm cột vào DataTable
                 data.addColumn('string', 'Tên hàng hóa');
                 data.addColumn('number', 'Số lượng bán');
                 data.addRows(rows);

                 // Tạo option cho biểu đồ cột
                 var options = {
                     title: 'Thống kê số lượng bán',
                     width: 600,
                     height: 450,
                     backgroundColor: '#ffffff',
                     bars: 'vertical', // Chọn hướng cột
                     hAxis: {
                         title: 'Tên hàng hóa',
                         titleTextStyle: {
                             color: '#333'
                         },
                         textStyle: {
                             color: '#333'
                         }
                     },
                     vAxis: {
                         title: 'Số lượng bán',
                         titleTextStyle: {
                             color: '#333'
                         },
                         textStyle: {
                             color: '#333'
                         },
                         minValue: 0
                     },
                     legend: {
                         position: 'none'
                     } // Ẩn chú giải (nếu không cần thiết)
                 };

                 // Vẽ biểu đồ cột
                 var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
                 chart.draw(data, options);
             }

             function drawVisualizationKH() {
                 var data = new google.visualization.DataTable();
                 var names = [];
                 var soluong = [];
                 var dataten = 0;
                 var slb = 0;
                 var rows = [];

                 // Dữ liệu từ câu truy vấn database được đưa vào mảng JavaScript
                 <?php
                    foreach ($thongkeTopKH as $item) {
                        extract($item);
                        echo "names.push('" . $tenkh . "');";
                        echo "soluong.push('" . $soluong . "');";
                    }
                    ?>

                 // Tạo các dòng dữ liệu cho biểu đồ cột nằm
                 for (var i = 0; i < names.length; i++) {
                     dataten = names[i];
                     slb = parseInt(soluong[i]);
                     rows.push([dataten, slb]);
                 }

                 // Thêm cột vào DataTable
                 data.addColumn('string', 'Tên khách hàng');
                 data.addColumn('number', 'Số lượng');
                 data.addRows(rows);

                 // Tạo option cho biểu đồ cột nằm
                 var options = {
                     title: 'Thống kê số lượng',
                     width: 600,
                     height: 350,
                     backgroundColor: '#ffffff',
                     bars: 'horizontal', // Biểu đồ cột nằm
                     hAxis: {
                         title: 'Số lượng', // Đổi vị trí của tiêu đề trục hoành
                         titleTextStyle: {
                             color: '#333'
                         },
                         textStyle: {
                             color: '#333'
                         }
                     },
                     vAxis: {
                         title: 'Tên khách hàng', // Đổi vị trí của tiêu đề trục tung
                         titleTextStyle: {
                             color: '#333'
                         },
                         textStyle: {
                             color: '#333'
                         }
                     },
                     legend: {
                         position: 'none'
                     } // Ẩn chú giải (nếu không cần thiết)
                 };

                 // Vẽ biểu đồ cột nằm
                 var chart = new google.visualization.BarChart(document.getElementById('chart_div1')); // Sử dụng BarChart thay vì ColumnChart
                 chart.draw(data, options);
             }

             function drawVisualizationTT() {
                 var data = new google.visualization.DataTable();
                 data.addColumn('string', 'Tháng');
                 data.addColumn('number', 'Số lượng');

                 // Dữ liệu từ câu truy vấn database được đưa vào mảng JavaScript
                 <?php
                    foreach ($thongkeTungThang as $item) {
                        extract($item);
                        echo "data.addRow(['$month', $soluong]);";
                    }
                    ?>

                 // Tạo option cho biểu đồ đường
                 var options = {
                     title: 'Thống kê số lượng',
                     width: 600,
                     height: 350,
                     backgroundColor: '#ffffff',
                     legend: {
                         position: 'bottom'
                     }, // Chú giải dưới đáy biểu đồ
                     hAxis: {
                         title: 'Tháng'
                     }, // Tiêu đề trục hoành
                     vAxis: {
                         title: 'Số lượng'
                     }, // Tiêu đề trục tung
                     curveType: 'function', // Loại đường cong của biểu đồ đường
                     pointSize: 5,
                     tooltip: {
                         trigger: 'both'
                     }

                 };

                 // Vẽ biểu đồ đường
                 var chart = new google.visualization.LineChart(document.getElementById('chart_div2'));
                 chart.draw(data, options);
             }

             function drawVisualizationTQ() {
                 var data = new google.visualization.DataTable();
                 data.addColumn('string', 'Quý');
                 data.addColumn('number', 'Số lượng');

                 // Dữ liệu từ câu truy vấn database được đưa vào mảng JavaScript
                 <?php
                    $quyArray = array("1" => "Q1", "2" => "Q2", "3" => "Q3", "4" => "Q4");
                    $currentYear = date("Y");
                    $currentQuarter = ceil(date("n") / 3);
                    $lastQuarter = ($currentQuarter - 1 == 0) ? 4 : $currentQuarter - 1;

                    foreach ($thongkeTungQuy as $item) {
                        extract($item);
                        $quyName = ($year == $currentYear) ? $quyArray[$quarter] : "Chưa đến";
                        echo "data.addRow(['$quyName', $soluong]);";
                    }
                    ?>

                 // Tạo option cho biểu đồ đường
                 var options = {
                     title: 'Thống kê số lượng theo quý',
                     width: 600,
                     height: 350,
                     backgroundColor: '#ffffff',
                     legend: {
                         position: 'bottom'
                     }, // Chú giải dưới đáy biểu đồ
                     hAxis: {
                         title: 'Quý'
                     }, // Tiêu đề trục hoành
                     vAxis: {
                         title: 'Số lượng'
                     }, // Tiêu đề trục tung
                     curveType: 'function', // Loại đường cong của biểu đồ đường
                     pointSize: 5,
                     tooltip: {
                         trigger: 'both'
                     }
                 };


                 // Vẽ biểu đồ đường
                 var chart = new google.visualization.LineChart(document.getElementById('chart_div3'));
                 chart.draw(data, options);
             }
             function drawVisualizationTN() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Năm');
    data.addColumn('number', 'Số lượng');

    // Dữ liệu từ câu truy vấn database được đưa vào mảng JavaScript
    <?php
    foreach ($thongkeTungNam as $item) {
        extract($item);
        echo "data.addRow(['$year', $soluong]);";
    }
    ?>

    // Tạo option cho biểu đồ cột
    var options = {
        title: 'Thống kê số lượng theo năm',
        width: 600,
        height: 350,
        backgroundColor: '#ffffff',
        bars: 'vertical', // Chọn hướng cột
        hAxis: {
            title: 'Năm',
            titleTextStyle: {
                color: '#333'
            },
            textStyle: {
                color: '#333'
            }
        },
        vAxis: {
            title: 'Số lượng',
            titleTextStyle: {
                color: '#333'
            },
            textStyle: {
                color: '#333'
            },
            minValue: 0
        },
        legend: {
            position: 'none'
        } // Ẩn chú giải (nếu không cần thiết)
    };

    // Vẽ biểu đồ cột
    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div4'));
    chart.draw(data, options);
}

         </script>

     </div>
 </div>
 <!--/.span9-->


 <?php
    // echo '<pre>';
    // var_dump($thongkeTungQuy);
    // echo '</pre>';
    //     echo '<pre>';
    //    var_dump($thongkeTopKH);
    //     echo '</pre>';
    ?>