<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$databaseName = "website_sells_clothes_and_bags";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $databaseName);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra xem newNamePermissions có được gửi từ form không
if (isset($_POST["newNamePermissions"]) && !empty($_POST["newNamePermissions"]) && isset($_GET["codePermissions"])) {
    // Lấy dữ liệu từ form
    $newNamePermissions = $_POST["newNamePermissions"];
    $codePermissions = $_GET["codePermissions"];

    // Sử dụng Prepared Statements để tránh SQL Injection
    $sql = "UPDATE permissions SET namePermissions = ? WHERE codePermissions = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $newNamePermissions, $codePermissions);

    if ($stmt->execute()) {
        echo "Cập nhật dữ liệu thành công";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    // Đóng Prepared Statement
    $stmt->close();
} else {
    echo "Không có dữ liệu gửi từ form hoặc codePermissions không hợp lệ";
}

// Đóng kết nối
$conn->close();
