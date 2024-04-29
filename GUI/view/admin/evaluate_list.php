<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đánh giá</title>

    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>
        <?php
        require('../../css/admin/bill_list_admin.css');
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
                <div class="container-fluid">
                    <div class="admin-header">
                            <div class="admin-header-l">
                                <h1 class="header-l">Danh sách đánh giá</h1>
                            </div>
                            <div class="admin-header-r">
                                <ul class="header-r-list">
                                    <li class="header-r-item">
                                        <a href="./Tongquan.php">Home</a>
                                    </li>
                                    <li class="header-r-item">Danh sách đánh giá</li>
                                </ul>
                            </div>
                    </div>

                    <div class="admin-contact-noti">
                        <div class="admin-contact-notiAccept" style="display: none;">
                            Cập nhật đánh giá thành công
                        </div>
                        <div class="admin-contact-notiAccept" style="display: none;">
                            Xóa đánh giá thành công
                        </div>
                        <div class="admin-contact-notiError" style="display: none;">
                            Không tồn tại liên hệ
                        </div>
                    </div>
                    

                    <hr>

                    <div class="admin-filter">
                        <div class="admin-filter-bottom">
                            <div class="admin-filter-evaluate">
                                <select class="form-control filter-b-item15 filter-b-item">
                                    <option class="" value="0">Chọn trạng thái</option>
                                    <option value="1">Ẩn</option>
                                    <option value="2">Hiển thị</option>
                                </select>
                                <select class="form-control filter-b-item15 filter-b-item">
                                    <option class="" value="0">Chọn số sao</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <input class="filter-b-item30 form-control filter-b-item ml-10" type="text" placeholder="Nhập tên khách hàng">
                                <input class="filter-b-item30 form-control filter-b-item mr-10" type="text" placeholder="Nhập email khách hàng">
                                <button type="submit" class="filter-b-item10 filter-b-item filter-b-btn">Tìm kiếm</button>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="admin-table-contact">
                        <table class="admin-table-list">
                            <thead>
                                <tr>
                                    <th width="5%">STT</th>
                                    <th width="">Họ tên</th>
                                    <th width="">Email</th>
                                    <th width="">Sản phẩm</th>
                                    <th width="">Số sao</th>
                                    <th width="">Bình luận</th>
                                    <th width="">Trạng thái</th>
                                    <th width="">Ghi chú</th>
                                    <th width="">Thời gian</th>

                                    <th width="">Sửa</th><th width="">Xóa</th>
                                </tr>
                            </thead>
                            <tbody class="fetch-data-table"><tr>
                        <td>1</td>
                            <td>TienHai488</td>
                            <td>tienhai4888@gmail.com</td>
                            <td>Áo Sơ Mi Cộc Tay Adidas Màu Đen Xám</td>
                            <td>3</td>
                            <td>Binh luan cho san pham tesst chuc nawng</td>
                            <td><a href="#" class="btn-table-warning">Ẩn</a></td>
                            <td>Chưa xử lý</td>
                            <td>14/04/2023 20:43:25</td>
                            <td><a href="./admin_update.php" class="btn-table-billUpdate"><i class="fa fa-edit"></i> Sửa</a></td><td><a href="#" onclick="return confirm('Bạn có thật sự muốn xóa!') " class="btn-table-warning"><i class="fa fa-trash"></i>
                                Xóa</a></td></tr><tr>
                        <td>2</td>
                            <td>TienHai</td>
                            <td>tienhai@gmail.com</td>
                            <td>Áo Sơ Mi Cộc Tay Adidas Màu Đen Xám</td>
                            <td>5</td>
                            <td>Binh luan danh gia san pham</td>
                            <td><a href="#" class="btn-table-billDetail">Hiển thị</a></td>
                            <td>Chưa xử lý</td>
                            <td>14/04/2023 19:57:26</td>
                            <td><a href="./admin_update.php" class="btn-table-billUpdate"><i class="fa fa-edit"></i> Sửa</a></td><td><a href="#" onclick="return confirm('Bạn có thật sự muốn xóa!') " class="btn-table-warning"><i class="fa fa-trash"></i>
                                Xóa</a></td></tr><tr>
                        <td>3</td>
                            <td>haile@gmail.com</td>
                            <td>haile@gmail.com</td>
                            <td>Áo Sơ Mi Cộc Tay Adidas Màu Đen Xám</td>
                            <td>5</td>
                            <td>haile@gmail.com</td>
                            <td><a href="#" class="btn-table-billDetail">Hiển thị</a></td>
                            <td>Vua gui</td>
                            <td>14/04/2023 18:27:39</td>
                            <td><a href="./admin_update.php" class="btn-table-billUpdate"><i class="fa fa-edit"></i> Sửa</a></td><td><a href="#" onclick="return confirm('Bạn có thật sự muốn xóa!') " class="btn-table-warning"><i class="fa fa-trash"></i>
                                Xóa</a></td></tr><tr>
                        <td>4</td>
                            <td>PTTK_Tuan3</td>
                            <td>tienhai9a2@gmail.com</td>
                            <td>Áo Addidas D2M</td>
                            <td>5</td>
                            <td>tienhai9a2@gmail.com</td>
                            <td><a href="#" class="btn-table-billDetail">Hiển thị</a></td>
                            <td>Vua gui</td>
                            <td>03/04/2023 21:02:24</td>
                            <td><a href="./admin_update.php" class="btn-table-billUpdate"><i class="fa fa-edit"></i> Sửa</a></td><td><a href="#" onclick="return confirm('Bạn có thật sự muốn xóa!') " class="btn-table-warning"><i class="fa fa-trash"></i>
                                Xóa</a></td></tr><tr>
                        <td>5</td>
                            <td>Minh Lâm</td>
                            <td>minhlam@gmail.com</td>
                            <td>Áo Sơ Mi Cộc Tay Adidas Màu Đen Xám</td>
                            <td>5</td>
                            <td>minhlam@gmail.com</td>
                            <td><a href="#" class="btn-table-billDetail">Hiển thị</a></td>
                            <td>Vua gui</td>
                            <td>03/04/2023 16:58:09</td>
                            <td><a href="./admin_update.php" class="btn-table-billUpdate"><i class="fa fa-edit"></i> Sửa</a></td><td><a href="#" onclick="return confirm('Bạn có thật sự muốn xóa!') " class="btn-table-warning"><i class="fa fa-trash"></i>
                                Xóa</a></td></tr></tbody>
                        </table>
                    </div>

                    <nav aria-label="Page navigation example" class="admin-pageNav">
                        <ul class="admin-pageNav-list">
                            <li class="admin-pageNav-item"><a class="admin-pageNav-link" href="">Previous</a></li>
                            <li class="admin-pageNav-item active"><a class="admin-pageNav-link" href="">1</a></li>
                            <li class="admin-pageNav-item"><a class="admin-pageNav-link" href="">2</a></li>
                            <li class="admin-pageNav-item"><a class="admin-pageNav-link " href="">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="footer">
                <?php require('./footer_admin.php'); ?>
            </div>
        </div>
    </div>
    <script src="../../Js/sidebar.js"></script>
</body>
</html>