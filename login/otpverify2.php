<?php
session_start();
if (empty($_SESSION['name'])) {
  // header('location:index.php');
}

include_once('connection.php');

// Assuming you have a login process that sets the session variables
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];

  // Fetch user details, including user_type, from the database
  $select_user_query = mysqli_query($connection, "SELECT user_type FROM user WHERE id = '$user_id'");
  $user_data = mysqli_fetch_assoc($select_user_query);

  if ($user_data) {
    $_SESSION['user_type'] = $user_data['user_type'];
  } else {
    // Handle the case where user data is not found
    // You may want to redirect to the login page or show an error message
    header('location:index.php');
    exit();
  }
}

if (isset($_REQUEST['otp_verify'])) {
  $otp = $_REQUEST['otp'];

  $user_type = $_SESSION['user_type'];

  $select_query = mysqli_query($connection, "select * from otp_check where otp='$otp' and is_expired!=1 
  and NOW()<=DATE_ADD(create_at,interval 1 minute)");
  $count = mysqli_num_rows($select_query);
  if ($count > 0) {
    $select_query = mysqli_query($connection, "update otp_check set is_expired=1 where otp='$otp'");

    if ($user_type === 'Dental') {
      header('location:../dental/dashboard/dashboard.php');
    } elseif ($user_type === 'Optic') {
      header('location:../optic/dashboard/dashboard.php');
    } else {
      header('location:login.php');
    }

    
  } else {
    $msg = "Invalid OTP!";
  }
}
?>