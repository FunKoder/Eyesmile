<?php
// Start the session
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
// Redirect to the login page if not logged in
if (!isset($_SESSION["user_id"])) {
    header('Location: ../../login/login.php');
    exit;
}

$mysqli = require __DIR__ . "/config.php";

$sql = "SELECT * FROM user 
        WHERE id = {$_SESSION["user_id"]}";

$result = $mysqli->query($sql);
$user = $result->fetch_assoc();

/* Display content based on the user's type
if ($user['user_type'] === 'Admin') {
    $welcomeMessage = 'Welcome, Optic!';
} elseif ($user['user_type'] === 'Staff') {
    $welcomeMessage = 'Welcome, Dentist!';
} 
else {
    // Handle unknown user types or unexpected situations
    header('Location: ../../login/login.php');
} */

if (($user["status"] === '1')) {
    header('Location: ../../login/login.php');
};


/* // For different user types
if ($user['user_type'] === 'Dental') {
    include('');
    // container here

} elseif ($user['user_type'] === 'Optic') {
    include('');
    // container here

}else{
    include('');
    // container here
} 
 */


?>