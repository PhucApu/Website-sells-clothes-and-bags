<?php
// gọi các lớp liên quan
require('../DAL/connectionDatabase.php');
require('../DAL/AbstractionDAL.php');

require('../DTO/OrderDTO.php');
require('../DTO/orderDetailDTO.php');
require('../DTO/ProductDTO.php');
require('../DTO/HandbagProductDTO.php');
require('../DTO/ShirtProductDTO.php');
require('../DTO/ShirtSizeDTO.php');
require('../DTO/SizeDTO.php');

require('../DAL/OrderDAL.php');
require('../DAL/orderDetailDAL.php');
require('../DAL/HandbagProductDAL.php');
require('../DAL/ShirtProductDAL.php');
require('../DAL/ShirtSizeDAL.php');
require('../DAL/SizeDAL.php');

class OrderBLL
{
       private $OrderDAL;
       private $orderDetailDAL;

       private $HandbagProductDAL;
       private $ShirtProductDAL;
       private $ShirtSizeDAL;
       private $SizeDAL;

       function __construct()
       {
              $this->OrderDAL = new OrderDAL();
              $this->orderDetailDAL = new OrderDetailDAL();

              $this->HandbagProductDAL = new HandbagProductDAL();
              $this->ShirtProductDAL = new ShirtProductDAL();
              $this->SizeDAL = new SizeDAL();
              $this->ShirtSizeDAL = new ShirtSizeDAL();
       }

       // lấy mảng hóa đơn dựa theo mã username
       // input: mã username
       // output: mảng chứa các đối tượng hóa đơn
       function getArrOrder_by_Username($username)
       {

              $arrObj = $this->OrderDAL->getListObj_by_UserName($username);
              $result = array();
              if ($arrObj != null) {
                     if (count($arrObj) > 0) {
                            foreach ($arrObj as $item) {
                                   $orderCode = $item->getOrderCode();
                                   $dateCreated = $item->getDateCreated();
                                   $dateDelivery = $item->getDateDelivery();
                                   $dateFinish = $item->getDateFinish();
                                   $userName = $item->getUserName();
                                   $totalMoney = $item->getTotalMoney();
                                   $codePayments = $item->getCodePayments();
                                   $codeTransport = $item->getCodeTransport();
                                   $status = $item->getStatus();
                                   $note = $item->getNote();

                                   $obj = array(
                                          "orderCode" => $orderCode,
                                          "dateCreated" => $dateCreated,
                                          "dateDelivery" => $dateDelivery,
                                          "dateFinish" => $dateFinish,
                                          "userName" => $userName,
                                          "totalMoney" => $totalMoney,
                                          "codePayments" => $codePayments,
                                          "codeTransport" => $codeTransport,
                                          "status" => $status,
                                          "note" => $note
                                   );

                                   array_push($result, $obj);
                            }
                            return $result;
                     } else {
                            return $result;
                     }
              } else {
                     return $result;
              }
       }

       // lấy mảng chi tiết hóa đơn dựa vào háo đơn dược truyền vào
       // input: mã hóa đơn
       // output: mảng obj các chi tiết hóa đơn của hóa đơn đó
       function getArrOrderDetail_by_orderCode($orderCode)
       {
              // get arr orderDetail
              $arr = $this->orderDetailDAL->getArr_ByCodeOrder($orderCode);
              $result = array();

              if ($arr != null) {
                     foreach ($arr as $item) {
                            // $orderCode = $item->getOrderCode();
                            $productCode = $item->getProductCode();
                            $nameProduct = $item->getNameProduct();
                            $quantity = $item->getQuantity();
                            $sizeCode = $item->getSizeCode();
                            $priceProduct = $item->getPriceProduct();
                            $totalMoney = $item->getTotalMoney();

                            $obj = array(
                                   "orderCode" => $orderCode,
                                   "productCode" => $productCode,
                                   "nameProduct" => $nameProduct,
                                   "quantity" => $quantity,
                                   "sizeCode" => $sizeCode,
                                   "priceProduct" => $priceProduct,
                                   "totalMoney" => $totalMoney
                            );
                            array_push($result, $obj);
                     }
                     return $result;
              } else {
                     return $result;
              }
       }

