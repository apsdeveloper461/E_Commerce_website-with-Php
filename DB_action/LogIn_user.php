<?php

require_once '../admin/DB/CRUD.php';

$result = FetchCustomRecord('e_com_users', "WHERE User_Email='$_POST[email]' AND Password='$_POST[password]'");
// echo $result;
if ($result) {
    $entry = mysqli_num_rows($result);
    if ($entry == 1) {
        $record=mysqli_fetch_assoc($result);
         $enterLogInDate=UpdateRecord('e_com_users',['Last_LogIn_Date'=>date('Y-m-d H:i:s')],"WHERE User_Id=$record[User_Id]");
        $cookie_email = 'Email';
        $cookie_email_val = $record['User_Email'];
        setcookie($cookie_email, $cookie_email_val, time() + (86400 * 30), "/");
        $cookie_userId = 'Id';
        $cookie_Id_val = $record['User_Id'];
        setcookie($cookie_userId, $cookie_Id_val, time() + (86400 * 30), "/");
        $cookie_Name = 'Name';
        $cookie_Name_val = $record['User_Name'];
        setcookie($cookie_Name, $cookie_Name_val, time() + (86400 * 30), "/");
        die("success");
    } else {
        die('danger');
    }
} else {
    die("danger");
}
