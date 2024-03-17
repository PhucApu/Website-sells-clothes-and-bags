<?php

class HandbagProduct extends ProductDTO {
       // Thuộc tính cho chất liệu của túi xách
       private $bagMaterial;
   
       // Thuộc tính cho mã kích thước của túi xách
       private $sizeCode;
   
       // Constructor
       public function __construct($productCode, $imgProduct, $nameProduct, $supplierCode, $quantity, $describe, $status,$color, $targetGender, $price, $bagMaterial, $sizeCode) {
           // Gọi constructor của lớp cha (Product)
           parent::__construct($productCode, $imgProduct, $nameProduct, $supplierCode, $quantity, $describe, $status,$color, $targetGender, $price);
   
           // Thiết lập các thuộc tính mới của HandbagProduct
           $this->bagMaterial = $bagMaterial;
           $this->sizeCode = $sizeCode;
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
   
       
   }
   