-- khởi tạo dữ liệu cho database


-- data table function
USE  website_sells_clothes_and_bags;
INSERT INTO functions (functionCode, functionName)
VALUES 
('feedback', 'Quản lý phản hồi'),
('comment', 'Quản lý bình luận'),
('account', 'Quản lý tài khoản'),
('order', 'Quản lý đơn hàng'),
('product', 'Quản lý sản phẩm'),
('size', 'Quản lý kích thước sản phẩm áo'),
('payment', 'Quản lý hình thức thanh toán'),
('transport', 'Quản lý hình thức vận chuyển'),
('enterballot', 'Quản lý phiếu nhập'),
('supplier', 'Quản lý nhà cung cấp');

-- check data table function
USE  website_sells_clothes_and_bags;
SELECT * FROM functions



-- data table permission
USE  website_sells_clothes_and_bags;
INSERT INTO permissions (codePermissions, namePermissions)
VALUES 
-- quyền user và admin là quyền không thể bị xóa
-- nếu khác quyền user thì sẽ chuyển trang vô trang admin
('user', 'Quyền quản trị người dùng'),
('admin', 'Quyền quản trị admin');
-- 2 quyền bên dưới mốt tính sau
-- ('staff_partime', 'Quyền quản trị nhân viên partime'),
-- ('staff_fulltime', 'Quyền quản trị nhân viên fulltime');

-- check data table permissons
USE  website_sells_clothes_and_bags;
SELECT * FROM permissions


-- data table permissonsdetail
USE  website_sells_clothes_and_bags;
INSERT INTO permissionsdetail (codePermissions, functionCode, addPermission, seePermission, deletePermission, fixPermission)
VALUES 
-- user: chỉ có thể xem 
('user', 'feedback', 0, 1, 0, 0),
('user', 'comment', 0, 1, 0, 0),
('user', 'account', 0, 1, 0, 0),
('user', 'order', 0, 1, 0, 0),
('user', 'product', 0, 1, 0, 0),
('user', 'size', 0, 1, 0, 0),
('user', 'payment', 0, 1, 0, 0),
('user', 'transport', 0, 1, 0, 0),
('user', 'enterballot', 0, 1, 0, 0),
('user', 'supplier', 0, 1, 0, 0),

-- admin: có quyền toàn hệ thống
('admin', 'feedback', 1, 1, 1, 1),
('admin', 'comment', 1, 1, 1, 1),
('admin', 'account', 1, 1, 1, 1),
('admin', 'order', 1, 1, 1, 1),
('admin', 'product', 1, 1, 1, 1),
('admin', 'size', 1, 1, 1, 1),
('admin', 'payment', 1, 1, 1, 1),
('admin', 'transport', 1, 1, 1, 1),
('admin', 'enterballot', 1, 1, 1, 1),
('admin', 'supplier', 1, 1, 1, 1);

-- staff partime: nhân viên partime chỉ có thể: order(xem,sửa), comment(xem,thêm,xóa,sửa)


-- check data table permissonsdetail
USE  website_sells_clothes_and_bags;
SELECT * FROM permissionsdetail




-- data table accounts
USE  website_sells_clothes_and_bags;
INSERT INTO accounts (userName, passWord, dateCreated, accountStatus, name, address, email, phoneNumber, birth, sex, codePermissions)
VALUES 
('PhucApuTruong', '123456', '2024-03-14', 'active', 'Trương Công Phúc', '123 Main St', 'truongphuc056@gmail.com', '0823072871', '2003-06-10', 'Male', 'admin'),
('FatnotPhat', '123456', '2024-03-14', 'active', 'Trần Tiến Phát', '123 Main St', 'Fat@gmail.com', '0823072871', '2003-01-01', 'Male', 'admin');

-- check data table accounts
USE  website_sells_clothes_and_bags;
SELECT * FROM accounts


-- data table product
USE  website_sells_clothes_and_bags;
INSERT INTO Product (productCode, imgProduct, nameProduct, supplierCode, quantity, describeProduct, status, color, targetGender, price)
VALUES 
('P001', '../image/product/product1/product-detail-1.png', '', 'S001', 100, 'This is an example product', 'Available', 'Blue', 'Unisex', 19.99);


