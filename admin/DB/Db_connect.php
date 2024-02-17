<?php

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','apsdev_e_com');

    
        $conn=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        // if($conn){
        //     echo " Connecting to db Successfully";
        // }else{
        //     echo "Error : ".mysqli_connect_error($conn); 

        // }

    
?>