       // thêm hóa đơn bên user
       // input: cần phải đăng nhập và có sản phẩm trong sesion, địa chỉ nhận, số điện thoại, ghi chú, mã thanh toán, mã hình thức thanh toán,status
       // output: thông báo thêm hóa đơn
       function addOrder($note, $status,$codePayment,$codeTransport)
       {
              if (session_status() == PHP_SESSION_NONE) {
                     session_start();
              }

              $result = array();

              // kiểm tra xem có người đăng nhập chưa
              if (isset($_SESSION['result']) && $_SESSION['result'] == "success") {

                     // tạo mã hóa đơn ngẫu nhiên
                     // Tạo chuỗi 'ORD' cố định
                     $orderPrefix = 'ORD';

                     // Tạo một số duy nhất dựa trên thời gian hiện tại và số ngẫu nhiên
                     $orderNumber = uniqid();

                     // Kết hợp chuỗi 'ORD' với số duy nhất để tạo ra chuỗi hoàn chỉnh
                     $orderCode = $orderPrefix . $orderNumber;

                     // lấy thông tin người đăng nhập
                     $username = $_SESSION['username'];
                     // lấy các thông tin khác
                     $dateCreated = date('Y-m-d');
                     $dateDelivery = date('Y-m-d', strtotime($dateCreated . ' + 5 days'));
                     $dateFinish = $dateDelivery;

                     // tính tổng tiền hóa đơn, them chi tiet hoa don
                     $arrCart = $_SESSION['cart'];
                     $arrCTHD = array();
                     $sumMoney = 0;
                     for($i = 0; $i < count($arrCart); $i++){
                            $item = $arrCart[$i];
                            $productCode = $item['productCode'];
                            $nameProduct = $item['nameProduct'];
                            $quantity = $item['quantityBuy'];
                            $sizeCode = $item['sizeCode'];
                            $price = $item['price'];
                            $promotion = $item['promotion'];
                            
                            // tính tiền nếu co giảm giá
                            if($promotion > 0){
                                   $price = (float) $price*$promotion/100;
                            }
                            // tính tổng tiền chi tiết hóa đơn bằng lấy số lượng mua * giá tiền từng cái
                            $totalMoney = $quantity * $price;
                            
                            // tinh tong tien cho hoa don
                            $sumMoney += $totalMoney;

                            $objOrderDetail = new OrderDetailDTO($orderCode,$productCode,$nameProduct,$quantity,$sizeCode,$price,$totalMoney);

                            array_push($arrCTHD,$objOrderDetail);
                     }

                     // tạo đối tượng order
                     $order = new OrderDTO($orderCode,$dateCreated,$dateDelivery,$dateFinish,$username,$sumMoney,$codePayment,$codeTransport,$status,$note);

                     // thêm đối tượng order vao db
                     $check1 = $this->OrderDAL->addObj($order);
                     $check2 = true;
                     // nếu thêm thành công order vào thì thêm các chi tiết vào db, đồng thời cập nhật lại số lượng
                     if($check1 == true){
                            foreach($arrCTHD as $item){
                                   if($this->orderDetailDAL->addObj($item) == true){
                                          // cập nhật lại số lượng
                                          $productCode = $item->getProductCode();
                                          $sizeCode = $item->getSizeCode();
                                          $quantity = $item->getSizeCode();
                                          
                                          $shirtsize = $this->ShirtSizeDAL->getObjByProductCodeAndSizeCode($productCode,$sizeCode);

                                          $shirtsize->setQuantity($shirtsize->getQuantity() - $quantity);

                                          $this->ShirtSizeDAL->upadateObj($shirtsize);

                                          $productHandbag = $this->HandbagProductDAL->getObj($productCode);

                                          $productShirt = $this->ShirtProductDAL->getObj($productCode);

                                          if($productHandbag != null){
                                                 $productHandbag->setQuantity($productHandbag->getQuantity() - $quantity);

                                                 $this->HandbagProductDAL->upadateObj($productHandbag);
                                   
                                          }
                                          if($productShirt != null){
                                                 $productShirt->setQuantity($productShirt->getQuantity() - $quantity);

                                                 $this->ShirtSizeDAL->upadateObj($productShirt);
                                          }
                                   }else{
                                          $check2 = false;
                                   }
                            }
                     }
                     if($check1 == $check2){
                            return array(
                                   "mess" => "success"
                            );
                     }else{
                            return array(
                                   "mess" => "thêm hóa đơn thất bại"
                            );
                     }

              } else {
                     return array(
                            "mess" => "failus"
                     );
              }
       }


