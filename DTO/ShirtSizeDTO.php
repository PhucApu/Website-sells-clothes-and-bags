<?php

class ShirtSizeDTO
{
    // Thuộc tính cho mã kích thước của áo sơ mi
    private $sizeCode;

    // Thuộc tính cho mã sản phẩm của áo sơ mi
    private $productCode;

    private $quanity;

    // Constructor
    public function __construct($sizeCode, $productCode, $quanity)
    {
        $this->sizeCode = $sizeCode;
        $this->productCode = $productCode;
        $this->quanity = $quanity;
    }

    // Getter và Setter cho $sizeCode
    public function getSizeCode()
    {
        return $this->sizeCode;
    }

    public function setSizeCode($sizeCode)
    {
        $this->sizeCode = $sizeCode;
    }

    // Getter và Setter cho $productCode
    public function getProductCode()
    {
        return $this->productCode;
    }

    public function setProductCode($productCode)
    {
        $this->productCode = $productCode;
    }

    // Getter và Setter cho $productCode
    public function getQuanity()
    {
        return $this->quanity;
    }

    public function setQuanity($quanity)
    {
        $this->quanity = $quanity;
    }
}
