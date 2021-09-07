<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
require_once("./api/database.php");
require_once("./api/validation.php");
require_once("./api/admin.php");
require_once("./api/teacher.php");
function validation_at_first(){
if($_SERVER["REQUEST_METHOD"]!="POST"){
    $data=array();
    $data["code"]="3001";
    $data["message"]="Requests must be POST";
    echo json_encode($data);
    return 0;
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
  return 0;
       
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
    return 0;
}

$userid=$objValidation->tokenToId($token);


if(
    ($objValidation->validID($userid)==false)
   ){
      $data=array();
      $data["code"]="3051";
      $data["message"]="Id is not valid";
      echo json_encode($data); 
      return 0;
}

if(
  ($objValidation->isTeacher($userid)==false)
 ){
    $data=array();
    $data["code"]="3004";
    $data["message"]="You are not Teacher";
    echo json_encode($data); 
    return 0;
}

$avaliadle_action=array("add-student",
     "update-student",
     "student-list",
     "create-checkin",
     "create-checkout",
     "update-checkin",
     "update-check",
     "delete-check",
     "student-profile",
     "student-checklist",
     "student-breaklist",
     "student-update",
     "student-delete",
     "own-profile",
     "update-break"
);

if(
    ($objValidation->validValues($avaliadle_action,$action)==false)
 ){
    $data=array();
    $data["code"]="3006";
    $data["message"]="Can not find requested action";
    echo json_encode($data); 
   return 0;
}

$objTeacher=new Teacher();
$objTeacher->userid=$userid;
$objTeacher->data=$data;

if($action=="own-profile"){
    $objTeacher->own_profile();
}

if($action=="add-student"){
    $objTeacher->add_student();
}

if($action=="student-list"){
    $objTeacher->student_list();
}

if($action=="student-profile"){
    $objTeacher->student_profile();
}

if($action=="student-checklist"){
    $objTeacher->student_profile_checklist();
}

if($action=="student-breaklist"){
    $objTeacher->breaks_list();
}


if($action=="student-update"){
    $objTeacher->student_update();
}

if($action=="student-delete"){
    $objTeacher->student_delete();
}

if($action=="create-checkin"){
    $objTeacher->create_checkin();
}

if($action=="create-checkout"){
    $objTeacher->create_checkout();
}

if($action=="update-check"){
    $objTeacher->update_check();
}

if($action=="delete-check"){
    $objTeacher->delete_check();
}

if($action=="update-break"){
    $objTeacher->change_break_status();
}
}
validation_at_first();


?>