<?php

class ShirtSizeDTO {
       // Thuộc tính cho mã kích thước của áo sơ mi
       private $sizeCode;
   
       // Thuộc tính cho mã sản phẩm của áo sơ mi
       private $productCode;
   
       // Constructor
       public function __construct($sizeCode, $productCode) {
           $this->sizeCode = $sizeCode;
           $this->productCode = $productCode;
       }
   
       // Getter và Setter cho $sizeCode
       public function getSizeCode() {
           return $this->sizeCode;
       }
   
       public function setSizeCode($sizeCode) {
           $this->sizeCode = $sizeCode;
       }
   
       // Getter và Setter cho $productCode
       public function getProductCode() {
           return $this->productCode;
       }
   
       public function setProductCode($productCode) {
           $this->productCode = $productCode;
       }
   }
   