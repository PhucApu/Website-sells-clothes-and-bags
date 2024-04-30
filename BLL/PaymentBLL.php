<?php
// gọi các lớp liên quan
require('../DAL/connectionDatabase.php');
require('../DAL/AbstractionDAL.php');
//

require('../DTO/PaymentDTO.php');

require('../DAL/PaymentDAL.php');

class PaymentBLL{
       private $PaymentDAL;

       function __construct()
       {
              $this->PaymentDAL = new PaymentDAL();
       }

       // lấy mảng đối tượng payment
       function getArrObj(){

              // 
              $arr = $this->PaymentDAL->getListObj();

              $result = array();
              if(count($arr) > 0){
                     foreach($arr as $item){
                            $namePayment = $item->getNamePayment();
                            $codePayments = $item->getCodePayments();
                            $affiliatedBank = $item->getAffiliatedBank();

                            $obj = array(
                                   "namePayment" => $namePayment,
                                   "codePayments" => $codePayments,
                                   "affiliatedBank" => $affiliatedBank
                            );
                            array_push($result,$obj);
                     }
                     return $result;
              }else{
                     return array(
                            "mess" => "empty"
                     );
              }
       }
}

// mục lục
header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
       $check = new PaymentBLL();

       $function = $_POST['function'];
       // checkLogin
       // menu
       switch($function){
              case 'getArrObj':
                     $temp = $check->getArrObj();
                     echo json_encode($temp);
                     break;
              
       }
}

