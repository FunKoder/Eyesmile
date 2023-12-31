<?php include('../../login/verify.php'); 
// Get the current file name
$currentFileName = basename($_SERVER['PHP_SELF']);
// Remove the file extension if present
$currentFileName = pathinfo($currentFileName, PATHINFO_FILENAME);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ucfirst($currentFileName); ?></title>
    <?php include('../includes/style-links.php'); ?>
</head>
<style>
    .h1,
    .card-title {
        color: white;
    }
</style>

<body style="background-color: #D7F1F6;">

    <?php include ('../includes/nav2.php');?>

    <div class="px-4 pt-5 d-flex justify-content-end pe-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb pe-5">
                <li class="breadcrumb-item text-primary h5">Home</li>
                <li class="breadcrumb-item active h5" aria-current="page">Dashboard</li>
            </ol>
        </nav>
    </div>

    <?php
    if ($user['user_type'] === 'Staff') :
        include 'staff_card.php';
    elseif ($user['user_type'] === 'Dental' || 'Optic') :
        include 'dental_optic_card.php';
    endif;
    ?>

</body>

</html>
<?php include('../includes/script-links.php'); ?>