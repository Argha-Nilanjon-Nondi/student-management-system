<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
require_once("./api/database.php");
require_once("./api/validation.php");
require_once("./api/login.php");
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
    (isset($json_data["email"])==false) ||
    (isset($json_data["password"])==false) ||
    (empty($json_data["email"])==true) ||
    (empty($json_data["password"])==true)
 ){
    
  $data=array();
  $data["code"]="3002";
  $data["message"]="Required fields are not found";
  echo json_encode($data);
  return 0;
       
}

$email=$json_data["email"];
$password=$json_data["password"];

$objValidation=new Validation();
if(
    ($objValidation->validEmail($email)==false) || 
    ($objValidation->validPassword($password)==false)
 ){
    $data=array();
    $data["code"]="3003";
    $data["message"]="Email or Password is not valid";
    echo json_encode($data);
    return 0;
}

$objLogin=new Login();
$objLogin->email=$email;
$objLogin->password=$password;
$objLogin->logmein();

}
validation_at_first();
?>