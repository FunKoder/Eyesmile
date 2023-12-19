<?php 
include('../includes/server.php'); 
include('../../login/verify.php');

//fetch the record to be updated
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
}

// Close the connection when done
mysqli_close($db);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory Adding</title>
    <?php include('../includes/style-links.php');?>
</head>

<body style="background-color: #D7F1F6;">
<?php include ('../includes/nav2.php');?>


    <div class="container-xl p-5 justify-content-center mt-5" id="cons">
        <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <button class="nav-link text-dark fw-semibold active" id="nav-personal-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-personal" type="button" role="tab" aria-controls="nav-home"
                    aria-selected="true">Adding Product</button>
                <button class="nav-link text-dark fw-semibold" id="nav-history-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-history" type="button" role="tab" aria-controls="nav-profile"
                    aria-selected="false">Product Lists</button>
                <button class="nav-link text-dark fw-semibold" id="nav-dental-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-dental" type="button" role="tab" aria-controls="nav-contact"
                    aria-selected="false">Managing Stocks</button>
            </div>
        </nav>
        <div class="tab-content " id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-personal" role="tabpanel" aria-labelledby="nav-personal-tab"
                tabindex="0">
                <?php include('a_product.php');?>
            </div>
            <div class="tab-pane fade p-5 bg-white shadow-lg rounded-bottom" id="nav-history" role="tabpanel"
                aria-labelledby="nav-history-tab" tabindex="0">
                <?php include('p_lists.php');?>
            </div>
            <div class="tab-pane fade p-5 bg-white shadow-lg rounded-bottom" id="nav-dental" role="tabpanel"
                aria-labelledby="nav-dental-tab" tabindex="0">
                <?php include('p_stocks.php');?>
            </div>
        </div>
    </div>

    </div>

</body>
<?php include('../includes/script-links.php');?>

</html>