<?php
include 'register_process.php';
validateUser();
?>

<!DOCTYPE html>
<html lang="en-UK">

<head>
    <meta charset="UFT-8" />

    <link rel="stylesheet" href="css/jStyles.css">

    <script src="js/scriptt.js"></script>

    <title>Register</title>

</head>

<body>
    <button class="submit" type="button" id="btn" onclick="goToSignIn()">Sign In</button>

    <div class="signReg">

        <form name="register_form" action="" method="post" onsubmit="return validateRegister();">

            <h1>Forum-J</h1>

            <h2>Register</h2>

            <input type="text" name="username" id="username" placeholder="Username">

            <input type="text" name="email" id="email" placeholder="Email">

            <input type="password" name="password" id="password" placeholder="Password">

            <button class="submit" type="submit" name="register">Register</button>

        </form>
    </div>

    <img src="img/backgroundPic.jpg" class="pic">

</body>

</html>