<?php
// import
require('./AbstractionDAL.php');
require('../DTO/ballotDetailDTO.php');

class BallotDetailDAL extends AbstractionDAL
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
              // do bảng không có khóa chính
       }

       // xóa một đối tượng bằng cách truyền đối tượng vào
       function delete($obj)
       {
              if ($obj != null) {
                     $codeBallot = $obj->getCodeBallot();
                     $productCode = $obj->getProductCode();

                     $check = "DELETE FROM BallotDetail WHERE codeBallot = '$codeBallot' AND productCode = '$productCode'";

                     return $this->actionSQL->query($check);
              } else {
                     return false;
              }
       }

       // lấy ra mảng các đối tượng
       function getListObj()
       {
              // Câu lệnh truy vấn
              $query = "SELECT * FROM BallotDetail";

              // Thực hiện truy vấn
              $result = $this->actionSQL->query($query);

              // Kiểm tra số hàng được trả về
              if ($result->num_rows > 0) {
                     $ballotDetails = array();

                     // Lặp qua từng hàng kết quả và tạo đối tượng BallotDetailDTO
                     while ($data = $result->fetch_assoc()) {
                            $codeBallot = $data["codeBallot"];
                            $productCode = $data["productCode"];
                            $quantity = $data["quantity"];
                            $priceProduct = $data["priceProduct"];
                            $sumMoney = $data["sumMoney"];

                            // Tạo đối tượng BallotDetailDTO
                            $ballotDetail = new BallotDetailDTO($codeBallot, $productCode, $quantity, $priceProduct, $sumMoney);

                            // Thêm đối tượng vào mảng
                            $ballotDetails[] = $ballotDetail;
                     }

                     return $ballotDetails;
              } else {
                     // Trường hợp không có dữ liệu trả về
                     // echo "Không có dữ liệu được trả về từ truy vấn.";
                     return array();
              }
       }

       // lấy ra một đối tượng dựa theo mã đối tượng
       function getObj($code)
       {
              // do bảng không có khóa chính nên không thể lấy một đối tượng cụ thể
       }

       function getArrByCodeballot($code)
       {

              $query = "SELECT * FROM BallotDetail WHERE codeBallot = '$code'";

              // Thực hiện truy vấn
              $result = $this->actionSQL->query($query);

              // Kiểm tra số hàng được trả về
              if ($result->num_rows > 0) {
                     $ballotDetails = array();

                     // Lặp qua từng hàng kết quả và tạo đối tượng BallotDetailDTO
                     while ($data = $result->fetch_assoc()) {
                            $codeBallot = $data["codeBallot"];
                            $productCode = $data["productCode"];
                            $quantity = $data["quantity"];
                            $priceProduct = $data["priceProduct"];
                            $sumMoney = $data["sumMoney"];

                            // Tạo đối tượng BallotDetailDTO
                            $ballotDetail = new BallotDetailDTO($codeBallot, $productCode, $quantity, $priceProduct, $sumMoney);

                            // Thêm đối tượng vào mảng
                            $ballotDetails[] = $ballotDetail;
                     }

                     return $ballotDetails;
              } else {
                     // Trường hợp không có dữ liệu trả về
                     // echo "Không có dữ liệu được trả về từ truy vấn.";
                     return array();
              }
       }

       // thêm một đối tượng 
       function addObj($obj)
       {
              if ($obj != null) {
                     $codeBallot = $obj->getCodeBallot();
                     $productCode = $obj->getProductCode();
                     // Kiểm tra xem có bị trùng thuộc tính khóa không
                     $check = "SELECT * FROM BallotDetail WHERE codeBallot = '$codeBallot' AND productCode = '$productCode'";
                     $resultCheck = $this->actionSQL->query($check);

                     if ($obj != null && $resultCheck->num_rows < 1) {

                            $quantity = $obj->getQuantity();
                            $priceProduct = $obj->getPriceProduct();
                            $sumMoney = $obj->getSumMoney();

                            // Câu lệnh truy vấn
                            $query = "INSERT INTO BallotDetail (codeBallot, productCode, quantity, priceProduct, sumMoney) VALUES ('$codeBallot', '$productCode', $quantity, $priceProduct, $sumMoney)";

                            return $this->actionSQL->query($query);
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
                     $productCode = $obj->getProductCode();
                     $quantity = $obj->getQuantity();
                     $priceProduct = $obj->getPriceProduct();
                     $sumMoney = $obj->getSumMoney();

                     // Câu lệnh UPDATE
                     $query = "UPDATE BallotDetail 
                                SET productCode = '$productCode', 
                                    quantity = $quantity, 
                                    priceProduct = $priceProduct, 
                                    sumMoney = $sumMoney
                                WHERE codeBallot = '$codeBallot' AND productCode = '$productCode'";

                     return $this->actionSQL->query($query);
              } else {
                     return false;
              }
       }
}

// check

$check = new BallotDetailDAL();

// print_r($check->getListObj());

// print_r($check->getArrByCodeballot('EB001'));

// echo $check->addObj(new BallotDetailDTO('EB001', 'P003', 10, 0, 0));

// echo $check->upadateObj(new BallotDetailDTO('EB001', 'P003', 10, 0, 10));

// echo $check->delete(new BallotDetailDTO('EB001', 'P003', 10, 0, 10));