<?php

abstract class AbstractionDAL
{
       public $conn = null;
       public function __construct()
       {
              $conectionDATA = new ConnectionDatabase();
              $this->conn = $conectionDATA->getConn();
       }

       // xóa một đối tượng bởi mã đối tượng 
       abstract function deleteByID($code);

       // xóa một đối tượng bằng cách truyền đối tượng vào
       abstract function delete($obj);

       // lấy ra mảng các đối tượng
       abstract function getListObj();

       // lấy ra một đối tượng dựa theo mã đối tượng
       abstract function getObj($code);

       // thêm một đối tượng 
       abstract function addObj($Obj);

       // sửa một đối tượng
       abstract function upadateObj($Obj);
}
