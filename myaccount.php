<?php
require_once './includes_cus/header.php';
if(!isset($_COOKIE['Email'])){
    header("Location: ./LogIn/logIn.php");
}

?>


<section id="myaccount">
    <div class="alert  alert-dismissible fade show"  id="notifcation" role="alert">
        <strong></strong>
    </div>
    <h3 class="text-center border-bottom pb-3  m-5 text-dark"><i style="margin: 0 5px 0 0;" class="fas fa-user"></i> My Account</h3>
    <div id="accountDetail" class="col-md-12 ">
        <div class="col-md-6 mt-3 ">
            <label for="UserName" class="text-danger  ml-3"> <i class="fas fa-user"></i> User Name </label>
            <input type="text" name="UserName" class="form-control" id="UserName" value="<?php   if(isset($_COOKIE['Name'])){  echo $_COOKIE['Name']; } ?>" disabled>
        </div>
        <!-- <div class="col-md-6"></div> -->
        <div class="col-md-6 mt-4">
            <label for="Email" class="text-primary ml-3"> <i class="fas fa-user"></i> Email </label>
            <input type="text" class="form-control" name="Email" id="Email" value="<?php   if(isset($_COOKIE['Email'])){  echo $_COOKIE['Email']; } ?>" disabled>
        </div>
        <div class="col-md-12 border-bottom pb-5"></div>
        <div class="col-md-6 mt-4 mb-5 ">
            <label for="Password" class="text-primary ml-3"> <i class="fas fa-user"></i> Password </label>
            <input type="password" class="form-control " name="Password" id="Password" value="12345678932" disabled>
            <button type="button" id='ChangePasswordBtn' class="btn btn-outline-danger mt-3 ml-3">Change Password</button>
        </div>
    </div>
        <form id="ChangePasswordForm" method="post" class="border-top col-md-6  pt-3 d-none">
            <div class="text-info  text-center pb-2"> New Password </div>
            <div class="text-danger text-sm" id="errorChangePassword" style="font-size: small;"></div>
            <input type="password" class="form-control mb-4 " name="NewPassword" id="NewPassword" minlength="8" placeholder="Enter new Password ......." required>
                <div id="error" class="text-danger" style="font-size: 14px;"></div>
            <input type="password" class="form-control " name="ConfirmPassword" id="ConfirmPassword" minlength="8" placeholder="Enter Confirm Password ..... " required>
            <button type="submit" id='AddPassword' class="btn btn-primary mt-3 ml-3 mb-5">Add new Password</button>

        </form>
</section>



<?php
require_once './includes_cus/footer.php';


?>
<script src="./LogIn/js/changePass.js"></script>
































<?php

require_once './includes_cus/footer.php';

?>


<script src="./js/myaccount.js"></script>