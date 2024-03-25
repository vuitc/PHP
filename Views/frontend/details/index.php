<?php
// var_dump($findAllProduct);
// var_dump($findAllSize);
// var_dump($binhluans);
function renderSizes($sizes, $defaultSize = null, $id = null)
{
    $str = '';


    if (is_array($sizes) && !empty($sizes)) {
        foreach ($sizes as $item) {
            $size = $item; // Truy cập trực tiếp giá trị của mảng
            $checked = ($size == $defaultSize) ? 'checked' : ''; // Kiểm tra xem size có phải là size mặc định hoặc là phần tử đầu tiên không
            $str .= ' <div class="custom-control custom-radio custom-control-inline">';
            if ($checked == 'checked') {
                $str .= ' <input type="hidden" name="size" value="' . $id . '">';
            }
            $str .= '<input type="radio" class="custom-control-input" id="' . $size . '" name="sizes" ' . $checked . ' value="' . $size . '">
                        <label class="custom-control-label" for="' . $size . '">' . $size . '</label>
                    </div>';
        }
    }
    return $str;
}
function renderColors($colors, $default = null, $id = null)
{
    $str = '';
    if (is_array($colors) && !empty($colors)) {
        foreach ($colors as $item) {
            $color = $item; // Truy cập trực tiếp giá trị của mảng
            $checked = ($color == $default) ? 'checked' : ''; // Kiểm tra xem size có phải là size mặc định hoặc là phần tử đầu tiên không
            $str .= ' <div class="custom-control custom-radio custom-control-inline">';
            if ($checked == 'checked') {
                $str .= ' <input type="hidden" name="color" value="' . $id . '">';
            }
            $str .= '<input type="radio" class="custom-control-input" id="' . $color . '" name="colors" ' . $checked . ' value="' . $color . '">
                        <label class="custom-control-label" for="' . $color . '">' . $color . '</label>
                    </div>';
        }
    }
    return $str;
}
function renderProduct($product)
{
    $str = '';
    if (is_array($product) && !empty($product)) {
        $str .= ' <div class="container-fluid py-5">
                        <div class="text-center mb-4">
                            <h2 class="section-title px-5"><span class="px-2" style="font-family:cursive">' . $product[1] . '</span></h2>
                        </div>
                    <div class="row px-xl-5">
                        <div class="col">
                            <div class="owl-carousel related-carousel">';
        foreach ($product[0] as $item) {
            extract($item);
            $salePrice = ($price * (100 - $giamgia)) / 100;
            $formattedSalePrice = number_format($salePrice, 0, ',', '.');
            $formattedPrice = number_format($price, 0, ',', '.');
            $str .= '  <div class="card product-item border-0">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="asset/img/' . $image . '" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3">' . $name . '</h6>
                    <div class="d-flex justify-content-center">
                        <h6>' . $formattedSalePrice . '</h6><h6 class="text-muted ml-2"><del>' . $formattedPrice . '</del></h6>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="index.php?controller=detail&id=' . $id . '" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
                    <a href="index.php?controller=cart&action=store&id=' . $id . '&idColor=' . $idColor . '&idSize=' . $idSize . '" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm giỏ hàng</a>
                </div>
            </div>';
        }
        $str .= "</div>
            </div>
        </div>
    </div>";
    };
    return $str;
}
?>
<?php if (!empty($findProduct)) : ?>
    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="asset/img/<?= $findProduct['image']; ?>" alt="Image">
                            <!-- <img class="w-100 h-100" src="asset/img/product-1.jpg" alt="Image"> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <!-- <h3 class="font-weight-semi-bold">Colorful Stylish Shirt</h3> -->
                <h3 class="font-weight-semi-bold"><?= $findProduct['name'] ?></h3>
                <!-- <?php
                        if (isset($findProduct['soluongton'])) {
                            echo '<input type="text" id="soLuongTonId" value="' . $findProduct['soluongton'] . '">';
                        } else {
                            echo '<input type="text" id="soLuongTonId" value="0">';
                        }
                        ?> -->


                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(50 đánh giá)</small>
                </div>
                <!-- <h3 class="font-weight-semi-bold mb-4">$150.00</h3> -->
                <h3 class="font-weight-semi-bold mb-4" id="priceId">
                    <?= number_format($findProduct['price'] * (1 - $findProduct['giamgia'] / 100), 0, ',', '.') ?> đ</h3>

                <!-- <p class="mb-4">Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.</p> -->
                <p class="mb-4"><?= $findProduct['mota'] ?></p>
                <p>Số lượng tồn kho:
                    <span id="soLuongTonId"><?= $findProduct['soluongton'] > 0 ?$findProduct['soluongton'] : 'Đã hết hàng' ?>
                    </span>
                </p>
                <form action="index.php?controller=cart&action=store" method="post">
                    <input type="hidden" name="id" value="<?= $findProduct['id'] ?>">
                    <!-- <input type="text" name="soluongton" value="<?= $findProduct['soluongton'] ?>"> -->
                    <div class="d-flex mb-3">
                        <p class="text-dark  mb-0 mr-3">Kích cở:</p>
                        <?php
                        // size php
                        $kqRenderSize = renderSizes($findAllSize, $findProduct['size'], $findProduct['idSize']); // Chỉ định size mặc định (nếu có)
                        echo $kqRenderSize;
                        ?>
                    </div>
                    <div class="d-flex mb-4">
                        <p class="text-dark  mb-0 mr-3">Màu:</p>
                        <?php
                        // color php
                        $kqRenderColor = renderColors($findAllColor, $findProduct['color'], $findProduct['idColor']); // Chỉ định size mặc định (nếu có)
                        echo $kqRenderColor;
                        ?>

                    </div>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus mt-1" type="button">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" name="soluong" class="form-control bg-secondary text-center" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus mt-1" type="button">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <button type="submit" name="btnClick" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Thêm giỏ hàng</button>
                    </div>
                </form>
                <div class="d-flex pt-2">
                    <p class="text-dark  mb-0 mr-2">Tương tác:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Chi tiết</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Thông tin</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Đánh giá</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Sản phẩm mô tả:</h4>
                        <p><?= $findProduct['mota'] ?></p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Thông tin chi tiết:</h4>
                        <p><?= $findProduct['chitiet'] ?></p>

                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <?php
                                if ($binhluans['soluong'] > 0) {
                                    echo '<h4 class="mb-4">' . $binhluans['soluong'] . ' review for "' . $findProduct['name'] . '"</h4>';
                                } else {
                                    echo '<h4>Chưa có bình luận</h4>';
                                }
                                ?>
                                <?php
                                $str = '';
                                foreach ($binhluans['binhluans'] as $item) {
                                    extract($item);
                                    if (!$avatar) {
                                        $avatar = 'avatar/avatar.jpg';
                                    }
                                    $str .= '
                                        <div class="media mb-4">
                                            <img src="asset/img/' . $avatar . '" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                            <div class="media-body">
                                                <h6>' . $tenkh . '<small> - <i>' . $ngaybl . '</i></small></h6>
                                                <div class="text-primary mb-2">';

                                    // Bắt đầu vòng lặp PHP ở đây
                                    for ($i = 0; $i < $sao; $i++) {
                                        $str .= '<i class="fas fa-star"></i>';
                                    }
                                    // Thêm sao trắng nếu cần
                                    for ($i = $sao; $i < 5; $i++) {
                                        $str .= '<i class="far fa-star"></i>';
                                    }

                                    $str .= '
                                                </div>
                                                <p>' . $content . '</p>
                                            </div>
                                        </div>';
                                }
                                echo $str;
                                ?>


                            </div>
                            <?php
                            $str = '';
                            if (!isset($_SESSION['username_S'])) {
                                $str = ' <div class="col-md-6">
                                    <h4>Bạn cần đăng nhập để bình luận</h4>
                                    <a href="index.php?controller=register&action=sign_in&page=detail&id=' . $findProduct['id'] . '" class="btn btn-sm text-dark p-0">Đăng nhập ngay</a>
                                </div>';
                            } else {
                                $str = '
                                <div class="col-md-6">
                                <h4 class="mb-4">Đánh giá sản phẩm</h4>
                                <small>Để lại thông tin bên dưới. Đánh giá của bạn góp phần cho sự phát triển của chúng tôi. *</small>
                                <form action="index.php?controller=detail&id=' . $findProduct['id'] . '" method="post">
                                <div class="d-flex my-3">
                                    <p class="mb-0 mr-2">Đánh giá :</p>
                                    <div class="rating text-primary">
                                        <i class="far fa-star" data-index="1"></i>
                                        <i class="far fa-star" data-index="2"></i>
                                        <i class="far fa-star" data-index="3"></i>
                                        <i class="far fa-star" data-index="4"></i>
                                        <i class="far fa-star" data-index="5"></i>
                                        <input type="hidden" value="0" name="danhgiasao">
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <label for="message">Đánh giá chi tiết:</label>
                                        <textarea id="message" cols="30" rows="5" class="form-control" name="content"></textarea>
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Gửi" name="btnClick1" class="btn btn-primary px-3" id="submitBtn" disabled>

                                    </div>
                                </form>
                            </div>
                                ';
                            }
                            echo $str;
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<!-- Shop Detail End -->


