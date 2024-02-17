<?php
require_once '../admin/DB/CRUD.php';

$Id=$_COOKIE['Id'];
$data=[
    'Password'=>$_POST['NewPassword']
];
$res=UpdateRecord('e_com_users',$data,"WHERE User_Id=$Id");
if($res) die('success');
else die('danger');

 

?>