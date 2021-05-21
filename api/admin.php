<?php

class Admin{
  public function teacher_profile(){
    if(
     (isset($this->data["teacherid"])==false) ||
     (empty($this->data["teacherid"])==true)
     ){
      $data=array();
      $data["code"]="3002";
      $data["message"]="Required fields are not found ";
      echo json_encode($data);
      return 0;
    }

    $teacherid=$this->data["teacherid"];

    $objValidation= new Validation();

    if(
      ($objValidation->validID($teacherid)==false)
     ){
        $data=array();
        $data["code"]="3051";
        $data["message"]="Id is not valid";
        echo json_encode($data); 
        exit();
    }

    if(
      ($objValidation->isTeacher($teacherid)==false)
     ){
        $data=array();
        $data["code"]="3004";
        $data["message"]="You are not Teacher";
        echo json_encode($data); 
        return 0;
    }
    $objDatabase=new Database();
    $objDatabase->getConnection();
    $objDatabase->sql="SELECT users.email,teachers.userid,teachers.username,users.usertype,teachers.class,teachers.section,teachers.contactno FROM teachers,users  WHERE teachers.userid='$teacherid' AND users.userid='$teacherid'";
    $data=array();
    $data["code"]="2047";
    $data["message"]="Teacher profile is retrieved";
    $data["data"]=$objDatabase->runSql();
    echo json_encode($data);     
  } 
    public function add_teacher(){
        $objValidation= new Validation();
        if(
          (isset($this->data["email"])==false) ||
          (isset($this->data["password"])==false) ||
          (isset($this->data["username"])==false) ||
          (isset($this->data["class"])==false) ||
          (isset($this->data["section"])==false) ||
          (isset($this->data["contactno"])==false) ||
          (empty($this->data["email"])==true) ||
          (empty($this->data["password"])==true) ||
          (empty($this->data["username"])==true) ||
          (empty($this->data["class"])==true) ||
          (empty($this->data["section"])==true) ||
          (empty($this->data["contactno"])==true) 
        ){
          $data=array();
          $data["code"]="3002";
          $data["message"]="Required fields are not found";
          echo json_encode($data);
          return 0;
        }

        $email=$this->data["email"];
        $password=$this->data["password"];
        $username=$this->data["username"];
        $class=$this->data["class"];
        $secion=$this->data["section"];
        $contactno=$this->data["contactno"];

        
        require_once("./api/config.php");

        if(($objValidation->validEmail($email)==false) || 
          ($objValidation->validPassword($password)==false) || 
          ($objValidation->validContactNO($contactno)==false) ||
          ($objValidation->validValues($avaliable_class,$class)==false)||
          ($objValidation->validValues($avaliable_section,$secion)==false)
          ){
            $data=array();
            $data["code"]="3003";
            $data["message"]="Required fields is not valid";
            echo json_encode($data);
            return 0;
          }

          if($objValidation->isEmailExist($email)==true){
            $data=array();
            $data["code"]="3008";
            $data["message"]="Email is already exist";
            echo json_encode($data);
            return 0;
          }

          $objDatabase=new Database();
          $objDatabase->getConnection();
          $randnum=strval(mt_rand());
          $objDatabase->sql="
                 INSERT users(userid,email,password,token,usertype) VALUES('$randnum','$email',SHA2('$password',256),SHA2('$randnum',256),'teacher');
                 INSERT teachers(userid,username,class,section,contactno) VALUES('$randnum','$username',$class,'$secion','$contactno');
              ";
          $objDatabase->runSql();
          $data=array();
          $data["code"]="2005";
          $data["message"]="Teacher is created successfully";
          echo json_encode($data);
    }

    public function add_student(){
      $objValidation= new Validation();
      if(
        (isset($this->data["email"])==false) ||
        (isset($this->data["password"])==false) ||
        (isset($this->data["username"])==false) ||
        (isset($this->data["class"])==false) ||
        (isset($this->data["section"])==false) ||
        (isset($this->data["contactno"])==false) ||
        (isset($this->data["roll"])==false) ||
        (empty($this->data["email"])==true) ||
        (empty($this->data["password"])==true) ||
        (empty($this->data["username"])==true) ||
        (empty($this->data["class"])==true) ||
        (empty($this->data["section"])==true) ||
        (empty($this->data["contactno"])==true) ||
        (empty($this->data["roll"])==true) 
      ){
        $data=array();
        $data["code"]="3002";
        $data["message"]="Required fields are not found";
        echo json_encode($data);
        return 0;
      }

      $email=$this->data["email"];
      $password=$this->data["password"];
      $username=$this->data["username"];
      $class=$this->data["class"];
      $secion=$this->data["section"];
      $contactno=$this->data["contactno"];
      $roll=$this->data["roll"];

      
      require_once("./api/config.php");

      if(($objValidation->validEmail($email)==false) || 
        ($objValidation->validPassword($password)==false) || 
        ($objValidation->validContactNO($contactno)==false) ||
        ($objValidation->validValues($avaliable_class,$class)==false)||
        ($objValidation->validValues($avaliable_section,$secion)==false)
        ){
          $data=array();
          $data["code"]="3003";
          $data["message"]="Required fields is not valid";
          echo json_encode($data);
          return 0;
        }

        if($objValidation->isEmailExist($email)==true){
          $data=array();
          $data["code"]="3008";
          $data["message"]="Email is already exist";
          echo json_encode($data);
          return 0;
        }


        if($objValidation->isRollExist($class,$secion,$roll)==true){
          $data=array();
          $data["code"]="3018";
          $data["message"]="Roll is already exist";
          echo json_encode($data);
          return 0;
        }

        $objDatabase=new Database();
        $objDatabase->getConnection();
        $randnum=strval(mt_rand());
        $objDatabase->sql="
               INSERT users(userid,email,password,token) VALUES('$randnum','$email',SHA2('$password',256),SHA2('$randnum',256));
               INSERT students(userid,username,class,section,roll,contactno) VALUES('$randnum','$username','$class','$secion',$roll,'$contactno');
            ";
        $objDatabase->runSql();
        $data=array();
        $data["code"]="2003";
        $data["message"]="Student is created successfully";
        echo json_encode($data);
    }

