<?php
// Include your database connection code here if not already included
$conn = new mysqli("localhost", "root", "", "eyesmile_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables for form fields
$firstName = $middleName = $lastName = $extName = $sex = $birthdate = $maritalStatus = $occupation = "";
$telephoneNo = $address = $email = $insurance = $insuranceIdNo = $companyName = $userEncoded = $dateEncoded = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted

    // Retrieve form data
    $firstName = $_POST["first_name"];
    $middleName = $_POST["middle_name"];
    $lastName = $_POST["last_name"];
    $extName = $_POST["ext_name"];
    $sex = $_POST["sex"];
    $birthdate = $_POST["birthdate"];
    $maritalStatus = $_POST["marital_status"];
    $occupation = $_POST["occupation"];
    $telephoneNo = $_POST["telephone_no"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $insurance = $_POST["insurance"];
    $insuranceIdNo = $_POST["insurance_id_no"];
    $companyName = $_POST["company_name"];
    
    // Set a default value for User_encoded or leave it empty based on your needs
    $userEncoded = "default_user";
    $dateEncoded = date("Y-m-d H:i:s");

    // Insert data into the database using prepared statements
    $sql = "INSERT INTO patient_tbl (First_name, Middle_name, Last_name, Ext_name, Sex, Birthdate, Martial_status, Occupation, Telephone_no, Address, Email, Insurance, Insurance_id_no, Company_name, User_Encoded, Date_encoded)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssssssss", $firstName, $middleName, $lastName, $extName, $sex, $birthdate, $maritalStatus, $occupation, $telephoneNo, $address, $email, $insurance, $insuranceIdNo, $companyName, $userEncoded, $dateEncoded);

    if ($stmt->execute()) {
        // Successfully inserted into the database
        $stmt->close();
        $conn->close();
        header("Location: patient_info.php"); // Redirect back to Patient Record page
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>