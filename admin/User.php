<!-- import CRud php file to get all category Data -->
<?php
require_once './DB/CRUD.php';
// echo $rows;
//Make a pagination 
//Get toal number of pages
$total_record_on_page = 5;
$total_pages = pagination('e_com_users', $total_record_on_page);
// echo $total_pages;
//show pages on the base of pageination
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$pageno = intval($pageno);
$offset = ($pageno - 1) * $total_record_on_page;
$User_Data = FetchRecords('e_com_users', $offset, $total_record_on_page);
// echo var_dump($User_Data);
$rows = mysqli_num_rows($User_Data);


?>

<!-- //import header section of admin page -->
<?php require_once './includes/header.php'; ?>





<section class="right">
  <h1>Users</h1>
  <hr>
  <?php require_once './includes/catelog_part.php'; ?>

  

    
    <!-- Table show all Users info -->
    <table class="table table-hover" style="box-shadow: -1px 0px 6px 2px #71717154;  max-width:98%;">
        <thead class="bg-info text-white">
            <tr>
                <th scope="col">User_Id</th>
                <th scope="col">User_Name</th>
                <th scope="col">User_Email</th>
                <th scope="col">Last_LogIn_Date</th>
                <th scope="col">Account_Created_Date</th>
            </tr>
        </thead>
        <tbody>
            <!-- show all Records -->
            <?php for ($i = 0; $i < $rows; $i++) {
                $record = mysqli_fetch_assoc($User_Data); ?>
                <tr>
                    <th scope="row"> <?php echo $record['User_Id']; ?></th>
                    <td><?php echo $record['User_Name']; ?></td>
                    <td><?php echo $record['User_Email']; ?></td>
                    <td><?php echo $record['Last_LogIn_Date']; ?></td>
                    <td><?php echo $record['Account_Created_Date']; ?></td>
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




