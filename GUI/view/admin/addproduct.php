<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới sản phẩm</title>

    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="../../css/admin/addproduct.css">
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
                    <h2 style="text-align:center;">Thêm sản phẩm</h2>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="category">Loại sản phẩm:</label>
                            <select id="category" class="form-control">
                                <option value="none" selected>Chọn loại sản phẩm</option>
                                <option value="quan-ao">Quần áo</option>
                                <option value="tui-xach">Túi xách</option>
                            </select>
                        </div>
                        
                        <!-- Form thêm quần áo -->
                        <div id="form-quan-ao" class="d-none">
                            <form id="addFormClothes">
                                <div class="mb-3">
                                    <label for="productCode" class="form-label">Mã sản phẩm</label>
                                    <input type="text" class="form-control" id="productCode" name="productCode">
                                </div>

                                <div class="mb-3">
                                    <label for="nameProduct" class="form-label">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="nameProduct" name="nameProduct">
                                </div>
                                <div class="mb-3">
                                    <label for="inputFileC" class="form-label">Ảnh(PNG,JPG)</label>
                                    <input type="file" class="form-control" id="inputFileC" name="imgProduct" accept="image/jpeg, image/png" multiple>
                                    <div id="imagePreviewC" style="padding-top:2px;"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Giá</label>
                                    <input type="number" class="form-control" id="price" name="price">
                                </div>
                                <div class="mb-3">
                                <label for="supplierCode" class="form-label">Nhà cung cấp</label>
                                <select class="form-select" id="supplierCode" name="supplierCode">
                                    <option value="">Chọn nhà cung cấp</option>
                                    <option value="NCC001">NCC001</option>
                                    <option value="NCC002">NCC002</option>
                                </select>
                                </div>
                                <div class="mb-3">
                                <label for="describe" class="form-label">Mô tả</label>
                                <textarea class="form-control" id="describe" name="describe"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="targetGender" class="form-label">Đối tượng sử dụng</label>
                                    <select class="form-select" id="targetGender" name="targetGender">
                                        <option value="">Chọn đối tượng</option>
                                        <option value="male">Nam</option>
                                        <option value="female">Nữ</option>
                                        <option value="both">Tất cả</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Trạng thái</label>
                                    <select class="form-select" id="status" name="status">
                                        <option value="">Chọn trạng thái</option>
                                        <option value="in">Còn hàng</option>
                                        <option value="out">Hết hàng</option>
                                    </select>
                                </div>
                                
                                <!-- Size áo -->
                                <div class="mb-3"> 
                                    <h4>Chọn size</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <div class="form-vis">
                                                    <input type="checkbox" id="sizeS" class="form-check-input" data-target="#inputSizeS">
                                                    <label for="sizeS" class="form-check-label">S</label>
                                                </div>
                                                <input type="number" id="inputSizeS" class="form-control d-none" value="" placeholder="Nhập số lượng">
                                            </div>
                                            <div class="form-check">
                                                <div class="form-vis">
                                                    <input type="checkbox" id="sizeM" class="form-check-input" data-target="#inputSizeM">
                                                    <label for="sizeM" class="form-check-label">M</label>
                                                </div>
                                                
                                                <input type="number" id="inputSizeM" class="form-control d-none" value="" placeholder="Nhập số lượng">
                                            </div>
                                            <div class="form-check">
                                                <div class="form-vis">
                                                    <input type="checkbox" id="sizeL" class="form-check-input" data-target="#inputSizeL">
                                                    <label for="sizeL" class="form-check-label">L</label>
                                                </div>
                                                <input type="number" id="inputSizeL" class="form-control d-none" value="" placeholder="Nhập số lượng">
                                            </div>
                                            <div class="form-check">
                                                <div class="form-vis">
                                                    <input type="checkbox" id="sizeXL" class="form-check-input" data-target="#inputSizeXL">
                                                    <label for="sizeXL" class="form-check-label">XL</label>
                                                </div>
                                                <input type="number" id="inputSizeXL" class="form-control d-none" value="" placeholder="Nhập số lượng">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Phong cách -->
                                <div class="mb-3">
                                    <label for="shirtStyle">Phong cách</label>
                                    <input type="text" id="shirtStyle" class="form-control">
                                </div>
                                <!-- Chất liệu-->
                                <div class="mb-3">
                                    <label for="shirtMaterial">Chất liệu</label>
                                    <input type="text" id="shirtMaterial" class="form-control">
                                </div>

                                <!-- Mô tả -->
                                <div class="mb-3">
                                    <label for="descriptionMaterial">Mô tả</label>
                                    <input type="text" id="descriptionMaterial" class="form-control">
                                </div>
                                
                                <div class="group-btn" style="text-align:right; margin-bottom: 2rem;">
                                    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                                </div> 
                            </form>
                        </div>
                        
                        <!-- Form túi xách -->
                        <div id="form-tui-xach" class="d-none">
                        <form id="addFormBag">
                                <div class="mb-3">
                                    <label for="productCode" class="form-label">Mã sản phẩm</label>
                                    <input type="text" class="form-control" id="productCode" name="productCode">
                                </div>

                                <div class="mb-3">
                                    <label for="nameProduct" class="form-label">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="nameProduct" name="nameProduct">
                                </div>
                                <div class="mb-3">
                                    <label for="inputFileB" class="form-label">Ảnh(PNG,JPG)</label>
                                    <input type="file" class="form-control" id="inputFileB" name="imgProduct" accept="image/jpeg, image/png" multiple>
                                    <div id="imagePreviewB" style="padding-top:2px;"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Giá</label>
                                    <input type="number" class="form-control" id="price" name="price">
                                </div>
                                <div class="mb-3">
                                <label for="supplierCode" class="form-label">Nhà cung cấp</label>
                                <select class="form-select" id="supplierCode" name="supplierCode">
                                    <option value="">Chọn nhà cung cấp</option>
                                    <option value="NCC001">NCC001</option>
                                    <option value="NCC002">NCC002</option>
                                </select>
                                </div>
                                <div class="mb-3">
                                <label for="describe" class="form-label">Mô tả</label>
                                <textarea class="form-control" id="describe" name="describe"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="targetGender" class="form-label">Đối tượng sử dụng</label>
                                    <select class="form-select" id="targetGender" name="targetGender">
                                        <option value="">Chọn đối tượng</option>
                                        <option value="male">Nam</option>
                                        <option value="female">Nữ</option>
                                        <option value="both">Tất cả</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Số lượng</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity">
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Trạng thái</label>
                                    <select class="form-select" id="status" name="status">
                                        <option value="">Chọn trạng thái</option>
                                        <option value="in">Còn hàng</option>
                                        <option value="out">Hết hàng</option>
                                    </select>
                                </div>

                                <!-- Chất liệu-->
                                <div class="mb-3">
                                    <label for="shirtMaterial">Chất liệu</label>
                                    <input type="text" id="shirtMaterial" class="form-control">
                                </div>

                                <!-- Mô tả -->
                                <div class="mb-3">
                                    <label for="descriptionMaterial">Mô tả</label>
                                    <input type="text" id="descriptionMaterial" class="form-control">
                                </div>
                                
                                <div class="group-btn" style="text-align:right; margin-bottom: 2rem;">
                                    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                                </div> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer">
            <?php require('./footer_admin.php'); ?>
            </div>
        </div>
    </div>
    <script src="../../Js/sidebar.js"></script>
    <script>
       
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../../Js/addproduct.js"></script>

</body>
</html>