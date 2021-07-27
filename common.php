<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
require_once("./api/database.php");
require_once("./api/validation.php");
require_once("./api/common.php");
if($_SERVER["REQUEST_METHOD"]!="POST"){
    $data=array();
    $data["code"]="3001";
    $data["message"]="Requests must be POST";
    echo json_encode($data);
    exit();
}
$json = file_get_contents('php://input');
$json_data=json_decode($json,true);
if(
    (isset($json_data["data"])==false) ||
    (empty($json_data["data"])==true) ||
    (isset($json_data["action"])==false) ||
    (empty($json_data["action"])==true) 
 ){
    
  $data=array();
  $data["code"]="3002";
  $data["message"]="Required fields are not found ";
  echo json_encode($data);
  exit();
       
}

$action=$json_data["action"];
$data=$json_data["data"];

$objValidation=new Validation();

$avaliadle_action=array(
    "change-password"
);

if(
    ($objValidation->validValues($avaliadle_action,$action)==false)
 ){
    $data=array();
    $data["code"]="3006";
    $data["message"]="Can not find requested action";
    echo json_encode($data); 
   exit();
}

$objCommon=new Common();
$objCommon->data=$data;

if($action=="change-password"){
    $objCommon->change_password();
}


?>