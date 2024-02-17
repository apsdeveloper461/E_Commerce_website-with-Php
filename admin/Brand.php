<!-- import CRud php file to get all category Data -->
<?php
require_once './DB/CRUD.php';
require_once './includes/header.php';

$Cat_Data = FetchCustomRecord('categories');
$Cat_Data_rows = mysqli_num_rows($Cat_Data);

// echo $rows;
//Make a pagination 
//Get toal number of pages
$total_record_on_page = 5;
$total_pages = pagination('brands', $total_record_on_page);
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$pageno = intval($pageno);
$offset = ($pageno - 1) * $total_record_on_page;
$Brand_Data = FetchRecords('brands', $offset, $total_record_on_page);
$Brand_Data_rows = mysqli_num_rows($Brand_Data);


?>





<section class="right">
    <div class="alert  alert-dismissible fade show " id="notifcation" role="alert">
        <strong>sorry ! </strong> Cannot add category.Plz Try Again !
    </div>
    <div class="category_heading">
        <h1 class="text-dark border-bottom pb-2">Brands</h1>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mt-4 ml-5" id="add_brand" data-toggle="modal" data-target="#brandModel">
            Add Brand <b> + </b>
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="brandModel"  tabindex="-1" role="dialog" aria-labelledby="catTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="padding: 5px 25px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalTitle"> Brand Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="Brand_Form">
                        <label for="Category_Name"> <b>Select Category Name</b> </label>
                        <select name="Category_Id" id="Category_Id" class="form-control" default='0'>
                            <option value="0">- - - -Select a Category- - - -</option>
                            <?php for ($i = 0; $i < $Cat_Data_rows; $i++) {
                                $record = mysqli_fetch_assoc($Cat_Data); ?>
                                <option <?php echo "value=$record[Category_Id]>";
                                        echo $record['Category_Name']; ?></option>
                                <?php } ?>
                        </select>
                        <label for="brand_name" class="col-form-label mt-2"><b>Name of Brand:</b> </label>
                        <input type="text" class="form-control" name="BrandName" id="brand_name" placeholder="Enter the name of brand ..">

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="brand_Id" id="brand_Id">
                    <input type="hidden" name="form_type" id='form_type'>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary save" id="submit" aria-hidden="true">Add</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- table to show the data of Brand and category -->
    <table class="table table-hover" style=" box-shadow: -1px 0px 6px 2px #71717154;  max-width:98%;">
        <thead class="bg-info text-white">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Brand Name</th>
                <th scope="col">Category Name</th>
                <th scope="col">Date_Created</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <!-- show all Records -->
            <?php for ($i = 0; $i < $Brand_Data_rows; $i++) {
                $record = mysqli_fetch_assoc($Brand_Data);
                $category_info = FetchCustomRecord('categories', 'WHERE Category_Id=' . $record['Category_Id']);
                if(mysqli_num_rows($category_info)){
                    $category_Data = mysqli_fetch_assoc($category_info);
                }
            ?>
                <tr>
                    <th scope="row"> <?php echo $record['Brand_Id']; ?></th>
                    <td><?php echo $record['Brand_Name']; ?></td>
                    <td><?php  if(mysqli_num_rows($category_info)){echo $category_Data['Category_Name'];}else{ echo '';} ?></td>
                    <td><?php echo $record['Brand_Created_at']; ?></td>
                    <td><button class="Edit_brand_record btn btn-small btn-outline-primary" id='<?php echo $record['Brand_Id']; ?>'>Edit</button></td>
                    <td><button class="Delete_brand_record btn btn-small btn-danger" value="<?php echo $record['Brand_Id']; ?>">Delete</button></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <!-- pagination bar  -->
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
        $('#brandModel').modal('hide');
    })
    $('#add_brand').click(function() {
        $('#Brand_Form')[0].reset();
        $('#ModalTitle').text('Add New Brand');
        if($('#submit').hasClass('btn-danger')) $('#submit').removeClass('btn-danger')
        if($('#submit').hasClass('btn-warning')) $('#submit').removeClass('btn-warning')
        $('#submit').addClass('btn-primary');
        $('#submit').text('Add');
})
$('.Edit_brand_record').click(function(){
    $('#brandModel').modal('show');
    $('#ModalTitle').text('Edit Brand');
    if($('#submit').hasClass('btn-danger')) $('#submit').removeClass('btn-danger')
    if($('#submit').hasClass('btn-primary')) $('#submit').removeClass('btn-primary')
    $('#submit').addClass('btn-warning');
    $('#submit').text('Update');
    
    
})
$('.Delete_brand_record').click(function(){
    $('#brandModel').modal('show');
    $('#ModalTitle').text('Delete Brand Data');
    if($('#submit').hasClass('btn-warning')) $('#submit').removeClass('btn-warning')
    if($('#submit').hasClass('btn-primary')) $('#submit').removeClass('btn-primary')
    $('#submit').addClass('btn-danger');
    $('#submit').text('Delete');

    })
</script>

<script src="./js/brand.js"></script>