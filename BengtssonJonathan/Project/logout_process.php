<?php

//Avslutar vår session och loggar ut användaren.
if (isset($_POST['logout'])) {
    require_once 'functions.php';

    session_destroy();
    header('location: index.php?LogoutSuccessful');
}