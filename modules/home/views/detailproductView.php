<?php
get_header();
get_sidebar();
?>
<div id="wp-content">
    <div class="detailproduct">
        <div class="detail">
            <div class="image">
                <a href=""><img src="<?php echo url_img() . $info_product["hinhanh"] ?>" alt=""></a>
            </div>
            <div class="more-info">
                <h2 class="nameproduct"><?php echo $info_product["tensanpham"] ?></h2>
                <div class="desc">
                    <?php
                    echo $info_product["motangan"]
                    ?>
                </div>
                <h3>Còn hàng</h3>
                <span class="price"><?php echo currency_format($info_product["dongia"]) ?></span>
                <a href=""  target="?mod=cart&action=addtocart&id=<?php echo $info_product["id"] ?>" onclick="showconfirm(this);return false" id=<?php echo $info_product["id"] ?> style="text-decoration: none;">Thêm vào giỏ hàng</a>
            </div>
        </div>

        <div class="descproduct">
            <h2>Mô tả sản phẩm</h2>
            <?php
            echo $info_product["chitietsanpham"];
            ?>

        </div>

        <div class="same">
            <h2 style="margin-bottom: 20px" >Sản phẩm cũng chuyên mục</h2>
            <script>
                $(document).ready(function() {
                    var owl = $('.owl-carousel');
                    owl.owlCarousel({
                        items: 4,
                        loop: true,
                        margin: 10,
                        autoplay: true,
                        autoplayTimeout: 1000,
                        autoplayHoverPause: true
                    });
                    $('.play').on('click', function() {
                        owl.trigger('play.owl.autoplay', [1000])
                    })
                    $('.stop').on('click', function() {
                        owl.trigger('stop.owl.autoplay')
                    })
                })
            </script>
            <div class="owl-carousel owl-theme">

                <?php
                foreach ($same_category as $item) {
                ?>
                    <div class="item">
                        <a href="?mod=home&action=detailproduct&id=<?php echo $item["id"] ?>">

                            <div class="img"> <img src="<?php echo url_img() . $item["hinhanh"] ?>" alt="" /></div>
                            <div class="info">
                                <p class="name-product"><?php echo $item["tensanpham"] ?></p>
                                <p class="price"><strong><?php echo currency_format($item["dongia"]) ?></strong>
                                <p>
                                <div class="rate">
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i>
                                </div>
                            </div>

                        </a>
                    </div>
                <?php

                }
                ?>

            </div>

        </div>
        <!-- <div class="comment">
            <h2>Đánh giá từ khách hàng</h2>
            <ul>
                <li>
                    <h2 class="user">Trần Quang Đạo</h2>
                    <p class="comment-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam error ut minus a debitis porro in? Sapiente et, sint quod cum officia molestiae aperiam in illo similique, placeat dolore animi!<120></120>
                    </p>
                </li>
            </ul>
        </div> -->
    </div>


</div>
<?php
get_footer();
