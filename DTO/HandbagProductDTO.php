<?php

class HandbagProduct extends ProductDTO {
       // Thuộc tính cho chất liệu của túi xách
       private $bagMaterial;
   
       // Thuộc tính cho mã kích thước của túi xách
       private $sizeCode;
   
       // Thuộc tính cho màu sắc của túi xách
       private $color;
   
       // Constructor
       public function __construct($productCode, $imgProduct, $nameProduct, $supplierCode, $quantity, $describe, $status, $targetGender, $price, $bagMaterial, $sizeCode, $color) {
           // Gọi constructor của lớp cha (Product)
           parent::__construct($productCode, $imgProduct, $nameProduct, $supplierCode, $quantity, $describe, $status, $targetGender, $price);
   
           // Thiết lập các thuộc tính mới của HandbagProduct
           $this->bagMaterial = $bagMaterial;
           $this->sizeCode = $sizeCode;
           $this->color = $color;
       }
   
       // Getter và Setter cho $bagMaterial
       public function getBagMaterial() {
           return $this->bagMaterial;
       }
   
       public function setBagMaterial($bagMaterial) {
           $this->bagMaterial = $bagMaterial;
       }
   
       // Getter và Setter cho $sizeCode
       public function getSizeCode() {
           return $this->sizeCode;
       }
   
       public function setSizeCode($sizeCode) {
           $this->sizeCode = $sizeCode;
       }
   
       // Getter và Setter cho $color
       public function getColor() {
           return $this->color;
       }
   
       public function setColor($color) {
           $this->color = $color;
       }
   }
   