    public function teacher_list(){
      $objDatabase=new Database();
      $objDatabase->getConnection();
      $randnum=strval(mt_rand());
      $objDatabase->sql="SELECT userid,username,class,section FROM teachers ORDER BY class ASC;";
      $data=array();
      $data["code"]="2053";
      $data["message"]="Teacher list is retrieved";
      $data["data"]=$objDatabase->runSql();
      echo json_encode($data);     
    }

    private function update_column($table,$column,$value,$employeeid){
      $objDatabase=new Database();
      $objDatabase->getConnection();
      $objDatabase->sql="UPDATE $table set $column='$value' WHERE userid='$employeeid'; ";
      $objDatabase->runSql();
    }

    public function teacher_update(){
       require_once("./api/config.php");
      if(
         (isset($this->data["userid"])==false) ||
         (empty($this->data["userid"])==true)
         ){
          $data=array();
          $data["code"]="3002";
          $data["message"]="Required fields are not found ";
          echo json_encode($data);
          exit();
        }

      $userid=$this->data["userid"];

      $objValidation= new Validation();

      if(
        ($objValidation->isTeacher($userid)==false)
       ){
          $data=array();
          $data["code"]="3009";
          $data["message"]="ID is not teacher";
          echo json_encode($data); 
          exit();
      }

      if(
       (isset($this->data["username"])==true) &&
       (empty($this->data["username"])==false)
       ){
         $this->update_column("teachers","username",$this->data["username"],$userid);
      }

      if(
        (isset($this->data["class"])==true) &&
        (empty($this->data["class"])==false)
        ){
          $class=$this->data["class"];
          if($objValidation->validValues($avaliable_class,$class)==false){
            $data=array();
            $data["code"]="3003";
            $data["message"]="Class is not valid";
            echo json_encode($data);
            return 0;
          }
          $this->update_column("teachers","class",$class,$userid);
       }

      if(
         (isset($this->data["section"])==true) &&
         (empty($this->data["section"])==false)
         ){
          $section=$this->data["section"];
          if($objValidation->validValues($avaliable_section,$section)==false)
           {
            $data=array();
            $data["code"]="3073";
            $data["message"]="Section is not valid";
            echo json_encode($data);
            return 0;
          }
          $this->update_column("teachers","section",$section,$userid);
        }


       if(
        (isset($this->data["contactno"])==true) &&
        (empty($this->data["contactno"])==false)
        ){
          $contactno=$this->data["contactno"];
          if($objValidation->validContactNO($contactno)==false) 
          {
            $data=array();
            $data["code"]="3033";
            $data["message"]="Contact no is not valid";
            echo json_encode($data);
            return 0;
          }
          $this->update_column("teachers","contactno",$contactno,$userid);
       }
      
       $data=array();
        $data["code"]="2073";
        $data["message"]="Teacher profile is updated";
        echo json_encode($data);
        return 0;
    }

    public function user_delete(){
      if(
       (isset($this->data["userid"])==false) ||
       (empty($this->data["userid"])==true)
       ){
        $data=array();
        $data["code"]="3002";
        $data["message"]="Required fields are not found ";
        echo json_encode($data);
        return 0;
      }
  
      $userid=$this->data["userid"];
  
      $objValidation= new Validation();
  
      if(
        ($objValidation->validID($userid)==false)
       ){
          $data=array();
          $data["code"]="3051";
          $data["message"]="Id is not valid";
          echo json_encode($data); 
          exit();
      }

      $objDatabase=new Database();
      $objDatabase->getConnection();
      $objDatabase->sql="
      DELETE FROM users WHERE userid='$userid';
      DELETE FROM students WHERE userid='$userid';
      DELETE FROM teachers WHERE userid='$userid';
      DELETE FROM checks WHERE userid='$userid';
       ";
       $objDatabase->runSql();
      $data=array();
      $data["code"]="2067";
      $data["message"]="User is deleted";
      echo json_encode($data);     
    } 


    public function change_password(){

      $objValidation=new Validation();

      if(
        (isset($this->data["email"])==false) ||
        (isset($this->data["password"])==false) ||
        (empty($this->data["email"])==true) ||
        (empty($this->data["password"])==true)
        ){
        
         $data=array();
         $data["code"]="3002";
         $data["message"]="Required fields are not found";
         echo json_encode($data);
         return 0;
           
       }

      $email=$this->data["email"];
      $password=$this->data["password"];
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
        if($objValidation->isEmailExist($email)==false){
          $data=array();
          $data["code"]="3010";
          $data["message"]="Email is not exist";
          echo json_encode($data);
          return 0;
        }
        $randnum=strval(mt_rand());
        $objDatabase=new Database();
        $objDatabase->getConnection();
        $objDatabase->sql="UPDATE users set password=SHA2('$password',256) , token=SHA2('$randnum',256)  WHERE email='$email';";
        $objDatabase->runSql();
        $data=array();
        $data["code"]="2099";
        $data["message"]="Password is changed";
        echo json_encode($data);
    }
  

}

?>