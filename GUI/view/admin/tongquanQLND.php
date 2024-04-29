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

                // Lấy dữ liệu tìm kiếm
                $tenTimKiem = "";

                if (isset($_GET["tenTimKiem"])) {
                    $tenTimKiem = $_GET["tenTimKiem"];
                }

                // Truy vấn dữ liệu
                $sql = "SELECT * FROM accounts WHERE name LIKE '%$tenTimKiem%' OR email LIKE '%$tenTimKiem%';";
                $result = $conn->query($sql);

                ?>


                <div>
                    <h1>QUẢN LÝ NGƯỜI DÙNG</h1>
                    <a href="tongquanthemQLND.php" class="add-new"><i class="fa fa-plus"></i>Thêm người dùng
                        mới</a>
                </div>
                <div class="tim-kiem">
                    <form action="tongquanQLND.php" method="get" onsubmit="timKiem(); return false;">
                        <input type="text" name="tenTimKiem"
                            placeholder="Nhập tên tên dăng nhập hoặc hoặc và tên người dùng">
                        <button class="search" type="submit">Tìm kiếm</button>
                    </form>
                </div>
                <table class="danh-sach">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên đăng nhập</th>
                            <th>Họ và tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Trạng thái</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <script>
                    function deletePermission(codePermissions) {
                        if (codePermissions === 'admin') {
                            alert('Không thể xóa nhóm người dùng admin.');
                            return; // Dừng hàm nếu là nhóm người dùng admin
                        }

                        if (confirm('Bạn có chắc chắn muốn xóa nhóm người dùng này không?')) {
                            // Gửi yêu cầu xóa đến trang xử lý PHP
                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    // Xử lý kết quả nếu cần
                                    alert('Nhóm người dùng đã được xóa thành công.');
                                    // Reload trang hoặc thực hiện các hành động khác
                                    window.location.reload();
                                }
                            };
                            xhttp.open("GET", "delete_permission.php?codePermissions=" + codePermissions, true);
                            xhttp.send();
                        }
                    }
                    </script>
                    <tbody id="danhsach">
                        <?php
                        // Duyệt qua kết quả và hiển thị từng người dùng
                        $stt = 1; // Khởi tạo số thứ tự
                        while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $stt; ?></td>
                            <td><?php echo $row["userName"]; ?></td>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["phoneNumber"]; ?></td>
                            <td>
                                <script>
                                const activateButton = document.getElementById('activateButton');
                                const deactivateButton = document.getElementById('deactivateButton');

                                activateButton.addEventListener('click', function() {
                                    activateButton.style.backgroundColor = '#28a745'; // Màu xanh
                                    deactivateButton.style.backgroundColor =
                                        ''; // Xóa màu của nút chưa kích hoạt
                                });

                                deactivateButton.addEventListener('click', function() {
                                    deactivateButton.style.backgroundColor = '#dc3545'; // Màu đỏ
                                    activateButton.style.backgroundColor = ''; // Xóa màu của nút kích hoạt
                                });
                                </script>

                                <?php
                                    if ($row["accountStatus"] === "active") {

                                        echo '<button id="deactivateButton">Chưa kích hoạt</button>';
                                    } else {

                                        echo '<button id="activateButton">Kích hoạt</button>';
                                    }
                                    ?>

                            </td>
                            <td><a href="tongquansuaQLND.php?codePermissions=<?php echo $row["codePermissions"]; ?>"
                                    class="edit-button"><i class="fa fa-edit"></i>Sửa</a></td>
                            </td>
                            <?php
                                // Kiểm tra và ẩn nút "Xóa" nếu namePermissions là "admin"
                                if ($row["codePermissions"] !== 'admin') {
                                    echo "<td><a href='#' onclick='deletePermission(\"" . $row["codePermissions"] . "\")' class='delete-button'><i class='fa fa-trash'></i> Xóa</a></td>";
                                } else {
                                    echo "<td></td>"; // Nếu là admin, không hiển thị nút "Xóa"
                                }
                                ?>
                        </tr>
                        <?php
                            $stt++; // Tăng số thứ tự sau mỗi lần lặp
                        }
                        ?>
                    </tbody>
                </table>
                <div class="phan-trang">
                    <a href="#">&laquo;</a>
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">&raquo;</a>
                </div>
                <script>
                function timKiem() {
                    var tenTimKiem = document.getElementById("tenTimKiem").value;
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            var data = JSON.parse(this.responseText);
                            var html = "";
                            for (var i = 0; i < data.length; i++) {
                                html += "<tr>";
                                html += "<td>" + (i + 1) + "</td>";
                                html += "<td>" + data[i].namePermissions + "</td>";

                                html += "<td><a href='phanquyen.php'>Phân quyền</a></td>";
                                html += "<td><a href='suaNhomNguoiDung.php?codePermissions=" + data[i]
                                    .codePermissions +
                                    "' class='edit-button'>Sửa</a></td>";
                                html += "<td><a href='suaNhomNguoiDung.php?namePermissions=" + data[i]
                                    .namePermissions +
                                    "' class='edit-button'>Xóa</a></td>";
                                html += "</tr>";
                            }
                            document.getElementById("danhSach").innerHTML = html;
                        }
                    };
                    xhttp.open("POST", "timKiemAjax.php", true);
                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhttp.send("tenTimKiem=" + tenTimKiem);


                }

                function editPermission(namePermissions) {
                    window.location.href = "edit_permission.php?namePermissions=" + namePermissions;
                }
                </script>
                <?php

                // Đóng kết nối
                $conn->close();

                ?>
            </div>
            <div class="footer">
                <?php require('./footer_admin.php'); ?>
            </div>
        </div>
    </div>
    <script src="../../Js/sidebar.js"></script>
</body>

</html>