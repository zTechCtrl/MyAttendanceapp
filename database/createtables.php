<?php

$path = $_SERVER['DOCUMENT_ROOT'];
require_once $path . "/attendanceapp/database/database.php";
function clearTable($dbo, $tabName)
{
  $c = "delete from ".$tabName;
  $s = $dbo->conn->prepare($c);
  try {
    $s->execute();
    echo($tabName." cleared");
  } catch (PDOException $oo) {
    echo($oo->getMessage());
  }
}
$dbo = new Database();
$c = "create table student_details
(
    id int auto_increment primary key,
    roll_no varchar(20) unique,
    name varchar(50),
    email_id varchar(100)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>student_details created");
} catch (PDOException $o) {
  echo ("<br>student_details not created");
}

$c = "create table course_details
(
    id int auto_increment primary key,
    code varchar(20) unique,
    title varchar(50),
    credit int
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>course_details created");
} catch (PDOException $o) {
  echo ("<br>course_details not created");
}


$c = "create table faculty_details
(
    id int auto_increment primary key,
    user_name varchar(20) unique,
    name varchar(100),
    password varchar(50)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>faculty_details created");
} catch (PDOException $o) {
  echo ("<br>faculty_details not created");
}


$c = "create table session_details
(
    id int auto_increment primary key,
    year int,
    term varchar(50),
    unique (year,term)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>session_details created");
} catch (PDOException $o) {
  echo ("<br>session_details not created");
}



$c = "create table course_registration
(
    student_id int,
    course_id int,
    session_id int,
    primary key (student_id,course_id,session_id)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>course_registration created");
} catch (PDOException $o) {
  echo ("<br>course_registration not created");
}
clearTable($dbo, "course_registration");

$c = "create table course_allotment
(
    faculty_id int,
    course_id int,
    session_id int,
    primary key (faculty_id,course_id,session_id)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>course_allotment created");
} catch (PDOException $o) {
  echo ("<br>course_allotment not created");
}
clearTable($dbo, "course_allotment");

$c = "create table attendance_details
(
    faculty_id int,
    course_id int,
    session_id int,
    student_id int,
    on_date date,
    status varchar(10),
    primary key (faculty_id,course_id,session_id,student_id,on_date)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>attendance_details created");
} catch (PDOException $o) {
  echo ("<br>attendance_details not created");
}
clearTable($dbo, "attendance_details");

$c = "create table sent_email_details
(
    faculty_id int,
    course_id int,
    session_id int,
    student_id int,
    on_date date,
    id int auto_increment primary key,
    message varchar(200),
    to_email varchar(100)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>sent_email_details created");
} catch (PDOException $o) {
  echo ("<br>sent_email_details not created");
}
clearTable($dbo, "sent_email_details");

clearTable($dbo, "student_details");
$c = "insert into student_details
(id,roll_no,name,email_id)
values
(1,'G126/1280/2021','OCHIENG ANTONY OMONDI','abc@gmail.com'),
(2,'G126/1275/2021','MUTUNGA JOSHUA MWONGELA','abc@gmail.com'),
(3,'G126/1279/2021','WEKESA EZEKIEL','abc@gmail.com'),
(4,'G126/1282/2021','MUTHOMI KEVIN MUTUGI','abc@gmail.com'),
(5,'G126/1281/2021','ROGERS KIOKO','abc@gmail.com'),
(6,'G127/0671/2018','SYOMBUA ALICE MWIKALI','abc@gmail.com'),
(7,'G126/1297/2021','MUMO EDWARD SILA','abc@gmail.com'),
(8,'G126/1268/2021','MAKENA HILDAH','abc@gmail.com'),
(9,'G127/2290/2021','KIMANGA K JUSTUS','abc@gmail.com'),
(10,'G127/1411/2021','OMONDI BENEDICT OMONDI','abc@gmail.com'),
(11,'G127/1408/2021','BREVERLY CHEBOIWO YATICH','abc@gmail.com'),
(12,'G127/1406/2021','MICHAEL JOSEPH MWANZIA','abc@gmail.com'),

