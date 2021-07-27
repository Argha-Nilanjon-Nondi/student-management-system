<?php

class Common{
     public function change_password(){

      $objValidation=new Validation();

      if(
        (isset($this->data["token"])==false) ||
        (isset($this->data["old-password"])==false) ||
        (isset($this->data["new-password"])==false) ||
        (empty($this->data["token"])==true) ||
        (empty($this->data["old-password"])==true) ||
        (empty($this->data["new-password"])==true)
        ){
        
         $data=array();
         $data["code"]="3002";
         $data["message"]="Required fields are not found";
         echo json_encode($data);
         return 0;
           
       }

      $token=$this->data["token"];
      $old_password=$this->data["old-password"];
      $new_password=$this->data["new-password"];

      if(
         ($objValidation->ValidToken($token)==false)
         ){
            $data=array();
            $data["code"]="3003";
            $data["message"]="Token is not valid";
            echo json_encode($data);
            return 0;
        }

      if(
          ($objValidation->validPassword($new_password)==false) || 
          ($objValidation->validPassword($old_password)==false)
         ){
          $data=array();
          $data["code"]="3003";
          $data["message"]="New password or old password is not valid";
          echo json_encode($data);
          return 0;
        }

        
        $objDatabase=new Database();
        $objDatabase->getConnection();

        $email=$objValidation->tokenToEmail($token);


        if($objValidation->validEmailAndPassword($email,$old_password)==false){
            $data=array();
            $data["code"]="3000";
            $data["message"]="Crediantials are not correct";
            echo json_encode($data);
            return 0;
        }

        $randnum=strval(mt_rand());
        $objDatabase->sql="UPDATE users set password=SHA2('$new_password',256) , token=SHA2('$randnum',256)  WHERE email='$email';";
        $objDatabase->runSql();
        $data=array();
        $data["code"]="2099";
        $data["message"]="Password is changed";
        echo json_encode($data);
        return 0;
    }
  

}

?>