
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
    <div  style="min-width:100vw; margin:0px auto; position: absolute; top:10px; display:flex; justify-content:center; align-items:center;">
    <div class="alert d-center alert-dismissible  show " id="notifcation" role="alert" style="margin:0px auto; position: absolute; top:30px; ">
        <strong>sorry ! </strong>
    </div>
    </div>
    <div class="con">
        <div class="formContainer">
            <h1>Log In</h1>
            <form method="POST" id='loginForm'>
                <input type="email" name="email" id="email" placeholder="Enter Email Here ..." required>
                <input type="password" name="password" id="password" placeholder="Enter Password Here ..." minlength="8" required>
                <button type="submit">Log In</button>
                <div class="moveother">Have No account ? <a href="./signUp.php"> Create account </a></div>

            </form>
        </div>
    </div>

</body>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="./js/logIn.js"></script>
</html>