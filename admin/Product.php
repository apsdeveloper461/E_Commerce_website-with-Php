<!-- import CRud php file to get all category Data -->
<?php
require_once './includes/header.php';
require_once './DB/CRUD.php';
//get the data of Category
$Cat_Data = FetchCustomRecord('categories');
$Cat_Data_rows = mysqli_num_rows($Cat_Data);

// //get all data of product
// $Product_data = FetchCustomRecord('products_table');
// $Product_data_rows = mysqli_num_rows($Product_data);

//Make a pagination 
//Get toal number of pages
$total_record_on_page = 5;
$total_pages = pagination('products_table', $total_record_on_page);
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$pageno = intval($pageno);
$offset = ($pageno - 1) * $total_record_on_page;
$Product_data = FetchRecords('products_table', $offset, $total_record_on_page);
$Product_data_rows = mysqli_num_rows($Product_data);

?>




<section class="right">
    <div class="alert  alert-dismissible fade show " id="notifcation" role="alert">
        <strong>sorry ! </strong> Cannot add category.Plz Try Again !
    </div>
    <div class="category_heading">
        <h1 class="text-dark border-bottom pb-2">Products</h1>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mt-4 ml-5" id="add_product" data-toggle="modal" data-target="#productModel">
            Add Product <b> + </b>
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="productModel" tabindex="-1" role="dialog" aria-labelledby="catTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content " style="padding: 5px 25px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalTitle"> Product Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="Product_Form">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="ProductName" class="col-form-label mt-2"><b>Title of Product: </b></label>
                                <input type="text" class="form-control" name="ProductName" id="ProductName" placeholder="Enter the Product Name ....." required>
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="Category_Id"> <b>Select Category Name :</b></label>
                                <div id="catSlectionError" class="text-danger"></div>
                                <select name="Category_Id" id="Category_Id" class="form-control" required>
                                    <option value="0">- - - -Select a Category- - - -</option>
                                    <?php for ($i = 0; $i < $Cat_Data_rows; $i++) {
                                        $record = mysqli_fetch_assoc($Cat_Data); ?>
                                        <option <?php echo "value=$record[Category_Id]>";
                                                echo $record['Category_Name']; ?></option>
                                        <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="Brand_Id"> <b>Select Brand Name :</b> (First select category)</label>
                                <div id="brandSlectionError" class="text-danger"></div>
                                <select name="Brand_Id" id="Brand_Id" class="form-control" required>
                                    <option value="0">- - - -Select a Brand- - - -</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="regularPrice" class="col-form-label mt-2"><b>Regular Price: </b></label>
                                <input type="number" class="form-control" name="regularPrice" id="regularPrice" placeholder="Enter regular Price .." min="0" required>
                            </div>
                            <div class="col-md-6">
                                <label for="sellingPrice" class="col-form-label mt-2"><b>Selling Price : </b></label>
                                <input type="number" class="form-control" name="sellingPrice" id="sellingPrice" placeholder="Enter selling Price" min="0" required>
                            </div>
                            <div class="col-md-12">
                                <label for="ProductThumbnail" class="col-form-label mt-2"><b>Upload Product Thumbnail :</b></label>
                                <input type="file" id='ProductThumbnail' class="form-control" name="ProductThumbnail" required>
                            </div>
                            <div class="col-md-12">
                                <label for="shortDes" class="col-form-label mt-2"><b>Short Description : </b></label>
                                <textarea name="shortDes" id="shortDes" class="col-md-12 p-2 form-control" rows="5" placeholder="Enter a short description about Product .." required></textarea>

                            </div>
                            <div class="col-md-12">
                                <label for="longDes" class="col-form-label mt-2"><b>Long Description :</b> </label>
                                <textarea name="longDes" id="longDes" class="col-md-12 p-2 form-control" rows="5" placeholder="Enter a Long description about Product .." minlength="10" required></textarea>

                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="Product_Id" id="Product_Id">
                        <input type="hidden" name="form_type" id='form_type'>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary save" id="submit" aria-hidden="true">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- table to show the data of Brand and category -->
    <table class="table table-hover " style="box-shadow: -1px 0px 6px 2px #71717154; max-width:98%;">
        <thead class="bg-info text-white">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Product Name</th>
                <th scope="col">Category Name</th>
                <th scope="col">Brand Name</th>
                <th scope="col">Regular Price</th>
                <th scope="col">Selling Price</th>
                <th scope="col">Thumbnail</th>
                <th scope="col">Created_Date</th>
                <th scope="col">Short Des</th>
                <th scope="col">Long Des</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <!-- show all Records -->
            <?php for ($i = 0; $i < $Product_data_rows; $i++) {
                $record = mysqli_fetch_assoc($Product_data);
                $category_info = FetchCustomRecord('categories', 'WHERE Category_Id=' . $record['Category_Id']);
                if(mysqli_num_rows($category_info)){
                    $category_Data = mysqli_fetch_assoc($category_info);
                }
                $brand_info = FetchCustomRecord('brands', 'WHERE Brand_Id=' . $record['Brand_Id']);
                if(mysqli_num_rows($brand_info)){
                    $Brand_Data = mysqli_fetch_assoc($brand_info);
                }
                            ?>
                <tr>
                    <th scope="row"> <?php echo $record['Product_Id']; ?></th>
                    <td><?php echo $record['Product_Title']; ?></td>
                    <td><?php  if(mysqli_num_rows($category_info)){echo $category_Data['Category_Name'];}else{ echo '';} ?></td>
                    <td><?php if(mysqli_num_rows($brand_info)){echo $Brand_Data['Brand_Name'];}else{ echo '';} ?></td>
                    <td><?php echo $record['Regular_Price']; ?></td>
                    <td><?php echo $record['Selling_Price']; ?></td>
                    <td><?php echo $record['Thumbnail']; ?></td>
                    <td><?php echo $record['Created_Product_at']; ?></td>
                    <td><?php echo $record['Short_Des']; ?></td>
                    <td><?php echo $record['Long_Des']; ?></td>
                    <td><button class="Delete_product_record getProductID btn btn-small btn-danger" value="<?php echo $record['Product_Id']; ?>">Delete</button></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="pagination mt-2 ml-3">
        <li class="page-item <?php if ($pageno <= 1) {
                                    echo 'disabled';
                                } ?> "><a class="page-link " href="?pageno=<?php echo ($pageno - 1); ?>">Previous </a></li>
        <?php
        for ($i = 1; $i <= $total_pages; $i++) {
            // # code...
            if ($pageno == $i) {
                echo '<li class="page-item active"><a class="page-link" href="?pageno=' . $i . '"> ' . $i . '</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link " href="?pageno=' . $i . '"> ' . $i . '</a></li>';
            }
        }
        ?>
        <li class="page-item <?php if ($pageno >= $total_pages) echo 'disabled'; ?> "><a class="page-link \" href="?pageno=<?php echo ($pageno + 1); ?>">Next </a></li>
    </div>
</section>
<!-- import footer section -->
<?php require_once "./includes/footer.php";   ?>


<script>
    //Ajax for handle update category Data request
    $('#submit').click(function() {
        if ($('#Category_Id').val() == '0') {
            $('#catSlectionError').text("Please Select category");
        } else {
            $('#catSlectionError').text('');
        }
        if ($('#Brand_Id').val() == '0') {
            $('#brandSlectionError').text("Please Select Brand (if not have first add brand of this category)");
        } else {
            $('#brandSlectionError').text('');
        }
        // if(($('#ProductName').val() != '') &&($('#regularPrice').val()!='') && ($('#sellingPrice').val()!= '') && ($('#ProductThumbnail').fil) )
    })
    // $('#modalhide').change(function(){
    //     if (($('#modalhide').val() == 'hide') ) {
    //         $('#productModel').modal('hide');
    //        $('#modalhide').val('');
    //     }
    // })
    $('#add_product').click(function() {
        $('#Product_Form')[0].reset();
        $('#ModalTitle').text('Add New Product');
    })
   

</script>

<script src="./js/product.js"></script>