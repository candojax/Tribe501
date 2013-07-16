<?php 
session_start();
$id = $_SESSION['id']; 
$usrname = $_SESSION['usrname']; 

$namelf = $_SESSION['name'];
$namexp = explode(",", $namelf);
$lname = $namexp[0];
$fname = $namexp[1];
$namearr = array($fname,$lname);
$fullname = implode(" ",$namearr);
$status = $_SESSION['status']; 
$lvl = $_SESSION['lvl']; 
$cmfn = $_SESSION['cmfn']; 
$empl = $_SESSION['empl']; 
$phone = $_SESSION['phone'];
$phone2 = $_SESSION['phone2']; 
$email = $_SESSION['email']; 
$adrss = $_SESSION['adrss']; 
$dob = $_SESSION['dob']; 
$emcon1 = $_SESSION['emcon1']; 
$emcon2 = $_SESSION['emcon2']; 
$trnyr = $_SESSION['trnyr'];
$admin = $_SESSION['admin']; 
$enroll = $_SESSION['enrolled'];
$classes = explode(",", $enroll);
?>