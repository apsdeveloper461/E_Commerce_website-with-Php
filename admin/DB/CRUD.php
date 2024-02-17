<?php
//load
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'apsdev_e_com');


$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//create insert function

function InsertRecord($table_name, $data)
{
    //check data not empty
    global $conn;
    if (!empty($data)) {
        //field for store field name and place holder store the respective Data
        $fields = [];
        $placeholder = [];
        //extract data from $data and store into fields and place holder fo inserting
        foreach ($data as $field => $value) {
            $fields[] = $field;
            $placeholder[] = $value;
        }
    }
    // echo print_r($fields);
    $head = implode(",", $fields);
    $body = implode("','", $placeholder);
    // echo $head;

    $query = "INSERT INTO $table_name ($head) VALUES ('$body')";
    $result = mysqli_query($conn, $query);
     return $result;
}

//Fetch All Data from Data base
function FetchCustomRecord($table_name, $where = '')
{
    global $conn;
    $sql = "SELECT * FROM $table_name $where";
    $result = mysqli_query($conn, $sql);
    return $result;
}

//Update Data in my Sql

function UpdateRecord($table_name, $data, $where)
{
    //check data not empty
    global $conn;
    if (!empty($data)) {
        $fields = '';
        $x = 1;
        $fieldCount = count($data);
        foreach ($data as $field => $value) {
            $fields .= "{$field}='{$value}'";
            if ($x < $fieldCount) {
                $fields .= ", ";
            }
            $x++;
        }
        // echo $fields;
        $sql="UPDATE $table_name SET {$fields}  $where";
        $result=mysqli_query($conn,$sql);
        return $result; 
        // if($result) echo "hi";
        // else echo 'h';
    }
    return 'error';
    // echo $result;
}
// $data = [
//     "Category_Name" =>"alam"
//   ];
  
// UpdateRecord('categories', $data, "WHERE Category_Id=37");
// // echo $r;


//Delete record record
function DeleteRecord($table_name,$where){
     global $conn;
    if(!empty($where)){
        $sql="DELETE FROM $table_name $where";
        $result=mysqli_query($conn,$sql);
          return $result;    
    }
    return 'danger';
    
}
// echo DeleteRecord('categories',41);


 //Fetch All Data from Data base
 function FetchRecords($table_name,$offset,$total_record_on_page){
    global $conn;
    $sql="SELECT * FROM $table_name LIMIT $offset,$total_record_on_page";
    $result=mysqli_query($conn,$sql);
//    echo var_dump($)
    return $result;
}


function pagination($table_name,$total_record_on_page){
    global $conn;
    $sql="SELECT * FROM $table_name ";
    $result=mysqli_query($conn,$sql);
    $rows=mysqli_num_rows($result);
    $pages=ceil($rows/$total_record_on_page);
    // echo $pages;
    return $pages;
    
}
// echo pagination('categories');

function getRecordCount($table_name){
    global $conn;
    $sql = "SELECT * FROM $table_name";
    $result = mysqli_query($conn, $sql);
    $rows=mysqli_num_rows($result);
    return $rows;  
}
?>