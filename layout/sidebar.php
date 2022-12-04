<?php
load("helper", "load_cat");
global $list_cat;
$list_cat = load_cate();
$list = get_List_id_category();;
$list = data_tree($list, 0);

?>
<div class="sidebar">
    <div class="top">
        <div class="slider">
            <a href=""><img src="public/images/images/slider.png" alt="" /></a>
        </div>
        <div class="banner">
            <a href=""><img src="public/images/images/slider2.png" alt="" /></a>
        </div>
    </div>
    <div class="menu-product">

        <script>
            $(document).ready(function() {
                var owl = $('.owl-carousel');
                owl.owlCarousel({
                    items: 6,
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
            foreach ($list_cat as $cat) {
            ?>
                <div class="item">
                    <div class="img"><a href="?mod=home&action=home&id=<?php echo $cat["id_theloai"] ?>"><img src="<?php echo url_img() . $cat["anhdanhmuc"] ?>" alt=""></a></div>
                    <div class="tendanhmuc">
                        <a href=""><?php echo $cat["ten_theloai"] ?></a>
                    </div>
                </div>
            <?php

            }
            ?>

        </div>

    </div>
    <!-- <form action="" data-=""></form> -->
    <!-- <div class="desc">
        <div class="title">
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam, praesentium!
            </p>
        </div>
        <div class="content">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero ipsum nesciunt officia maiores tempora ducimus perferendis repellat voluptatibus pariatur quam aspernatur ab molestias totam debitis eaque, quae cum labore optio nisi expedita minima ea excepturi
                reprehenderit! Est velit dolore optio beatae sint recusandae placeat nobis quos unde laborum hic aspernatur ut dolorum magni facere rem voluptatum accusamus ab, dignissimos enim natus exercitationem neque quod! Dolorum, dicta. Quo doloremque
                voluptate similique cupiditate, ullam quam beatae magnam at facilis incidunt accusantium fugit itaque repudiandae maxime maiores repellendus tenetur totam, nisi id fuga fugiat. Ab veniam nisi necessitatibus incidunt assumenda perspiciatis
                deleniti repellendus?
            </p>
        </div>
    </div> -->
</div>

<div class="list_seach">
    <form action="" method="POST" id="search_conditions">
        <div class="item">
            <label for="">Tên sản phẩm</label>
            <input type="text" name="timkiemtheoten" id="name_conditions" placeholder="Tên sản phẩm">
        </div>
        <div class="item">
            <label for="">Khoảng giá</label>

            <div style="display:flex"> 
                <input type="number" name="num1" id="num_1" placeholder="Khoảng giá 1">
                <input type="number" name="num2" id="num_2" placeholder="Khoảng giá 2">
            </div>
            <?php if (isset($error["num_error"])) echo "<p style='color:#FFDB50;margin-top:10px'>" . $error["num_error"] . "</p>" ?>
        </div>
        <div class="item">
            <label for="">Danh mục</label>
            <select name="cate" id="cate_conditions">
                <?php
                foreach ($list as $item) { ?>
                    <option value="<?php echo $item["id_theloai"] ?>"><?php echo str_repeat("__", $item["level"]) . $item["ten_theloai"] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="item">
            <input type="button" onclick="check();return" name="btn-search-more" value="Tìm kiếm ">
        </div>
    </form>

</div>
<div id="list_search_conditions"></div>
<?php
