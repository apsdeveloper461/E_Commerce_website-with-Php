
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn System</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div  style="min-width:100vw; margin:0px auto; position: absolute; top:30px; display:flex; justify-content:center; align-items:center;">
    <div class="alert d-center alert-dismissible  show " id="notifcation" role="alert" style="margin:0px auto; position: absolute; top:10px; ">
        <strong>sorry ! </strong>
    </div>
</div>
    <div class="con">
        <div class="formContainer" >
            <h1>Sign Up</h1>

            <form id="signUpForm" method="POST">
             
                <input type="text" name="username" placeholder="Enter Full Name here ..." required>
                <input type="email" name="email" id="eamil" placeholder="Enter Email Here ..." required>
                <input type="password" name="password" id="password" placeholder="Enter Password Here ..." minlength="8" required>
                <div id="error" class="text-danger" style="font-size: 14px;"></div>
                <input type="password" name="cpassword" id="cpassword" placeholder="Enter Confirm Password Here ..." minlength="8" required>
                <button type="submit">Sign Up</button>
                <div class="moveother">Have account ? <a href="./logIn.php"> Log In</a></div>

            </form>
        </div>
    </div>
</body>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="./js/signUp.js"></script>
</html>