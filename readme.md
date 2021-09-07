
# Student Management System API

Student Management System API is a REST API . I created it as a backend of a web application project . But it can be used only as an REST API.




## Features

- Has sections for admin,teachers and students
- Very secure
- Easy to use
- Codes are not very complex
- OOP - Object Oriented Programming

  
## Installation

At firstdownload and install XAMPP from [apachefriends](https://www.apachefriends.org/index.html)
![App Screenshot](https://github.com/Argha-Nilanjon-Nondi/student-management-system/blob/master/screenshorts/download_xammp.png?raw=true)

Then open XAMMP and start Apache and Mysql
![App Screenshot](https://github.com/Argha-Nilanjon-Nondi/student-management-system/blob/master/screenshorts/start_apache.png?raw=true)
![App Screenshot](https://github.com/Argha-Nilanjon-Nondi/student-management-system/blob/master/screenshorts/start_mysql.png?raw=true)
![App Screenshot](https://github.com/Argha-Nilanjon-Nondi/student-management-system/blob/master/screenshorts/open_mysql_1.png?raw=true)

Open phpmyadmin in your browser
![App Screenshot](https://github.com/Argha-Nilanjon-Nondi/student-management-system/blob/master/screenshorts/open_mysql_2.png?raw=true)

Then create a new database named "student-management-system"
![App Screenshot](https://github.com/Argha-Nilanjon-Nondi/student-management-system/blob/master/screenshorts/create_database.png?raw=true)

Go to "Import" tab in phpmyadmin and upload "student-management-system.sql"
![App Screenshot](https://github.com/Argha-Nilanjon-Nondi/student-management-system/blob/master/screenshorts/upload_sqlfile.png?raw=true)

And click go 
![App Screenshot](https://github.com/Argha-Nilanjon-Nondi/student-management-system/blob/master/screenshorts/run_sql_file.png?raw=true)

Now you have "student-management-system" database in your XAMMP
![App Screenshot](https://github.com/Argha-Nilanjon-Nondi/student-management-system/blob/master/screenshorts/database_view.png?raw=true)

Copy this repo and paste it in C:\xampp\htdocs
![App Screenshot](https://github.com/Argha-Nilanjon-Nondi/student-management-system/blob/master/screenshorts/repo_in_directory.png?raw=true)

congratulation! You have installed every thing
If you go to "https://localhost/student-management-system/" in your browser you will see this:
![Ap](https://github.com/Argha-Nilanjon-Nondi/student-management-system/blob/master/screenshorts/congratulation_page.png?raw=true)

Go to student-management-system/api/database.php and replace $host,$username,$password as your need
(database.php is the file for connecting to phpmyadmin )
![Ap](https://github.com/Argha-Nilanjon-Nondi/student-management-system/blob/master/screenshorts/database_config.png?raw=true)



## Built with

- PHP

- Mysql

- Phpmyadmin

  
## Related

Here are some related links

- [XAAMP](https://www.apachefriends.org/download.html)

- [PHP](https://www.php.net/)

- [MySQL](https://www.mysql.com/)



## API Reference

### Login a user
  
#### URL  
```http
POST http://localhost/student-management-system/login.php
```
 
#### Data  
```json
{
  "email":"youremail@domain.com",
  "password":"yourpassword"
}
```

#### Response
```json
{
    "code": "2000",
    "message": "You are logged in",
    "data": {
        "token": "74f5bdd6fa138b472125192fbc03fc3643afeaf9a0396c3f11e9912fd72f531a",
        "usertype": "admin"
    }
}
```

#### Here the value of "token" is used to authenticate a user .

<br />

### Add a teacher
#### URL
```http
POST http://localhost/student-management-system/admin.php
```
 #### Data  
```json
{
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
``` 
#### "class" has the range of 1 to 10
#### "section" has the two option "A" and "B"
#### can be edit in /api/config.php of repo
#### Response
```json
{
    "code": "2005",
    "message": "Teacher is created successfully"
}
```

### Add a student
#### URL
```http
POST http://localhost/student-management-system/admin.php
```
 #### Data  
```json
{
  "token":"74f5bdd6fa138b472125192fbc03fc3643afeaf9a0396c3f11e9912fd72f531a",
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
``` 
#### Response
```json
{
    "code": "2003",
    "message": "Student is created successfully"
}
```
<br>

### Get teacher list
#### URL
```http
POST http://localhost/student-management-system/admin.php
```
#### Data  
```json
{
  "token":"74f5bdd6fa138b472125192fbc03fc3643afeaf9a0396c3f11e9912fd72f531a",
  "action":"teacher-list",
  "data":{
  }
}
``` 
#### Response
```json
{
    "code": "2053",
    "message": "Teacher list is retrieved",
    "data": [
        {
            "userid": "995960612",
            "username": "Teacher Argha Nilanjon Nondi Teacher",
            "class": "1",
            "section": "A"
        }
    ]
}
```

<br>

### Get a teacher profile
#### URL
```http
POST http://localhost/student-management-system/admin.php
```
 #### Data  
```json
{
  "token":"74f5bdd6fa138b472125192fbc03fc3643afeaf9a0396c3f11e9912fd72f531a",
  "action":"teacher-profile",
  "data":{
  "teacherid":"2102903393"
  }
}
``` 
#### Response
```json
{
    "code": "2047",
    "message": "Teacher profile is retrieved",
    "data": {
        "email": "teacher1@gmail.com",
        "userid": "2102903393",
        "username": "Teacher 01",
        "usertype": "teacher",
        "class": "1",
        "section": "B",
        "contactno": "+8801710762741"
    }
}
```
<br>

### Update a teacher
#### URL
```http
POST http://localhost/student-management-system/admin.php
```
 #### Data  
```json
{
  "token":"74f5bdd6fa138b472125192fbc03fc3643afeaf9a0396c3f11e9912fd72f531a",
  "action":"teacher-update",
  "data":{
    "userid":"2102903393",
    "username":"Test username",
    "class":"7",
    "old-section":"B",
    "new-section":"B",
    "contactno":"+8801715743000"
  }
}
``` 
#### Here "username","class","contactno","new-section" is optional . Depend how you want to update.
#### But "userid" and "old-section" is required.
#### Response
```json
{
    "code": "2073",
    "message": "Teacher profile is updated"
}
```

<br>

### Delete a user
#### URL
```http
POST http://localhost/student-management-system/admin.php
```
 #### Data  
```json
{
  "token":"74f5bdd6fa138b472125192fbc03fc3643afeaf9a0396c3f11e9912fd72f531a",
  "action":"user-delete",
  "data":{
    "userid":"2102903393"
  }
}
``` 
#### Response
```json
{
    "code": "2067",
    "message": "User is deleted"
}
```

<br>

### Change user password by admin
#### URL
```http
POST http://localhost/student-management-system/admin.php
```
 #### Data  
```json
{
  "token":"74f5bdd6fa138b472125192fbc03fc3643afeaf9a0396c3f11e9912fd72f531a",
  "action":"change-password",
  "data":{
    "email":"teacher0@gmail.com",
    "password":"avunix9143",
    "new-password":"avunix9143"
  }
}
``` 
#### Response
```json
{
    "code": "2099",
    "message": "Password is changed"
}
```

<br>

### Add a student
#### URL
```http
POST http://localhost/student-management-system/teacher.php
```
 #### Data  
```json
{
  "token":"42417f1fe73f8c41a0809ba3b0f5fc4729c9fc77cb7227d431dd3d8bf8caf94d",
  "action":"add-student",
  "data":{
    "username":"Mita Ghosh",
    "email":"student4@gmail.com",
    "password":"avunix9143",
    "contactno":"+880171574359",
    "roll":"5"
  }
}
``` 
#### Response
```json
{
    "code": "2003",
    "message": "Student is created successfully"
}
```

<br>

### Get student list
#### URL
```http
POST http://localhost/student-management-system/teacher.php
```
 #### Data  
```json
{
  "token":"42417f1fe73f8c41a0809ba3b0f5fc4729c9fc77cb7227d431dd3d8bf8caf94d",
  "action":"student-list",
  "data":{}
}
``` 
#### Response
```json
{
    "code": "2043",
    "message": "Student list is retrieved",
    "data": [
        {
            "userid": "1591966086",
            "username": "Student 00",
            "roll": "1"
        },
        {
            "userid": "1753441896",
            "username": "Student 01",
            "roll": "2"
        }
    ]
}
```
<br>

### Get own profile
#### URL
```http
POST http://localhost/student-management-system/teacher.php
```
 #### Data  
```json
{
  "token":"42417f1fe73f8c41a0809ba3b0f5fc4729c9fc77cb7227d431dd3d8bf8caf94d",
  "action":"own-profile",
  "data":{}
}
``` 
#### Response
```json
{
    "code": "2047",
    "message": "Teacher profile is retrieved",
    "data": {
        "email": "teacher0@gmail.com",
        "userid": "995960612",
        "username": "Teacher Argha Nilanjon Nondi Teacher",
        "class": "1",
        "section": "A",
        "contactno": "+8801710762740"
    }
}
```
<br>

### Get student profile by roll
#### URL
```http
POST http://localhost/student-management-system/teacher.php
```
 #### Data  
```json
{
  "token":"42417f1fe73f8c41a0809ba3b0f5fc4729c9fc77cb7227d431dd3d8bf8caf94d",
  "action":"student-profile",
  "data":{
    "roll":"1"
  }
}
``` 
#### Response
```json
{
    "code": "2043",
    "message": "Student profile is retrieved",
    "data": {
        "userid": "1591966086",
        "username": "Student 00",
        "roll": "1",
        "contactno": "+8801710762740",
        "email": "student0@gmail.com"
    }
}
```
<br>

### Update student profile
#### URL
```http
POST http://localhost/student-management-system/teacher.php
```
 #### Data  
```json
{
  "token":"42417f1fe73f8c41a0809ba3b0f5fc4729c9fc77cb7227d431dd3d8bf8caf94d",
  "action":"student-update",
  "data":{
    "userid":"704241814",
    "username":"Mita NOndi",
    "contactno":"+88017157000",
    "roll":"5"
  }
}
``` 
#### Here "username","contactno","roll" is optional.
#### But "userid" is required.
#### Response
```json
{
    "code": "2063",
    "message": "Student profile is updated"
}
```
<br>

### Delete a student by roll
#### URL
```http
POST http://localhost/student-management-system/teacher.php
```
 #### Data  
```json
{
  "token":"42417f1fe73f8c41a0809ba3b0f5fc4729c9fc77cb7227d431dd3d8bf8caf94d",
  "action":"student-delete",
  "data":{
    "roll":"5"
  }
}
``` 
#### Response
```json
{
    "code": "2021",
    "message": "Student is deleted successfully"
}
```
<br>

### Create a checkin
#### URL
```http
POST http://localhost/student-management-system/teacher.php
```
 #### Data  
```json
{
  "token":"42417f1fe73f8c41a0809ba3b0f5fc4729c9fc77cb7227d431dd3d8bf8caf94d",
  "action":"create-checkin",
  "data":{
    "roll":"2",
    "date":"2021-5-17",
    "checkin":"9:10",
    "presenttype":"AB"
  }
}
``` 
#### "presenttype" has "PR" and "AB". "PR" is present and "AB" is absent.
#### "date" is in year-month-day format
#### "checkin" is in 24 hour format(hour-minute-second)  
#### Response
```json
{
    "code": "2035",
    "message": "Student is successfully checkin"
}
```
<br>

#### Create a checkout 
#### URL
```http
POST http://localhost/student-management-system/teacher.php
```
 #### Data  
```json
{
  "token":"42417f1fe73f8c41a0809ba3b0f5fc4729c9fc77cb7227d431dd3d8bf8caf94d",
  "action":"create-checkout",
  "data":{
    "roll":"2",
    "date":"2021-5-17",
    "checkout":"10:10"
  }
}
``` 
#### If "presenttype" is "AB" in checkin , you can't create a checkout of the date .
```json
{
    "code": "3067",
    "message": "Student is absent"
}
```
#### "date" is in year-month-day format
#### "checkin" is in 24 hour format(hour-minute-second) 
#### Response
```json
{
    "code": "2036",
    "message": "Student is successfully checkout"
}
```
<br>

### Update a check
#### URL
```http
POST http://localhost/student-management-system/teacher.php
```
 #### Data  
```json
{
  "token":"42417f1fe73f8c41a0809ba3b0f5fc4729c9fc77cb7227d431dd3d8bf8caf94d",
  "action":"update-check",
  "data":{
    "roll":"2",
    "date":"2021-5-17",
    "checkin":"2:20",
    "checkout":"22:44",
    "presenttype":"PR"
  }
}
``` 
#### Response
```json
{
    "code": "2066",
    "message": "Check is updated"
}
```
<br>

### Get a student's checklist and breaklist
#### URL
```http
POST http://localhost/student-management-system/teacher.php
```
 #### Data  
```json
{
  "token":"42417f1fe73f8c41a0809ba3b0f5fc4729c9fc77cb7227d431dd3d8bf8caf94d",
  "action":"student-checklist",
  "data":{
  "roll":"2"
  }
}
``` 
#### Response
```json
{
    "code": "2043",
    "message": "Student check list is retrieved",
    "data": {
        "checks": [
            {
                "workdate": "2021-05-17",
                "checkin": "02:20:00",
                "checkout": "22:44:00",
                "presenttype": "PR"
            }
        ],
        "breaks": [
            {
                "workdate": "2021-09-24",
                "timetext": "13:33:17",
                "reason": "I am ill",
                "status": "Pending"
            }
        ]
    }
}
```
#### "status" has values . They are "pending","accept","reject"
<br>

### List of breaks of all students
#### URL
```http
POST http://localhost/student-management-system/teacher.php
```
 #### Data  
```json
{
  "token":"42417f1fe73f8c41a0809ba3b0f5fc4729c9fc77cb7227d431dd3d8bf8caf94d",
  "action":"student-breaklist",
  "data":{
  }
}
``` 
#### Response
```json
{
    "code": "2022",
    "message": "Breaks is retrieved",
    "data": [
        {
            "roll": "1",
            "workdate": "2021-08-13",
            "reason": "I have to go the contest",
            "timetext": "12:21:00",
            "status": "pending"
        },
        {
            "roll": "1",
            "workdate": "2021-08-06",
            "reason": "I have to go the vet",
            "timetext": "12:21:00",
            "status": "accept"
        }
    ]
}
```
<br>

### Accept or reject a break 
#### URL
```http
POST http://localhost/student-management-system/teacher.php
```
 #### Data  
```json
{
  "token":"42417f1fe73f8c41a0809ba3b0f5fc4729c9fc77cb7227d431dd3d8bf8caf94d",
  "action":"update-break",
  "data":{
  "roll":"1",
  "date":"2021-08-6",
  "status":"accept"
  }
}
``` 
#### Response
```json
{
    "code": "2026",
    "message": "Break status is updated"
}
```
#### "status" has values . They are "accept","reject"

<br>

### Get own student profile
#### URL
```http
POST http://localhost/student-management-system/teacher.php
```
 #### Data  
```json
{
  "token":"f67ebc83e69a26bda3a960bb090a691168e9af738ad5e0769bef5afb302387ee",
  "action":"student-info",
  "data":{
  }
}
``` 
#### Response
```json
{
    "code": "2043",
    "message": "Student profile is retrieved",
    "data": {
        "userid": "1591966086",
        "username": "Student 00",
        "roll": "1",
        "class": "1",
        "section": "A",
        "contactno": "+8801710762740",
        "email": "student0@gmail.com"
    }
}
```
<br>

### Request a break
#### URL
```http
POST http://localhost/student-management-system/student.php
```
 #### Data  
```json
{
  "token":"f67ebc83e69a26bda3a960bb090a691168e9af738ad5e0769bef5afb302387ee",
  "action":"request-break",
  "data":{
  "date":"2021-05-09",
  "time":"9:53",
  "reason":"I am ill"
  }
}
``` 
#### Response
```json
{
    "code": "2047",
    "message": "Student request is placed"
}
```
<br>

### Delete a requested break
#### URL
```http
POST http://localhost/student-management-system/student.php
```
 #### Data  
```json
{
  "token":"f67ebc83e69a26bda3a960bb090a691168e9af738ad5e0769bef5afb302387ee",
  "action":"delete-break",
  "data":{
  "date":"2021-05-09",
  "time":"9:53"
  }
}
``` 
#### Response
```json
{
    "code": "2097",
    "message": "Student request is deleted"
}
```
<br>

### Get student own check and break list
#### URL
```http
POST http://localhost/student-management-system/student.php
```
 #### Data  
```json
{
  "token":"f67ebc83e69a26bda3a960bb090a691168e9af738ad5e0769bef5afb302387ee",
  "action":"student-checkbreaklist",
  "data":{
  }
}
``` 
#### Response
```json
{
    "code": "2043",
    "message": "Student check list is retrieved",
    "data": {
        "checks": [
            {
                "workdate": "2021-07-28",
                "checkin": "10:30:00",
                "checkout": "00:00:20",
                "presenttype": "PR"
            },
             {
                "workdate": "2021-07-18",
                "checkin": "10:30:00",
                "checkout": "00:00:20",
                "presenttype": "AB"
            }
        ],
        "breaks": [
            {
                "workdate": "2021-08-18",
                "timetext": "12:21:00",
                "reason": "I will be at the book fair",
                "status": "accept"
            },
            {
                "workdate": "2021-08-13",
                "timetext": "12:21:00",
                "reason": "I have to go the contest",
                "status": "pending"
            },
            {
                "workdate": "2021-08-06",
                "timetext": "12:21:00",
                "reason": "I have to go the vet",
                "status": "reject"
            }
        ]
    }
}
```
<br>

### Get student own just break list
#### URL
```http
POST http://localhost/student-management-system/student.php
```
 #### Data  
```json
{
  "token":"f67ebc83e69a26bda3a960bb090a691168e9af738ad5e0769bef5afb302387ee",
  "action":"student-breaklist",
  "data":{
  }
}
``` 
#### Response
```json
{
    "code": "2043",
    "message": "Student break list is retrieved",
    "data": {
        "breaks": [
            {
                "workdate": "2021-08-18",
                "timetext": "12:21:00",
                "reason": "I will be at the book fair",
                "status": "accept"
            },
            {
                "workdate": "2021-08-13",
                "timetext": "12:21:00",
                "reason": "I have to go the contest",
                "status": "pending"
            },
            {
                "workdate": "2021-08-06",
                "timetext": "12:21:00",
                "reason": "I have to go the vet",
                "status": "accept"
            }
        ]
    }
}
```
<br>

### 
#### URL
```http
POST http://localhost/student-management-system/validation.php
```
 #### Data  
```json
{
  "token":"f67ebc83e69a26bda3a960bb090a691168e9af738ad5e0769bef5afb302387ee",
  "usertype":"admin"
}
``` 
#### "usertype" has the values of "student","teacher" and "admin"
#### Response
```json
{
    "code": "2300",
    "message": "Token is valid"
}
```
<br>

### 
#### URL
```http
POST http://localhost/student-management-system/common.php
```
 #### Data  
```json
{
"action":"change-password",
  "data":{
   "token":"f67ebc83e69a26bda3a960bb090a691168e9af738ad5e0769bef5afb302387ee",
   "old-password":"avunix9143",
   "new-password":"avunix9143new"
  }
}
``` 
#### Response
```json
{
    "code": "2099",
    "message": "Password is changed"
}
```
<br>


## License
- You can't use it for commercial usage
- You can use it just for eductional usage

<br>
