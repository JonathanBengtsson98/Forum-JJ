<?php
require_once 'functions.php';

//Funktion som validerar inloggningen genom att ta reda på om användarnamn/lösenord stämmer överens med databasen.
function validateSignin()
{
    if (isset($_POST['signin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            header("location: signin.php?error=FormIsEmpty");
        } else {
            $db = new SQLite3("db/database.db");

            $stmt = $db->prepare("SELECT * FROM User WHERE (Username)=:username");

            $stmt->bindParam(':username', ($username));

            $returned = $stmt->execute();

            $results = $returned->fetchArray(SQLITE3_ASSOC);

            if ($results) {
                if (password_verify($password, $results["Password"])) {

                    $_SESSION['username'] = $results['Username'];
                    header("Location: comment.php");
                } else {
                    header('location:signin.php?error=InvalidPassword');
                }
            } else {
                header('location:signin.php?error=InvalidUsername');
            }
        }
    }
}