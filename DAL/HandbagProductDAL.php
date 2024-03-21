<?php
// import
require('./AbstractionDAL.php');
require('../DTO/HandbagProductDTO.php');

class HandbagProductDAL extends AbstractionDAL
{

       private $actionSQL = null;
       public function __construct()
       {
              parent::__construct();
              $this->actionSQL = parent::getConn();

              // if ($this->actionSQL != null) {
              //        echo 'thanh cong';
              // }
       }

       // xóa một đối tượng bởi mã đối tượng 
       function deleteByID($code)
       {
              // xóa dữ liệu trong bảng handbagproduct trước rồi đến product
              
       }

       // xóa một đối tượng bằng cách truyền đối tượng vào
       function delete($obj)
       {
       }

       // lấy ra mảng các đối tượng
       function getListObj()
       {
              // Khởi tạo mảng để lưu danh sách đối tượng
              $product_list = array();

              // Câu lệnh truy vấn
              $query = 'SELECT * FROM product INNER JOIN handbagproduct ON product.productCode = handbagproduct.productCode';

              // Thực hiện truy vấn
              $result = $this->actionSQL->query($query);

              // Kiểm tra số hàng được trả về
              if ($result->num_rows > 0) {
                     // Lặp qua từng hàng kết quả
                     while ($data = $result->fetch_assoc()) {
                            // Lấy dữ liệu từ hàng kết quả
                            $productCode = $data["productCode"];
                            $imgProduct = $data["imgProduct"];
                            $nameProduct = $data["nameProduct"];
                            $supplierCode = $data["supplierCode"];
                            $quantity = $data["quantity"];
                            $describeProduct = $data["describeProduct"];
                            $status = $data["status"];
                            $color = $data["color"];
                            $targetGender = $data["targetGender"];
                            $price = $data["price"];
                            $promotion = $data["promotion"];
                            $bagMaterial = $data["bagMaterial"];

                            // Tạo đối tượng HandbagProductDTO từ dữ liệu lấy được và thêm vào mảng
                            $handbagProduct = new HandbagProductDTO($productCode, $imgProduct, $nameProduct, $supplierCode, $quantity, $describeProduct, $status, $color, $targetGender, $price, $promotion, $bagMaterial);
                            array_push($product_list, $handbagProduct);
                     }
                     // Trả về danh sách đối tượng
                     return $product_list;
              } else {
                     // Trường hợp không có dữ liệu trả về
                     return null;
              }
       }

       // lấy ra một đối tượng dựa theo mã đối tượng
       function getObj($code)
       {
              // Câu lệnh truy vấn
              $query = "SELECT * FROM product,handbagproduct WHERE product.productCode = handbagproduct.productCode AND product.productCode = '$code' ";

              // Thực hiện truy vấn
              $result = $this->actionSQL->query($query);

              // Kiểm tra số hàng được trả về
              if ($result->num_rows > 0) {
                     // Lấy dữ liệu từ hàng kết quả
                     $data = $result->fetch_assoc();
                     $productCode = $data["productCode"];
                     $imgProduct = $data["imgProduct"];
                     $nameProduct = $data["nameProduct"];
                     $supplierCode = $data["supplierCode"];
                     $quantity = $data["quantity"];
                     $describeProduct = $data["describeProduct"];
                     $status = $data["status"];
                     $color = $data["color"];
                     $targetGender = $data["targetGender"];
                     $price = $data["price"];
                     $promotion = $data["promotion"];
                     $bagMaterial = $data["bagMaterial"];

                     // Tạo đối tượng HandbagProductDTO và trả về
                     $handbagProduct = new HandbagProductDTO($productCode, $imgProduct, $nameProduct, $supplierCode, $quantity, $describeProduct, $status, $color, $targetGender, $price, $promotion, $bagMaterial);
                     return $handbagProduct;
              } else {
                     // Trường hợp không có dữ liệu trả về
                     return null;
              }
       }

