-- khởi tạo dữ liệu cho database


-- data table function
USE  website_sells_clothes_and_bags;
INSERT INTO functions
       (functionCode, functionName)
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
SELECT *
FROM functions



-- data table permission
USE  website_sells_clothes_and_bags;
INSERT INTO permissions
       (codePermissions, namePermissions)
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
SELECT *
FROM permissions


-- data table permissonsdetail
USE  website_sells_clothes_and_bags;
INSERT INTO permissionsdetail
       (codePermissions, functionCode, addPermission, seePermission, deletePermission, fixPermission)
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
SELECT *
FROM permissionsdetail




-- data table accounts
USE  website_sells_clothes_and_bags;
INSERT INTO accounts
       (userName, passWord, dateCreated, accountStatus, name, address, email, phoneNumber, birth, sex, codePermissions)
VALUES
       ('PhucApuTruong', '123456', '2024-03-14', 'active', 'Trương Công Phúc', '123 Main St', 'truongphuc056@gmail.com', '0823072871', '2003-06-10', 'Male', 'admin'),
       ('FatnotPhat', '123456', '2024-03-14', 'active', 'Trần Tiến Phát', '123 Main St', 'Fat@gmail.com', '0823072871', '2003-01-01', 'Male', 'admin');

-- check data table accounts
USE  website_sells_clothes_and_bags;
SELECT *
FROM accounts


-- data table product
USE  website_sells_clothes_and_bags;
INSERT INTO Supplier
       (codeSupplier, nameSupplier, address, email, brandSupplier, phoneNumber)
VALUES
       ('NCC001', 'Gucci store branch 2', '123 An Dương Vương, Hồ Chí Minh, Quận 5', 'GUCCI@gmail.com', 'GUCCI', '0823072871'),
       ('NCC002', 'Nike store branch SaiGon', '185 An Dương Vương, Hồ Chí Minh , Quận 5', 'NIKE@gmail.com', 'NIKE', '0823072871'),
       ('NCC003', 'Adidas store branch SaiGon', '132 An Dương Vương, Hồ Chí Minh , Quận 5', 'ADIDAS@gmail.com', 'ADIDAS', '0823072871'),
       ('NCC004', 'Chanel store branch LongAn', '85 Võ Thị Kế, Long An , Tân An', 'CHANEL@gmail.com', 'CHANEL', '0823072871');

-- check data table Supplier
USE  website_sells_clothes_and_bags;
SELECT *
FROM supplier





-- data table product
USE  website_sells_clothes_and_bags;
INSERT INTO Product
       (productCode, imgProduct, nameProduct, supplierCode, quantity, describeProduct, status, color, targetGender, price, promotion)
