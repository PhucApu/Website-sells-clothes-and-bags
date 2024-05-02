<html lang="en">
<?php require('../../../config.php')?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách hình thức vận chuyển</title>

    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
            <div class="content-page-sb ">
                <div class="container-product">
                    <div class="top-container mt-2">
                        <h2>Danh sách hình thức vận chuyển</h2>
                        <a href="./addtransport.php" type="button" class="btn btn-primary btn-add">Thêm hình thức vận chuyển</a>
                    </div>
                    <div class="mb-3 mt-5">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Nhập tên hoặc mã hình thức vận chuyển" id="input-search">
                            <button class="btn btn-primary">Tìm kiếm <i class="fa fa-search" style="font-size: 15px;"></i></button>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="fw-bold">Tên hình thức vận chuyển</th>
                                <th class="fw-bold">Mã hình thức vận chuyển</th>
                                <th class="fw-bold">Công ty liên kết</th>
                                <th class="fw-bold">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody id="transportList">
                            <tr>
                                <td>EXP001</td>
                                <td>Express Shipping</td>
                                <td>DHL</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editTransport1"><i class="fa fa-edit"></i> Sửa</a>
                                    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteTransport"><i class="fa fa-trash"></i> Xóa</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="footer">
                <?php require('./footer_admin.php'); ?>
            </div>
        </div>
    </div>

    <div id="edit-transport">
        <!-- Modal sửa hình thức vận chuyển -->
        <div class="modal fade" id="editTransport" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Cập nhật thông tin hình thức vận chuyển</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm">
                            <div class="mb-3">
                                <label for="codeTransport" class="form-label">Mã hình thức vận chuyển</label>
                                <input type="text" class="form-control" id="codeTransport" name="codeTransport" value="EXP001" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="nameTransport" class="form-label">Tên hình thức vận chuyển</label>
                                <input type="text" class="form-control" id="nameTransport" name="nameTransport" value="Express Shipping">
                            </div>
                            <div class="mb-3">
                                <label for="affiliatedCompany" class="form-label">Công ty liên kết</label>
                                <input type="text" class="form-control" id="affiliatedCompany" name="affiliatedCompany" value="DHL">
                            </div>
                            <div style="text-align:right;">
                                <button type="submit" class="btn btn-primary">Cập nhật hình thức vận chuyển</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal xóa hình thức vận chuyển-->
    <div id="delete-transport">
        <div class="modal fade" id="deleteTransport" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Xóa hình thức vận chuyển</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Bạn có chắc muốn xóa hình thức vận chuyển này?
                        <br>
                        Mã hình thức vận chuyển: EXP001

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-danger btn-confirm-delete">Xóa</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../../Js/admin/sidebar.js?v=<?php echo $version ?>"></script>
    <script src="../../Js/admin/transport.js?v=<?php echo $version ?>"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>