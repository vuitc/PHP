<?php
    // var_dump($discountPercent);
    // var_dump($total);
    function renderProduct($products) {
        $str = '';
        if (is_array($products) && !empty($products)) {
            foreach ($products as $key=> $product) {
                $qty = isset($product['qty']) ? $product['qty'] : '';
                $ma = isset($product['ma']) ? $product['ma'] : '';
                $price=$product[0]['price']*(1-$product[0]['giamgia']/100);
                $total=$qty*$price;
                $total=number_format($total, 0, ',', '.');
                $price = number_format($price, 0, ',', '.');
                $str .= '<tr>
                    <td class="align-middle"><img src="asset/img/'.$product[0]['image'].'" alt="" style="width: 50px;"> '.$product[0]['name'].'_'.$product[0]['color'].'_'.$product[0]['size'].'</td>
                    <td class="align-middle">'.$price.'</td>
                    <td class="align-middle">
                        <div class="input-group quantity mx-auto" style="width: 100px;">
                            <div class="input-group-btn">
                                <a href="index.php?controller=cart&action=downQuantity&index='.$ma.'" class="btn btn-sm btn-primary btn-minus" data-key="'.$key.'" data-quantity="'.$qty.'">
                                    <i class="fa fa-minus"></i>
                                </a>                           
                            </form>
                            </div>
                            <input type="text" readonly class="form-control form-control-sm bg-secondary text-center" value="'.$qty.'">
                            <div class="input-group-btn">
                            <a href="index.php?controller=cart&action=upQuantity&index='.$ma.'" class="btn btn-sm btn-primary btn-plus" data-key="'.$key.'" data-quantity="'.$qty.'">
                                <i class="fa fa-plus"></i>
                            </a>
                            </div>
                        </div>
                    </td>
                    <td class="align-middle">'.$total.'</td>
                    <td class="align-middle"><a href="index.php?controller=cart&action=delCart&index='.$ma.'" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></a></td>
                </tr>';
            }
            return $str;
        }   
    }
    
?>
<!-- Page Header Start -->
<div class="container-fluid bg-secondary ">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <!-- <h1 class="font-weight-semi-bold text-uppercase mb-3">Trang giỏ hàng</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="index.php">Trang chủ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Giỏ hàng</p>
        </div> -->
        <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Xoá</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php
                            $result=renderProduct($products);
                            echo $result;
                        ?>
                
                </tbody>
            </table>
    </div>
</div>
<!-- Page Header End -->

</div>
</div>
</div>
<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive ">
            <!-- <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Xoá</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php
                            $result=renderProduct($products);
                            echo $result;
                        ?>
                
                </tbody>
            </table> -->
            <form class="mb-5" action="index.php?controller=cart" method="post">
                <div class="input-group">
                    <input type="text" class="form-control p-4" name="voucher" placeholder="code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Nhập voucher</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-4">
           
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Tính toán</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Tạm tính</h6>
                        <h6 class="font-weight-medium"><?=number_format($sum, 0, ',', '.')?></h6>
                    </div>
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Giảm giá</h6>
                        <h6 class="font-weight-medium"><?=number_format($sum-$total, 0, ',', '.')?></h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Vận chuyển</h6>
                        <h6 class="font-weight-medium"><?php
                                $phiShip=0;
                            if($total>1000000){
                                echo "Miễn phí vận chuyển";
                            }else{
                                $phiShip=30000;
                                echo "30.000";
                            }?></h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Thành tiền</h5>
                        <h5 class="font-weight-bold">
                            <?=number_format($total-$phiShip>0?$total-$phiShip:0, 0, ',', '.')?></h5>
                    </div>
                    <a href="index.php?controller=payment" class="btn btn-block btn-primary my-3 py-3">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->