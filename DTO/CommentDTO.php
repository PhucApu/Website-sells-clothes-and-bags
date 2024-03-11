<?php

class CommentDTO {
       // Thuộc tính cho tên người dùng
       private $userName;
   
       // Thuộc tính cho ngày gửi
       private $sentDate;
   
       // Thuộc tính cho địa chỉ email
       private $email;
   
       // Thuộc tính cho nội dung comment
       private $content;
   
       // Thuộc tính cho trạng thái comment (approved, pending, rejected, etc.)
       private $state;
   
       // Thuộc tính cho số lượt thích
       private $likeNumber;
   
       // Thuộc tính cho số lượt không thích
       private $dislikeNumber;
   
       // Constructor
       public function __construct($userName, $sentDate, $email, $content, $state, $likeNumber, $dislikeNumber) {
           $this->userName = $userName;
           $this->sentDate = $sentDate;
           $this->email = $email;
           $this->content = $content;
           $this->state = $state;
           $this->likeNumber = $likeNumber;
           $this->dislikeNumber = $dislikeNumber;
       }
   
       // Getter và Setter cho $userName
       public function getUserName() {
           return $this->userName;
       }
   
       public function setUserName($userName) {
           $this->userName = $userName;
       }
   
       // Getter và Setter cho $sentDate
       public function getSentDate() {
           return $this->sentDate;
       }
   
       public function setSentDate($sentDate) {
           $this->sentDate = $sentDate;
       }
   
       // Getter và Setter cho $email
       public function getEmail() {
           return $this->email;
       }
   
       public function setEmail($email) {
           $this->email = $email;
       }
   
       // Getter và Setter cho $content
       public function getContent() {
           return $this->content;
       }
   
       public function setContent($content) {
           $this->content = $content;
       }
   
       // Getter và Setter cho $state
       public function getState() {
           return $this->state;
       }
   
       public function setState($state) {
           $this->state = $state;
       }
   
       // Getter và Setter cho $likeNumber
       public function getLikeNumber() {
           return $this->likeNumber;
       }
   
       public function setLikeNumber($likeNumber) {
           $this->likeNumber = $likeNumber;
       }
   
       // Getter và Setter cho $dislikeNumber
       public function getDislikeNumber() {
           return $this->dislikeNumber;
       }
   
       public function setDislikeNumber($dislikeNumber) {
           $this->dislikeNumber = $dislikeNumber;
       }
   
       // Phương thức tăng số lượt thích
       public function increaseLike() {
           $this->likeNumber++;
       }
   
       // Phương thức tăng số lượt không thích
       public function increaseDislike() {
           $this->dislikeNumber++;
       }
   
       // Phương thức tính tổng số lượt đánh giá (thích và không thích)
       public function getTotalRating() {
           return $this->likeNumber + $this->dislikeNumber;
       }
   }
   