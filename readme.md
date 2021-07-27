1|| Login a user
URL:http://localhost/student_management_system/login.php
Method:Post
JSON:{
  "email":"admin@gmail.com",
  "password":"avunix9143"
}

2|| Add a teacher
URL:http://localhost/student_management_system/admin.php
Method:Post
JSON:{
  "token":"d6fa235d7cb8e9803806c3d05d506f01ffa198fee95de3205c153b2dd09191b3",
  "action":"add-teacher",
  "data":{
    "email":"teacher@gmail.com",
    "password":"avunix9143",
    "username":"Rahul",
    "section":"A",
    "class":"9",
    "contactno":"+8801710962748"
  }
}

3|| Add a Student
URL:http://localhost/student_management_system/admin.php
Method:Post
JSON:{
  "token":"d6fa235d7cb8e9803806c3d05d506f01ffa198fee95de3205c153b2dd09191b3",
  "action":"add-student",
  "data":{
    "email":"student01@gmail.com",
    "password":"admin9143",
    "username":"Rahul",
    "section":"A",
    "class":"9",
    "roll":12,
    "contactno":"+8801710962748"
  }
}



4|| Get teachers list
URL:http://localhost/student_management_system/admin.php
Method:Post
JSON:{
  "token":"d6fa235d7cb8e9803806c3d05d506f01ffa198fee95de3205c153b2dd09191b3",
  "action":"teacher-list",
  "data":{
  }
}


4|| Get teacher profile
URL:http://localhost/student_management_system/admin.php
Method:Post
JSON:{
  "token":"d6fa235d7cb8e9803806c3d05d506f01ffa198fee95de3205c153b2dd09191b3",
  "action":"teacher-profile",
  "data":{
  }
}



4||Update a teacher
URL:http://localhost/student_management_system/admin.php
Method:Post
JSON:{
  "token":"d6fa235d7cb8e9803806c3d05d506f01ffa198fee95de3205c153b2dd09191b3",
  "action":"teacher-update",
  "data":{
    "userid":"667566",
    "username":"Nilanjon Nondi",
    "section":"B",
    "contactno":"+8801715743000"
  }
}


5|| add a student
URL:http://localhost/student_management_system/teacher.php
Method:Post
JSON:{
  "token":"04ab7e8a324756ec568db2c1a4f6e18a2628743771abc7700839d7883fb37a48",
  "action":"add-student",
  "data":{
    "username":"Mita Ghosh",
    "email":"student1@gmail.com",
    "password":"avunix9143",
    "contactno":"+880171574359",
    "roll":"1"
  }
}


6|| see student list
URL:http://localhost/student_management_system/teacher.php
Method:Post
JSON:{
  "token":"04ab7e8a324756ec568db2c1a4f6e18a2628743771abc7700839d7883fb37a48",
  "action":"student-list",
  "data":{}
}


7|| see own profile
URL:http://localhost/student_management_system/teacher.php
Method:Post
JSON:{
  "token":"04ab7e8a324756ec568db2c1a4f6e18a2628743771abc7700839d7883fb37a48",
  "action":"own-profile",
  "data":{}
}

8|| see student profile
URL:http://localhost/student_management_system/teacher.php
Method:Post
JSON:{
  "token":"04ab7e8a324756ec568db2c1a4f6e18a2628743771abc7700839d7883fb37a48",
  "action":"student-profile",
  "data":{
    "roll":"1"
  }
}


8|| update student profile
URL:http://localhost/student_management_system/teacher.php
Method:Post
JSON:{
  "token":"04ab7e8a324756ec568db2c1a4f6e18a2628743771abc7700839d7883fb37a48",
  "action":"student-update",
  "data":{
    "userid":"893007708",
    "username":"Mita NOndi",
    "contactno":"+88017157000",
    "roll":"22"
  }
}


9|| delete a student
URL:http://localhost/student_management_system/teacher.php
Method:Post
JSON:{
  "token":"04ab7e8a324756ec568db2c1a4f6e18a2628743771abc7700839d7883fb37a48",
  "action":"student-delete",
  "data":{
    "roll":"22"
  }
}

10|| create a checkin (presesnt)
URL:http://localhost/student_management_system/teacher.php
Method:Post
JSON:{
  "token":"04ab7e8a324756ec568db2c1a4f6e18a2628743771abc7700839d7883fb37a48",
  "action":"create-checkin",
  "data":{
    "roll":"2",
    "date":"2021-5-17",
    "checkin":"9:10",
    "presenttype":"AB"
  }
}


10|| create a checkin (absent)
URL:http://localhost/student_management_system/teacher.php
Method:Post
JSON:{
  "token":"04ab7e8a324756ec568db2c1a4f6e18a2628743771abc7700839d7883fb37a48",
  "action":"create-checkin",
  "data":{
    "roll":"2",
    "date":"2021-5-17",
    "checkin":"9:10",
    "presenttype":"PR"
  }
}


