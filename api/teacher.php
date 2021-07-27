<?php
class Teacher{
  public function own_profile(){
    $objDatabase=new Database();
    $objDatabase->getConnection();
    $objDatabase->sql="SELECT users.email,teachers.userid,teachers.username,teachers.class,teachers.section,teachers.contactno FROM teachers,users  WHERE teachers.userid='$this->userid' AND users.userid='$this->userid'";
    $data=array();
    $data["code"]="2047";
    $data["message"]="Teacher profile is retrieved";
    $data["data"]=$objDatabase->runSql()[0];
    echo json_encode($data);     
  } 
  public function student_profile(){
    $objValidation= new Validation();
    $classandsection=$objValidation->IdtoClassSection($this->userid);
    $class=$classandsection[0];
    $section=$classandsection[1];

    if(
      (isset($this->data["roll"])==false) ||
      (empty($this->data["roll"])==true) 
    ){
      $data=array();
      $data["code"]="3002";
      $data["message"]="Required fields are not found";
      echo json_encode($data);
      return 0;
    }

    $roll=$this->data["roll"];

    if($objValidation->isRollExist($class,$section,$roll)==false){
      $data=array();
      $data["code"]="3018";
      $data["message"]="Roll does not exist";
      echo json_encode($data);
      return 0;
    }  

    $objDatabase=new Database();
    $objDatabase->getConnection();

    $objDatabase->sql="SELECT userid,username,roll,contactno FROM students WHERE class='$class' AND section='$section' AND roll=$roll;";
    $studentdata=$objDatabase->runSql()[0];
    $studentid=$studentdata["userid"];

    $objDatabase->sql="SELECT email FROM users WHERE userid='$studentid'; ";
    $studentemail=$objDatabase->runSql()[0]["email"];

    $data=array();
    $data["code"]="2043";
    $data["message"]="Student profile is retrieved";
    $studentdata["email"]=$studentemail;
    $data["data"]=$studentdata;
    echo json_encode($data); 
  }  

  public function student_profile_checklist(){
    $objValidation= new Validation();
    $classandsection=$objValidation->IdtoClassSection($this->userid);
    $class=$classandsection[0];
    $section=$classandsection[1];

    if(
      (isset($this->data["roll"])==false) ||
      (empty($this->data["roll"])==true) 
    ){
      $data=array();
      $data["code"]="3002";
      $data["message"]="Required fields are not found";
      echo json_encode($data);
      return 0;
    }

    $roll=$this->data["roll"];

    if($objValidation->isRollExist($class,$section,$roll)==false){
      $data=array();
      $data["code"]="3018";
      $data["message"]="Roll does not exist";
      echo json_encode($data);
      return 0;
    }  

    $objDatabase=new Database();
    $objDatabase->getConnection();
    $objDatabase->sql="SELECT userid,username,roll FROM students WHERE class='$class' AND section='$section' AND roll=$roll;";
    $data=array();
    $data["code"]="2043";
    $data["message"]="Student check list is retrieved";
    $studentid=$objDatabase->runSql()[0]["userid"];
    $objDatabase->sql="SELECT workdate,checkin,checkout,presenttype FROM checks  WHERE userid='$studentid' ORDER BY DATE(workdate) DESC";
    $data["data"]["checks"]=$objDatabase->runSql();
    $objDatabase->sql="SELECT workdate,timetext,reason,status FROM breaks WHERE userid='$studentid' ORDER BY DATE(workdate) DESC";
    $data["data"]["breaks"]=$objDatabase->runSql();
    echo json_encode($data); 
  }  

  public function student_list(){
      $objValidation= new Validation();
      $classandsection=$objValidation->IdtoClassSection($this->userid);
      $class=$classandsection[0];
      $section=$classandsection[1];
      $objDatabase=new Database();
      $objDatabase->getConnection();
      $objDatabase->sql="SELECT userid,username,roll FROM students WHERE class='$class' AND section='$section' ORDER BY roll ASC;";
      $data=array();
      $data["code"]="2043";
      $data["message"]="Student list is retrieved";
      $data["data"]=$objDatabase->runSql();
      echo json_encode($data);     
  }

