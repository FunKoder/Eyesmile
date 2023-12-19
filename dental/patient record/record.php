<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Open a database connection
$db = mysqli_connect('localhost', 'root', '', 'eyesmile_db');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

$edit_state = false;

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $rec = mysqli_query($db, "SELECT * FROM payment WHERE id=$id");
    $record = mysqli_fetch_array($rec);
    $dates = $record['dates'];
    $surface = $record['surface'];
    $t_no = $record['t_no'];
    $proced = $record['proced'];
    $t_fee = $record['t_fee'];
    $product = $record['product'];
    $quantity = $record['quantity'];
    $id = $record['id'];

    $edit_state = true;
}

// Insert data into the payment table
if (isset($_POST['adds'])) {
    $dates = $_POST['dates'];
    $surface = $_POST['surface'];
    $t_no = $_POST['t_no'];
    $proced = $_POST['proced'];
    $t_fee = $_POST['t_fee'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $cash = $_POST['cash'];

    $query = "INSERT INTO payment (dates, surface, t_no, proced, t_fee, product, quantity, cash) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "ssisdisi", $dates, $surface, $t_no, $proced, $t_fee, $product, $quantity, $cash);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

// Update data in the payment table
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $dates = $_POST['dates'];
    $surface = $_POST['surface'];
    $t_no = $_POST['t_no'];
    $proced = $_POST['proced'];
    $t_fee = $_POST['t_fee'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $cash = $_POST['cash'];

    $query = "UPDATE payment SET dates=?, surface=?, t_no=?, proced=?, t_fee=?, product=?, quantity=?, cash=? WHERE id=?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "ssisdisii", $dates, $surface, $t_no, $proced, $t_fee, $product, $quantity, $cash, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('Location: ../patient record/patient_record.php');
    exit();
}

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    
    // Delete from payment table
    mysqli_query($db, "DELETE FROM payment WHERE id=$id");

    // Delete from managing_stocks (if necessary, replace 'product_id' with the actual column name)
    // mysqli_query($db, "DELETE FROM managing_stocks WHERE product_id=$id");

    header('location: ../patient record/patient_record.php');
    exit();
}

// Retrieve data from the payment table
$query = "SELECT * FROM payment";
$results = mysqli_query($db, $query);

if (!$results) {
    die("Query failed: " . mysqli_error($db));
}
?>