       // khi người dùng click thêm sản phẩm vào vỏ hàng thì hàm vừa lấy thông tin sản phẩm đó trả về để hiển thị và vừa thêm sản phẩm đó lên session
       // cartItem(productCode,nameProduct,quantityBuy,type)

       // input : productCode,type,quantityBuy
       // output : message (success,notEnoughQuantity,false)
       function addCartToSession($productCode, $type, $quantityBuy, $sizeCode)
       {
              $result = array();
              if (session_status() == PHP_SESSION_NONE) {
                     session_start();
              }
              // neu gio hang da ton tai
              if (isset($_SESSION['cart'])) {
                     $cartArr = $_SESSION['cart'];
                     $flag = 0;
                     $nameProduct = '';
                     // tim kím trong giỏ hàng
                     for ($i = 0; $i < count($cartArr); $i++) {
                            $item = $cartArr[$i];
                            // nếu mà sản phẩm và mã size trùng trong giỏ hàng thì chỉ cập nhật số lượng
                            if ($item['productCode'] == $productCode) {
                                   if ($type == 'shirtProduct' && $item['sizeCode'] == $sizeCode) {
                                          $shirtSizeObj = $this->ShirtSizeDAL->getObjByProductCodeAndSizeCode($productCode, $sizeCode);
                                          $quantityShirtSize = $shirtSizeObj->getQuantity();
                                          $obj = $this->ShirtProductDAL->getObj($productCode);
                                          $quantity = $obj->getQuantity();
                                          $tempCheck = $item['quantityBuy'] + $quantityBuy;
                                          if ($tempCheck >= $quantity || $tempCheck >= $quantityShirtSize) {
                                                 $temp = array(
                                                        "message" => "notEnoughQuantity",
                                                        "productCode" => $productCode,
                                                        "quantityBuy" => $quantityBuy,
                                                        "sizeCode" => $sizeCode,
                                                        "type" => $type,
                                                        "nameProduct" => $item['nameProduct']
                                                 );
                                                 array_push($result, $temp);
                                                 return $result;
                                          } else {
                                                 $nameProduct = $item['nameProduct'];
                                                 $item['quantityBuy'] = $tempCheck; // Cập nhật số lượng mua
                                                 $flag = 1;
                                          }
                                   } elseif ($type == 'handbagProduct') {
                                          $obj = $this->HandbagProductDAL->getObj($productCode);
                                          $quantity = $obj->getQuantity();
                                          $tempCheck = $item['quantityBuy'] + $quantityBuy;
                                          if ($tempCheck >= $quantity) {
                                                 $temp = array(
                                                        "message" => "notEnoughQuantity",
                                                        "productCode" => $productCode,
                                                        "quantityBuy" => $quantityBuy,
                                                        "sizeCode" => 'null',
                                                        "type" => $type,
                                                        "nameProduct" => $item['nameProduct']
                                                 );
                                                 array_push($result, $temp);
                                                 return $result;
                                          } else {
                                                 $nameProduct = $item['nameProduct'];
                                                 $item['quantityBuy'] = $tempCheck; // Cập nhật số lượng mua
                                                 $flag = 1;
                                          }
                                   }
                            }
                            $cartArr[$i] = $item;
                     }

                     // Kiểm tra nếu sản phẩm với size sản phẩm đó chưa có trong giỏ hàng
                     if ($flag == 0) {
                            // Thêm sản phẩm mới vào giỏ hàng
                            if ($type == 'shirtProduct') {
                                   $item = $this->ShirtProductDAL->getObj($productCode);
                            } elseif ($type == 'handbagProduct') {
                                   $item = $this->HandbagProductDAL->getObj($productCode);
                            }


                            if ($item != null) {
                                   $nameProduct = $item->getNameProduct();
                                   $quantity = $item->getQuantity();
                                   $img = $item->getImgProduct();
                                   $price = $item->getPrice();
                                   $promotion = $item->getPromotion();
                                   if ($type == 'shirtProduct') {
                                          $shirtSizeObj = $this->ShirtSizeDAL->getObjByProductCodeAndSizeCode($productCode, $sizeCode);
                                          $quantityShirtSize = $shirtSizeObj->getQuantity();
                                          if ($quantityBuy >= $quantity || $quantityBuy >= $quantityShirtSize) {
                                                 $temp = array(
                                                        "message" => "notEnoughQuantity",
                                                        "productCode" => $productCode,
                                                        "quantityBuy" => $quantityBuy,
                                                        "sizeCode" => $sizeCode,
                                                        "type" => $type,
                                                        "nameProduct" => $nameProduct
                                                 );
                                                 array_push($result, $temp);
                                                 return $result;
                                          }
                                          $obj = array(
                                                 "productCode" => $productCode,
                                                 "nameProduct" => $nameProduct,
                                                 "imgProduct" => $img,
                                                 "price" => (float)$price,
                                                 "promotion" => (float)$promotion,
                                                 "quantityBuy" => (int)$quantityBuy,
                                                 "sizeCode" => $sizeCode,
                                                 "type" => $type
                                          );
                                          array_push($cartArr, $obj);
                                   } else if ($type == 'handbagProduct') {
                                          if ($quantityBuy >= $quantity) {
                                                 $temp = array(
                                                        "message" => "notEnoughQuantity",
                                                        "productCode" => $productCode,
                                                        "quantityBuy" => $quantityBuy,
                                                        "sizeCode" => 'null',
                                                        "type" => $type,
                                                        "nameProduct" => $nameProduct
                                                 );
                                                 array_push($result, $temp);
                                                 return $result;
                                          }

                                          $obj = array(
                                                 "productCode" => $productCode,
                                                 "nameProduct" => $nameProduct,
                                                 "imgProduct" => $img,
                                                 "price" => (float)$price,
                                                 "promotion" => (float)$promotion,
                                                 "quantityBuy" => (int)$quantityBuy,
                                                 "sizeCode" => 'null',
                                                 "type" => $type
                                          );
                                          array_push($cartArr, $obj);
                                   }
                            } else {
                                   $temp = array("message" => "không tìm thấy item");
                                   array_push($result, $temp);
                                   return $result;
                            }
                     }


                     $_SESSION['cart'] = $cartArr;
                     $temp = array(
                            "message" => "success",
                            "productCode" => $productCode,
                            "quantityBuy" => $quantityBuy,
                            "sizeCode" => $sizeCode,
                            "type" => $type,
                            "nameProduct" => $nameProduct
                     );
                     array_push($result, $temp);
                     return $result;
              } else {
                     $nameProduct = '';
                     // Nếu giỏ hàng chưa tồn tại trong session
                     $cartArr = array();
                     $_SESSION['cart'] = $cartArr;
                     if ($type == 'shirtProduct') {
                            $item = $this->ShirtProductDAL->getObj($productCode);
                     } elseif ($type == 'handbagProduct') {
                            $item = $this->HandbagProductDAL->getObj($productCode);
                     }

                     if ($item != null) {
                            $nameProduct = $item->getNameProduct();
                            $quantity = $item->getQuantity();
                            $img = $item->getImgProduct();
                            $price = $item->getPrice();
                            $promotion = $item->getPromotion();
                            if ($type == 'shirtProduct') {
                                   $shirtSizeObj = $this->ShirtSizeDAL->getObjByProductCodeAndSizeCode($productCode, $sizeCode);
                                   $quantityShirtSize = $shirtSizeObj->getQuantity();
                                   if ($quantityBuy >= $quantity || $quantityBuy >= $quantityShirtSize) {
                                          $temp = array(
                                                 "message" => "notEnoughQuantity",
                                                 "productCode" => $productCode,
                                                 "quantityBuy" => $quantityBuy,
                                                 "sizeCode" => $sizeCode,
                                                 "type" => $type,
                                                 "nameProduct" => $nameProduct
                                          );
                                          array_push($result, $temp);
                                          return $result;
                                   }
                                   $obj = array(
                                          "productCode" => $productCode,
                                          "nameProduct" => $nameProduct,
                                          "imgProduct" => $img,
                                          "price" => (float)$price,
                                          "promotion" => (float)$promotion,
                                          "quantityBuy" => (int)$quantityBuy,
                                          "sizeCode" => $sizeCode,
                                          "type" => $type
                                   );
                                   array_push($cartArr, $obj);
                            } else if ($type == 'handbagProduct') {
                                   if ($quantityBuy >= $quantity) {
                                          $temp = array(
                                                 "message" => "notEnoughQuantity",
                                                 "productCode" => $productCode,
                                                 "quantityBuy" => $quantityBuy,
                                                 "sizeCode" => 'null',
                                                 "type" => $type,
                                                 "nameProduct" => $nameProduct
                                          );
                                          array_push($result, $temp);
                                          return $result;
                                   }

                                   $obj = array(
                                          "productCode" => $productCode,
                                          "nameProduct" => $nameProduct,
                                          "imgProduct" => $img,
                                          "price" => (float)$price,
                                          "promotion" => (float)$promotion,
                                          "quantityBuy" => (int)$quantityBuy,
                                          "sizeCode" => 'null',
                                          "type" => $type
                                   );
                                   array_push($cartArr, $obj);
                            }

                            $_SESSION['cart'] = $cartArr;
                            $temp = array(
                                   "message" => "success",
                                   "productCode" => $productCode,
                                   "quantityBuy" => $quantityBuy,
                                   "sizeCode" => $sizeCode,
                                   "type" => $type,
                                   "nameProduct" => $nameProduct
                            );
                            array_push($result, $temp);
                            return $result;
                     } else {
                            $temp = array("message" => "not found item");
                            array_push($result, $temp);
                            return $result;
                     }
              }
       }