VALUES
       (
              'P001', -- mã sãn phẩm
              '../image/product/product1/product-detail-1.png ../image/product/product1/product-detail-2.png ../image/product/product1/product-detail-3.png ../image/product/product1/product-detail-4.png', -- ảnh chi tiết sản phẩm
              'Jumpsuit quấn siêu mềm', -- tên sản phẩm
              'NCC001', -- mã nhà cung cấp
              50,
              'Jumpsuit Quấn Siêu Mềm: Sự Hoàn Hảo Của Sự Thư Thái

              Trong thế giới thời trang hiện đại, sự thoải mái và phong cách không chỉ là mục tiêu mà còn là một trải nghiệm. Và giữa những xu hướng đa dạng, Jumpsuit Quấn Siêu Mềm nổi bật như một điểm đến lý tưởng cho những người phụ nữ tìm kiếm sự thoải mái và thanh lịch trong một bộ trang phục đơn giản nhưng không kém phần sang trọng.

              Ngay từ cái nhìn đầu tiên, Jumpsuit Quấn Siêu Mềm thu hút với sự đẹp mắt của chất liệu siêu mềm, êm ái và mịn màng. Với việc sử dụng chất liệu cao cấp như lụa hoặc chiffon, bộ jumpsuit không chỉ mang lại cảm giác thoải mái mà còn tạo nên sự sang trọng, quyến rũ mỗi khi mặc.

              Sự linh hoạt của Jumpsuit Quấn Siêu Mềm cũng là một điểm đáng chú ý. Với thiết kế quấn đơn giản nhưng tinh tế, bộ jumpsuit này mang lại khả năng điều chỉnh dễ dàng, giúp phù hợp với mọi dáng vóc và kích cỡ cơ thể. Không cần phải lo lắng về việc chọn size phù hợp, mỗi người phụ nữ đều có thể tìm thấy sự thoải mái và vẻ đẹp riêng của mình trong Jumpsuit Quấn Siêu Mềm.

              Điểm nhấn của bộ trang phục này chính là sự đa dạng trong phong cách. Dễ dàng kết hợp với các phụ kiện như dây nịt, giày cao gót hay sneakers, Jumpsuit Quấn Siêu Mềm có thể biến hóa từ phong cách nữ tính đến cá tính, từ dịu dàng đến năng động, phản ánh đầy đủ cá tính và phong cách riêng của người mặc.

              Cuối cùng, không thể phủ nhận rằng Jumpsuit Quấn Siêu Mềm là lựa chọn lý tưởng cho những buổi tiệc, dạo phố hay thậm chí là những buổi hẹn hò lãng mạn. Sự thoải mái, linh hoạt và phong cách của bộ jumpsuit này chắc chắn sẽ làm nổi bật và tự tin cho bất kỳ ai mặc nó. Trải nghiệm Jumpsuit Quấn Siêu Mềm, bạn sẽ không chỉ cảm nhận sự thoải mái mà còn khám phá ra sự hoàn hảo trong sự thư thái và phong cách.', -- mo ta
              '1', -- trạng thái 
              'pink', -- màu
              'Male', -- đối tượng hướng đến
              39.99,   -- giá
              20 -- giảm giá
       ),
       (
              'P002', -- mã sãn phẩm
              '../image/product/product2/product-detail-1.png ../image/product/product2/product-detail-2.png ../image/product/product2/product-detail-3.png ../image/product/product2/product-detail-4.png', -- ảnh chi tiết sản phẩm
              'JDenim playsuit', -- tên sản phẩm
              'NCC001', -- mã nhà cung cấp
              50,
              'JDenim Playsuit: Sự Kết Hợp Hoàn Hảo Giữa Phong Cách và Sự Tiện Lợi

              Trong thế giới thời trang đương đại, sự đa dạng và tính ứng dụng luôn được đặt lên hàng đầu. Và JDenim Playsuit chính là một minh chứng sống động cho sự kết hợp hoàn hảo giữa phong cách thời trang và sự tiện lợi.

              JDenim Playsuit là sự hòa quyện tuyệt vời giữa jeans và jumpsuit, mang lại cảm giác thoải mái nhưng vẫn giữ được vẻ năng động và cá tính. Được làm từ chất liệu denim chất lượng cao, bộ playsuit này không chỉ đảm bảo độ bền và độ co giãn tốt mà còn tạo nên sự thoải mái và tự tin cho người mặc.

              Với thiết kế đơn giản nhưng không kém phần cuốn hút, JDenim Playsuit là sự lựa chọn hoàn hảo cho những người phụ nữ yêu thích phong cách năng động và trẻ trung. Dây đai điều chỉnh ở eo giúp tạo ra sự vừa vặn và phù hợp cho mọi dáng người, đồng thời tạo điểm nhấn cho toàn bộ trang phục.

              Sự linh hoạt của JDenim Playsuit cũng là một điểm đáng chú ý. Với khả năng kết hợp dễ dàng với các phụ kiện như giày sneakers, sandal hoặc boots, bộ playsuit này có thể phù hợp với nhiều dịp khác nhau, từ đi chơi dạo phố đến các buổi tiệc hay dự lễ hội.', -- mo ta
              '1', -- trạng thái 
              'blue', -- màu
              'Male', -- đối tượng hướng đến
              39.99,   -- giá
              0 -- giảm giá
       ),
       (
              'P003', -- mã sãn phẩm
              '../image/product/product3/product-detail-1.png ../image/product/product3/product-detail-2.png ../image/product/product3/product-detail-3.png ../image/product/product3/product-detail-4.png ../image/product/product3/product-detail-5.png ../image/product/product3/product-detail-6.png', -- ảnh chi tiết sản phẩm
              'Halterneck jumpsuit', -- tên sản phẩm
              'NCC001', -- mã nhà cung cấp
              50,
              'Halterneck Jumpsuit: Sự Gợi Cảm và Thanh Lịch Trên Mỗi Bước Đường

              Trong thế giới thời trang hiện đại, sự kết hợp giữa sự gợi cảm và sự thoải mái luôn là điều được ưa chuộng, và Halterneck Jumpsuit không phải là một ngoại lệ. Với thiết kế độc đáo và thanh lịch, bộ jumpsuit này mang lại sự tự tin và quyến rũ cho người mặc, đồng thời giữ cho họ cảm thấy thoải mái suốt cả ngày dài.

              Halterneck Jumpsuit nổi bật với phần trên được cắt xẻ tinh tế, tạo ra dáng cổ áo hình chữ V hoặc hình tam giác đầy gợi cảm, làm nổi bật vòng 1 và tôn lên vóc dáng của người mặc. Các dây đeo chéo sau cổ tạo điểm nhấn và giúp điều chỉnh vừa vặn cho mọi dáng người.

              Với phần quần được cắt dài hoặc ngắn tùy thuộc vào phong cách, Halterneck Jumpsuit thường được làm từ các chất liệu như lụa, satin, hoặc chiffon, tạo ra sự mềm mại và mượt mà, khiến người mặc cảm nhận được sự thoải mái và tự tin mỗi khi diện lên.

              Khả năng linh hoạt của Halterneck Jumpsuit cũng là một điểm cộng lớn. Bạn có thể mặc nó trong những dịp quan trọng như tiệc tùng, dự lễ cưới, hoặc một buổi hẹn hò lãng mạn. Đồng thời, nó cũng phù hợp cho những buổi dạo phố, đi chơi cùng bạn bè, hoặc thậm chí là một buổi học nhẹ nhàng.', -- mo ta
              '1', -- trạng thái 
              'black', -- màu
              'Male', -- đối tượng hướng đến
              39.99,   -- giá
              0 -- giảm giá
       );

-- check data table product
USE  website_sells_clothes_and_bags;
SELECT *
FROM product


-- 




