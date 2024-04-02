<?php

// gọi các lớp liên quan
require('../DAL/connectionDatabase.php');
require('../DAL/AbstractionDAL.php');

require('../DTO/ProductDTO.php');
require('../DTO/HandbagProductDTO.php');
require('../DTO/ShirtProductDTO.php');

require('../DAL/HandbagProductDAL.php');
require('../DAL/ShirtProductDAL.php');



class ProductBLL
{
       private $productList;
       // private $arr_handbag;
       // private $arr_shirt;
       private $HandbagProductDAL;
       private $ShirtProductDAL;
       function __construct()
       {
              $this->productList = array();
              $this->HandbagProductDAL = new HandbagProductDAL();
              $this->ShirtProductDAL = new ShirtProductDAL();
              // $this->arr_handbag = $this->HandbagProductDAL->getListObj();
              // $this->arr_shirt = $this->ShirtProductDAL->getListObj();
       }

       // trans to json
       function transHandbagProductToJson()
       {
              $arr_handbag = $this->HandbagProductDAL->getListObj();
              $arrJson = array();
              foreach ($arr_handbag as $item) {
                     if ($item->getStatus() == '1') {
                            $ProductCode = $item->getProductCode();
                            $imgProduct = $item->getImgProduct();
                            $nameProduct = $item->getNameProduct();
                            $supplierCode = $item->getSupplierCode();
                            $quantity = $item->getQuantity();
                            $describeProduct = $item->getDescribe();
                            $status = $item->getStatus();
                            $color = $item->getColor();
                            $targetGender = $item->getTargetGender();
                            $price = $item->getPrice();
                            $promotion = $item->getPromotion();
                            $bagMaterial = $item->getBagMaterial();
                            $descriptionMaterial = $item->getDescriptionMaterial();

                            $obj = array(
                                   "productCode" => $ProductCode,
                                   "imgProduct" => $imgProduct,
                                   "nameProduct" => $nameProduct,
                                   "supplierCode" => $supplierCode,
                                   "quantity" => $quantity,
                                   "describeProduct" => $describeProduct,
                                   "status" => $status,
                                   "color" => $color,
                                   "targetGender" => $targetGender,
                                   "price" => $price,
                                   "promotion" => $promotion,
                                   "bagMaterial" => $bagMaterial,
                                   "descriptionMaterial" => $descriptionMaterial
                            );

                            array_push($arrJson, $obj);
                     }
              }
              return $arrJson;
       }
       function transShirtProductToJson()
       {
              $arr_shirt = $this->ShirtProductDAL->getListObj();
              $arrJson = array();
              foreach ($arr_shirt as $item) {
                     if ($item->getStatus() == '1') {
                            $ProductCode = $item->getProductCode();
                            $imgProduct = $item->getImgProduct();
                            $nameProduct = $item->getNameProduct();
                            $supplierCode = $item->getSupplierCode();
                            $quantity = $item->getQuantity();
                            $describeProduct = $item->getDescribe();
                            $status = $item->getStatus();
                            $color = $item->getColor();
                            $targetGender = $item->getTargetGender();
                            $price = $item->getPrice();
                            $promotion = $item->getPromotion();
                            $shirtMaterial = $item->getShirtMaterial();
                            $shirtStyle = $item->getShirtStyle();
                            $descriptionMaterial = $item->getDescriptionMaterial();

                            $obj = array(
                                   "productCode" => $ProductCode,
                                   "imgProduct" => $imgProduct,
                                   "nameProduct" => $nameProduct,
                                   "supplierCode" => $supplierCode,
                                   "quantity" => $quantity,
                                   "describeProduct" => $describeProduct,
                                   "status" => $status,
                                   "color" => $color,
                                   "targetGender" => $targetGender,
                                   "price" => $price,
                                   "promotion" => $promotion,
                                   "shirtMaterial" => $shirtMaterial,
                                   "shirtStyle" => $shirtStyle,
                                   "descriptionMaterial" => $descriptionMaterial
                            );

                            array_push($arrJson, $obj);
                     }
              }
              return $arrJson;
       }