(13,'G127/1399/2021','KOECH BARNABAS KIPLAGAT','abc@gmail.com'),
(14,'G127/1398/2021','IKWONYIKE KIPTOO ELVIS','abc@gmail.com'),
(15,'G127/1397/2021','MWEU JAPHETH KYALO','abc@gmail.com'),
(16,'G127/1396/2021','GISAIRO PATRICK NYAKUNDI','abc@gmail.com'),
(17,'G127/1396/2020','GILBERT CHERUIYOT RONOH','abc@gmail.com'),
(18,'G127/1391/2021','MUTHAMA IRENE NDINDA','abc@gmail.com'),
(19,'G127/1391/2020','WILTER CHEPKIRUI','abc@gmail.com'),
(20,'G127/1389/2021','WAWERU IVY JOYCE MUTHONI','abc@gmail.com'),
(21,'G127/1388/2021','MATHEW NYANG`AYA ANARIKO','abc@gmail.com'),
(22,'G127/1386/2021','ODHIAMBO ROYAN OCHIENG`','abc@gmail.com'),
(23,'G127/1379/2021','ERICK MOBISA','abc@gmail.com'),
(24,'G127/1373/2021','VICTOR KIPKOECH KIRUI','abc@gmail.com'),
(25,'G126/1318/2021','CALVIN NYANGAU ONCHIRI','abc@gmail.com'),
(26,'G126/1312/2021','OCHIENG ISAAC OCHIENG','abc@gmail.com'),
(27,'G126/1310/2021','FRANKLINE KIPYEGON NGENO','abc@gmail.com'),
(28,'G126/1308/2021','JOHN MICHAEL NYANTIKA','abc@gmail.com'),
(29,'G126/1319/2021','MBITHI DENNIS WAMBUA','abc@gmail.com'),
(30,'G126/1323/2021','MUSISI DYLAN','abc@gmail.com')";


$s = $dbo->conn->prepare($c);
try {
  $s->execute();
} catch (PDOException $o) {
  echo ("<br>duplicate entry");
}

clearTable($dbo, "faculty_details");
$c = "insert into faculty_details
(id,user_name,password,name)
values
(1,'omala','123','Dr Omala'),
(2,'tonny','123','Anthooh O.'),
(3,'shikali','123','Shivani Shikali'),
(4,'ngemu','123','Vasdinus Ngemu'),
(5,'onkangi','123','Caroline Onkangi'),
(6,'mogire','123','Mogire Omaya')";

$s = $dbo->conn->prepare($c);
try {
  $s->execute();
} catch (PDOException $o) {
  echo ("<br>duplicate entry");
}

clearTable($dbo, "session_details");
$c = "insert into session_details
(id,year,term)
values
(1,2024,'1ST SEMESTER'),
(2,2025,'2ND SEMESTER')";

$s = $dbo->conn->prepare($c);
try {
  $s->execute();
} catch (PDOException $o) {
  echo ("<br>duplicate entry");
}

clearTable($dbo, "course_details");
$c = "insert into course_details
(id,title,code,credit)
values
(1,'Multimedia Technologies','SCI403',2),
(2,'Project Management','DBA403',3),
(3,'Human Computer Interface','SCI406',4),
(4,'Computer System project','SCI450',5),
(5,'Research Methods','ESM305',6),
(6,'Information Systems Security and Audit','SCI407',7),
(7,'Computer Network security','CSC420',8),
(8,'Compiler Construction','CSC421',9),
(9,'Machine Learning','CSC422',10),
(10,'Mobile and Wireless Networks','SCI402',11),
(11,'Data Mining','SCI442',12),
(12,'Entrepreneurship','DBA-403',13)";

$s = $dbo->conn->prepare($c);
try {
  $s->execute();
} catch (PDOException $o) {
  echo ("<br>duplicate entry");
}

//if any record already there in the table delete them
clearTable($dbo, "course_registration");
$c = "insert into course_registration
  (student_id,course_id,session_id)
  values
  (:sid,:cid,:sessid)";
$s = $dbo->conn->prepare($c);
//iterate over all the 30 students
//for each of them chose max 3 random courses, from 1 to 12

for ($i = 1; $i <= 30; $i++) {
  for ($j = 0; $j < 6; $j++) {
    $cid = rand(1, 12);
    //insert the selected course into course_registration table for 
    //session 1 and student_id $i
    try {
      $s->execute([":sid" => $i, ":cid" => $cid, ":sessid" => 1]);
    } catch (PDOException $pe) {
    }

    //repeat for session 2
    $cid = rand(1, 12);
    //insert the selected course into course_registration table for 
    //session 2 and student_id $i
    try {
      $s->execute([":sid" => $i, ":cid" => $cid, ":sessid" => 2]);
    } catch (PDOException $pe) {
    }
  }
}


//if any record already there in the table delete them
clearTable($dbo, "course_allotment");
$c = "insert into course_allotment
  (faculty_id,course_id,session_id)
  values
  (:fid,:cid,:sessid)";
$s = $dbo->conn->prepare($c);
//iterate over all the 6 teachers
//for each of them chose max 2 random courses, from 1 to 6

for ($i = 1; $i <= 6; $i++) {
  for ($j = 0; $j < 3; $j++) {
    $cid = rand(1, 12);
    //insert the selected course into course_allotment table for 
    //session 1 and fac_id $i
    try {
      $s->execute([":fid" => $i, ":cid" => $cid, ":sessid" => 1]);
    } catch (PDOException $pe) {
    }

    //repeat for session 2
    $cid = rand(1, 12);
    //insert the selected course into course_allotment table for 
    //session 2 and student_id $i
    try {
      $s->execute([":fid" => $i, ":cid" => $cid, ":sessid" => 2]);
    } catch (PDOException $pe) {
    }

  }
}
