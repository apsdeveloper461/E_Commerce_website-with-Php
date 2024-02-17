<!-- import CRud php file to get all category Data -->
<?php
require_once './DB/CRUD.php';
// echo $rows;
//Make a pagination 
//Get toal number of pages
$total_record_on_page = 5;
$total_pages = pagination('categories', $total_record_on_page);
// echo $total_pages;
//show pages on the base of pageination
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$pageno = intval($pageno);
$offset = ($pageno - 1) * $total_record_on_page;
$Cat_Data = FetchRecords('categories', $offset, $total_record_on_page);
// echo var_dump($Cat_Data);
$rows = mysqli_num_rows($Cat_Data);


?>

<!-- //import header section of admin page -->
<?php require_once './includes/header.php'; ?>





<section class="right">
    <div class="alert  alert-dismissible fade show " id="notifcation" role="alert">
        <strong>sorry ! </strong> Cannot add category.Plz Try Again !
    </div>
    <div class="category_heading">
        <h1 class="text-dark border-bottom pb-2">Category</h1>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mt-4 ml-5" id="add_cat" data-toggle="modal" data-target="#catModel">
            Add Category <b> + </b>
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="catModel" tabindex="-1" role="dialog" aria-labelledby="catTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="padding: 5px 25px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="catTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="category_Add">
                        <label for="cat_name" class="col-form-label"> <b>Name of Category:</b> </label>
                        <input type="text" name="categoryName" id="cat_name" class="form-control" placeholder="Enter the name of Category...">

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="cat_Id" id="cat_Id">
                    <input type="hidden" name="form_type" id='form_type'>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary save" id="submit" aria-hidden="true">Add</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Table show all catgory info -->
    <table class="table table-hover" style="box-shadow: -1px 0px 6px 2px #71717154;  max-width:98%;">
        <thead class="bg-info text-white">
            <tr>
                <th scope="col">Cateogory Id</th>
                <th scope="col">Category Name</th>
                <th scope="col">Date_Created</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <!-- show all Records -->
            <?php for ($i = 0; $i < $rows; $i++) {
                $record = mysqli_fetch_assoc($Cat_Data); ?>
                <tr>
                    <th scope="row"> <?php echo $record['Category_Id']; ?></th>
                    <td><?php echo $record['Category_Name']; ?></td>
                    <td><?php echo $record['CategoryCreated_Date']; ?></td>
                    <td><button class="Edit_cat_record btn btn-small btn-outline-primary" id='<?php echo $record['Category_Id']; ?>'>Edit</button></td>
                    <td><button class="Delete_cat_record btn btn-small btn-danger" value="<?php echo $record['Category_Id']; ?>">Delete</button></td>
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

    $(document).ready(function() {


        $('#add_cat').click(function() {
            $('#category_Add')[0].reset();
            $('#catModel').modal('show');
            $('#catTitle').text('Add Category');
        })
        $('.Edit_cat_record').click(function() {
            $('#catModel').modal('show');
            $('#catTitle').text('Edit Category');
        })
        $('.Delete_cat_record').click(function() {
            $('#catModel').modal('show');
            $('#catTitle').text('Delete Category');
        })


        $('.Edit_cat_record').click(function() {
            //get id of click btn
            var cat_id = $(this).attr('id');
            var btn = 'edit';
            if ($('#submit').hasClass('btn-primary')) {
                $('#submit').removeClass('btn-primary');
            }
            if ($('#submit').hasClass('btn-danger')) {
                $('#submit').removeClass('btn-danger');
            }
            $('#submit').addClass('btn-warning').text('Update');
            //handle post request with Ajax
            $.ajax({
                url: './action/cat_recordGet.php',
                method: "POST",
                data: {
                    cat_id: cat_id,
                    action: btn
                },
                dataType: "json",
                success: function(res) {
                    $('#form_type').val('update');
                    $('#cat_name').val(res.Category_Name);
                    //store into hidden input tag with id Cat_Id.....            
                    $('#cat_Id').val(res.Category_Id);
                    console.log(res);
                }

            })
            //    alert(this.id);

        });
        $('.Delete_cat_record').click(function() {


            if ($('#submit').hasClass('btn-primary')) {
                $('#submit').removeClass('btn-primary');
            }
            if ($('#submit').hasClass('btn-warning')) {
                $('#submit').removeClass('btn-warning');
            }
            $('#submit').addClass('btn-danger').text('Delete');
            var cat_id = $(this).attr('value');
            $.ajax({
                url: './action/cat_recordGet.php',
                method: "POST",
                data: {
                    cat_id: cat_id,
                    action: 'edit'
                },
                dataType: "json",
                success: function(res) {
                    $('#form_type').val('delete');
                    $('#cat_name').val(res.Category_Name);
                    //store into hidden input tag with id Cat_Id.....            
                    $('#cat_Id').val(res.Category_Id);
                    console.log(res);
                }
            });
            //    alert
        })


    });
    // else{

    //         const update_cat_Id=document.getElementById('form_type').getAttribute('value');
    //         console.log(update_cat_Id);
    //         console.log('updating a new categories at a ' + update_cat_Id);
    //         let xhp = new XMLHttpRequest();
    //         xhp.open("POST", "../admin/DB/CategoryAdd.php", true);
    //         xhp.onload = () => {
    //             if (xhp.readyState == 4 && xhp.status == 200) {

    //             }
    //         }
    //         let formData = new FormData(CategoryAddForm);
    //         xhp.send(formData);
    //     }
</script>

<script src="./js/category.js"></script>