<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
require_once("./api/database.php");
require_once("./api/validation.php");
require_once("./api/student.php");
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
  ($objValidation->isStudent($userid)==false)
 ){
    $data=array();
    $data["code"]="3009";
    $data["message"]="You are not student";
    echo json_encode($data); 
    exit();
}

$avaliadle_action=array(
    "student-info",
    "request-break",
    "delete-break" ,
    "student-checkbreaklist",
    "student-breaklist"
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

$objStudent=new Student();
$objStudent->userid=$userid;
$objStudent->data=$data;

if($action=="student-info"){
    $objStudent->student_info();
}

if($action=="request-break"){
    $objStudent->request_break();
}

if($action=="delete-break"){
    $objStudent->delete_break();
}

if($action=="student-checkbreaklist"){
    $objStudent->getCheckAndBreakList();
}


if($action=="student-breaklist"){
    $objStudent->breaks_list();
}


?>