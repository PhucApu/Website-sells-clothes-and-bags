<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách hóa đơn</title>

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
                                <h1 class="header-l">Danh sách hóa đơn</h1>
                            </div>
                            <div class="admin-header-r">
                                <ul class="header-r-list">
                                    <li class="header-r-item">
                                        <a href="./Tongquan.php">Home</a>
                                    </li>
                                    <li class="header-r-item">Danh sách hóa đơn</li>
                                </ul>
                            </div>
                    </div>
                    

                    <hr>

                    <div class="admin-filter">
                        <div class="admin-filter-top">
                            <div class="admin-filter-tleft">
                                <p class="filter-t-item filter-t-text">Từ ngày </p>
                                <input class="filter-t-item form-control" type="date">
                            </div>
                            <div class="admin-filter-tright">
                                <p class="filter-t-item filter-t-text">Đến ngày</p>
                                <input class="filter-t-item form-control" type="date">
                            </div>
                        </div>
                        <div class="admin-filter-bottom">
                            <div class="admin-filter-bleft">
                                    <select class="form-control filter-b-item30 filter-b-item">
                                        <option value="0">Chọn trạng thái</option>
                                        <option value="1">Chờ duyệt</option><option value="2">Đã duyệt</option><option value="3">Đang chuẩn bị hàng</option><option value="4">Hủy đơn</option><option value="5">Đang giao</option><option value="6">Thành công</option>
                                    </select>
                                    <input class="filter-b-item70 form-control filter-b-item ml-10" type="text" placeholder="Nhập tên khách hàng">
                            </div>
                            <div class="admin-filter-bright">
                            <input class="filter-b-item70 form-control filter-b-item mr-10" type="text" placeholder="Nhập số điện thoại khách hàng">
                            <button type="submit" class="filter-b-item30 filter-b-item filter-b-btn">Tìm kiếm</button>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="admin-table-bill">
                        <table class="admin-table-list">
                            <thead>
                                <tr>
                                    <th width="5%">STT</th>
                                    <th width="">Họ tên</th>
                                    <th width="">Điện thoại</th>
                                    <th width="">Địa chỉ</th>
                                    <th width="">Ghi chú</th>
                                    <th width="">Tổng tiền</th>
                                    <th width="">Trạng thái</th>
                                    <th width="">Thời gian</th>
                                    <th width="">Chi tiết</th>
                                    <th width="">Sửa</th>
                                </tr>
                            </thead>
                            <tbody class="fetch-data-table"><tr>
                        <td>1</td>
                            <td>Le Tien Hai</td>
                            <td>0987654321</td>
                            <td>Ho Chi Minh Viet Nam</td>
                            <td></td>
                            <td>21600</td>
                            <td>Chờ duyệt</td>
                            <td>08/05/2023 11:31:33</td>
                            
                            <td></td>
                            <td></td>
                            <td><a href="./bill_list_detail.php" class="btn-table-billDetail">Chi tiết</a></td>
                            <td><a href="./admin_update.php" class="btn-table-billUpdate"><i class="fa fa-edit"></i> Sửa</a></td>
                            </tr>
                            <tr>
                        <td>2</td>
                            <td>Le Tien Hai</td>
                            <td>0987654321</td>
                            <td>Ho Chi Minh Viet Nam</td>
                            <td></td>
                            <td>14300</td>
                            <td>Chờ duyệt</td>
                            <td>08/05/2023 11:22:55</td>
                            
                            <td></td>
                            <td></td>
                            <td><a href="./bill_list_detail.php" class="btn-table-billDetail">Chi tiết</a></td>
                            <td><a href="./admin_update.php" class="btn-table-billUpdate"><i class="fa fa-edit"></i> Sửa</a></td>
                            </tr>
                            <tr>
                        <td>3</td>
                            <td>Le Tien Hai</td>
                            <td>0987654321</td>
                            <td>Ho Chi Minh Viet Nam</td>
                            <td></td>
                            <td>42600</td>
                            <td>Chờ duyệt</td>
                            <td>08/05/2023 11:17:41</td>
                            
                            <td></td>
                            <td></td>
                            <td><a href="./bill_list_detail.php" class="btn-table-billDetail">Chi tiết</a></td>
                            <td><a href="./admin_update.php" class="btn-table-billUpdate"><i class="fa fa-edit"></i> Sửa</a></td>
                            </tr>
                            <tr>
                        <td>4</td>
                            <td>Le Tien Hai</td>
                            <td>0987654321</td>
                            <td>Ho Chi Minh Viet Nam</td>
                            <td>.</td>
                            <td>3600</td>
                            <td>Thành công</td>
                            <td>08/05/2023 09:55:55</td>
                            
                            <td></td>
                            <td></td>
                            <td><a href="./bill_list_detail.php" class="btn-table-billDetail">Chi tiết</a></td>
                            <td><a href="./admin_update.php" class="btn-table-billUpdate"><i class="fa fa-edit"></i> Sửa</a></td>
                            </tr>
                            <tr>
                        <td>5</td>
                            <td>Le Tien Hai</td>
                            <td>0987654321</td>
                            <td>Ho Chi Minh Viet Nam</td>
                            <td>.</td>
                            <td>500</td>
                            <td>Chờ duyệt</td>
                            <td>08/05/2023 09:54:55</td>
                            
                            <td></td>
                            <td></td>
                            <td><a href="./bill_list_detail.php" class="btn-table-billDetail">Chi tiết</a></td>
                            <td><a href="./admin_update.php" class="btn-table-billUpdate"><i class="fa fa-edit"></i> Sửa</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <nav aria-label="Page navigation example" class="admin-pageNav">
                        <ul class="admin-pageNav-list">
                            <li class="admin-pageNav-item"><a class="admin-pageNav-link" href="">Previous</a></li>
                            <li class="admin-pageNav-item active"><a class="admin-pageNav-link" href="">1</a></li>
                            <li class="admin-pageNav-item"><a class="admin-pageNav-link" href="">2</a></li>
                            <li class="admin-pageNav-item"><a class="admin-pageNav-link" href="">3</a></li>
                            <li class="admin-pageNav-item"><a class="admin-pageNav-link" href="">4</a></li>
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