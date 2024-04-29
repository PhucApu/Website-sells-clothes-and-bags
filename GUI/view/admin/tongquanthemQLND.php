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
                <h1>THÊM NGƯỜI DÙNG</h1>
                <form action="them-nguoi-dung.php" method="post" onsubmit="return validateForm()">
                    <div class="form-container">
                        <div class="inputtotal">
                            <div class="input1">
                                <div class=" form-group">
                                    <label for="ho_ten">Họ tên:</label>
                                    <input type="text" id="ho_ten" name="ho_ten" placeholder="Nhập họ tên">
                                </div>
                                <div class="form-group">
                                    <label for="mat_khau">Mật khẩu:</label>
                                    <input type="password" id="mat_khau" name="mat_khau" placeholder="Nhập mật khẩu">
                                </div>
                                <div class="form-group">
                                    <label for="nhap_lai_mat_khau">Nhập lại mật khẩu:</label>
                                    <input type="password" id="nhap_lai_mat_khau" name="nhap_lai_mat_khau" placeholder="Nhập lại mật khẩu">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" id="email" name="email" placeholder="Nhập email">
                                </div>
                                <div class="form-group">
                                    <label for="so_dien_thoai">Số điện thoại:</label>
                                    <input type="text" id="so_dien_thoai" name="so_dien_thoai" placeholder="Nhập số điện thoại">
                                </div>
                            </div>
                            <div class="input2">
                                <div class="form-group">
                                    <label for="nhom_nguoi_dung">Nhóm người dùng:</label>
                                    <select id="nhom_nguoi_dung" name="nhom_nguoi_dung">
                                        <option value="">Chọn nhóm người dùng</option>
                                        <option value="1">Quản trị viên</option>
                                        <option value="2">Nhân viên</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="trang_thai_nguoi_dung">Trạng thái người dùng:</label>
                                    <select id="trang_thai_nguoi_dung" name="trang_thai_nguoi_dung">
                                        <option value="">Chọn trạng thái người dùng</option>
                                        <option value="1">Kích hoạt</option>
                                        <option value="0">Chưa kích hoạt</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kieu_nguoi_dung">Kiểu người dùng:</label>
                                    <select id="kieu_nguoi_dung" name="kieu_nguoi_dung">
                                        <option value="">Chọn kiểu người dùng</option>
                                        <option value="1">Người dùng</option>
                                        <option value="2">Khách hàng</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm người dùng</button>
                        <a href="./tongquanQLND.php" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
            <script>
                function validateForm() {
                    // Lấy giá trị từ các ô nhập liệu
                    const hoTen = document.getElementById("ho_ten").value;
                    const matKhau = document.getElementById("mat_khau").value;
                    const nhapLaiMatKhau = document.getElementById("nhap_lai_mat_khau").value;
                    const email = document.getElementById("email").value;
                    const soDienThoai = document.getElementById("so_dien_thoai").value;
                    const nhomNguoiDung = document.getElementById("nhom_nguoi_dung").value;
                    const trangThaiNguoiDung = document.getElementById("trang_thai_nguoi_dung").value;
                    const kieuNguoiDung = document.getElementById("kieu_nguoi_dung").value;

                    // Kiểm tra họ tên
                    if (hoTen === "") {
                        alert("Họ tên không được để trống!");
                        return false;
                    }

                    // Kiểm tra mật khẩu
                    if (matKhau === "") {
                        alert("Mật khẩu không được để trống!");
                        return false;
                    }

                    // Kiểm tra nhập lại mật khẩu
                    if (nhapLaiMatKhau === "") {
                        alert("Nhập lại mật khẩu không được để trống!");
                        return false;
                    }

                    // Kiểm tra mật khẩu trùng khớp
                    if (matKhau !== nhapLaiMatKhau) {
                        alert("Mật khẩu và nhập lại mật khẩu không trùng khớp!");
                        return false;
                    }

                    // Kiểm tra email
                    if (email === "") {
                        alert("Email không được để trống!");
                        return false;
                    }

                    // Kiểm tra định dạng email
                    const regexEmail =
                        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    if (!regexEmail.test(email)) {
                        alert("Email không đúng định dạng!");
                        return false;
                    }

                    // Kiểm tra số điện thoại
                    if (soDienThoai === "") {
                        alert("Số điện thoại không được để trống!");
                        return false;
                    }

                    // Kiểm tra định dạng số điện thoại
                    const regexSoDienThoai = /^(\d{10,11})$/;
                    if (!regexSoDienThoai.test(soDienThoai)) {
                        alert("Số điện thoại không đúng định dạng!");
                        return false;
                    }

                    // Kiểm tra nhóm người dùng
                    if (nhomNguoiDung === "") {
                        alert("Chọn nhóm người dùng!");
                        return false;
                    }

                    // Kiểm tra trạng thái người dùng
                    if (trangThaiNguoiDung === "") {
                        alert("Chọn trạng thái người dùng!");
                        return false;
                    }

                    // Kiểm tra kiểu người dùng
                    if (kieuNguoiDung === "") {
                        alert("Chọn kiểu người dùng!");
                        return false;
                    }

                    // Trả về true nếu tất cả các điều kiện đều thỏa mãn
                    return true;
                }
            </script>
        </div>
        <div class="footer">
            <?php require('./footer_admin.php'); ?>
        </div>
    </div>
    </div>
    <script src="../../Js/sidebar.js"></script>
</body>

</html>