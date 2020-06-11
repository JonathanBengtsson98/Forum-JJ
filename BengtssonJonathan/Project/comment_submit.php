<?php
require_once 'functions.php';

//Funktion för att lägga till kommentarer i tabellen Comment.
function addCommentsToTable()
{
    if (isset($_POST['publish'])) {

        $comment = $_POST['comment'];

        if (empty($comment)) {
            header("location: comment.php?error=CommentCanNotBeEmpty");
        } else if ($comment == " ") {
            header("location: comment.php?error=CommentCanNotBeEmpty");
        } else {

            $db = new SQLite3("db/database.db");

            $sql = "INSERT INTO 'Comment' ('CommentBody', 'Username') VALUES (:comment, :username)";

            $stmt = $db->prepare($sql);

            $stmt->bindParam(':comment', $comment, SQLITE3_TEXT);

            $stmt->bindParam(':username', $_SESSION['username'], SQLITE3_TEXT);

            $stmt->execute();

            $db->close();
        }
    }
}

// Funktion för att skriva ut innehållet från tabellen Comment.
function publishComments()
{
    $db = new SQLite3("db/database.db");

    $stmt = $db->prepare("SELECT * FROM Comment");

    $returned = $stmt->execute();

    while ($row = $returned->fetchArray(SQLITE3_ASSOC)) {
        echo "\n";
        echo "{$row['CommentBody']}" . " ----> " . "Posted By: {$row['Username']}";
        echo "\n";
    }

    $db->close();
}