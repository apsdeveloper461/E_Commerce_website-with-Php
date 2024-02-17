<?php
require_once './CRUD.php';
//get all Data and Insert into DB
$data = [
  "Category_Name" => $_POST['categoryName']
];

if ($_POST['form_type'] == 'add') {  //Insert a new Data
  if ($_POST['categoryName'] == '') {
    die('warning');
  }
  //Insert Data in Table categories
  $result = InsertRecord('categories', $data);
  if ($result) die("success");
  else echo die("Insert");
} else if ($_POST['form_type'] == 'update') {  //for Update Data
  if ($_POST['cat_Id'] > 0) {
    $result = UpdateRecord('categories', $data, "WHERE Category_Id={$_POST['cat_Id']}");
    if ($result) die('info');
    else  die('Update');
  } else  die('Update');
  
} else if ($_POST['form_type'] == 'delete') { //Deleted a daata
  $result = DeleteRecord('categories', 'WHERE Category_Id=' .$_POST['cat_Id']);
  if ($result) {
    echo 'primary';
  } else {
    echo 'delete';
  }
} else {
  echo 'danger';
}








// $text='mehboob alam';
// function slugify($text,$slug_url,$table_name){
//   $text=preg_replace('/[^a-z0-9]+/i','-',strtolower($text));
//   $query="SELECT $slug_url FROM $table_name WHERE $slug_url LIKE '$text%'";
//   $result=mysqli_query($GLOBALS['dsn'],$query);
//   echo $result;
//   echo $text;
// }
// slugify($text,);
