<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>
    <?php require('../../css/admin/sidebar.css');
    require('../../css/admin/header_admin.css');
    require('../../css/admin/footer_admin.css');
    // require('../../css/admin/danhsachnguoidung2.css');
    require('../../css/admin/QLND.css');
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
                <?php
                // Kết nối đến cơ sở dữ liệu
                $servername = "localhost";
                $username = "root";
                $password = "";
                $databaseName = "website_sells_clothes_and_bags";
                $conn = new mysqli($servername, $username, $password, $databaseName);

                // Kiểm tra kết nối
                if ($conn->connect_error) {
                    die("Kết nối thất bại: " . $conn->connect_error);
                }

                // Xử lý khi người dùng nhấn nút "Cập nhật"
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Lấy dữ liệu từ form
                    $namePermissions = $_POST["namePermissions"];

                    // Thực hiện thêm nhóm người dùng vào cơ sở dữ liệu
                    $sql = "INSERT INTO permissions (namePermissions) VALUES ('$namePermissions')";
                    if ($conn->query($sql) === TRUE) {
                        // Chuyển hướng về trang danh sách nhóm người dùng
                        header("Location: danhsachnguoidung.php");
                        exit();
                    } else {
                        echo "Lỗi: " . $sql . "<br>" . $conn->error;
                    }
                }

                $conn->close();
                ?>

                <div class="form-container">
                    <h1>THÊM NHÓM NGƯỜI DÙNG</h1> <!-- Sửa title -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
                        class="permission-form">
                        <div class="form-group">
                            <label for="namePermissions">Tên nhóm người dùng:</label>
                            <input type="text" id="namePermissions" name="namePermissions" class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Cập nhật</button> <!-- Sửa nút cập nhật -->
                            <a href="./TongquanQLNND.php" class="btn btn-secondary">Quay lại</a>
                        </div>
                    </form>
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