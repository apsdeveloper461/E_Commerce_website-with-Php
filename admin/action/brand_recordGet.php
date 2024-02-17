<?php
require_once '../DB/CRUD.php';


if(isset($_POST['brand_Id'])){
    // echo $_POST['cat_id'];
    $data=FetchCustomRecord('brands',"WHERE Brand_Id=". intval($_POST['brand_Id']));
    $data=mysqli_fetch_assoc($data);
    echo json_encode($data);
    }
?>