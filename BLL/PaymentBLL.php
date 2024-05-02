<?php
// gọi các lớp liên quan
require('../DAL/connectionDatabase.php');
require('../DAL/AbstractionDAL.php');


require('../DTO/PaymentDTO.php');

require('../DAL/PaymentDAL.php');

class PaymentBLL
{
       private $PaymentDAL;

       function __construct()
       {
              $this->PaymentDAL = new PaymentDAL();
       }

       // lấy mảng đối tượng payment
       function getArrObj()
       {

              // 
              $arr = $this->PaymentDAL->getListObj();

              $result = array();
              if (count($arr) > 0) {
                     foreach ($arr as $item) {
                            $namePayment = $item->getNamePayment();
                            $codePayments = $item->getCodePayments();
                            $affiliatedBank = $item->getAffiliatedBank();

                            $obj = array(
                                   "namePayment" => $namePayment,
                                   "codePayments" => $codePayments,
                                   "affiliatedBank" => $affiliatedBank,
                                   "mess" => "success"
                            );
                            array_push($result, $obj);
                     }
                     return $result;
              } else {
                     return array(
                            "mess" => "empty"
                     );
              }
       }
       // lấy 1 đối tượng bằng mã id cửa đối tượng đó
       function getObj($code)
       {
              $result = $this->PaymentDAL->getObj($code);
              if ($result != null) {
                     $codePayments = $result->getCodePayments();
                     $namePayment = $result->getNamePayment();
                     $affiliatedBank = $result->getAffiliatedBank();
                     $obj = array(
                            "namePayment" => $namePayment,
                            "codePayments" => $codePayments,
                            "affiliatedBank" => $affiliatedBank,
                            "mess" => "success"
                     );
                     return $obj;
              } else {
                     return array("mess" => "notFound");
              }
       }
       // Xóa một đối tượng sau khi lấy được id của đối tượng
       function deleteObjById($code)
       {
              $result = $this->PaymentDAL->deleteByID($code);

              if ($result) {
                     return array("mess" => "success");
              } else {
                     return array("mess" => "failed");
              }
       }



       //Thêm một đối tượng payment sau khi truyền vào một obj
       function addPaymentByObj($obj)
       {
              if ($obj != null) {
                     // lấy thông tin từ đối tượng
                     $namePayment = $obj->getNamePayment();
                     $codePayments = $obj->getCodePayments();
                     $affiliatedBank = $obj->getAffiliatedBank();
                     // Thực hiện thêm đối tượng trong CSDL
                     $result  = $this->PaymentDAL->addObj($obj);
                     if ($result == true) {
                            return array(
                                   "codePayments" => $codePayments,
                                   "namePayments" => $namePayment,
                                   "affiliateBank" => $affiliatedBank,
                                   "mess" => "success"
                            );
                     } else {
                            return array("mess" => "failed");
                     }
              }
              return array("mess" => "failed");
       }

       // Cập nhật một đối tượng payment sau khi truyền vào một obj
       function updatePaymentByObj($obj)
       {
              if ($obj != null) {
                     // Cập nhật lại trong CSDl
                     $result = $this->PaymentDAL->upadateObj($obj);
                     if ($result) {
                            return array("mess" => "success");
                     } else {
                            return array("mess" => "failed");
                     }
              }
              return array("mess" => "failed");
       }
}



// mục lục
header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       $check = new PaymentBLL();

       $function = $_POST['function'];
       // checkLogin
       // menu
       switch ($function) {
              case 'getArrObj':
                     $temp = $check->getArrObj();
                     echo json_encode($temp);
                     break;
              case 'deletObjById':
                     $codePayments = $_POST['codePayments'];
                     $temp = $check->deleteObjById($codePayments);
                     echo json_encode($temp);
                     break;
              case 'addPaymentByObj':
                     // Lấy dữ liệu đối tượng từ POST request
                     $namePayment = $_POST['namePayment'];
                     $codePayments = $_POST['codePayments'];
                     $affiliatedBank = $_POST['affiliatedBank'];
                     // Tạo một đối tượng PaymentDTO từ dữ liệu POST
                     $obj = new PaymentDTO($namePayment, $codePayments, $affiliatedBank);
                     $temp = $check->addPaymentByObj($obj);
                     echo json_encode($temp);
                     break;
              case 'updatePaymentByObj':
                     // Lấy dữ liệu đối tượng từ POST request
                     $namePayment = $_POST['namePayment'];
                     $codePayments = $_POST['codePayments'];
                     $affiliatedBank = $_POST['affiliatedBank'];
                     // Tạo một đối tượng PaymentDTO từ dữ liệu POST
                     $obj = new PaymentDTO($namePayment, $codePayments, $affiliatedBank);
                     $temp = $check->updatePaymentByObj($obj);
                     echo json_encode($temp);
                     break;
       }
}