<!-- Products Start -->

<?php
$kqProductSpecial = renderProduct($productSpecial);
echo $kqProductSpecial;

?>
<!-- Products End -->
<!-- xử lí js ở đây -->
<script>
    var findAllProduct1 = <?php echo json_encode($findAllProduct); ?>;
    var dsColors = <?php echo json_encode($dsColor); ?>;
    var dsSizes = <?php echo json_encode($dsSize); ?>;
    const selectedSize = $('input[name="sizes"]:checked').val();
    const selectedColor = $('input[name="colors"]:checked').val();
    $(document).ready(function() {
        function updateSP() {
            const selectedSize = $('input[name="sizes"]:checked').val();
            const selectedSizeId = dsSizes.find(item => item.size === selectedSize)?.id;
            $('input[name="size"]').val(selectedSizeId);

            const selectedColor = $('input[name="colors"]:checked').val();
            const selectedColorId = dsColors.find(item => item.color === selectedColor)?.id;
            $('input[name="color"]').val(selectedColorId);

            const findSP = findAllProduct1.filter(item => item.size == selectedSize && item.color == selectedColor);

            if (findSP.length > 0 && findSP[0]['soluongton'] !== undefined) {
                const discountedPrice = findSP[0]['price'] * (1 - findSP[0]['giamgia'] / 100);
                const formattedPrice = discountedPrice.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                });
                $('#priceId').text(formattedPrice);
                // $('#soLuongTonId').val(findSP[0]['soluongton']);
                $('#soLuongTonId').text(findSP[0]['soluongton']);
                $('button[name="btnClick"]').attr('disabled', false);
            } else {
                $('button[name="btnClick"]').attr('disabled', true);
                // $('#soLuongTonId').val(0);
                $('#soLuongTonId').text("Đã hết hàng");

                $('#priceId').text("Hiện tại sản phẩm này đã hết");
            }
        }

        $('input[name="sizes"]').change(updateSP);
        $('input[name="colors"]').change(updateSP);
        $('#message').on('input', function() {
            console.log($('input[name="btnClick1"]'));
            var content = $(this).val().trim();
            if (content) {
                $('input[name="btnClick1"]').attr('disabled', false);
            } else {
                $('input[name="btnClick1"]').attr('disabled', true);
            }
        })

        const stars = document.querySelectorAll('.rating i');
        const ratingInput = document.querySelector('.rating input[name="danhgiasao"]');

        stars.forEach(function(star) {
            star.addEventListener('click', function() {
                const index = parseInt(star.getAttribute('data-index'));
                ratingInput.value = index;
                resetStars();
                for (let i = 0; i < index; i++) {
                    stars[i].classList.add('fas');
                    stars[i].classList.remove('far');
                }
            });
        });

        function resetStars() {
            stars.forEach(function(star) {
                star.classList.remove('fas');
                star.classList.add('far');
            });
        }
    });
</script>