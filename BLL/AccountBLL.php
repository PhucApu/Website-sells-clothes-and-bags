<?php

// gọi các lớp liên quan
require('../DAL/connectionDatabase.php');
require('../DAL/AbstractionDAL.php');

require('../DTO/AccountDTO.php');

require('../DAL/AccountDAL.php');

class AccountBLL
{
       private $AccountDAL;

       function __construct()
       {
              $this->AccountDAL = new AccountDAL();
       }

       // check login
       function checkLogin()
       {
              if (session_status() == PHP_SESSION_NONE) {
                     session_start();
              }

              $result = array();

              if (isset($_SESSION['result']) && $_SESSION['result'] == "success") {
                     $obj = array(
                            "userName" => $_SESSION['username'],
                            "passWord" => $_SESSION['passWord'],
                            "dateCreate" => $_SESSION['dateCreate'],
                            "accountStatus" => $_SESSION['accountStatus'],
                            "name" => $_SESSION['name'],
                            "address" => $_SESSION['address'],
                            "email" => $_SESSION['email'],
                            "phoneNumber" => $_SESSION['phoneNumber'],
                            "birth" => $_SESSION['birth'],
                            "sex" => $_SESSION['sex'],
                            "codePermission" => $_SESSION['codePermission'],
                            "result" => "success"
                     );
                     $result[] = $obj;
              } else {
                     $_SESSION['result'] = "notFound";
                     $obj = array("result" => "notFound");
                     $result[] = $obj;
              }

              return $result;
       }
       // check username
       function checkUserName($userName)
       {
              $user = $this->AccountDAL->getobj($userName);
              $result = array();
              if ($user == null) {
                     $obj = array(
                            "result" => "notFound"
                     );
                     array_push($result, $obj);
                     return $result;
              } else {
                     $obj = array(
                            "result" => "success"
                     );
                     array_push($result, $obj);
                     return $result;
              }
       }

       // login
       function login($userName, $passWord)
       {
              // truy suất tài khoản trong csdl dựa theo userName
              $user = $this->AccountDAL->getobj($userName);
              $result = array();
              // 5 trường hợp
              // đăng nhập sai pass
              // Đăng nhập thành công và quyền là user
              // Đăng nhập thanh công và quyền la admin
              // Đăng nhập không thành công do tài khoản bị khóa
              // Đăng nhập không thành công do chưa có tài khoản

              // kiểm tra xem kết quả truy suất có trả về null không
              // nếu có -> chưa có tài khoản
              if ($user != null) {

                     // nếu đăng nhập không sai pass
                     if ($user->getUsername() === $userName && $user->getPassword() === $passWord) {
                            // lấy thông tin thuộc tính user
                            $dateCreate = $user->getDateCreate();
                            $accountStatus = $user->getAccountStatus();
                            $name = $user->getName();
                            $address = $user->getAddress();
                            $email = $user->getEmail();
                            $phoneNumber = $user->getPhoneNumber();
                            $birth = $user->getBirth();
                            $sex = $user->getSex();
                            $codePermission = $user->getCodePermission();
                            if ($accountStatus === '1') {

                                   // start session
                                   if (session_start()) {
                                          $_SESSION['username'] = $userName;
                                          $_SESSION['passWord'] = $passWord;
                                          $_SESSION['dateCreate'] = $dateCreate;
                                          $_SESSION['accountStatus'] = $accountStatus;
                                          $_SESSION['name'] = $name;
                                          $_SESSION['address'] = $address;
                                          $_SESSION['email'] = $email;
                                          $_SESSION['phoneNumber'] = $phoneNumber;
                                          $_SESSION['birth'] = $birth;
                                          $_SESSION['sex'] = $sex;
                                          $_SESSION['codePermission'] = $codePermission;
                                          $_SESSION['result'] = "success";
                                   }
                                   $obj = array(
                                          "userName" => $userName,
                                          "passWord" => $passWord,
                                          "dateCreate" => $dateCreate,
                                          "accountStatus" => $accountStatus,
                                          "name" => $name,
                                          "address" => $address,
                                          "email" => $email,
                                          "phoneNumber" => $phoneNumber,
                                          "birth" => $birth,
                                          "sex" => $sex,
                                          "codePermission" => $codePermission,
                                          "result" => "success"

                                   );
                                   array_push($result, $obj);
                                   return $result;
                            } else {
                                   $obj = array(
                                          "result" => "block"
                                   );
                                   array_push($result, $obj);
                                   return $result;
                            }
                     } else {
                            $obj = array(
                                   "result" => "wrongPass"
                            );
                            array_push($result, $obj);
                            return $result;
                     }
              } else {
                     $obj = array(
                            "result" => "notFound"
                     );
                     array_push($result, $obj);
                     return $result;
              }
       }
       // thêm một tài khoản vào database
       function addAccount($userName, $passWord, $dateCreate, $accountStatus, $name, $address, $email, $phoneNumber, $birth, $sex, $codePermission)
       {
              $obj = new AccountDTO($userName, $passWord, $dateCreate, $accountStatus, $name, $address, $email, $phoneNumber, $birth, $sex, $codePermission);
              $result = array();
              $check = $this->AccountDAL->addobj($obj);
              if ($check == true) {
                     $obj = array(
                            "result" => "success"
                     );
                     array_push($result, $obj);
                     return $result;
              } else {
                     $obj = array(
                            "result" => "false"
                     );
                     array_push($result, $obj);
                     return $result;
              }
       }
       
