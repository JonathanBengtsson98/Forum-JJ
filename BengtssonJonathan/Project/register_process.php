<?php

//Funktion som validerar registreringen. Om input är korrekt och användaren inte redan finns körs funktionen addUser.
function validateUser()
{
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($username) || empty($email) || empty($password)) 
        {
            header("location: index.php?error=FormIsEmpty");
        }
        
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            header("location: index.php?error=InvalidEmail");
        } 
        
        else 
        {
            $db = new SQLite3("db/database.db");

            $stmt = $db->prepare("SELECT * FROM User WHERE (Username)=:username");

            $stmt->bindParam(':username', $username, SQLITE3_TEXT);

            if ($stmt->execute()) {
                $returned = $stmt->execute();

                $results = $returned->fetchArray(SQLITE3_ASSOC);

                if ($results > 0) {
                    header('location:index.php?error=UsernameAlreadyExist');
                    $db->close();
                } else {
                    $db = new SQLite3("db/database.db");

                    $stmt = $db->prepare("SELECT * FROM User WHERE (Email)=:email");

                    $stmt->bindParam(':email', $email, SQLITE3_TEXT);

                    $returned = $stmt->execute();

                    $results = $returned->fetchArray(SQLITE3_ASSOC);

                    if ($results > 0) {
                        header('location:index.php?error=EmailAlreadyExist');
                        $db->close();
                    } else {
                        header('location:signin.php');
                        addUser();
                    }
                }
            }
        }
    }
}

//Funktion som lägger till användare i tabellen User.
function addUser()
{
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $hash = password_hash($password, PASSWORD_BCRYPT);

        $db = new SQLite3("db/database.db");

        $sql = "INSERT INTO 'User' ('Username', 'Email', 'Password') VALUES (:username, :email, :password)";

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':username', $username, SQLITE3_TEXT);

        $stmt->bindParam(':email', $email, SQLITE3_TEXT);

        $stmt->bindParam(':password', $hash, SQLITE3_TEXT);

        if ($stmt->execute()) {
            header("location:signin.php");
            $db->close();
        } else {
            header("location: index.php");
            $db->close();
        }
    }
}