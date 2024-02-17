<!-- //import header section of admin page -->
<?php
require_once './DB/CRUD.php';
require_once './includes/header.php'; 
?>



<section class="right">
  <h1>Welcome to Dashboard</h1>
  <hr>
  <?php require_once './includes/catelog_part.php'; ?>
  <!-- Table Stating here -->
  <table class="table table-hover" style="box-shadow: -1px 0px 6px 2px #71717154;  max-width:98%;">
    <thead class="bg-primary text-white">
      <tr>
        <th scope="col">Order.No</th>
        <th scope="col">Order Name</th>
        <th scope="col">Quantity</th>
        <th scope="col">Date</th>
        <th scope="col">Status</th>
        <th scope="col">Payment</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>T_Shirt</td>
        <td>01</td>
        <td>01-10-2023</td>
        <td><span class="badge badge-danger">Uncomplete</span></td>
        <td><span class="badge badge-success">Paid</span></td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Samsung S8</td>
        <td>01</td>
        <td>05-11-2023</td>
        <td><span class="badge badge-success">Complete</span></td>
        <td><span class="badge badge-success">Paid</span></td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Men T_Shirt</td>
        <td>02</td>
        <td>11-11-2023</td>
        <td><span class="badge badge-success">Complete</span></td>
        <td><span class="badge badge-danger">UnPaid</span></td>
      </tr>
      <tr>
        <th scope="row">4</th>
        <td>Men Trouser</td>
        <td>05</td>
        <td>01-12-2023</td>
        <td><span class="badge badge-danger">Uncomplete</span></td>
        <td><span class="badge badge-danger">UnPaid</span></td>
      </tr>
      <tr>
        <th scope="row">5</th>
        <td>Men T_Shirt</td>
        <td>02</td>
        <td>11-11-2023</td>
        <td><span class="badge badge-success">Complete</span></td>
        <td><span class="badge badge-danger">UnPaid</span></td>
      </tr>
      <tr>
        <th scope="row">6</th>
        <td>Men Trouser</td>
        <td>05</td>
        <td>01-12-2023</td>
        <td><span class="badge badge-danger">Uncomplete</span></td>
        <td><span class="badge badge-danger">UnPaid</span></td>
      </tr>
      <tr>
        <th scope="row">7</th>
        <td>Samsung S8</td>
        <td>01</td>
        <td>05-11-2023</td>
        <td><span class="badge badge-success">Complete</span></td>
        <td><span class="badge badge-success">Paid</span></td>
      </tr>
      <tr>
        <th scope="row">8</th>
        <td>Men T_Shirt</td>
        <td>02</td>
        <td>11-11-2023</td>
        <td><span class="badge badge-success">Complete</span></td>
        <td><span class="badge badge-danger">UnPaid</span></td>
      </tr>
      <tr>
        <th scope="row">9</th>
        <td>Men T_Shirt</td>
        <td>02</td>
        <td>11-11-2023</td>
        <td><span class="badge badge-success">Complete</span></td>
        <td><span class="badge badge-danger">UnPaid</span></td>
      </tr>
      <tr>
        <th scope="row">10</th>
        <td>Men Trouser</td>
        <td>05</td>
        <td>01-12-2023</td>
        <td><span class="badge badge-danger">Uncomplete</span></td>
        <td><span class="badge badge-danger">UnPaid</span></td>
      </tr>
    </tbody>
  </table>
  </div>


  <!-- import footer section -->
  <?php require_once "./includes/footer.php";   ?>