       // sửa một tài khoản
       // input: các thuộc tính của account
       // output: thông tin tài khoản sau khi sửa
       function updateAccount($userName, $passWord, $dateCreate, $accountStatus, $name, $address, $email, $phoneNumber, $birth, $sex, $codePermission){
              $obj = new AccountDTO($userName, $passWord, $dateCreate, $accountStatus, $name, $address, $email, $phoneNumber, $birth, $sex, $codePermission);

              $check = $this->AccountDAL->upadateObj($obj);
              if($check == true){
                     return array(
                            "mess" => "success"
                     );
              }else{
                     return array(
                            "mess" => "failus"
                     );
              }
       }

       // lấy một tài khoản theo mã tài khoản
       function getObjAccount($userName){
              $obj = $this->AccountDAL->getobj($userName);
              if($obj != null){
                     return array(
                            "userName" => $obj->getUsername(),
                            "passWord" => $obj->getPassword(),
                            "dateCreate" => $obj->getDateCreate(),
                            "accountStatus" => $obj->getAccountStatus(),
                            "name" => $obj->getName(),
                            "address" => $obj->getAddress(),
                            "email" => $obj->getEmail(),
                            "phoneNumber" => $obj->getPhoneNumber(),
                            "birth" => $obj->getBirth(),
                            "sex" => $obj->getSex(),
                            "codePermission" => $obj->getCodePermission(),
                            "result" => "success"
                     );
              }
              else{
                     return array(
                            "result" => "notFound"
                     );
              }
       }

       // tự động logout khi người dùng thoát web đột ngột
       function logout_whenExitPage()
       {
              session_start();
              session_unset();
              session_destroy();

              return array();
       }
}

// menu

header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

       $check = new AccountBLL();
       // lấy tên chức năng

       $function = $_POST['function'];

       switch ($function) {
              case 'login':
                     $userName = $_POST['userName'];
                     $passWord = $_POST['passWord'];
                     $temp = $check->login($userName, $passWord);
                     echo json_encode($temp);
                     break;
              case 'checkLogin':
                     $temp = $check->checkLogin();
                     echo json_encode($temp);
                     break;
              case 'logout_whenExitPage':
                     $temp = $check->logout_whenExitPage();
                     echo json_encode($temp);
                     break;
              case 'checkUserName':
                     $userName = $_POST['userName'];
                     $temp = $check->checkUserName($userName);
                     echo json_encode($temp);
                     break;
              case 'addAccount':
                     $userName = $_POST['userName'];
                     $passWord = $_POST['passWord'];
                     $dateCreate = $_POST['dateCreate'];
                     $accountStatus = $_POST['accountStatus'];
                     $name = $_POST['name'];
                     $address = $_POST['address'];
                     $email = $_POST['email'];
                     $phoneNumber = $_POST['phoneNumber'];
                     $birth = $_POST['birth'];
                     $sex = $_POST['sex'];
                     $codePermission = $_POST['codePermission'];
                     $temp = $check->addAccount($userName, $passWord, $dateCreate, $accountStatus, $name, $address, $email, $phoneNumber, $birth, $sex, $codePermission);
                     echo json_encode($temp);
                     break;
              case 'updateAccount':
                     $userName = $_POST['userName'];
                     $passWord = $_POST['passWord'];
                     $dateCreate = $_POST['dateCreate'];
                     $accountStatus = $_POST['accountStatus'];
                     $name = $_POST['name'];
                     $address = $_POST['address'];
                     $email = $_POST['email'];
                     $phoneNumber = $_POST['phoneNumber'];
                     $birth = $_POST['birth'];
                     $sex = $_POST['sex'];
                     $codePermission = $_POST['codePermission'];
                     $temp = $check->updateAccount($userName, $passWord, $dateCreate, $accountStatus, $name, $address, $email, $phoneNumber, $birth, $sex, $codePermission);
                     echo json_encode($temp);
                     break;
              case 'getObjAccount':
                     $userName = $_POST['userName'];
                     $temp = $check->getObjAccount($userName);
                     echo json_encode($temp);
                     break;
       }
}