11|| create a checkout
URL:http://localhost/student_management_system/teacher.php
Method:Post
JSON:{
  "token":"04ab7e8a324756ec568db2c1a4f6e18a2628743771abc7700839d7883fb37a48",
  "action":"create-checkout",
  "data":{
    "roll":"2",
    "date":"2021-5-18",
    "checkout":"10:10"
  }
}



12|| update checks
URL:http://localhost/student_management_system/teacher.php
Method:Post
JSON:{
  "token":"04ab7e8a324756ec568db2c1a4f6e18a2628743771abc7700839d7883fb37a48",
  "action":"update-check",
  "data":{
    "roll":"2",
    "date":"2021-5-18",
    "checkin":"2:20",
    "checkout":"22:44",
    "presenttype":"AB"
  }
}

12|| get student check and break list
URL:http://localhost/student_management_system/teacher.php
Method:Post
JSON:{
  "token":"fbc112bd24451ab8c154f0d793cff48cb98a3b09f7a2ac0595dd8b0102c8baf6",
  "action":"student-checklist",
  "data":{
  "roll":"23"
  }
}

12|| get all students break list
URL:http://localhost/student_management_system/teacher.php
Method:Post
JSON:{
  "token":"fbc112bd24451ab8c154f0d793cff48cb98a3b09f7a2ac0595dd8b0102c8baf6",
  "action":"student-breaklist",
  "data":{
  }
}


12|| accept a break of a student
URL:http://localhost/student_management_system/teacher.php
Method:Post
JSON:{
  "token":"a9626e5fbd6049ab1aee78a0b48c8f41225849bb4cf4aec4546228d186614d67",
  "action":"update-check",
  "data":{
  "roll":"2",
  "date":"2021-05-10",
  "status":"accept"
  }
}

12|| reject a break of a student
URL:http://localhost/student_management_system/teacher.php
Method:Post
JSON:{
  "token":"a9626e5fbd6049ab1aee78a0b48c8f41225849bb4cf4aec4546228d186614d67",
  "action":"update-check",
  "data":{
  "roll":"2",
  "date":"2021-05-10",
  "status":"reject"
  }
}

13|| delete a user by id
URL:http://localhost/student_management_system/admin.php
Method:Post
JSON:
{
  "token":"62e1b52a996e8f98abb67b80e80b4e7533e20a076be91159b122930226d6005b",
  "action":"user-delete",
  "data":{
    "userid":"1200341716"
  }
}


14||Request a break
URL:http://localhost/student_management_system/student.php
Method:Post
JSON:{
  "token":"8538602aa2d1fdf3a7020c0cb88756e7e426924713c3352b353972c4ac68a385",
  "action":"request-break",
  "data":{
  "date":"2021-05-09",
  "time":"9:53",
  "reason":"I am ill"
  }
}


14||Change any user pssword
URL:http://localhost/student_management_system/common.php
Method:Post
JSON:{
  "action":"change-password",
  "data":{
   "token":"3fe33261d7eae7cd3da33a93fba2736d20741add3b28d9a85b56401cd5c3b66c",
   "old-password":"avunix9143",
   "new-password":"avunix9143new"
  }
}

14||delete a requested break
URL:http://localhost/student_management_system/student.php
Method:Post
JSON:{
  "token":"8538602aa2d1fdf3a7020c0cb88756e7e426924713c3352b353972c4ac68a385",
  "action":"delete-break",
  "data":{
  "date":"2021-05-09",
  "time":"9:53"
  }
}


14||Get student own profile
URL:http://localhost/student_management_system/student.php
Method:Post
JSON:{
  "token":"8538602aa2d1fdf3a7020c0cb88756e7e426924713c3352b353972c4ac68a385",
  "action":"student-info",
  "data":{
  }
}



14||Get student own check and break list
URL:http://localhost/student_management_system/student.php
Method:Post
JSON:{
  "token":"8538602aa2d1fdf3a7020c0cb88756e7e426924713c3352b353972c4ac68a385",
  "action":"student-checkbreaklist",
  "data":{
  }
}


14||Get student own just break list
URL:http://localhost/student_management_system/student.php
Method:Post
JSON:{
  "token":"8538602aa2d1fdf3a7020c0cb88756e7e426924713c3352b353972c4ac68a385",
  "action":"student-breaklist",
  "data":{
  }
}


15||change password
URL:http://localhost/student_management_system/admin.php
Method:Post
JSON:{
  "token":"62e1b52a996e8f98abb67b80e80b4e7533e20a076be91159b122930226d6005b",
  "action":"change-password",
  "data":{
    "email":"teache001r@gmail.com",
    "password":"avunix9143",
    "new-password":"avunix91443"
  }
}

16||check token
URL:http://localhost/student-management-system/validation.php
Method:POST
JSON:{
  "token":"d6fa235d7cb8e9803806c3d05d506f01ffa198fee95de3205c153b2dd09191b3",
  "usertype":"admin"

}