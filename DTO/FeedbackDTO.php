<?php

class FeedbackDTO {
       private $userName;
       private $sentDate;
       private $email;
       private $content;
       private $state;
   
       // Constructor
       public function __construct($userName, $sentDate, $email, $content, $state) {
           $this->userName = $userName;
           $this->sentDate = $sentDate;
           $this->email = $email;
           $this->content = $content;
           $this->state = $state;
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
   }
   