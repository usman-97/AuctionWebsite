<?php

// Start the session
session_start();

// If logout button is pressed
if (isset($_POST['logout']))
{
    // then unset loggedIn session
    unset($_SESSION['loggedIn']);
    // destroy session
    session_destroy();
    echo 'You have successfully logged out';
}

// If user has been loggedIn and timeout session is set
if (isset($_SESSION['timeout'])) {
    // If user last activity time is less than expiry time
    if ($_SESSION['timeout'] < time() - $_SESSION['expire']) {
        unset($_SESSION['loggedIn']);
        session_destroy();
        echo 'Please sign in again';
    }
}
// var_dump($_SESSION['timeout']);