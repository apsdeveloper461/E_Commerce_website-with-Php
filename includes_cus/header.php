<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E_Commerce Website</title>
    <!-- link all css file -->
    <link rel="stylesheet" href="./fa/svg-with-js/css/fa-svg-with-js.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/jquery.bxslider.min.css">
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">
    <!-- link which i write -->
    <style>
        :root{
            --body_Bg:white;
            --nav_Bg:#d795vdf;
            --logo_color:purple;
            --nav_part_color:#311091;
              --drop_down_bg:#ffffff8f;
              
            }
      
</style>
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/responsive.css">
</head>
<body>
<!-- Navbar Starting Here... -->
    <div class="navbar">
        <div id="logo">
           <i class="fas fa-user"></i> MYLOGO
        </div>
        <form action="" method="post" id="Search-form">
            <input type="text" name="search" id="search-input" placeholder="Search product here ....">
            <button type="submit" class="btn">Search</button>
        </form> 
        <div class="dropdown btm-group show">
            <a class="dropdown-toggle dropdwn-" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i style="margin: 0 5px 0 0;" class="fas fa-user"></i>My Account
            </a>
            <div class="dropdown-menu " aria-labelledby="dropdownMenuLink">
                <a class="dropdown1 dropdown-item" href="./myaccount.php"><i style="margin: 0 5px 0 0;" class="fas fa-user"></i>My Account</a>
                <a class="dropdown1 dropdown-item" href="#"><i style="margin: 0 5px 0 0;" class="fas fa-cube"></i>Your Order</a>
                <a class="dropdown1 dropdown-item" href="#"><i style="margin: 0 5px 0 0;" class="fas fa-heart"></i>Wishlist</a>
                 <a href="#" class="dropdown1 dropdown-item text-danger"><i class="fas fa-shopping-cart"></i> Add To Cart</a>
                <div class="dropdown-divider"></div>
                <?php
                
                    if(!isset($_COOKIE['Email'])){
                       echo '<a href="./LogIn/signUp.php"><input type="button" class="btn dropdown2 btn btn-outline-danger" value="Register"></a>
                       <a href="./LogIn/logIn.php"><input type="button" class="btn dropdown2 btn btn-outline-success" value="Log In"></a>';
                    }else{
                        echo '<a href="./logOut.php"><input type="button" class="btn dropdown2 btn btn-outline-danger" value="Log Out">';
                    }
                ?>

                <!-- <a class="dropdown2 dropdown-item" href="#">Register</a>
                <a class="dropdown2 dropdown-item" href="#">Log In</a> -->
            </div>
        </div>
            <a href="#" class="cart text-danger"><i class="fas fa-shopping-cart"></i>Cart</a>

    </div>
    <div class="searchbar"></div>