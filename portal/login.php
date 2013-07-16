<?php
session_start();
$pagetitle="login";
include('templates/header.php');

//set vars to check
$username = $_POST['usrnm'];
$pass = md5($_POST['pass']);
//check vars against db
if (!($stmt = $mysqli->prepare("SELECT * FROM students WHERE stu_usrname = ? AND stu_pass = ?"))) {
echo "login failed"; die(); }
else {
$stmt->bind_param('ss', $username, $pass);
$stmt->execute();
//assign results to array
$studata = $stmt->result_metadata();
while ($field = $studata->fetch_field()) {

$parameters[] = &$row[$field->name];
}
call_user_func_array(array($stmt, 'bind_result'), $parameters);

while ($stmt->fetch()) {
foreach ($row as $key => $val) {
$x[$key] = $val;
}
$results[] = $x;
$_SESSION[] = $x;
}
header('Location: index.php');
$stmt->close();

}

echo $results['stu_name'];
var_dump($_SESSION);
$_SESSION['id'] = $row['stu_id']; 
$_SESSION['usrname'] = $row['stu_usrname']; 
$_SESSION['pswd'] = $row['stu_pass']; 
$_SESSION['name'] = $row['stu_name'];
$_SESSION['status'] = $row['stu_status']; 
$_SESSION['lvl'] = $row['stu_lvl']; 
$_SESSION['cmfn'] = $row['stu_cmpfnd']; 
$_SESSION['empl'] = $row['stu_empl']; 
$_SESSION['phone'] = $row['stu_phone'];
$_SESSION['phone2'] = $row['phone2']; 
$_SESSION['email'] = $row['stu_email']; 
$_SESSION['adrss'] = $row['stu_addr']; 
$_SESSION['dob'] = $row['stu_dob']; 
$_SESSION['emcon1'] = $row['stu_emcon1']; 
$_SESSION['emcon2'] = $row['stu_emcon2']; 
$_SESSION['trnyr'] = $row['stu_trainyr']; 
$_SESSION['enrolled'] = $row['enrolled'];
$_SESSION['admin'] = $row['admin'];
include('templates/footer.php');
?>