       function deleteItemCartInSession($productCode, $sizeCode)
       {
              $result = array();
              if (session_status() == PHP_SESSION_NONE) {
                     session_start();
              }
              if (isset($_SESSION['cart'])) {
                     $cartArr = $_SESSION['cart'];
                     $flag = false; // Sử dụng biến boolean thay vì số nguyên
                     $nameProduct = '';
                     $quantityBuy = '';
                     $type = '';
                     foreach ($cartArr as $index => $item) {
                            if ($item['productCode'] == $productCode) {
                                   $type = $item['type'];
                                   if ($type == 'shirtProduct' && $sizeCode == $item['sizeCode']) {
                                          $nameProduct = $item['nameProduct'];
                                          $quantityBuy = $item['quantityBuy'];

                                          unset($cartArr[$index]); // Xóa phần tử từ mảng
                                          $flag = true;
                                          break; // Dừng vòng lặp sau khi tìm thấy và xóa phần tử
                                   }
                                   if ($type == 'handbagProduct') {
                                          $nameProduct = $item['nameProduct'];
                                          $quantityBuy = $item['quantityBuy'];

                                          unset($cartArr[$index]); // Xóa phần tử từ mảng
                                          $flag = true;
                                          break; // Dừng vòng lặp sau khi tìm thấy và xóa phần tử
                                   }
                            }
                     }
                     if (!$flag) {
                            $temp = array("message" => "notFount");
                            array_push($result, $temp);
                            return $result;
                     } else {
                            // Cập nhật lại chỉ số của các phần tử còn lại trong mảng
                            $cartArr = array_values($cartArr);
                            $_SESSION['cart'] = $cartArr;
                            $temp = array(
                                   "message" => "success",
                                   "productCode" => $productCode,
                                   "nameProduct" => $nameProduct,
                                   "sizeCode" => $sizeCode,
                                   "type" => $type,
                                   "quantityBuy" => $quantityBuy
                            );
                            array_push($result, $temp);
                            return $result;
                     }
              } else {
                     $temp = array("message" => "cart chua duoc khoi tao");
                     array_push($result, $temp);
                     return $result;
              }
       }

