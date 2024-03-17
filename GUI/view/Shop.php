<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <!-- <link rel="stylesheet" href="../css/Footer.css">
       <link rel="stylesheet" href="../css/HomePage.css">
       <link rel="stylesheet" href="../css/Header.css"> -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <style>
    <?php require('../css/Header.css');
    require('../css/Footer.css');

    require('../css/shop.css');
    ?>
    </style>


</head>

<body>
    <!-- header -->
    <?php require('./header.php'); ?>
    <!-- body -->
    <section class="body">
        <div class="path">
            <div class="container-path"><a href="#!">Home</a>
                /
                <a href="#!">Shop</a>

            </div>
        </div>
        <div class="container">

            <div class="container-path">
                <div class="row">

                    <!-- sidebar trai -->
                    <div class="search-categories">
                        <div class="sidebar_page sidebar_product">
                            <!-- Category product -->
                            <div class="filter-Category">
                                <h3 class="title_widget">
                                    <span>Category product</span>
                                </h3>
                                <ul class="cate-list unstyled">
                                    <!--women-->
                                    <li class="list_item_1 ">
                                        <div class="content_item">
                                            <div class="cate_list_title">
                                                <a class="cate-title" href="" rel="bookmark" title="Woment">
                                                    Woment </a>
                                            </div>
                                        </div>
                                        <!--sub menu women-->
                                        <ul class="sub_menu">
                                            <li class="list_item_1  ">
                                                <div class="cate_list_title">
                                                    <a class="sub-cate-title" href="" rel="bookmark" title="Tops">
                                                        Tops </a>
                                                </div>
                                            </li>
                                            <li class="list_item_1  ">
                                                <div class="cate_list_title">
                                                    <a class="sub-cate-title" href="" rel="bookmark" title="Jumpsuits">
                                                        Jumpsuits </a>
                                                </div>
                                            </li>
                                            <li class="list_item_1  ">
                                                <div class="cate_list_title">
                                                    <a class="sub-cate-title" href="" rel="bookmark" title="Dresses">
                                                        Dresses </a>
                                                </div>
                                            </li>
                                            <li class="list_item_1  ">
                                                <div class="cate_list_title">
                                                    <a class="sub-cate-title" href="" rel="bookmark" title="Blazers">
                                                        Blazers </a>
                                                </div>
                                            </li>
                                            <li class="list_item_1  ">
                                                <div class="cate_list_title">
                                                    <a class="sub-cate-title" href="" rel="bookmark" title="Shirt">
                                                        Shirt </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <!--Men-->
                                    <li class="list_item_2 ">
                                        <div class="content_item">
                                            <div class="cate_list_title">
                                                <a class="cate-title" href="" rel="bookmark" title="Men">
                                                    Men </a>
                                            </div>
                                        </div>
                                        <!--sub menu Men-->
                                        <ul class="sub_menu">
                                            <li class="list_item_2  ">
                                                <div class="cate_list_title">
                                                    <a class="sub-cate-title" href="" rel="bookmark" title="Shirts">
                                                        Shirts </a>
                                                </div>
                                            </li>
                                            <li class="list_item_2  ">
                                                <div class="cate_list_title">
                                                    <a class="sub-cate-title" href="" rel="bookmark" title="Suits">
                                                        Suits </a>
                                                </div>
                                            </li>
                                            <li class="list_item_2  ">
                                                <div class="cate_list_title">
                                                    <a class="sub-cate-title" href="" rel="bookmark" title="Bombers">
                                                        Bombers </a>
                                                </div>
                                            </li>
                                            <li class="list_item_2  ">
                                                <div class="cate_list_title">
                                                    <a class="sub-cate-title" href="" rel="bookmark" title="Jackets">
                                                        Jackets </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <!--Kids-->
                                    <li class="list_item_3 ">
                                        <div class="content_item">
                                            <div class="cate_list_title">
                                                <a class="cate-title" href="" rel="bookmark" title="Kids">
                                                    Kids </a>
                                            </div>
                                        </div>
                                        <!--sub menu Kids-->
                                        <ul class="sub_menu">
                                            <li class="list_item_3  ">
                                                <div class="cate_list_title">
                                                    <a class="sub-cate-title" href="" rel="bookmark"
                                                        title="Accessories">
                                                        Accessories </a>
                                                </div>
                                            </li>
                                            <li class="list_item_3  ">
                                                <div class="cate_list_title">
                                                    <a class="sub-cate-title" href="" rel="bookmark"
                                                        title="Mini | 0-12 Months">
                                                        Mini | 0-12 Months </a>
                                                </div>
                                            </li>
                                            <li class="list_item_3  ">
                                                <div class="cate_list_title">
                                                    <a class="sub-cate-title" href="" rel="bookmark"
                                                        title="Baby Boy | 3 Months-3 Years">
                                                        Baby Boy | 3 Months-3 Years </a>
                                                </div>
                                            </li>
                                            <li class="list_item_3  ">
                                                <div class="cate_list_title">
                                                    <a class="sub-cate-title" href="" rel="bookmark"
                                                        title="Baby Girl | 3 Months-3 Years">
                                                        Baby Girl | 3 Months-3 Years </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <!--Price-->
                            <div class="filter-price">
                                <h3 class="title_widget">
                                    <span>Price</span>
                                </h3>
                            </div>
                            <div id="slider-range"></div>
                            <div class="btn-filter-showprice">
                                <button id="filter-button">Filter</button>
                                <div id="price-display"> <span>Price:</span> $0 - $540</div>
                            </div>

                            <!-- <div class="filter-price">
                                <h3 class="title_widget">
                                    <span>Price</span>
                                </h3>
                                <form method="get" action="https://minimal.crv.vn/shop/">
                                    <div class="price_slider_wrapper">
                                        <div class="price_slider ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                            style>
                                            <div class="ui-slider-range ui-corner-all ui-widget-header"
                                                style="left: 0%; width: 100%;"></div>
                                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                                                style="left: 0%;">
                                            </span>
                                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                                                style="left: 100%;">
                                            </span>
                                        </div>
                                        <div class="price_slider_amount" data-step="10">
                                            <label class="screen-reader-text" for="min_price">Min price</label>
                                            <input type="text" id="min_price" name="min_price" value="0" data-min="0"
                                                placeholder="Min price" style="display: none;">
                                            <label class="screen-reader-text" for="max_price">Max price</label>
                                            <input type="text" id="max_price" name="max_price" value="540"
                                                data-max="540" placeholder="Max price" style="display: none;">
                                            <button type="submit" class="button" fdprocessedid="zoeoh8">Filter</button>
                                            <div class="price_label" style>
                                                Price: <span class="from">$0</span> — <span class="to">$540</span>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </form>
                            </div> -->
                            <!--Color-->
                            <div class="filter-color">
                                <div id="woocommerce_layered_nav-3" class="visible-all-devices widget">
                                    <h3 class="title_widget"><span>Color</span></h3>
                                    <ul class="woocommerce-widget-layered-nav-list">
                                        <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a
                                                rel="nofollow" class="sub-cate-title"
                                                href="https://minimal.crv.vn/shop/?filter_color=black">Black</a> </li>
                                        <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a
                                                rel="nofollow" class="sub-cate-title"
                                                href="https://minimal.crv.vn/shop/?filter_color=blue">Blue</a> </li>
                                        <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a
                                                rel="nofollow" class="sub-cate-title"
                                                href="https://minimal.crv.vn/shop/?filter_color=brown">Brown</a> </li>
                                        <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a
                                                rel="nofollow" class="sub-cate-title"
                                                href="https://minimal.crv.vn/shop/?filter_color=green">Green</a> </li>
                                        <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a
                                                rel="nofollow" class="sub-cate-title"
                                                href="https://minimal.crv.vn/shop/?filter_color=khaki-green">Khaki
                                                green</a>

                                        </li>
                                        <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a
                                                rel="nofollow" class="sub-cate-title"
                                                href="https://minimal.crv.vn/shop/?filter_color=orange">Orange</a> </li>
                                        <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a
                                                rel="nofollow" class="sub-cate-title"
                                                href="https://minimal.crv.vn/shop/?filter_color=yellow">Yellow</a> </li>
                                    </ul>
                                </div>
                            </div>
                            <!--brand-->
                            <div class="filter-brands">
                                <div id="woocommerce_layered_nav-2" class="visible-all-devices widget">
                                    <h3 class="title_widget"><span>Brands</span></h3>
                                    <ul class="woocommerce-widget-layered-nav-list">
                                        <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a
                                                rel="nofollow" class="sub-cate-title"
                                                href="https://minimal.crv.vn/shop/?filter_brands=calvin-klein">Calvin
                                                Klein</a> </li>
                                        <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a
                                                rel="nofollow" class="sub-cate-title"
                                                href="https://minimal.crv.vn/shop/?filter_brands=columbia">Columbia</a>

                                        </li>
                                        <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a
                                                rel="nofollow" class="sub-cate-title"
                                                href="https://minimal.crv.vn/shop/?filter_brands=haute-hippie">Haute
                                                Hippie</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-page">
                        <!-- lọc sản phẩm đầu trang -->
                        <div class="left-right-result">
                            <!--show result-->
                            <div class="l_filter">
                                <p class="woocommerce-result-count">Show 1–12 of 19 result</p>
                            </div>
                            <!--sort by...-->
                            <div class="r_filter">
                                <form class="woocommerce-ordering" method="get">
                                    <select name="orderby" class="orderby" fdprocessedid="037fbn">
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="rating">Sort by average rating</option>
                                        <option value="date" selected="selected">Sort by latest</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <!-- chứa list sản phẩm -->
                        <div class="row list-product">
                            <div class="product-list">
                                <!--Chứa 1 sản phẩm-->
                                <div class="product-container">
                                    <!--khung chứa ảnh-->
                                    <div class="image">
                                        <a href="" class="">
                                            <img src="../image/product/product_1/1-2-312x390.png" alt="">
                                        </a>
                                        <!--cart và xem chi tiết sp trong ảnh-->
                                        <div class="action-custom">
                                            <!--cart-->
                                            <div class="add-to-cart">
                                                <a href="" class="" title="add cart">
                                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <!--read-more-->
                                            <div class="readmore">
                                                <a href="" title="Detail">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- thong tin san pham -->
                                    <div class="product-meta">
                                        <div class="name">
                                            <a href="">Super-soft wrap jumpsuit</a>
                                        </div>

                                    </div>
                                    <!-- thong tin gia san pham -->
                                    <div class="price">
                                        <div itemprop="offers" class="pricelist"></div>
                                        <ins class="giamoi">$39.99</ins>
                                    </div>
                                </div>
                                <div class="product-container">
                                    <!--khung chứa ảnh-->
                                    <div class="image">
                                        <a href="" class="">
                                            <img src="../image/product/product_1/1-2-312x390.png" alt="">
                                        </a>
                                        <!--cart và xem chi tiết sp trong ảnh-->
                                        <div class="action-custom">
                                            <!--cart-->
                                            <div class="add-to-cart">
                                                <a href="" class="" title="add cart">
                                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <!--read-more-->
                                            <div class="readmore">
                                                <a href="" title="Detail">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- thong tin san pham -->
                                    <div class="product-meta">
                                        <div class="name">
                                            <a href="">Denim playsuit</a>
                                        </div>

                                    </div>
                                    <!-- thong tin gia san pham -->
                                    <div class="price">
                                        <div itemprop="offers" class="pricelist"></div>
                                        <ins class="giamoi">$25.00</ins>
                                    </div>
                                </div>
                                <div class="product-container">
                                    <!--khung chứa ảnh-->
                                    <div class="image">
                                        <a href="" class="">
                                            <img src="../image/product/product_1/1-2-312x390.png" alt="">
                                        </a>
                                        <!--cart và xem chi tiết sp trong ảnh-->
                                        <div class="action-custom">
                                            <!--cart-->
                                            <div class="add-to-cart">
                                                <a href="" class="" title="add cart">
                                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <!--read-more-->
                                            <div class="readmore">
                                                <a href="" title="Detail">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- thong tin san pham -->
                                    <div class="product-meta">
                                        <div class="name">
                                            <a href="">Halterneck jumpsuit</a>
                                        </div>

                                    </div>
                                    <!-- thong tin gia san pham -->
                                    <div class="price">
                                        <div itemprop="offers" class="pricelist"></div>
                                        <ins class="giamoi">$19.99</ins>
                                    </div>
                                </div>
                                <div class="product-container">
                                    <!--khung chứa ảnh-->
                                    <div class="image">
                                        <a href="" class="">
                                            <img src="../image/product/product_1/1-2-312x390.png" alt="">
                                        </a>
                                        <!--cart và xem chi tiết sp trong ảnh-->
                                        <div class="action-custom">
                                            <!--cart-->
                                            <div class="add-to-cart">
                                                <a href="" class="" title="add cart">
                                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <!--read-more-->
                                            <div class="readmore">
                                                <a href="" title="Detail">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- thong tin san pham -->
                                    <div class="product-meta">
                                        <div class="name">
                                            <a href="">Denim jumpsuit</a>
                                        </div>

                                    </div>
                                    <!-- thong tin gia san pham -->
                                    <div class="price">
                                        <div itemprop="offers" class="pricelist"></div>
                                        <ins class="giamoi">$39.99</ins>
                                    </div>
                                </div>
                                <div class="product-container">
                                    <!--khung chứa ảnh-->
                                    <div class="image">
                                        <a href="" class="">
                                            <img src="../image/product/product_1/1-2-312x390.png" alt="">
                                        </a>
                                        <!--cart và xem chi tiết sp trong ảnh-->
                                        <div class="action-custom">
                                            <!--cart-->
                                            <div class="add-to-cart">
                                                <a href="" class="" title="add cart">
                                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <!--read-more-->
                                            <div class="readmore">
                                                <a href="" title="Detail">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- thong tin san pham -->
                                    <div class="product-meta">
                                        <div class="name">
                                            <a href="">Linen T-shirt</a>
                                        </div>

                                    </div>
                                    <!-- thong tin gia san pham -->
                                    <div class="price">
                                        <div itemprop="offers" class="pricelist"></div>
                                        <ins class="giamoi">$14.99</ins>
                                    </div>
                                </div>
                                <div class="product-container">
                                    <!--khung chứa ảnh-->
                                    <div class="image">
                                        <a href="" class="">
                                            <img src="../image/product/product_1/1-2-312x390.png" alt="">
                                        </a>
                                        <!--cart và xem chi tiết sp trong ảnh-->
                                        <div class="action-custom">
                                            <!--cart-->
                                            <div class="add-to-cart">
                                                <a href="" class="" title="add cart">
                                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <!--read-more-->
                                            <div class="readmore">
                                                <a href="" title="Detail">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- thong tin san pham -->
                                    <div class="product-meta">
                                        <div class="name">
                                            <a href="">Oversized printed T-shirt</a>
                                        </div>

                                    </div>
                                    <!-- thong tin gia san pham -->
                                    <div class="price">
                                        <div itemprop="offers" class="pricelist"></div>
                                        <ins class="giamoi"><span class="price-sale">$22.00</span> $14.99</ins>
                                    </div>
                                </div>
                                <div class="product-container">
                                    <!--khung chứa ảnh-->
                                    <div class="image">
                                        <a href="" class="">
                                            <img src="../image/product/product_1/1-2-312x390.png" alt="">
                                        </a>
                                        <!--cart và xem chi tiết sp trong ảnh-->
                                        <div class="action-custom">
                                            <!--cart-->
                                            <div class="add-to-cart">
                                                <a href="" class="" title="add cart">
                                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <!--read-more-->
                                            <div class="readmore">
                                                <a href="" title="Detail">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- thong tin san pham -->
                                    <div class="product-meta">
                                        <div class="name">
                                            <a href="">Printed T-shirt</a>
                                        </div>

                                    </div>
                                    <!-- thong tin gia san pham -->
                                    <div class="price">
                                        <div itemprop="offers" class="pricelist"></div>
                                        <ins class="giamoi"><span class="price-sale">$20.00</span> $14.99</ins>
                                    </div>
                                </div>
                                <div class="product-container">
                                    <!--khung chứa ảnh-->
                                    <div class="image">
                                        <a href="" class="">
                                            <img src="../image/product/product_1/1-2-312x390.png" alt="">
                                        </a>
                                        <!--cart và xem chi tiết sp trong ảnh-->
                                        <div class="action-custom">
                                            <!--cart-->
                                            <div class="add-to-cart">
                                                <a href="" class="" title="add cart">
                                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <!--read-more-->
                                            <div class="readmore">
                                                <a href="" title="Detail">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- thong tin san pham -->
                                    <div class="product-meta">
                                        <div class="name">
                                            <a href="">Cotton T-shirt</a>
                                        </div>

                                    </div>
                                    <!-- thong tin gia san pham -->
                                    <div class="price">
                                        <div itemprop="offers" class="pricelist"></div>
                                        <ins class="giamoi">$9.99</ins>
                                    </div>
                                </div>
                                <div class="product-container">
                                    <!--khung chứa ảnh-->
                                    <div class="image">
                                        <a href="" class="">
                                            <img src="../image/product/product_1/1-2-312x390.png" alt="">
                                        </a>
                                        <!--cart và xem chi tiết sp trong ảnh-->
                                        <div class="action-custom">
                                            <!--cart-->
                                            <div class="add-to-cart">
                                                <a href="" class="" title="add cart">
                                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <!--read-more-->
                                            <div class="readmore">
                                                <a href="" title="Detail">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- thong tin san pham -->
                                    <div class="product-meta">
                                        <div class="name">
                                            <a href="">Oversized crinkled shirt</a>
                                        </div>

                                    </div>
                                    <!-- thong tin gia san pham -->
                                    <div class="price">
                                        <div itemprop="offers" class="pricelist"></div>
                                        <ins class="giamoi">$20.00</ins>
                                    </div>
                                </div>
                                <div class="product-container">
                                    <!--khung chứa ảnh-->
                                    <div class="image">
                                        <a href="" class="">
                                            <img src="../image/product/product_1/1-2-312x390.png" alt="">
                                        </a>
                                        <!--cart và xem chi tiết sp trong ảnh-->
                                        <div class="action-custom">
                                            <!--cart-->
                                            <div class="add-to-cart">
                                                <a href="" class="" title="add cart">
                                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <!--read-more-->
                                            <div class="readmore">
                                                <a href="" title="Detail">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- thong tin san pham -->
                                    <div class="product-meta">
                                        <div class="name">
                                            <a href="">Linen-blend pop-over shirt</a>
                                        </div>

                                    </div>
                                    <!-- thong tin gia san pham -->
                                    <div class="price">
                                        <div itemprop="offers" class="pricelist"></div>
                                        <ins class="giamoi">$35.00</ins>
                                    </div>
                                </div>
                                <div class="product-container">
                                    <!--khung chứa ảnh-->
                                    <div class="image">
                                        <a href="" class="">
                                            <img src="../image/product/product_1/1-2-312x390.png" alt="">
                                        </a>
                                        <!--cart và xem chi tiết sp trong ảnh-->
                                        <div class="action-custom">
                                            <!--cart-->
                                            <div class="add-to-cart">
                                                <a href="" class="" title="add cart">
                                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <!--read-more-->
                                            <div class="readmore">
                                                <a href="" title="Detail">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- thong tin san pham -->
                                    <div class="product-meta">
                                        <div class="name">
                                            <a href="">V-neck blouse</a>
                                        </div>

                                    </div>
                                    <!-- thong tin gia san pham -->
                                    <div class="price">
                                        <div itemprop="offers" class="pricelist"></div>
                                        <ins class="giamoi"><span class="price-sale">$20.00</span> $15.99</ins>
                                    </div>
                                </div>
                                <div class="product-container">
                                    <!--khung chứa ảnh-->
                                    <div class="image">
                                        <a href="" class="">
                                            <img src="../image/product/product_1/1-2-312x390.png" alt="">
                                        </a>
                                        <!--cart và xem chi tiết sp trong ảnh-->
                                        <div class="action-custom">
                                            <!--cart-->
                                            <div class="add-to-cart">
                                                <a href="" class="" title="add cart">
                                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <!--read-more-->
                                            <div class="readmore">
                                                <a href="" title="Detail">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- thong tin san pham -->
                                    <div class="product-meta">
                                        <div class="name">
                                            <a href="">Oxford shirt</a>
                                        </div>

                                    </div>
                                    <!-- thong tin gia san pham -->
                                    <div class="price">
                                        <div itemprop="offers" class="pricelist"></div>
                                        <ins class="giamoi">$18.99</ins>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--chuyển trang sản phẩm 1->2 -->
                        <div class="list-page">
                            <div class="item">
                                <a href="#">1</a>
                            </div>
                            ...
                            <div class="item 2">
                                <a href="#">2</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <?php require('./footer.php'); ?>

    <script src="../Js/Header.js"></script>
    <script src="../Js/shop.js"></script>
    <script src="../Js/pricesidebar.js"></script>
</body>

</html>