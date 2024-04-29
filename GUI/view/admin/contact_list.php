<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách liên hệ</title>

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
                                <h1 class="header-l">Danh sách liên hệ</h1>
                            </div>
                            <div class="admin-header-r">
                                <ul class="header-r-list">
                                    <li class="header-r-item">
                                        <a href="./Tongquan.php">Home</a>
                                    </li>
                                    <li class="header-r-item">Danh sách liên hệ</li>
                                </ul>
                            </div>
                    </div>

                    <div class="admin-contact-noti">
                        <div class="admin-contact-notiAccept" style="display: none;">
                            Xóa liên hệ thành công
                        </div>
                        <div class="admin-contact-notiError" style="display: none;">
                            Không tồn tại liên hệ
                        </div>
                    </div>
                    

                    <hr>

                    <div class="admin-filter">
                        <div class="admin-filter-bottom">
                            <div class="admin-filter-bleft">
                                    <select class="form-control filter-b-item30 filter-b-item">
                                        <option class="" value="0">Chọn trạng thái</option>
                                        <option value="1">Chưa xử lí</option><option value="2">Đang xử lí</option><option value="3">Đã xử lí</option>
                                    </select>
                                    <input class="filter-b-item70 form-control filter-b-item ml-10" type="text" placeholder="Nhập tên khách hàng">
                            </div>
                            <div class="admin-filter-bright">
                            <input class="filter-b-item70 form-control filter-b-item mr-10" type="text" placeholder="Nhập email khách hàng">
                            <button type="submit" class="filter-b-item30 filter-b-item filter-b-btn">Tìm kiếm</button>
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
                                    <th width="">Lới nhắn</th>
                                    <th width="">Trạng thái</th>
                                    <th width="">Ghi chú</th>
                                    <th width="">Thời gian</th>
                                    <th width="">Sửa</th><th width="">Xóa</th>

                                </tr>
                            </thead>
                            <tbody class="fetch-data-table"><tr>
                        <td>1</td>
                            <td>hai tien</td>
                            <td>tienhaile488@gmail.com</td>
                            <td>daffffffffff</td>
                            <td><a href="" class="btn-table-warning dis-pointed-hover">Chưa xử lý</a></td>
                            <td>Chưa xử lý</td>
                            <td>07/05/2023 23:25:46</td>
                            
                            
                            <td><a href="./admin_update.php" class="btn-table-billUpdate"><i class="fa fa-edit"></i> Sửa</a></td><td><a href="" onclick="return confirm('Bạn có thật sự muốn xóa!') " class="btn-table-warning"><i class="fa fa-trash"></i>
                                Xóa</a></td></tr><tr>
                        <td>2</td>
                            <td>tienhai</td>
                            <td>tienhaile488@gmail.com</td>
                            <td>chao dfsfdasfsad</td>
                            <td><a href="" class="btn-table-warning dis-pointed-hover">Chưa xử lý</a></td>
                            <td>Chưa xử lý</td>
                            <td>07/05/2023 23:24:52</td>
                            
                            
                            <td><a href="./admin_update.php" class="btn-table-billUpdate"><i class="fa fa-edit"></i> Sửa</a></td><td><a href="" class="btn-table-warning"><i class="fa fa-trash"></i>
                                Xóa</a></td></tr><tr>
                        <td>3</td>
                            <td>tienhai</td>
                            <td>tienhaile488@gmail.com</td>
                            <td>chao buoi sang</td>
                            <td><a href="" class="btn-table-warning dis-pointed-hover">Chưa xử lý</a></td>
                            <td>Chưa xử lý</td>
                            <td>07/05/2023 23:24:31</td>
                            
                            
                            <td><a href="./admin_update.php" class="btn-table-billUpdate"><i class="fa fa-edit"></i> Sửa</a></td><td><a href="" onclick="return confirm('Bạn có thật sự muốn xóa!') " class="btn-table-warning"><i class="fa fa-trash"></i>
                                Xóa</a></td></tr><tr>
                        <td>4</td>
                            <td>tienhai</td>
                            <td>tienhaile488@gmail.com</td>
                            <td>chao buoi san</td>
                            <td><a href="" class="btn-table-warning dis-pointed-hover">Chưa xử lý</a></td>
                            <td>Chưa xử lý</td>
                            <td>07/05/2023 23:24:10</td>
                            
                            
                            <td><a href="./admin_update.php" class="btn-table-billUpdate"><i class="fa fa-edit"></i> Sửa</a></td>
                            <td><a href="" onclick="return confirm('Bạn có thật sự muốn xóa!') " class="btn-table-warning"><i class="fa fa-trash"></i>
                                Xóa</a></td></tr><tr>
                        <td>5</td>
                            <td>Tienhai</td>
                            <td>tienhaile488@gmail.com</td>
                            <td>cahho buoi sang</td>
                            <td><a href="" class="btn-table-warning dis-pointed-hover">Chưa xử lý</a></td>
                            <td>Chưa xử lý</td>
                            <td>07/05/2023 23:23:51</td>
                            
                            
                            <td><a href="./admin_update.php" class="btn-table-billUpdate"><i class="fa fa-edit"></i> Sửa</a></td>
                            <td><a href="" onclick="return confirm('Bạn có thật sự muốn xóa!') " class="btn-table-warning"><i class="fa fa-trash"></i>
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