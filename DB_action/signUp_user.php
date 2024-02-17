<?php

require_once '../admin/DB/CRUD.php';
// echo 'hello';
// print_r($_POST);
$res=FetchCustomRecord('e_com_users',"WHERE User_Email='$_POST[email]'");
if($res){
    $rows=mysqli_num_rows($res);
    if($rows) die('warning');
}

$data=[
    'User_Name'=> $_POST['username'],
    'Password'=> $_POST['password'],
    'User_Email'=>$_POST['email'],
    'Account_Created_Date'=>date('Y-m-d H:i:s')
];
$result=InsertRecord('e_com_users',$data);
if($result) {
    
    die('success');
}
else  die('danger');



?>