       function getProductByCode_transToJson($productCode, $type)
       {
              if ($type === 'shirtProduct') {
                     $item = $this->ShirtProductDAL->getObj($productCode);

                     if ($item != null) {
                            // chuyển sang dạng mảng obj

                            $ProductCode = $item->getProductCode();
                            $imgProduct = $item->getImgProduct();
                            $nameProduct = $item->getNameProduct();
                            $supplierCode = $item->getSupplierCode();
                            $quantity = $item->getQuantity();
                            $describeProduct = $item->getDescribe();
                            $status = $item->getStatus();
                            $color = $item->getColor();
                            $targetGender = $item->getTargetGender();
                            $price = $item->getPrice();
                            $promotion = $item->getPromotion();
                            $shirtMaterial = $item->getShirtMaterial();
                            $shirtStyle = $item->getShirtStyle();
                            $descriptionMaterial = $item->getDescriptionMaterial();

                            $obj = array(
                                   "productCode" => $ProductCode,
                                   "imgProduct" => $imgProduct,
                                   "nameProduct" => $nameProduct,
                                   "supplierCode" => $supplierCode,
                                   "quantity" => $quantity,
                                   "describeProduct" => $describeProduct,
                                   "status" => $status,
                                   "color" => $color,
                                   "targetGender" => $targetGender,
                                   "price" => $price,
                                   "promotion" => $promotion,
                                   "shirtMaterial" => $shirtMaterial,
                                   "shirtStyle" => $shirtStyle,
                                   "descriptionMaterial" => $descriptionMaterial
                            );

                            return $obj;
                     } else {
                            return null;
                     }
              } elseif ($type === 'handbagProduct') {
                     $item = $this->HandbagProductDAL->getObj($productCode);

                     if ($item != null) {
                            $ProductCode = $item->getProductCode();
                            $imgProduct = $item->getImgProduct();
                            $nameProduct = $item->getNameProduct();
                            $supplierCode = $item->getSupplierCode();
                            $quantity = $item->getQuantity();
                            $describeProduct = $item->getDescribe();
                            $status = $item->getStatus();
                            $color = $item->getColor();
                            $targetGender = $item->getTargetGender();
                            $price = $item->getPrice();
                            $promotion = $item->getPromotion();
                            $bagMaterial = $item->getBagMaterial();
                            $descriptionMaterial = $item->getDescriptionMaterial();

                            $obj = array(
                                   "productCode" => $ProductCode,
                                   "imgProduct" => $imgProduct,
                                   "nameProduct" => $nameProduct,
                                   "supplierCode" => $supplierCode,
                                   "quantity" => $quantity,
                                   "describeProduct" => $describeProduct,
                                   "status" => $status,
                                   "color" => $color,
                                   "targetGender" => $targetGender,
                                   "price" => $price,
                                   "promotion" => $promotion,
                                   "bagMaterial" => $bagMaterial,
                                   "descriptionMaterial" => $descriptionMaterial
                            );

                            return $obj;
                     } else {
                            return null;
                     }
              }
       }
       // phan trang
       function Pagination($page, $limit)
       {
              // Input: Các tham số truyền vào: page
              // Output: trả về danh sách sản phẩm dựa theo vị trí bắt đầu beginGet và vị trí kết thúc endGet

              // cộng thức tổng quát
              // BeginGet= limit* (page - 1); 
              // endGet: limit * page-1;

              // Dùng một mảng lưu sảm phẩm 
              // đối tượng sẽ trả về $obj = {productCode,imgProduct,nameProduct,price,promotion,type}

              // lấy dữ liệu bảng product
              $arr1 = $this->ShirtProductDAL->getListObj();
              $arr2 = $this->HandbagProductDAL->getListObj();

              // gọp 2 mảnh đó lại thành dữ liệu chung để phân trang
              $arr = array();
              foreach ($arr1 as $item) {
                     if ($item->getStatus() == '1') {
                            $ProductCode = $item->getProductCode();
                            $imgProduct = $item->getImgProduct();
                            $nameProduct = $item->getNameProduct();
                            $supplierCode = $item->getSupplierCode();
                            $quantity = $item->getQuantity();
                            $describeProduct = $item->getDescribe();
                            $status = $item->getStatus();
                            $color = $item->getColor();
                            $targetGender = $item->getTargetGender();
                            $price = $item->getPrice();
                            $promotion = $item->getPromotion();
                            $obj = array(
                                   "productCode" => $ProductCode,
                                   "imgProduct" => $imgProduct,
                                   "nameProduct" => $nameProduct,
                                   "supplierCode" => $supplierCode,
                                   "quantity" => $quantity,
                                   "describeProduct" => $describeProduct,
                                   "status" => $status,
                                   "color" => $color,
                                   "targetGender" => $targetGender,
                                   "price" => $price,
                                   "promotion" => $promotion,
                                   "type" => "shirtProduct"
                            );
                            array_push($arr, $obj);
                     }
              }
              foreach ($arr2 as $item) {
                     if ($item->getStatus() == '1') {
                            $ProductCode = $item->getProductCode();
                            $imgProduct = $item->getImgProduct();
                            $nameProduct = $item->getNameProduct();
                            $supplierCode = $item->getSupplierCode();
                            $quantity = $item->getQuantity();
                            $describeProduct = $item->getDescribe();
                            $status = $item->getStatus();
                            $color = $item->getColor();
                            $targetGender = $item->getTargetGender();
                            $price = $item->getPrice();
                            $promotion = $item->getPromotion();
                            $obj = array(
                                   "productCode" => $ProductCode,
                                   "imgProduct" => $imgProduct,
                                   "nameProduct" => $nameProduct,
                                   "supplierCode" => $supplierCode,
                                   "quantity" => $quantity,
                                   "describeProduct" => $describeProduct,
                                   "status" => $status,
                                   "color" => $color,
                                   "targetGender" => $targetGender,
                                   "price" => $price,
                                   "promotion" => $promotion,
                                   "type" => "handbagProduct"
                            );
                            array_push($arr, $obj);
                     }
              }

              // tính BeginGet và EndGet
              $beginGet = $limit * ($page - 1);
              $endGet = $limit * $page - 1;

              // list item trả về để hiện lên
              $result = array();
              for ($i = $beginGet; $i <= $endGet; $i++) {
                     if (isset($arr[$i])) {
                            array_push($result, $arr[$i]);
                     }
              }
              return $result;
       }

