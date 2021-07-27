<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
require_once("./api/database.php");
require_once("./api/validation.php");
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
    (isset($json_data["token"])==false) ||
    (empty($json_data["token"])==true)  ||
    (isset($json_data["usertype"])==false) ||
    (empty($json_data["usertype"])==true)
 ){
    
  $data=array();
  $data["code"]="3002";
  $data["message"]="Required fields are not found ";
  echo json_encode($data);
  exit();
       
}

$token=$json_data["token"];
$usertype=$json_data["usertype"];

$objValidation=new Validation();
if(
    ($objValidation->ValidTokenWithUsertype($token,$usertype)==false)
 ){
    $data=array();
    $data["code"]="3003";
    $data["message"]="Token is not valid";
    echo json_encode($data);
    exit();
}
if(
    ($objValidation->ValidToken($token)==true)
 ){
    $data=array();
    $data["code"]="2300";
    $data["message"]="Token is valid";
    echo json_encode($data);
    exit();
}


