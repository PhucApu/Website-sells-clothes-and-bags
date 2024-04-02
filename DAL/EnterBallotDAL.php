<?php

// import
require('../DAL/AbstractionDAL.php');
require('../DTO/EnterBallotDTO.php');

class EnterBallotDAL extends AbstractionDAL
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
              // do có bảng ballotDetail tham chiếu khóa ngoại đến khóa codeBallot của EnterBallot
              // khi xóa môth phiếu nhập thì chi tiết phiếu bên trong nó cũng biến mất 

              // xóa bên bảng chi tiet phieu nhap trước
              $string1 = "DELETE FROM ballotDetail WHERE codeBallot = '$code'";

              // xoa ben bang phieu nhap
              $string2 = "DELETE FROM EnterBallot WHERE codeBallot = '$code'";

              $resutl1 = $this->actionSQL->query($string1);
              $resutl2 = $this->actionSQL->query($string2);

              return $resutl1 === $resutl2;
       }

       // xóa một đối tượng bằng cách truyền đối tượng vào
       function delete($obj)
       {
              if ($obj != null) {
                     $code = $obj->getCodeBallot();
                     // do có bảng ballotDetail tham chiếu khóa ngoại đến khóa codeBallot của EnterBallot
                     // khi xóa môth phiếu nhập thì chi tiết phiếu bên trong nó cũng biến mất 

                     // xóa bên bảng chi tiet phieu nhap trước
                     $string1 = "DELETE FROM ballotDetail WHERE codeBallot = '$code'";

                     // xoa ben bang phieu nhap
                     $string2 = "DELETE FROM EnterBallot WHERE codeBallot = '$code'";

                     $resutl1 = $this->actionSQL->query($string1);
                     $resutl2 = $this->actionSQL->query($string2);

                     return $resutl1 === $resutl2;
              } else {
                     return false;
              }
       }

       // lấy ra mảng các đối tượng
       function getListObj()
       {
              // Mảng để lưu trữ các đối tượng
              $array_list = array();

              // Câu lệnh truy vấn
              $string = 'SELECT * FROM EnterBallot';

              // Thực hiện truy vấn
              $result = $this->actionSQL->query($string);

              // Kiểm tra số hàng được trả về
              if ($result->num_rows > 0) {
                     // Lặp qua các dòng kết quả và thêm vào mảng
                     while ($data = $result->fetch_assoc()) {
                            $codeBallot = $data['codeBallot'];
                            $date = $data['date'];
                            $userName = $data['userName'];
                            $sumMoney = $data['sumMoney'];
                            $codeSupplier = $data['codeSupplier'];
                            $state = $data['state'];
                            $note = $data['note'];

                            // Tạo đối tượng EnterBallotDTO và thêm vào mảng
                            $enterBallot = new EnterBallotDTO($codeBallot, $date, $userName, $sumMoney, $codeSupplier, $state, $note);
                            array_push($array_list, $enterBallot);
                     }
                     return $array_list;
              } else {
                     // Trường hợp không có dữ liệu trả về
                     // echo "Không có dữ liệu được trả về từ truy vấn.";
                     return null;
              }
       }

       // lấy ra một đối tượng dựa theo mã đối tượng
       function getObj($code)
       {
              // Câu lệnh truy vấn
              $string = "SELECT * FROM EnterBallot WHERE codeBallot = '$code'";

              // Thực hiện truy vấn
              $result = $this->actionSQL->query($string);

              if ($result->num_rows > 0) {
                     $data = $result->fetch_assoc();
                     $codeBallot = $data['codeBallot'];
                     $date = $data['date'];
                     $userName = $data['userName'];
                     $sumMoney = $data['sumMoney'];
                     $codeSupplier = $data['codeSupplier'];
                     $state = $data['state'];
                     $note = $data['note'];

                     // Tạo đối tượng EnterBallotDTO và trả về
                     $enterBallot = new EnterBallotDTO($codeBallot, $date, $userName, $sumMoney, $codeSupplier, $state, $note);
                     return $enterBallot;
              } else {
                     // Trường hợp không có dữ liệu trả về
                     // echo "Không có dữ liệu được trả về từ truy vấn.";
                     return null;
              }
       }

       // thêm một đối tượng 
       function addObj($obj)
       {
              if ($obj != null) {
                     $codeBallot = $obj->getCodeBallot();
                     // Kiểm tra xem có bị trùng thuộc tính khóa không
                     $check = "SELECT * FROM EnterBallot WHERE codeBallot = '$codeBallot'";
                     $resultCheck = $this->actionSQL->query($check);

                     if ($resultCheck->num_rows < 1) {
                            $date = $obj->getDate();
                            $userName = $obj->getUserName();
                            $sumMoney = $obj->getSumMoney();
                            $codeSupplier = $obj->getCodeSupplier();
                            $state = $obj->getState();
                            $note = $obj->getNote();

                            // Câu lệnh truy vấn
                            $string = "INSERT INTO EnterBallot (codeBallot, date, userName, sumMoney, codeSupplier, state, note) VALUES ('$codeBallot', '$date', '$userName', '$sumMoney', '$codeSupplier', '$state', '$note')";

                            return $this->actionSQL->query($string);
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
                     $codeBallot = $obj->getCodeBallot();
                     $date = $obj->getDate();
                     $userName = $obj->getUserName();
                     $sumMoney = $obj->getSumMoney();
                     $codeSupplier = $obj->getCodeSupplier();
                     $state = $obj->getState();
                     $note = $obj->getNote();

                     // Câu lệnh UPDATE
                     $string = "UPDATE EnterBallot 
                                 SET date = '$date', 
                                     userName = '$userName', 
                                     sumMoney = '$sumMoney', 
                                     codeSupplier = '$codeSupplier', 
                                     state = '$state', 
                                     note = '$note' 
                                 WHERE codeBallot = '$codeBallot'";

                     return $this->actionSQL->query($string);
              } else {
                     return false;
              }
       }
}

// check

// $check = new EnterBallotDAL();

// print_r($check->getListObj());

// echo $check->getObj('EB001')->getCodeBallot();

// echo $check->addObj(new EnterBallotDTO('test', '2000-02-02', 'PhucApuTruong', 0, 'NCC001', 1, ''));

// echo $check->upadateObj(new EnterBallotDTO('test', '2000-02-02', 'PhucApuTruong', 0, 'NCC002', 1, ''));

// echo $check->delete(new EnterBallotDTO('test', '2000-02-02', 'PhucApuTruong', 0, 'NCC002', 1, ''));
