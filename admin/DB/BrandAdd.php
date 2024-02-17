<?php 
require_once './CRUD.php';
// echo $_POST['BrandName'];
//check both are not empty

if($_POST['form_type']=='add'){
    if(empty($_POST['BrandName']) || empty( $_POST['Category_Id'])){
        die('warning');
    }
    $data=[
       'Brand_Name'=> $_POST['BrandName'],
       'Category_Id'=> $_POST['Category_Id']
    ];
    $result=InsertRecord('brands',$data);
    if($result) echo 'success';
    else echo 'danger';
}
else if($_POST['form_type']=='edit'){
    if(empty($_POST['BrandName']) || empty( $_POST['Category_Id'])){
        die('warning');
    }
    $data=[
       'Brand_Name'=> $_POST['BrandName'],
       'Category_Id'=> $_POST['Category_Id']
    ];
    $result=UpdateRecord('brands',$data,'WHERE Brand_Id='.$_POST['brand_Id']);
    if($result) echo 'info';
    else echo 'danger';
    
}
else if($_POST['form_type']=='delete'){
    $result=DeleteRecord('brands','WHERE Brand_Id='. $_POST['brand_Id']);
    if($result) echo 'primary';
    else echo 'danger';
}
else{
    echo 'dark';
}
?>