<?php
class Login{
   public function logmein(){
    $objDatabase=new Database();
    $objDatabase->getConnection();

    $objValidation=new Validation();

     if($objValidation->validEmailAndPassword($this->email,$this->password)==false){
            $data=array();
            $data["code"]="3000";
            $data["message"]="Crediantials are not correct";
            echo json_encode($data);
            return 0;
        }

     $objDatabase->sql="SELECT token,usertype FROM users WHERE email='$this->email' AND password=SHA2('$this->password',256);";
     $sqlRep=$objDatabase->runSql();
     $token=$sqlRep[0]["token"];
     $usertype=$sqlRep[0]["usertype"];
     $data=array();
     $data["code"]="2000";
     $data["message"]="You are logged in";
     $data["data"]=array("token"=>$token,"usertype"=>$usertype);
     echo json_encode($data);
     return 0;
   }  

   
}


?>