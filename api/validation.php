<?php


  class Validation{

  public function validPassword($password){
          for($i=0;$i<strlen($password);$i++){
          
             if($password[$i]==" "){
               return false;             
          }
      }

      if(strlen($password)<8){
          return false;
      }

      return true;
  }

  public function validEmail($email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
      }
      return true;
  }

  public function validID($id){
    $obj=new Database();
    $obj->getConnection();
     $obj->sql="SELECT userid FROM users WHERE userid='$id';";
     $sqlRep=$obj->runSql();
     if(count($sqlRep)==0){
       return false;
     }
     return true;
  }

  public function ValidToken($token){
    $obj=new Database();
    $obj->getConnection();
     $obj->sql="SELECT userid FROM users WHERE token='$token'";
     $sqlRep=$obj->runSql();
     if(count($sqlRep)==0){
       return false;
     }
     return true;
  }

  public function tokenToId($token){
    $obj=new Database();
    $obj->getConnection();
     $obj->sql="SELECT userid FROM users WHERE token='".$token."'";
     $sqlRep=$obj->runSql();
     return $sqlRep[0]["userid"];
  }


  public function IdtoClassSection($userid){
    $obj=new Database();
    $obj->getConnection();
     $obj->sql="SELECT class,section FROM teachers WHERE userid='$userid';";
     $sqlRep=$obj->runSql();
     return array(
       $sqlRep[0]["class"],
       $sqlRep[0]["section"]
      );
  }

  public function validContactNO($contactno){
    for($i=0;$i<strlen($contactno);$i++){
       if($contactno[$i]==" "){
         return false;             
        }
     }

     if(strlen($contactno)>17 || strlen($contactno)<11){
       return false; 
      }
    return true;
  }
  
  public function isAdmin($userid){
    $objDatabase=new Database();
    $objDatabase->getConnection();
     $objDatabase->sql="SELECT usertype FROM users WHERE usertype='admin' AND userid='$userid'";
     $sqlRep=$objDatabase->runSql();
     if(count($sqlRep)==0){
       return false;
     }
     return true;
  }

  public function isTeacher($userid){
    $objDatabase=new Database();
    $objDatabase->getConnection();
     $objDatabase->sql="SELECT userid FROM users WHERE usertype='teacher' AND userid='$userid';";
     $sqlRep=$objDatabase->runSql();
     if(count($sqlRep)==0){
       return false;
     }
     return true;
  }

  public function isStudent($userid){
    $objDatabase=new Database();
    $objDatabase->getConnection();
     $objDatabase->sql="SELECT userid FROM users WHERE usertype='student' AND userid='$userid';";
     $sqlRep=$objDatabase->runSql();
     if(count($sqlRep)==0){
       return false;
     }
     return true;
  }  

  public function isIdExist($userid){
    $objDatabase=new Database();
    $objDatabase->getConnection();
     $objDatabase->sql="SELECT userid FROM profiles WHERE userid='".$userid."'";
     $sqlRep=$objDatabase->runSql();
     if(count($sqlRep)==0){
       return false;
     }
     return true;
  }


  public function isRollExist($class,$section,$roll){
    $objDatabase=new Database();
    $objDatabase->getConnection();
     $objDatabase->sql="SELECT userid FROM students WHERE class='$class' AND section='$section' AND roll=$roll ;";
     $sqlRep=$objDatabase->runSql();
     if(count($sqlRep)==0){
       return false;
     }
     return true;
  } 

  public function rollToId($class,$section,$roll){
    $objDatabase=new Database();
    $objDatabase->getConnection();
     $objDatabase->sql="SELECT userid FROM students WHERE class='$class' AND section='$section' AND roll=$roll ;";
     $sqlRep=$objDatabase->runSql();
     return $sqlRep[0]["userid"];
  } 

  public function isEmailExist($email){
    $objDatabase=new Database();
    $objDatabase->getConnection();
     $objDatabase->sql="SELECT userid FROM users WHERE email='".$email."'";
     $sqlRep=$objDatabase->runSql();
     if(count($sqlRep)==0){
       return false;
     }
     return true;
  }


  public function validValues($avaliable_position,$input_position){
    for($i=0;$i<count($avaliable_position);$i++){
      $db_positon=$avaliable_position[$i];
      if($db_positon==$input_position){
        return true;
      }
    }
    return false;
  }


  public function validDate($date){
    $mod_text=explode("-",$date);
    $year=$mod_text[0];
    $month=$mod_text[1];
    $day=$mod_text[2];
    return checkdate($month,$day,$year);
  }

  public function validTime($time){
    return strtotime($time);
}

  }

// $obj=new Validation();
// $obj->password="hhjijh9999";
// $obj->token="931e7780fdb2d079eacbdc0886030c98a51ba667f5f59a8e";
// $obj->email="admin@gmail.com";
// $obj->id="6634785";
// echo json_encode($obj->validID());
?>