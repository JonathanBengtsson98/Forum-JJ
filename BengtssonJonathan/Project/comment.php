<?php

require_once 'logout_process.php';

include 'comment_submit.php';
addCommentsToTable();

require_once 'functions.php';

if (isset($_SESSION['username'])) {
} else {
    header("Location: signin.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en-UK">

<head>

    <meta charset="UTF-8">

    <title>Comments</title>

    <link rel="stylesheet" href="css/jStyles.css">

    <script src="js/scriptt.js"></script>

</head>

<body>

    <form name="logout " action="" method="post">

        <button class="submit" type="submit" name="logout">Sign Out</button>

    </form>

    <div class="createComment">

        <form name="comment_form" action="" method="post" onsubmit="return validateComment();">

            <h1>Forum-J</h1>

            <h4>Welcome <?php echo $_SESSION['username'] ?>, please post a comment! </h4>

            <input type="text" name="comment" id="comment" placeholder="Comment">

            <button class="submit" id="submit" name="publish">Submit Comment</button>

        </form>

    </div>

    <div class="allComments">

        <h2>Comment(s)</h2>

        <textarea name="current_comments" id="current_comments">

        <?php
        publishComments();
        ?>

        </textarea>

    </div>

    <img src="img/backgroundPic.jpg" class="pic">

</body>

</html>