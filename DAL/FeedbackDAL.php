<?php

// import
require('../DAL/AbstractionDAL.php');
require('../DTO/FeedbackDTO.php');

class FeedbackDAL extends AbstractionDAL
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
              $string = "DELETE FROM feedback WHERE codeFeedback = '$code' ";
              // thuc hien truy suat
              return $this->actionSQL->query($string);
       }

       // xóa một đối tượng bằng cách truyền đối tượng vào
       function delete($obj)
       {
              if ($obj != null) {
                     $code = $obj->getUsername();
                     $string = "DELETE FROM feedback WHERE codeFeedback = '$code' ";
                     // thuc hien truy suat
                     return $this->actionSQL->query($string);
              }
       }

       // lấy ra mảng các đối tượng
       function getListObj()
       {
              // Mảng để lưu trữ các đối tượng
              $array_list = array();

              // Câu lệnh truy vấn
              $string = 'SELECT * FROM feedback';

              // Thực hiện truy vấn
              $result = $this->actionSQL->query($string);

              // Kiểm tra số hàng được trả về
              if ($result->num_rows > 0) {
                     // Lặp qua các dòng kết quả và thêm vào mảng
                     while ($data = $result->fetch_assoc()) {
                            $codeFeedback = $data['codeFeedback'];
                            $userName = $data["userName"];
                            $sentDate = $data["sentDate"];
                            $email = $data["email"];
                            $content = $data["content"];
                            $state = $data["state"];

                            // Tạo đối tượng FeedbackDTO và thêm vào mảng
                            $feedback = new FeedbackDTO($codeFeedback, $userName, $sentDate, $email, $content, $state);
                            array_push($array_list, $feedback);
                     }
                     return $array_list;
              } else {
                     // Trường hợp không có dữ liệu trả về
                     // echo "Không có dữ liệu được trả về từ truy vấn.";
                     return null;
              }
       }

       // lấy ra một đối tượng dựa theo tên người gửi  
       function getObj($code)
       {
              // Câu lệnh truy vấn
              $string = "SELECT * FROM feedback WHERE userName = '$code'";

              // Thực hiện truy vấn
              $result = $this->actionSQL->query($string);

              if ($result->num_rows > 0) {
                     $data = $result->fetch_assoc();
                     $codeFeedback = $data['codeFeedback'];
                     $userName = $data["userName"];
                     $sentDate = $data["sentDate"];
                     $email = $data["email"];
                     $content = $data["content"];
                     $state = $data["state"];

                     // Tạo đối tượng FeedbackDTO và thêm vào mảng
                     $feedback = new FeedbackDTO($codeFeedback, $userName, $sentDate, $email, $content, $state);
                     return $feedback;
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
                     $codeFeedback = $obj->getCodeFeedback();
                     // Kiểm tra xem có bị trùng thuộc tính khóa không
                     $check = "SELECT * FROM feedback WHERE codeFeedback = '$codeFeedback'";
                     $resultCheck = $this->actionSQL->query($check);

                     if ($resultCheck->num_rows < 1) {
                            $userName = $obj->getUsername();
                            $sentDate = $obj->getSentDate();
                            $email = $obj->getEmail();
                            $content = $obj->getContent();
                            $state = $obj->getState();

                            // Câu lệnh truy vấn
                            $string = "INSERT INTO feedback (codeFeedback, userName, sentDate, email, content, state) VALUES ('$codeFeedback', '$userName', '$sentDate', '$email', '$content', '$state')";

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
                     $codeFeedback = $obj->getCodeFeedback();
                     $userName = $obj->getUsername();
                     $sentDate = $obj->getSentDate();
                     $email = $obj->getEmail();
                     $content = $obj->getContent();
                     $state = $obj->getState();

                     // Câu lệnh UPDATE
                     $string = "UPDATE feedback 
                                 SET userName = '$userName', 
                                     sentDate = '$sentDate', 
                                     email = '$email', 
                                     content = '$content', 
                                     state = '$state' 
                                 WHERE codeFeedback = '$codeFeedback'";

                     return $this->actionSQL->query($string);
              } else {
                     return false;
              }
       }
}

// check

// $check = new FeedbackDAL();


// $data = $check->getListobj();

// foreach ($data as $obj) {
//        echo $obj . "<br>";
// }

// $dataobj = $check->getobj('JaneSmith');
// echo $dataobj;

// $feedback = new FeedbackDTO('FB000','JaneSmith','1980-01-01','','','active');

// echo $check->addobj($feedback);

// echo $check->upadateobj($feedback);

// echo $check->deleteByID('FB000');
