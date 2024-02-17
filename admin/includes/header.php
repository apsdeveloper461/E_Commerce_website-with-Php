<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Link all css files -->
    <link rel="stylesheet" href="../fa/svg-with-js/css/fa-svg-with-js.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/admin_dashboard.css">
    <link rel="stylesheet" href="./css/resposive_admin.css">
</head>
<style>
     
    
</style>
<body>
<!-- header Section     -->
       <header>
             <div  id="admin_menu">
                <i class="fas fa-bars menu-btn"></i> Admin Dashboard 
             </div>
             <div class="header_options">
                <ul>
                    <li><a href="#" class="header_op"><i class="fa fa-shopping-basket"></i> Orders</a></li>
                    <li><a href="./User.php" class="header_op"><i class="fa fa-users"></i> Users</a></li>
                    <li><a href="#" class="header_op"><i class="fa fa-truck"></i> Delivery</a></li>
                    <li><a href="#" class="header_op"><i class="fa fa-sign-out-alt"></i> LogOut</a></li>
                </ul>
            </div>
        </header>
        
<!-- slidebar section of Admin Page -->
       <div class="section_Con">
       <section class="left" id="slider">
            <ul class="slider" >
                <li><a href="./index.php" class="slider_op"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="#" class="slider_op"><i class="fas fa-id-badge"></i> Profile</a></li>
                <li><a href="./User.php" class="slider_op"><i class="fa fa-users"></i> Users</a></li>
               <li><a href="./Brand.php" class="slider_op"><i class="fas fa-dolly-flatbed"></i> Brand</a></li>
               <li><a href="./category.php" class="slider_op"><i class="fa-solid fa-list"></i>Category</a></li>
               <li><a href="./Product.php" class="slider_op"><i class="fas fa-shopping-basket"></i> Products</a></li>
               <li><a href="#" class="slider_op"><i class="fas fa-shopping-bag"></i> Orders</a></li>
               <li><a href="#" class="slider_op"><i class="fas fa-truck-loading"></i> Delivery</a></li>
               <li><a href="#" class="slider_op"><i class="fas fa-images"></i> Slider Images</a></li>
               <li><a href="#" class="slider_op"><i class="fas fa-cogs"></i> Setting</a></li>
               <li><a href="#" class="slider_op"><i class="fas fa-sign-out-alt"></i> LogOut</a></li>
            </ul>
       </section>