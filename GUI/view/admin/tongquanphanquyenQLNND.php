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
    require('../../css/admin/phanquyen.css');
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
                $conn = null;

                // Tạo kết nối
                $conn = new mysqli($servername, $username, $password, $databaseName);

                // Kiểm tra kết nối
                if ($conn->connect_error) {
                    die("Kết nối thất bại: " . $conn->connect_error);
                }

                // Lấy danh sách functions và permissions
                $sql = "SELECT * FROM permissionsDetail;";
                $result = $conn->query($sql);
                ?>
                <style>

                </style>
                <h1 class="title-phanquyen">Phân quyền</h1>
                <form action="update_permission.php" method="post">
                    <table>
                        <thead>
                            <tr>
                                <th>functionCode</th>
                                <th>addPermission</th>
                                <th>seePermission</th>
                                <th>deletePermission</th>
                                <th>fixPermission</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row["functionCode"]; ?></td>
                                <td><input type="checkbox" name="addPermission[]"
                                        value="<?php echo $row["codePermissions"]; ?>"
                                        <?php echo $row["addPermission"] == 1 ? 'checked' : ''; ?>></td>
                                <td><input type="checkbox" name="seePermission[]"
                                        value="<?php echo $row["codePermissions"]; ?>"
                                        <?php echo $row["seePermission"] == 1 ? 'checked' : ''; ?>></td>
                                <td><input type="checkbox" name="deletePermission[]"
                                        value="<?php echo $row["codePermissions"]; ?>"
                                        <?php echo $row["deletePermission"] == 1 ? 'checked' : ''; ?>></td>
                                <td><input type="checkbox" name="fixPermission[]"
                                        value="<?php echo $row["codePermissions"]; ?>"
                                        <?php echo $row["fixPermission"] == 1 ? 'checked' : ''; ?>></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <input type="button" onclick="huyTatCa()" value="Hủy">
                    <input type="button" onclick="saveAndGrantPermission()" value="Phân quyền">
                    <a href="TongquanQLNND.php">Quay lại</a>
                </form>
                <?php
                // Đóng kết nối
                $conn->close();
                ?>
                <script src="../../Js/sidebar.js"></script>
</body>

</html>