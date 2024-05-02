<?php

// gọi các lớp liên quan
require('../DAL/connectionDatabase.php');
require('../DAL/AbstractionDAL.php');

require('../DTO/FeedbackDTO.php');
require('../DAL/FeedbackDAL.php');

// các thử viện liên quan gửi nhận mail.
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('../PHPMailer-master/PHPMailer-master/src/PHPMailer.php');
require('../PHPMailer-master/PHPMailer-master/src/Exception.php');
require('../PHPMailer-master/PHPMailer-master/src/SMTP.php');



class FeedbackBLL
{

       private $FeedbackDAL;

       function __construct()
       {
              $this->FeedbackDAL = new FeedbackDAL();
       }

       // thêm phản hồi bên phía user
       // input: username,email,content
       // output: thong bao 
       function addFeedbackUser($userName, $email, $content)
       {
              
              // Tạo chuỗi 'FB' cố định
              $feedbackPrefix = 'FB';

              // Tạo một số duy nhất dựa trên thời gian hiện tại và số micro giây
              $feedbackNumber = uniqid('');

              // Kết hợp chuỗi 'FB' với số duy nhất để tạo ra chuỗi hoàn chỉnh
              $feedbackID = $feedbackPrefix . $feedbackNumber;

              $dateCreated = date('Y-m-d');
              

              $objFeedback = new FeedbackDTO($feedbackID, $userName, $dateCreated, $email, $content, 'null');

              $result = $this->FeedbackDAL->addObj($objFeedback);

              if ($result == true) {
                     // Tạo một đối tượng PHPMailer
                     $mail = new PHPMailer(true);

                     try {
                            // Cài đặt thông tin máy chủ SMTP
                            $mail->isSMTP();
                            $mail->Host = 'smtp.gmail.com';  // SMTP server của Gmail
                            $mail->SMTPAuth = true;
                            $mail->Username = 'truongphuc056@gmail.com'; // Địa chỉ email của bạn
                            $mail->Password = 'ppgkknqsnqztvuuf'; // Mật khẩu email của bạn
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Sử dụng SSL hoặc TLS
                            $mail->Port = 587; // Cổng SMTP của Gmail

                            // Thiết lập thông tin người gửi và người nhận
                            $mail->setFrom('truongphuc056@gmail.com', 'MINIMAL'); // Địa chỉ email và tên người gửi
                            $mail->addAddress($email, $userName); // Địa chỉ email và tên người nhận

                            // Thiết lập tiêu đề và nội dung email
                            $mail->Subject = 'Thank you for your response';
                            $mail->Body = 'We will respond as quickly as possible, your contributions help the website become more and more complete.';

                            // Gửi email
                            if($mail->send()){
                                   return array(
                                          "codeFeedback" => $feedbackID,
                                          "userName" => $userName,
                                          "senDate" => $dateCreated,
                                          "content" => $content,
                                          "replay" => 'null',
                                          "mess" => "success"
                                   );
                            }else{
                                   return array(
                                          "mess" => "failus to send mail"
                                   );
                            }
                            
                     } catch (Exception $e) {
                            return array(
                                   "mess" => "failus to send mail ! Exception"
                            );
                     }
              }else{
                     return array("mess"=>"failus to add feedback");
              }
       }


}

header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       $check = new FeedbackBLL();

       $function = $_POST['function'];

       switch($function){
              case 'addFeedbackUser':
                     $username = $_POST['username'];
                     $email = $_POST['email'];
                     $content = $_POST['content'];
                     $temp = $check->addFeedbackUser($username,$email,$content);
                     echo json_encode($temp);
                     break;
       }
}
