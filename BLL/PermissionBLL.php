<?php
// gọi các lớp liên quan
require('../DAL/connectionDatabase.php');
require('../DAL/AbstractionDAL.php');

require('../DTO/PermissionDTO.php');
require('../DTO/PermissionsDetailDTO.php');
require('../DTO/FunctionsDTO.php');

require('../DAL/PermissionDAL.php');
require('../DAL/PermissionsDetailDAL.php');
require('../DAL/FunctionsDAL.php');

class PermissionBLL{

       private $PermissionDAL;
       private $PermissionsDetailDAL;
       private $FunctionsDAL;
       function __construct(){
              $this->PermissionDAL = new PermissionDAL();
              $this->PermissionsDetailDAL = new PermissionsDetailDAL();
              $this->FunctionsDAL = new FunctionsDAL();
       }

       // lấy mảng chứa permissionDAL
       function getArrPermission(){
              $arr = $this->PermissionDAL->getListObj();
              $result = array();
              if(count($arr) > 0){
                     foreach($arr as $item){
                            
                     }
              }
       }
}