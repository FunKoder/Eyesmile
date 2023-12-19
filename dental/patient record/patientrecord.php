<?php 
include('../../login/verify.php'); 
include('prconfig/p_config2.php');


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

<body style="background-color: #D7F1F6;">
<?php include('../includes/nav2.php'); ?>
    <div class="container-lg mt-5">
        <nav>
            <div class="nav nav-tabs nav-fill " id="nav-tab" role="tablist">
                <button class="nav-link text-dark fw-semibold active" id="nav-personal-tab" data-bs-toggle="tab" data-bs-target="#nav-personal" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Personal Info</button>
                <button class="nav-link text-dark fw-semibold" id="nav-history-tab" data-bs-toggle="tab" data-bs-target="#nav-history" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Medical History</button>
                <button class="nav-link text-dark fw-semibold" id="nav-dental-tab" data-bs-toggle="tab" data-bs-target="#nav-dental" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Dental Charting</button>
                <button class="nav-link text-dark fw-semibold" id="nav-payment-tab" data-bs-toggle="tab" data-bs-target="#nav-payment" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Payment Record</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-personal" role="tabpanel" aria-labelledby="nav-personal-tab" tabindex="0">
                <!--Personal info-->
                <?php include('p_info.php'); ?>
            </div>
            <div class="tab-pane fade" id="nav-history" role="tabpanel" aria-labelledby="nav-history-tab" tabindex="0">
                <!--Medical History-->
                <?php include('medical_history.php'); ?>
            
            </div>
            <div class="tab-pane fade" id="nav-dental" role="tabpanel" aria-labelledby="nav-dental-tab" tabindex="0">
                <!-- Dental Chart -->
                <?php include('dentalchart.php'); ?>
            </div>
            <div class="tab-pane fade bg-white p-5 rounded-bottom" id="nav-payment" role="tabpanel" aria-labelledby="nav-payment-tab" tabindex="0">
                <!--Payment Record-->
                <?php include('p_record.php'); ?>
            </div>
        </div>
    </div>
</body>
<?php include('../includes/script-links.php'); ?>

</html>