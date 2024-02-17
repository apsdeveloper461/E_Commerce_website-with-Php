<?php 
   require_once './CRUD.php';
   if($_POST['form_type']=='delete'){
           $res=DeleteRecord('products_table',"WHERE Product_Id=". $_POST['Product_Id']);
           if($res) die('warning');
           else   echo die('Dark');
}else if($_POST['form_type']=='add'){

    $fileName=$_FILES['ProductThumbnail']['name'];
    $tmpName=$_FILES['ProductThumbnail']['tmp_name'];
    $fileExtension=pathinfo($fileName,PATHINFO_EXTENSION);

    $newfileName=date('mYdHis').'.'.$fileExtension;
    $targetDir='../../images/Products';
    $fileStoreDir=$targetDir.'/'. $newfileName;
    $thumbnail=move_uploaded_file($tmpName,$fileStoreDir);
    $data=[
        'Product_Title'=>$_POST['ProductName'],
        'Category_Id'=> $_POST['Category_Id'],
        'Brand_Id'=> $_POST['Brand_Id'],
        'Regular_Price'=> $_POST['regularPrice'],
        'Selling_Price'=> $_POST['sellingPrice'],
        'Short_Des'=> $_POST['shortDes'],
        'Long_Des'=> $_POST['longDes'],
        'Thumbnail'=> $newfileName
    ];


          $result=InsertRecord('products_table',$data);
          if($result) die('success');
          else die('danger');
    }else{
        die('Problem');
    }


?>