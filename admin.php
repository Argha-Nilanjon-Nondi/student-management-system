<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
require_once("./api/database.php");
require_once("./api/validation.php");
require_once("./api/admin.php");
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
    (isset($json_data["action"])==false) ||
    (isset($json_data["data"])==false) ||
    (empty($json_data["token"])==true) ||
    (empty($json_data["action"])==true)
 ){
    
  $data=array();
  $data["code"]="3002";
  $data["message"]="Required fields are not found ";
  echo json_encode($data);
  exit();
       
}

$token=$json_data["token"];
$action=$json_data["action"];
$data=$json_data["data"];

$objValidation=new Validation();
if(
    ($objValidation->ValidToken($token)==false)
 ){
    $data=array();
    $data["code"]="3003";
    $data["message"]="Token is not valid";
    echo json_encode($data);
    exit();
}

$userid=$objValidation->tokenToId($token);

if(
    ($objValidation->validID($userid)==false)
   ){
      $data=array();
      $data["code"]="3051";
      $data["message"]="Id is not valid";
      echo json_encode($data); 
      exit();
}

if(
  ($objValidation->isAdmin($userid)==false)
 ){echo $userid;
    $data=array();
    $data["code"]="3007";
    $data["message"]="You are not admin";
    echo json_encode($data); 
    exit();
}

$avaliadle_action=array(
    "add-student",
    "add-teacher",
    "teacher-list",
    "teacher-update",
    "teacher-profile",
    "user-delete",
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

$objAdmin=new Admin();
$objAdmin->data=$data;

if($action=="add-teacher"){
    $objAdmin->add_teacher();
}

if($action=="add-student"){
    $objAdmin->add_student();
}

if($action=="teacher-list"){
    $objAdmin->teacher_list();
}

if($action=="teacher-update"){
    $objAdmin->teacher_update();
}

if($action=="teacher-profile"){
    $objAdmin->teacher_profile();
}

if($action=="user-delete"){
    $objAdmin->user_delete();
}

if($action=="change-password"){
    $objAdmin->change_password();
}

?>