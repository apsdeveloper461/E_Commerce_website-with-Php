<?php 
require_once '../DB/CRUD.php';

if((isset($_POST['action']))=='edit'){
// echo $_POST['cat_id'];
$data=FetchCustomRecord('categories',"WHERE Category_Id=".$_POST['cat_id'] );
$data=mysqli_fetch_assoc($data);
echo json_encode($data);
}
?>