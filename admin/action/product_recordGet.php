<?php
require_once '../DB/CRUD.php';


if(isset($_POST['Product_Id'])){
    $data=FetchCustomRecord('products_table',"WHERE Product_Id=". intval($_POST['Product_Id']));
    $data=mysqli_fetch_assoc($data);
    echo json_encode($data);
    }
?>