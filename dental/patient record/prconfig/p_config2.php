<?php
// Include your database connection code here if not already included
$conn = new mysqli("localhost", "root", "", "eyesmile_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the patient ID parameter is set in the URL
if (isset($_GET['patient_id'])) {
    // Retrieve patient ID from the URL
    $patient_id = $_GET['patient_id'];

    // Query to retrieve patient details based on the patient ID
    $patientQuery = "SELECT First_name, Middle_name, Last_name, Birthdate, Sex, Martial_status, Occupation, Telephone_no, Address, Email, Insurance, Insurance_id_no FROM patient_tbl WHERE Patient_Id = ?";
    $stmtPatient = $conn->prepare($patientQuery);
    $stmtPatient->bind_param("i", $patient_id);
    $stmtPatient->execute();
    $stmtPatient->bind_result($first_name, $middle_name, $last_name, $birthdate, $sex, $marital_status, $occupation, $telephone_no, $address, $email, $insurance, $insurance_id_no);
    $stmtPatient->fetch();
    $stmtPatient->close();

    function calculateAge($birthdate) {
        // Specify the format of the date
        $birthdateObj = DateTime::createFromFormat('Y-m-d', $birthdate);
        // Check if the date conversion was successful
        if (!$birthdateObj) {
            echo "Invalid date format for birthdate: $birthdate";
            return false;
        }
        $currentDateObj = new DateTime();
        $ageInterval = $birthdateObj->diff($currentDateObj);
        return $ageInterval->y;
    }
    
    $totalAge = calculateAge($birthdate);
} else {
    // Handle the case where patient ID is not provided
    echo "Patient ID not provided.";
    exit();
}

// Close connection
$conn->close();
?>