       // getArrCart
       function getArrCart()
       {
              if (session_status() == PHP_SESSION_NONE) {
                     session_start();
              }
              $result = array();
              if (isset($_SESSION['cart'])) {
                     $arrCart = $_SESSION['cart'];
                     foreach ($arrCart as $item) {
                            // lay ten sizeCode
                            $nameSize = 'null';
                            if ($item['sizeCode'] != 'null') {
                                   $temp = $this->SizeDAL->getObj($item['sizeCode']);
                                   $nameSize = $temp->getSizeName();
                            }
                            $obj = array(
                                   "productCode" => $item['productCode'],
                                   "nameProduct" => $item['nameProduct'],
                                   "imgProduct" => $item['imgProduct'],
                                   "price" => $item['price'],
                                   "promotion" => $item['promotion'],
                                   "quantityBuy" => $item['quantityBuy'],
                                   "sizeCode" => $item['sizeCode'],
                                   "sizeName" => $nameSize,
                                   "type" => $item['type']
                            );
                            array_push($result, $obj);
                     }
                     return $result;
              } else {

                     $obj = array(
                            "productCode" => '',
                            "nameProduct" => '',
                            "imgProduct" => '',
                            "quantityBuy" => '',
                            "type" => ''
                     );
                     array_push($result, $obj);
                     return $result;
              }
       }

