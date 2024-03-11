<?php

class BallotDetailDTO {
       // Thuộc tính cho mã phiếu nhập
       private $codeBallot;
   
       // Thuộc tính cho mã sản phẩm
       private $productCode;
   
       // Thuộc tính cho số lượng sản phẩm trong phiếu nhập
       private $quantity;

       // Thuộc tính giá từng sản phẩm
       private $priceProduct;
   
       // Thuộc tính cho tổng số tiền của sản phẩm trong phiếu nhập
       private $sumMoney;
   
       // Constructor
       public function __construct($codeBallot, $productCode, $quantity,$priceProduct) {
           $this->codeBallot = $codeBallot;
           $this->productCode = $productCode;
           $this->quantity = $quantity;
           $this->priceProduct = $priceProduct;
           $this->sumMoney = 0;
       }

       // tinh tong tien
       public function sumMoney(){
              $this->sumMoney = $this->quantity * $this->priceProduct;
       }
   
       // Getter và Setter cho $codeBallot
       public function getCodeBallot() {
           return $this->codeBallot;
       }
   
       public function setCodeBallot($codeBallot) {
           $this->codeBallot = $codeBallot;
       }
   
       // Getter và Setter cho $productCode
       public function getProductCode() {
           return $this->productCode;
       }
   
       public function setProductCode($productCode) {
           $this->productCode = $productCode;
       }
   
       // Getter và Setter cho $quantity
       public function getQuantity() {
           return $this->quantity;
       }
   
       public function setQuantity($quantity) {
           $this->quantity = $quantity;
       }
   
       // Getter và Setter cho $sumMoney
       public function getSumMoney() {
           return $this->sumMoney;
       }
   
       public function setSumMoney($sumMoney) {
           $this->sumMoney = $sumMoney;
       }
   }
   