       // thêm một đối tượng 
       function addObj($obj)
       {
              // thêm dữ liệu vào bảng product trước rồi mới đến hanbbagproduct
              // Câu lệnh truy vấn kiểm tra khóa
              if ($obj != null) {
                     $productCode = $obj->getProductCode();
                     $query = "SELECT * FROM product,handbagproduct WHERE product.productCode = handbagproduct.productCode AND product.productCode = '$productCode' ";
                     $resultCheck = $this->actionSQL->query($query);
                     if ($resultCheck->num_rows < 1) {
                            $imgProduct = $obj->getImgProduct();
                            $nameProduct = $obj->getNameProduct();
                            $supplierCode = $obj->getSupplierCode();
                            $quantity = $obj->getQuantity();
                            $describeProduct = $obj->getDescribe();
                            $status = $obj->getStatus();
                            $color = $obj->getColor();
                            $targetGender = $obj->getTargetGender();
                            $price = $obj->getPrice();
                            $promotion = $obj->getPromotion();
                            $bagMaterial = $obj->getBagMaterial();

                            $string1 = "INSERT INTO Product (productCode, imgProduct, nameProduct, supplierCode, quantity, describeProduct, status, color, targetGender, price, promotion)
                            VALUES ('$productCode', '$imgProduct', '$nameProduct', '$supplierCode', $quantity, '$describeProduct', '$status', '$color', '$targetGender', $price, $promotion)";

                            $string2 = "INSERT INTO handbagproduct (productCode,bagMaterial)
                            VALUES 
                                   ('$productCode','$bagMaterial')";

                            $result1 = $this->actionSQL->query($string1);
                            $result2 = $this->actionSQL->query($string2);

                            return $result1 === $result2;
                     } else {
                            return false;
                     }
              } else {
                     return false;
              }
       }

       // sửa một đối tượng
       function upadateObj($obj)
       {
              if ($obj != null) {
                     $productCode = $obj->getProductCode();
                     $imgProduct = $obj->getImgProduct();
                     $nameProduct = $obj->getNameProduct();
                     $supplierCode = $obj->getSupplierCode();
                     $quantity = $obj->getQuantity();
                     $describeProduct = $obj->getDescribe();
                     $status = $obj->getStatus();
                     $color = $obj->getColor();
                     $targetGender = $obj->getTargetGender();
                     $price = $obj->getPrice();
                     $promotion = $obj->getPromotion();
                     $bagMaterial = $obj->getBagMaterial();

                     // Câu lệnh SQL để cập nhật dữ liệu trong bảng Product nếu mã sản phẩm đã tồn tại
                     $queryProduct = "UPDATE Product 
                                      SET imgProduct = '$imgProduct', 
                                          nameProduct = '$nameProduct', 
                                          supplierCode = '$supplierCode', 
                                          quantity = $quantity, 
                                          describeProduct = '$describeProduct', 
                                          status = '$status', 
                                          color = '$color', 
                                          targetGender = '$targetGender', 
                                          price = $price, 
                                          promotion = $promotion
                                      WHERE productCode = '$productCode'";

                     // Thực hiện truy vấn
                     $resultProduct = $this->actionSQL->query($queryProduct);

                     // Câu lệnh SQL để cập nhật dữ liệu trong bảng HandbagProduct nếu mã sản phẩm đã tồn tại
                     $queryHandbagProduct = "UPDATE HandbagProduct 
                                             SET bagMaterial = '$bagMaterial'
                                             WHERE productCode = '$productCode'";

                     // Thực hiện truy vấn
                     $resultHandbagProduct = $this->actionSQL->query($queryHandbagProduct);

                     // Kiểm tra và trả về kết quả của cả hai câu lệnh UPDATE
                     return ($resultProduct !== false && $resultHandbagProduct !== false);
              } else {
                     // Nếu đối tượng truyền vào là null
                     return false;
              }
       }
}

// check

$check = new HandbagProductDAL();

// print_r($check->getListObj());

// echo $check->getObj('P019')->getNameProduct();

$product = new HandbagProductDTO(
       'P111', // productCode
       'image_url', // imgProduct
       'Product Name', // nameProduct
       'NCC001', // supplierCode
       50, // quantity
       'Description of the product', // describeProduct
       'Available', // status
       'Blue', // color
       'Male', // targetGender
       50.99, // price
       10, // promotion
       'Leather' // bagMaterial
);

// echo $check->addObj($product);

echo $check->upadateObj($product);
