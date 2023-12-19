<?php
// Function to calculate age based on birthdate
function calculateAge($birthdate) {
    $birthdateObj = new DateTime($birthdate);
    $currentDateObj = new DateTime();
    $ageInterval = $birthdateObj->diff($currentDateObj);
    return $ageInterval->y;
}

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Include your database connection code here if not already included
$conn = new mysqli("localhost", "root", "", "eyesmile_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch existing patient records from the database
$sql = "SELECT * FROM patient_tbl";
$result = $conn->query($sql);

// Check for query execution errors
if (!$result) {
    die("Query failed: " . $conn->error);
}

// Display patient records in the table
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["patient_id"])) {
    // Assuming you have a variable $patient_id containing the patient ID
    $patient_id = $_GET["patient_id"]; // Replace with the actual patient ID

    // Query to retrieve patient details for editing
    $editQuery = "SELECT First_name, Middle_name, Last_name, Ext_name, Birthdate, Sex, Martial_status, Occupation, Telephone_no, Address, Email, Insurance, Insurance_id_no FROM patient_tbl WHERE Patient_Id = ?";
    $stmtEdit = $conn->prepare($editQuery);
    $stmtEdit->bind_param("i", $patient_id);
    $stmtEdit->execute();
    $stmtEdit->bind_result($edited_first_name, $edited_middle_name, $edited_last_name, $edited_ext_name, $edited_birthdate, $edited_sex, $edited_marital_status, $edited_occupation, $edited_telephone_no, $edited_address, $edited_email, $edited_insurance, $edited_insurance_id_no);
    $stmtEdit->fetch();
    $stmtEdit->close();
}

// Handle form submission for updating patient data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Get the patient ID from the form submission
    $patient_id = sanitize_input($_POST["patient_id"]);

    // Assuming you have updated column names in your actual table
    $updateQuery = "UPDATE patient_tbl SET First_name=?, Middle_name=?, Last_name=?, Ext_name=?, Birthdate=?, Sex=?, Martial_status=?, Occupation=?, Telephone_no=?, Address=?, Email=?, Insurance=?, Insurance_id_no=? WHERE Patient_Id=?";
    $stmtUpdate = $conn->prepare($updateQuery);
    $stmtUpdate->bind_param("ssssssssssssss", $_POST["edited_first_name"], $_POST["edited_middle_name"], $_POST["edited_last_name"], $_POST["edited_ext_name"], $_POST["edited_birthdate"],$_POST["edited_sex"], $_POST["edited_marital_status"], $_POST["edited_occupation"], $_POST["edited_telephone_no"], $_POST["edited_address"], $_POST["edited_email"], $_POST["edited_insurance"], $_POST["edited_insurance_id_no"], $patient_id);
    $stmtUpdate->execute();
    $stmtUpdate->close();

    // Redirect back to Patient.Info.php or another page after updating
    header("Location: p_info.php?patient_id=" . $patient_id);
    exit();
}
?>