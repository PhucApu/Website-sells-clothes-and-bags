<!DOCTYPE html>
<html lang="en">
<?php require('../../../config.php') ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="stylesheet" href="../../css/admin/tongquan.css">
    <style>
        <?php
        require('../../css/admin/sidebar.css');
        require('../../css/admin/header_admin.css');
        require('../../css/admin/footer_admin.css');
        ?>
    </style>
</head>

<body>
    <div class="container-sb">
        <div class="side-bar"><?php require('./sidebar.php'); ?></div>
        <div class="content">
            <div class="header">
                <?php require('./header_admin.php'); ?>
            </div>
            <div class="content-page">
                <div class="head-content">
                    <p class="title">Tổng quan</p>
                    <div class="path"><a href="#!">Home</a> <span> / Tổng quan</span></div>
                </div>
                <div class="stat">
                    <div class="item-stat">
                        <div class="number sub-stat"><span>24</span>
                            <p>Đơn đặt hàng</p>
                        </div>
                        <div class="icon-stat "><i class="fa-solid fa-bag-shopping"></i></div>
                    </div>
                    <div class="item-stat">
                        <div class="number sub-stat"><span>25%</span>
                            <p>Tỉ lệ hủy đơn</p>
                        </div>
                        <div class="icon-stat "><i class="fa-solid fa-chart-simple"></i></div>
                    </div>
                    <div class="item-stat">
                        <div class="number sub-stat"><span>185800</span>
                            <p>Doanh thu</p>
                        </div>
                        <div class="icon-stat "><i class="fa-solid fa-chart-pie"></i></div>
                    </div>
                </div>
                <div class="filter-chart">
                    <div class="filter">
                        <div class="search">
                            <span>Tìm kiếm sản phẩm</span>
                            <select>
                                <option value="0" selected>Lựa chọn sản phẩm theo danh mục</option>
                                <option value="1">Áo Thun</option>
                                <option value="2">Áo Hoodie</option>
                                <option value="3">Áo Sơ Mi</option>
                                <option value="4">Áo Polo</option>
                                <option value="5">Áo Khoác</option>
                            </select>
                        </div>
                        <div class="toDate">Từ ngày <input type="date"></div>
                        <div class="endDate">Đến ngày <input type="date"></div>
                        <div class="buttonSearch">Thống kê <div class="button">Thống kê</div>
                        </div>
                    </div>
                    <div class="chart">
                        <div class="pie-chart">
                            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                        </div>
                    </div>
                </div>
                <div class="table-stat">
                    <table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Ảnh</th>
                                <th>Giá bán</th>
                                <th>Danh mục</th>
                                <th>Đã bán</th>
                                <th>Hàng còn</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Áo Thun Adidas D4R Xanh</td>
                                <td><img src="../../image/product/product1/product-detail-1.png" alt=""></td>
                                <td>500</td>
                                <td>Áo Thun</td>
                                <td>137</td>
                                <td>116</td>
                                <td>68500</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Áo Thun Adidas D4R Xanh</td>
                                <td><img src="../../image/product/product1/product-detail-1.png" alt=""></td>
                                <td>500</td>
                                <td>Áo Thun</td>
                                <td>137</td>
                                <td>116</td>
                                <td>68500</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Áo Thun Adidas D4R Xanh</td>
                                <td><img src="../../image/product/product1/product-detail-1.png" alt=""></td>
                                <td>500</td>
                                <td>Áo Thun</td>
                                <td>137</td>
                                <td>116</td>
                                <td>68500</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Áo Thun Adidas D4R Xanh</td>
                                <td><img src="../../image/product/product1/product-detail-1.png" alt=""></td>
                                <td>500</td>
                                <td>Áo Thun</td>
                                <td>137</td>
                                <td>116</td>
                                <td>68500</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Áo Thun Adidas D4R Xanh</td>
                                <td><img src="../../image/product/product1/product-detail-1.png" alt=""></td>
                                <td>500</td>
                                <td>Áo Thun</td>
                                <td>137</td>
                                <td>116</td>
                                <td>68500</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="list-button">
                        <p class="previous">Previous</p>
                        <p class="click-button">1</p>
                        <p>2</p>
                        <p>3</p>
                        <p>4</p>
                        <p class="next">Next</p>
                    </div>
                </div>
            </div>

            <div class="footer">
                <?php require('./footer_admin.php'); ?>
            </div>
        </div>
    </div>
    <script src="../../Js/admin/tongquan.js?v=<?php echo $version ?>"></script>
    <script src="../../Js/admin/sidebar.js?v=<?php echo $version ?>"></script>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <script>
        
    </script>
</body>

</html>