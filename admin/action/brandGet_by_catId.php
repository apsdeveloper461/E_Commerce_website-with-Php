<?php
require_once '../DB/CRUD.php';

// echo var_dump($_REQUEST)
if(isset($_POST['Category_Id'])){
    // echo $_POST['cat_id'];
    $res=FetchCustomRecord('brands',"WHERE Category_Id=". intval($_POST['Category_Id']));
    $data=mysqli_fetch_all($res,MYSQLI_ASSOC);
     echo json_encode($data);
}
?>