       // search box on header
       function searchProduct($keyword)
       {
              // lấy dữ liệu 
              $arrHandbag = $this->HandbagProductDAL->getListObj();
              $arrShirt = $this->ShirtProductDAL->getListObj();

              // tạo một mảng lưu kết quả tìm được
              $result = array();

              if ($keyword != 'null') {
                     // tra thông tin trên sản phẩm áo
                     foreach ($arrShirt as $item) {
                            if ($item->getStatus() == '1') {
                                   $ProductCode = $item->getProductCode();
                                   $imgProduct = $item->getImgProduct();
                                   $nameProduct = $item->getNameProduct();
                                   $supplierCode = $item->getSupplierCode();
                                   $quantity = $item->getQuantity();
                                   $describeProduct = $item->getDescribe();
                                   $status = $item->getStatus();
                                   $color = $item->getColor();
                                   $targetGender = $item->getTargetGender();
                                   $price = $item->getPrice();
                                   $promotion = $item->getPromotion();
                                   $shirtMaterial = $item->getShirtMaterial();
                                   $shirtStyle = $item->getShirtStyle();

                                   // Kiểm tra nếu "keyword" xuất hiện trong một trong các thuộc tính
                                   if (
                                          strpos($ProductCode, $keyword) !== false ||
                                          strpos($imgProduct, $keyword) !== false ||
                                          strpos($nameProduct, $keyword) !== false ||
                                          strpos($supplierCode, $keyword) !== false ||
                                          strpos($describeProduct, $keyword) !== false ||
                                          strpos($color, $keyword) !== false ||
                                          strpos($targetGender, $keyword) !== false ||
                                          strpos($price, $keyword) !== false ||
                                          strpos($promotion, $keyword) !== false ||
                                          strpos($shirtMaterial, $keyword) !== false ||
                                          strpos($shirtStyle, $keyword) !== false
                                   ) {

                                          // Nếu có, thêm item vào mảng result
                                          $obj = array(
                                                 "productCode" => $ProductCode,
                                                 "imgProduct" => $imgProduct,
                                                 "nameProduct" => $nameProduct,
                                                 "supplierCode" => $supplierCode,
                                                 "quantity" => $quantity,
                                                 "describeProduct" => $describeProduct,
                                                 "status" => $status,
                                                 "color" => $color,
                                                 "targetGender" => $targetGender,
                                                 "price" => $price,
                                                 "promotion" => $promotion,
                                                 "type" => "shirtProduct"
                                          );

                                          array_push($result, $obj);
                                   }
                            }
                     }

                     // tra thong tin tren san pham tui sach
                     foreach ($arrHandbag as $item) {
                            if ($item->getStatus() == '1') {
                                   $ProductCode = $item->getProductCode();
                                   $imgProduct = $item->getImgProduct();
                                   $nameProduct = $item->getNameProduct();
                                   $supplierCode = $item->getSupplierCode();
                                   $quantity = $item->getQuantity();
                                   $describeProduct = $item->getDescribe();
                                   $status = $item->getStatus();
                                   $color = $item->getColor();
                                   $targetGender = $item->getTargetGender();
                                   $price = $item->getPrice();
                                   $promotion = $item->getPromotion();
                                   $bagMaterial = $item->getBagMaterial();
                                   $descriptionMaterial = $item->getDescriptionMaterial();

                                   // Kiểm tra nếu "keyword" xuất hiện trong một trong các thuộc tính
                                   if (
                                          strpos($ProductCode, $keyword) !== false ||
                                          strpos($imgProduct, $keyword) !== false ||
                                          strpos($nameProduct, $keyword) !== false ||
                                          strpos($supplierCode, $keyword) !== false ||
                                          strpos($describeProduct, $keyword) !== false ||
                                          strpos($color, $keyword) !== false ||
                                          strpos($targetGender, $keyword) !== false ||
                                          strpos($price, $keyword) !== false ||
                                          strpos($promotion, $keyword) !== false ||
                                          strpos($bagMaterial, $keyword) !== false
                                   ) {

                                          // Nếu có, thêm item vào mảng result
                                          $obj = array(
                                                 "productCode" => $ProductCode,
                                                 "imgProduct" => $imgProduct,
                                                 "nameProduct" => $nameProduct,
                                                 "supplierCode" => $supplierCode,
                                                 "quantity" => $quantity,
                                                 "describeProduct" => $describeProduct,
                                                 "status" => $status,
                                                 "color" => $color,
                                                 "targetGender" => $targetGender,
                                                 "price" => $price,
                                                 "promotion" => $promotion,
                                                 "type" => "handbagProduct"
                                          );

                                          array_push($result, $obj);
                                   }
                            }
                     }
                     return $result;
              } else {
                     if (empty($result)) {
                            $obj = array(
                                   "productCode" => '',
                            );
                            array_push($result, $obj);
                     }
                     return $result;
              }
       }
}

// check






// menu

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       $check = new ProductBLL();
       // lấy tên chức năng
       $function = $_POST['function'];

       switch ($function) {
              case 'transHandbagProductToJson':
                     $temp = $check->transHandbagProductToJson();
                     echo json_encode($temp);
                     break;
              case 'transShirtProductToJson':
                     $temp = $check->transShirtProductToJson();
                     echo json_encode($temp);
                     break;
              case 'getProductByCode_transToJson':
                     $productCode = $_POST['code'];
                     $type = $_POST['type'];
                     $temp = $check->getProductByCode_transToJson($productCode, $type);
                     echo json_encode($temp);
                     break;
              case 'Pagination':
                     $page = $_POST['page'];
                     $limit = $_POST['limit'];
                     $temp = $check->Pagination($page, $limit);
                     echo json_encode($temp);
                     break;
              case 'searchProduct':
                     $keyword = $_POST['keyword'];
                     $temp = $check->searchProduct($keyword);
                     echo json_encode($temp);
                     break;
       }
}
