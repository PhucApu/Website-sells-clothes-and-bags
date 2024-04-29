<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Size mới</title>

    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
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
                <div style="width: 1150px;">
                    <h2 style="text-align:center;">Thêm size mới</h2>
                    <div class="container-fluid">
                        <form id="addForm">
                            <div class="mb-3">
                                <label for="sizeCode" class="form-label">Mã Size</label>
                                <input type="text" class="form-control" id="sizeCode" name="sizeCode">
                            </div>
                            <div class="mb-3">
                                <label for="nameSize" class="form-label">Tên Size</label>
                                <input type="text" class="form-control" id="nameSize" name="nameSize">
                            </div>
                            <!-- <div class="mb-3">
                                <label for="address" class="form-label"></label>
                                <input type="text" class="form-control" id="address" name="address">
                            </div> -->
                            <div class="mb-3">
                                <label for="sizeDescription" class="form-label">Mô tả</label>
                                <textarea type="text" class="form-control" id="sizeDescription" name="sizeDescription"></textarea>
                            </div>
                            <div class="group-btn d-flex" style="justify-content: space-between;">
                                <div class="button-back">
                                    <button class="btn btn-secondary"><a href="./list-sizes.php" style="text-decoration:none;" class="text-white">Quay lại</a></button>
                                </div>
                                <div class="button-add" style=" margin-bottom: 2rem;">
                                    <button type="submit" class="btn btn-primary">Thêm nhà cung cấp</button>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="footer">
            <?php require('./footer_admin.php'); ?>
            </div>
        </div>
    </div>
    <script src="../../Js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>