       // làm sạch cart khi không tìm thấy tài khoản
       function clearCart()
       {
              if (session_status() == PHP_SESSION_NONE) {
                     session_start();
              }
              if (isset($_SESSION['username']) == false) {
                     session_start();
                     session_unset();
                     session_destroy();
              }
       }
}

// muc luc
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       $check = new OrderBLL();
       $function = $_POST['function'];

       switch ($function) {
              case 'addCartToSession':
                     $productCode = $_POST['code'];
                     $type = $_POST['type'];
                     $quantityBuy = (int)$_POST['quantityBuy'];
                     $sizeCode = $_POST['sizeCode'];
                     $temp = $check->addCartToSession($productCode, $type, $quantityBuy, $sizeCode);
                     echo json_encode($temp);
                     break;

              case 'getArrCart':
                     $temp = $check->getArrCart();
                     echo json_encode($temp);
                     break;

              case 'clearCart':
                     $check->clearCart();
                     break;

              case 'deleteItemCartInSession':
                     $productCode = $_POST['code'];
                     $sizeCode = $_POST['sizeCode'];
                     $temp = $check->deleteItemCartInSession($productCode, $sizeCode);
                     echo json_encode($temp);
                     break;
              case 'getArrOrder_by_Username':
                     $username = $_POST['username'];
                     $temp = $check->getArrOrder_by_Username($username);
                     echo json_encode($temp);
                     break;
              case 'getArrOrderDetail_by_orderCode':
                     $orderCode = $_POST['orderCode'];
                     $temp = $check->getArrOrderDetail_by_orderCode($orderCode);
                     echo json_encode($temp);
                     break;
       }
}
