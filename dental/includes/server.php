<?php
session_start();

$p_name = "";
$category = "";
$cost = "";
$price = "";
$quantity = "";
$m_date = "";
$e_date = "";
$id = 0;
$edit_state = false;

// Open a database connection
$db = mysqli_connect('localhost', 'root', '', 'eyesmile_db');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the "edit" parameter is present in the URL
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $rec = mysqli_query($db, "SELECT * FROM product WHERE id=$id");
    $record = mysqli_fetch_array($rec);
    $p_name = $record['p_name'];
    $category = $record['category'];
    $cost = $record['cost'];
    $price = $record['price'];
    $quantity = $record['quantity'];
    $m_date = $record['m_date'];
    $e_date = $record['e_date'];
    $id = $record['id'];

    // Set $edit_state to true since we are editing an existing record
    $edit_state = true;
}

// Handle form submissions for adding and updating
if (isset($_POST['adds'])) {
    // Insert new product
    $p_name = $_POST['p_name'];
    $category = $_POST['category'];
    $cost = $_POST['cost'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $m_date = $_POST['m_date'];
    $e_date = $_POST['e_date'];

    $query = "INSERT INTO product (p_name, category, cost, price, quantity, m_date, e_date) VALUES ('$p_name', '$category', '$cost', '$price', '$quantity', '$m_date', '$e_date')";

    if (mysqli_query($db, $query)) {
        // Insertion was successful

        // Calculate current_quantity and insert into managing_stocks
        $product_id = mysqli_insert_id($db); // Get the last inserted product_id

        $expired = $_POST['expired'];
        $current_quantity = $quantity - $expired;

        $stocks_query = "INSERT INTO managing_stocks (product_id, expired, current_quantity) VALUES ('$product_id', '$expired', '$current_quantity')";

        mysqli_query($db, $stocks_query);

        header('location: inventory.php');
        exit();
    } else {
        // Handle the error if the query fails
        echo "Error: " . mysqli_error($db);
    }
}
 elseif (isset($_POST['update'])) {
    // Update existing product
    $p_name = mysqli_real_escape_string($db, $_POST['p_name']);
    $category = mysqli_real_escape_string($db, $_POST['category']);
    $cost = mysqli_real_escape_string($db, $_POST['cost']);
    $price = mysqli_real_escape_string($db, $_POST['price']);
    $quantity = mysqli_real_escape_string($db, $_POST['quantity']);
    $m_date = mysqli_real_escape_string($db, $_POST['m_date']);
    $e_date = mysqli_real_escape_string($db, $_POST['e_date']);
    $id = mysqli_real_escape_string($db, $_POST['id']);

    $query = "UPDATE product SET p_name='$p_name', category='$category', cost='$cost', price='$price', quantity='$quantity', m_date='$m_date', e_date='$e_date' WHERE id=$id";

    if (mysqli_query($db, $query)) {
        // Update was successful

        // Calculate current_quantity and update managing_stocks
        $expired = $_POST['expired'];
        $current_quantity = $quantity - $expired;

        $stocks_query = "UPDATE managing_stocks SET expired='$expired', current_quantity='$current_quantity' WHERE product_id=$id";

        mysqli_query($db, $stocks_query);

        header('location: inventory.php');
        exit();
    } else {
        // Handle the error if the query fails
        echo "Error: " . mysqli_error($db);
    }
}

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM product WHERE id=$id");

    // Also delete from managing_stocks
    mysqli_query($db, "DELETE FROM managing_stocks WHERE product_id=$id");

    header('location: inventory.php');
    exit();
}

// Retrieve records for displaying in the form
$results = mysqli_query($db, "SELECT * FROM product");

// Retrieve records for displaying in the managing table
$managing_results = mysqli_query($db, "SELECT p.id, p.p_name, 
    SUM(CASE WHEN p.e_date < CURDATE() THEN 1 ELSE 0 END) AS total_expired,
    SUM(p.quantity) AS total_quantity,
    COALESCE(SUM(ms.current_quantity), 0) AS total_current_quantity 
    FROM product p
    LEFT JOIN managing_stocks ms ON p.id = ms.product_id
    GROUP BY p.id, p.p_name");
?>