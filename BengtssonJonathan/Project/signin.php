<?php
include 'signin_process.php';
validateSignin();
?>

<!DOCTYPE html>
<html lang="en-UK">

<head>

    <meta charset="UFT-8" />

    <link rel="stylesheet" href="css/jStyles.css">

    <script src="js/scriptt.js"></script>

    <title>Sign In</title>

</head>

<body>

    <button class="submit" type="button" id="btn" onclick="goToStart()">Register</button>

    <div class="signReg">

        <form name="signin_form" action="" method="post" onsubmit="return validateSignin();">

            <h1>Forum-J</h1>

            <h2>Sign In</h2>

            <input type=" text" name="username" id="username" placeholder="Username">

            <input type="password" name="password" id="password" placeholder="Password">

            <button class="submit" type="submit" name="signin">Sign In</button>

        </form>

    </div>

    <img src="img/backgroundPic.jpg" class="pic">

</body>

</html