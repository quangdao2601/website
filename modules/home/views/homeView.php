<?php
get_header();
get_sidebar();

?>
<div id="wp-content">
    <div class="content">
        <div class="product">

            <div class="top_product">
                <h3 style="color: white;">Sản phẩm bán chạy của chúng tôi</h3>
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
                    $count = 0;
                    foreach ($top_product as $top) {
                        $count++
                    ?>
                        <div class="item">
                            <a href="?mod=home&action=detailproduct&id=<?php echo $top["id"] ?>">
                                <div class="img"> <img src="<?php echo url_img() . $top["hinhanh"] ?>" alt="" /></div>
                                <div class="info">
                                    <p class="name-product">
                                        <?php echo  $top["tensanpham"] ?></p>
                                    <p class="price"><strong><?php echo currency_format($top["dongia"]) ?></strong>
                                    <p>
                                    <div class="rate">
                                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i>
                                    </div>
                                </div>

                            </a>
                        </div>
                    <?php
                        if ($count == 10) {
                            break;
                        }
                    }
                    ?>




                </div>
            </div>
            <div id="list-product">
                <ul>

                    <?php
                    if (!empty($list)) {
                        foreach ($list as $item) {
                    ?>


                            <a href="?mod=home&action=detailproduct&id=<?php echo $item["id"] ?>">
                                <li>
                                    <div class="img"> <img src="<?php echo url_img() . $item["hinhanh"] ?>" alt="" /></div>
                                    <div class="info">
                                        <p class="name-product"><?php echo $item["tensanpham"] ?></p>
                                        <p class="price"><strong><?php echo currency_format($item["dongia"]) ?></strong>
                                        <p>
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i>
                                        </div>
                                    </div>
                                </li>
                            </a>
                    <?php
                        }
                    }
                    ?>

                </ul>
            </div>
            <div class="list-product">



            </div>

            <div id="pagging">
                <?php echo $pagging ?>

            </div>

        </div>
    </div>
</div>

<?php
get_footer();
?>