  public function add_student(){
      $objValidation= new Validation();
      if(
        (isset($this->data["email"])==false) ||
        (isset($this->data["password"])==false) ||
        (isset($this->data["username"])==false) ||
        (isset($this->data["contactno"])==false) ||
        (isset($this->data["roll"])==false) ||
        (empty($this->data["email"])==true) ||
        (empty($this->data["password"])==true) ||
        (empty($this->data["username"])==true) ||
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
      $contactno=$this->data["contactno"];
      $roll=$this->data["roll"];
      $classandsection=$objValidation->IdtoClassSection($this->userid);
      $class=$classandsection[0];
      $section=$classandsection[1];

      
      require_once("./api/config.php");

      if(($objValidation->validEmail($email)==false) || 
        ($objValidation->validPassword($password)==false) || 
        ($objValidation->validContactNO($contactno)==false)
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
        

        if($objValidation->isRollExist($class,$section,$roll)==true){
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
               INSERT users(userid,email,password,token,usertype) VALUES('$randnum','$email',SHA2('$password',256),SHA2('$randnum',256),'student');
               INSERT students(userid,username,class,section,roll,contactno) VALUES('$randnum','$username','$class','$section',$roll,'$contactno');
            ";
        $objDatabase->runSql();
        $data=array();
        $data["code"]="2003";
        $data["message"]="Student is created successfully";
        echo json_encode($data);
  }

  private function update_column($table,$column,$value,$employeeid){
      $objDatabase=new Database();
      $objDatabase->getConnection();
      $objDatabase->sql="UPDATE $table set $column='$value' WHERE userid='$employeeid'; ";
      $objDatabase->runSql();
  }

  public function student_update(){
       require_once("./api/config.php");
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
        ($objValidation->isStudent($userid)==false)
       ){
          $data=array();
          $data["code"]="3099";
          $data["message"]="ID is not student";
          echo json_encode($data); 
          return 0;
      }

      if(
       (isset($this->data["username"])==true) &&
       (empty($this->data["username"])==false)
       ){
         $this->update_column("students","username",$this->data["username"],$userid);
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
          $this->update_column("students","contactno",$contactno,$userid);
       }

      $classandsection=$objValidation->IdtoClassSection($this->userid);
      $class=$classandsection[0];
      $section=$classandsection[1];


      if(
        (isset($this->data["oldroll"])==true) &&
        (empty($this->data["oldroll"])==false) &&
        (isset($this->data["newroll"])==true) &&
        (empty($this->data["newroll"])==false)
        ){
          $oldroll=$this->data["oldroll"];
          $newroll=$this->data["newroll"];
          if($oldroll!=$newroll){
               if(($objValidation->isRollExist($class,$section,$newroll)==true)){
                 $data=array();
                 $data["code"]="3018";
                 $data["message"]="Roll is already exist";
                 echo json_encode($data);
                 return 0;
               }
                 $this->update_column("students","roll",$newroll,$userid);
             }
        }
      
       $data=array();
        $data["code"]="2063";
        $data["message"]="Student profile is updated";
        echo json_encode($data);
        return 0;
  }

  public function student_delete(){
    $objValidation= new Validation();
    $classandsection=$objValidation->IdtoClassSection($this->userid);
    $class=$classandsection[0];
    $section=$classandsection[1];
    
    if(
        (isset($this->data["roll"])==false) ||
        (empty($this->data["roll"])==true)
        ){
         $data=array();
         $data["code"]="3002";
         $data["message"]="Required fields are not found ";
         echo json_encode($data);
        return 0;
      }

     $roll=$this->data["roll"];

     $objValidation= new Validation();

     $userid=$objValidation->rollToId($class,$section,$roll);

     if(
       ($objValidation->isStudent($userid)==false)
      ){
         $data=array();
         $data["code"]="3099";
         $data["message"]="ID is not student";
         echo json_encode($data); 
        return 0;
     }

     if($objValidation->isRollExist($class,$section,$roll)==false){
      $data=array();
      $data["code"]="3018";
      $data["message"]="Roll does not exist";
      echo json_encode($data);
      return 0;
    }

       $objDatabase=new Database();
        $objDatabase->getConnection();
        $objDatabase->sql="
        DELETE FROM users WHERE userid='$userid';
        DELETE FROM students WHERE userid='$userid';
        DELETE FROM checks WHERE userid='$userid';
         ";
        $objDatabase->runSql();

        $data=array();
        $data["code"]="2021";
        $data["message"]="Student is deleted successfully";
        echo json_encode($data);
        return 0;
  }
  
   public function create_checkin(){
    require_once("./api/config.php");
    $objValidation=new Validation();
    $objValidation->data=$this->data;
    
   
    if(
       (isset($this->data["date"])==false) ||
       (empty($this->data["date"])==true) ||
       (isset($this->data["checkin"])==false) ||
       (empty($this->data["checkin"])==true) ||
       (isset($this->data["roll"])==false) ||
       (empty($this->data["roll"])==true)  ||
       (isset($this->data["presenttype"])==false) ||
       (empty($this->data["presenttype"])==true)  

      ){
      $data=array();
      $data["code"]="3002";
      $data["message"]="Required fields are not found";
      echo json_encode($data);
      return 0;
    }

    $teacherid=$this->userid;

    $classandsection=$objValidation->IdtoClassSection($teacherid);
    $class=$classandsection[0];
    $section=$classandsection[1];
    $workdate=$this->data["date"];
    $checkin=$this->data["checkin"];
    $roll=$this->data["roll"];


    if($objValidation->isRollExist($class,$section,$roll)==false){
      $data=array();
      $data["code"]="3018";
      $data["message"]="Roll does not exist";
      echo json_encode($data);
      return 0;
    }  


    $studentid=$objValidation->rollToId($class,$section,$roll);
    $presenttype=$this->data["presenttype"];


    if($objValidation->validDate($workdate)==false){
      $data=array();
      $data["code"]="3031";
      $data["message"]="Checkin date is not valid";
      echo json_encode($data);
      return 0;
     }


    if($objValidation->validTime($checkin)==false){
      $data=array();
      $data["code"]="3031";
      $data["message"]="Checkin time is not valid";
      echo json_encode($data);
      return 0;
    }

    if($objValidation->validValues($avaliable_presenttype,$presenttype)==false){
      $data=array();
      $data["code"]="3031";
      $data["message"]="Present type is not valid";
      echo json_encode($data);
      return 0;
    }

    $objDatabase=new Database();
    $objDatabase->getConnection();

    $objDatabase->sql="SELECT workdate FROM checks WHERE workdate='$workdate' AND userid='$studentid'; ";
    $sqlRep=$objDatabase->runSql();
    if(count($sqlRep)!=0){
       $data=array();
       $data["code"]="3060";
       $data["message"]="Working date is already exist for that roll";
       echo json_encode($data);
       return 0;
     }

    $objDatabase->sql="INSERT checks(userid,workdate,checkin,presenttype) VALUES('$studentid','$workdate','$checkin','$presenttype')";
    $sqlRep=$objDatabase->runSql();

    $data=array();
    $data["code"]="2035";
    $data["message"]="Student is successfully checkin";
    echo json_encode($data);   
   }

   public function create_checkout(){
    require_once("./api/config.php");
    $objValidation=new Validation();
    $objValidation->data=$this->data;
    
   
    if(
       (isset($this->data["date"])==false) ||
       (empty($this->data["date"])==true) ||
       (isset($this->data["checkout"])==false) ||
       (empty($this->data["checkout"])==true) ||
       (isset($this->data["roll"])==false) ||
       (empty($this->data["roll"])==true) 

      ){
      $data=array();
      $data["code"]="3002";
      $data["message"]="Required fields are not found";
      echo json_encode($data);
      return 0;
    }

    $teacherid=$this->userid;

    $classandsection=$objValidation->IdtoClassSection($teacherid);
    $class=$classandsection[0];
    $section=$classandsection[1];

    $workdate=$this->data["date"];
    $checkout=$this->data["checkout"];
    $roll=$this->data["roll"];
    if($objValidation->isRollExist($class,$section,$roll)==false){
      $data=array();
      $data["code"]="3018";
      $data["message"]="Roll does not exist";
      echo json_encode($data);
      return 0;
    }  

    $studentid=$objValidation->rollToId($class,$section,$roll);

 

    if($objValidation->validDate($workdate)==false){
      $data=array();
      $data["code"]="3031";
      $data["message"]="Checkin date is not valid";
      echo json_encode($data);
      return 0;
     }


    if($objValidation->validTime($checkout)==false){
      $data=array();
      $data["code"]="3031";
      $data["message"]="Checkout time is not valid";
      echo json_encode($data);
      return 0;
    }

    $objDatabase=new Database();
    $objDatabase->getConnection();

    $objDatabase->sql="SELECT workdate FROM checks WHERE workdate='$workdate' AND userid='$studentid'; ";
    $sqlRep=$objDatabase->runSql();
    if(count($sqlRep)==0){
       $data=array();
       $data["code"]="3060";
       $data["message"]="Working date is not exist";
       echo json_encode($data);
       return 0;
     }

    $objDatabase->sql=" UPDATE checks SET checkout='$checkout' WHERE workdate='$workdate' AND userid='$studentid'; ";
    $sqlRep=$objDatabase->runSql();

    $data=array();
    $data["code"]="2036";
    $data["message"]="Student is successfully checkout";
    echo json_encode($data);   
   }

   public function update_check(){
    require_once("./api/config.php");
    $objValidation=new Validation();
    $objValidation->data=$this->data;
    
   
    if(
       (isset($this->data["date"])==false) ||
       (empty($this->data["date"])==true) ||
       (isset($this->data["roll"])==false) ||
       (empty($this->data["roll"])==true) 

      ){
      $data=array();
      $data["code"]="3002";
      $data["message"]="Required fields are not found";
      echo json_encode($data);
      return 0;
    }

    $teacherid=$this->userid;

    $classandsection=$objValidation->IdtoClassSection($teacherid);
    $class=$classandsection[0];
    $section=$classandsection[1];

    $workdate=$this->data["date"];
    $roll=$this->data["roll"];


    if($objValidation->isRollExist($class,$section,$roll)==false){
      $data=array();
      $data["code"]="3018";
      $data["message"]="Roll does not exist";
      echo json_encode($data);
      return 0;
    } 


    if($objValidation->validDate($workdate)==false){
      $data=array();
      $data["code"]="3031";
      $data["message"]="Checkin date is not valid";
      echo json_encode($data);
      return 0;
     }


    $studentid=$objValidation->rollToId($class,$section,$roll);
 
     
    $objDatabase=new Database();
    $objDatabase->getConnection();

    $objDatabase->sql="SELECT workdate FROM checks WHERE workdate='$workdate' AND userid='$studentid'; ";
    $sqlRep=$objDatabase->runSql();
    if(count($sqlRep)==0){
       $data=array();
       $data["code"]="3060";
       $data["message"]="Working date does not exist";
       echo json_encode($data);
       return 0;
     }

    if(
      (isset($this->data["checkin"])==true) &&
      (empty($this->data["checkin"])==false)
     ){
       $checkin=$this->data["checkin"];
       if($objValidation->validTime($checkin)==false){
        $data=array();
        $data["code"]="3035";
        $data["message"]="Checkout time is not valid";
        echo json_encode($data);
        return 0;
      }       
     $objDatabase->sql=" UPDATE checks SET checkin='$checkin' WHERE workdate='$workdate' AND userid='$studentid'; ";
     $sqlRep=$objDatabase->runSql();
    }

    if(
      (isset($this->data["checkout"])==true) &&
      (empty($this->data["checkout"])==false)
     ){
      $checkout=$this->data["checkout"];
      if($objValidation->validTime($checkout)==false){
        $data=array();
        $data["code"]="3031";
        $data["message"]="Checkout time is not valid";
        echo json_encode($data);
        return 0;
      }
      $objDatabase->sql=" UPDATE checks SET checkout='$checkout' WHERE workdate='$workdate' AND userid='$studentid'; ";
       $sqlRep=$objDatabase->runSql();
    }

    if(
      (isset($this->data["presenttype"])==true) &&
      (empty($this->data["presenttype"])==false)
     ){
      $presenttype=$this->data["presenttype"];
      if($objValidation->validValues($avaliable_presenttype,$presenttype)==false){
        $data=array();
        $data["code"]="3031";
        $data["message"]="Present type is not valid";
        echo json_encode($data);
        return 0;
      }
      $objDatabase->sql=" UPDATE checks SET presenttype='$presenttype' WHERE workdate='$workdate' AND userid='$studentid'; ";
       $sqlRep=$objDatabase->runSql();
    }

    $data=array();
    $data["code"]="2066";
    $data["message"]="Check is updated";
    echo json_encode($data);   
   }

   public function delete_check(){
    require_once("./api/config.php");
    $objValidation=new Validation();
    $objValidation->data=$this->data;
    
   
    if(
       (isset($this->data["date"])==false) ||
       (empty($this->data["date"])==true) ||
       (isset($this->data["roll"])==false) ||
       (empty($this->data["roll"])==true) 

      ){
      $data=array();
      $data["code"]="3002";
      $data["message"]="Required fields are not found";
      echo json_encode($data);
      return 0;
    }

    $teacherid=$this->userid;

    $classandsection=$objValidation->IdtoClassSection($teacherid);
    $class=$classandsection[0];
    $section=$classandsection[1];

    $workdate=$this->data["date"];
    $roll=$this->data["roll"];


    if($objValidation->isRollExist($class,$section,$roll)==false){
      $data=array();
      $data["code"]="3018";
      $data["message"]="Roll does not exist";
      echo json_encode($data);
      return 0;
    }      
    $studentid=$objValidation->rollToId($class,$section,$roll);

    if($objValidation->validDate($workdate)==false){
      $data=array();
      $data["code"]="3031";
      $data["message"]="Checkin date is not valid";
      echo json_encode($data);
      return 0;
     }


    $objDatabase=new Database();
    $objDatabase->getConnection();

    $objDatabase->sql="SELECT workdate FROM checks WHERE workdate='$workdate' AND userid='$studentid'; ";
    $sqlRep=$objDatabase->runSql();
    if(count($sqlRep)==0){
       $data=array();
       $data["code"]="3060";
       $data["message"]="Working date is not exist";
       echo json_encode($data);
       return 0;
     }

    $objDatabase->sql=" DELETE FROM checks WHERE workdate='$workdate' AND userid='$studentid'; ";
    $sqlRep=$objDatabase->runSql();

    $data=array();
    $data["code"]="2036";
    $data["message"]="Check is deleted";
    echo json_encode($data);   
   }

   public function breaks_list(){
    $objValidation= new Validation();
    $classandsection=$objValidation->IdtoClassSection($this->userid);
    $class=$classandsection[0];
    $section=$classandsection[1];

    $objDatabase=new Database();
    $objDatabase->getConnection();
    $objDatabase->sql="SELECT students.roll,breaks.workdate,breaks.reason,breaks.timetext,breaks.status FROM students,breaks WHERE students.userid=breaks.userid AND students.class='$class' AND students.section='$section' ORDER BY breaks.workdate DESC";
    $studentsbreakdata=$objDatabase->runSql();

    $data=array();
    $data["code"]="2022";
    $data["message"]="Breaks is retrieved";
    $data["data"]=$studentsbreakdata;
    echo json_encode($data); 
   }

   public function change_break_status(){
        $objValidation=new Validation();
        if(
           (isset($this->data["date"])==false) ||
           (empty($this->data["date"])==true) ||
           (isset($this->data["roll"])==false) ||
           (empty($this->data["roll"])==true) ||
           (isset($this->data["status"])==false) ||
           (empty($this->data["status"])==true)
          ){
          $data=array();
          $data["code"]="3002";
          $data["message"]="Required fields are not found";
          echo json_encode($data);
          return 0;
        }  

        $avaliable_status=array("accept","reject");
        $status=$this->data["status"];

        if($objValidation->validValues($avaliable_status,$status)==false){
          $data=array();
          $data["code"]="3031";
          $data["message"]="Status is not valid";
          echo json_encode($data);
          return 0;
        }

        $breakdate=$this->data["date"];
        $roll=$this->data["roll"];

        $teacherid=$this->userid;
        $classandsection=$objValidation->IdtoClassSection($teacherid);
        $class=$classandsection[0];
        $section=$classandsection[1];

        if($objValidation->isRollExist($class,$section,$roll)==false){
          $data=array();
          $data["code"]="3018";
          $data["message"]="Roll does not exist";
          echo json_encode($data);
          return 0;
        } 

        if($objValidation->validDate($breakdate)==false){
          $data=array();
          $data["code"]="3091";
          $data["message"]="Break date is not valid";
          echo json_encode($data);
          return 0;
        }
        $studentid=$objValidation->rollToId($class,$section,$roll);


        if($objValidation->isBreakExist($studentid,$breakdate)==false){
            $data=array();
            $data["code"]="3017";
            $data["message"]="Requested break time is not exist";
            echo json_encode($data);
            return 0;
          }
          
        $objDatabase=new Database();
        $objDatabase->getConnection();

        $objDatabase->sql=" UPDATE breaks SET `status`='$status' WHERE userid='$studentid' AND workdate='$breakdate' ";
        $sqlRep=$objDatabase->runSql();

        $data=array();
        $data["code"]="2026";
        $data["message"]="Break status is updated";
        echo json_encode($data);  
   }
}

?>