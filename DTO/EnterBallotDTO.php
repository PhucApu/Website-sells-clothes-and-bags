<?php

class EnterBallotDTO {
       // Thuộc tính cho mã phiếu nhập
       private $codeBallot;
   
       // Thuộc tính cho ngày nhập phiếu
       private $date;
   
       // Thuộc tính cho tên người dùng thực hiện nhập phiếu
       private $userName;
   
       // Thuộc tính cho tổng số tiền trong phiếu nhập
       private $sumMoney;
   
       // Thuộc tính cho mã nhà cung cấp
       private $codeSupplier;
   
       // Thuộc tính cho trạng thái của phiếu nhập
       private $state;
   
       // Thuộc tính cho ghi chú của phiếu nhập
       private $note;
   
       // Constructor
       public function __construct($codeBallot, $date, $userName, $sumMoney, $codeSupplier, $state, $note) {
           $this->codeBallot = $codeBallot;
           $this->date = $date;
           $this->userName = $userName;
           $this->sumMoney = $sumMoney;
           $this->codeSupplier = $codeSupplier;
           $this->state = $state;
           $this->note = $note;
       }
   
       // Getter và Setter cho $codeBallot
       public function getCodeBallot() {
           return $this->codeBallot;
       }
   
       public function setCodeBallot($codeBallot) {
           $this->codeBallot = $codeBallot;
       }
   
       // Getter và Setter cho $date
       public function getDate() {
           return $this->date;
       }
   
       public function setDate($date) {
           $this->date = $date;
       }
   
       // Getter và Setter cho $userName
       public function getUserName() {
           return $this->userName;
       }
   
       public function setUserName($userName) {
           $this->userName = $userName;
       }
   
       // Getter và Setter cho $sumMoney
       public function getSumMoney() {
           return $this->sumMoney;
       }
   
       public function setSumMoney($sumMoney) {
           $this->sumMoney = $sumMoney;
       }
   
       // Getter và Setter cho $codeSupplier
       public function getCodeSupplier() {
           return $this->codeSupplier;
       }
   
       public function setCodeSupplier($codeSupplier) {
           $this->codeSupplier = $codeSupplier;
       }
   
       // Getter và Setter cho $state
       public function getState() {
           return $this->state;
       }
   
       public function setState($state) {
           $this->state = $state;
       }
   
       // Getter và Setter cho $note
       public function getNote() {
           return $this->note;
       }
   
       public function setNote($note) {
           $this->note = $note;
       }
   }
   