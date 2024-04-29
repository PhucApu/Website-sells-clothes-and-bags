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

// Lấy dữ liệu tìm kiếm từ biến POST
$tenTimKiem = $_POST["tenTimKiem"];

// Truy vấn dữ liệu
$sql = "SELECT * FROM permissions WHERE namePermissions LIKE '%$tenTimKiem%'";
$result = $conn->query($sql);

// Tạo một mảng để lưu trữ kết quả
$data = array();

// Duyệt qua kết quả và thêm vào mảng
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Trả về kết quả dưới dạng JSON
echo json_encode($data);

// Đóng kết nối
$conn->close();
