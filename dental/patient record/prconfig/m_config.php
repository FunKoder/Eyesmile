<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eyesmile_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$history_id = isset($_GET['history_id']) ? $_GET['history_id'] : '';
echo "History ID from GET: $history_id<br>";

$resultHistoryId = ""; // Initialize $resultHistoryId to avoid undefined variable warning

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['History_id'])) {
    $history_id = $_GET['History_id'];

    $fetchSql = "SELECT * FROM history_tbl WHERE Patient_id = ? AND History_Id = ? ";
    $stmtFetch = $conn->prepare($fetchSql);
    $stmtFetch->bind_param("ii", $resultPatientId, $history_id);
    $stmtFetch->execute();
    $stmtFetch->bind_result(
        $resultHistoryId,
        $resultPatientId,
        $general_condition,
        $blood_pressure,
        $drugs_taken,
        $history_of_bleeding,
        $allergies,
        $heart_diseases,
        $diabetes,
        $cancer,
        $bleeding_disorder,
        $psychiatric_disorder,
        $hypertension,
        $xrayPath
    );

    if (!$stmtFetch->fetch()) {
        echo "Error: Invalid history_id";
        exit();
    }

    $stmtFetch->close();
}

// Define default values
$defaultValues = [
    'general_condition' => '',
    'blood_pressure' => '',
    'drugs_taken' => '',
    'history_of_bleeding' => '',
    'allergies' => '',
    'heart_diseases' => 0,
    'diabetes' => 0,
    'cancer' => 0,
    'bleeding_disorder' => 0,
    'psychiatric_disorder' => 0,
    'hypertension' => 0,
];

// Assign posted values or defaults
foreach ($defaultValues as $key => $defaultValue) {
    ${$key} = isset($_POST[$key]) ? $_POST[$key] : $defaultValue;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $history_id = isset($_POST['history_id']) ? $_POST['history_id'] : "";
    $general_condition = isset($_POST['general_condition']) ? $_POST['general_condition'] : "";
    $blood_pressure = isset($_POST['blood_pressure']) ? $_POST['blood_pressure'] : "";
    $drugs_taken = isset($_POST['drugs_taken']) ? $_POST['drugs_taken'] : "";
    $history_of_bleeding = isset($_POST['history_of_bleeding']) ? $_POST['history_of_bleeding'] : "";
    $allergies = isset($_POST['allergies']) ? $_POST['allergies'] : "";
    $heart_diseases = isset($_POST['heart_disease']) ? $_POST['heart_disease'] : "no";
    $diabetes = isset($_POST['diabetes']) ? $_POST['diabetes'] : "no";
    $cancer = isset($_POST['cancer']) ? $_POST['cancer'] : "no";
    $bleeding_disorder = isset($_POST['bleeding_disorder']) ? $_POST['bleeding_disorder'] : "no";
    $psychiatric_disorder = isset($_POST['psychiatric_disorder']) ? $_POST['psychiatric_disorder'] : "no";
    $hypertension = isset($_POST['hypertension']) ? ($_POST['hypertension'] == "yes" ? "yes" : "no") : "no";

    echo "Received Data:<br>";
    echo "History ID: $history_id<br>";
    echo "General Condition: $general_condition<br>";
    echo "Blood Pressure: $blood_pressure<br>";
    echo "Drugs Taken: $drugs_taken<br>";
    echo "History of Bleeding: $history_of_bleeding<br>";
    echo "Allergies: $allergies<br>";
    echo "Heart Diseases: $heart_diseases<br>";
    echo "Diabetes: $diabetes<br>";
    echo "Cancer: $cancer<br>";
    echo "Bleeding Disorder: $bleeding_disorder<br>";
    echo "Psychiatric Disorder: $psychiatric_disorder<br>";
    echo "Hypertension: $hypertension<br>"; // Displaying for debugging

    $xrayPath = null;
    $uploadDir = 'PatientRecord/Xray/';

    if (!empty($_FILES['xray_records']['name'])) {
        $xrayFile = $uploadDir . basename($_FILES['xray_records']['name']);
        move_uploaded_file($_FILES['xray_records']['tmp_name'], $xrayFile);
        $xrayPath = $xrayFile;
    }

    echo "X-ray Path: $xrayPath<br>";

    $updateSql = "UPDATE history_tbl SET 
        General_condition = ?, 
        Blood_pressure = ?, 
        Drugs_taken = ?, 
        History_of_bleeding = ?, 
        Allergies = ?, 
        Heart_diseases = ?, 
        Diabetes = ?, 
        Cancer = ?, 
        Bleeding_disorder = ?, 
        Psychiatric_disorder = ?, 
        Hypertension = ?, 
        X_ray = ? 
        WHERE History_Id = ?";

    $heart_diseases = $heart_diseases == "yes" ? 1 : 0;
    $diabetes = $diabetes == "yes" ? 1 : 0;
    $cancer = $cancer == "yes" ? 1 : 0;
    $bleeding_disorder = $bleeding_disorder == "yes" ? 1 : 0;
    $psychiatric_disorder = $psychiatric_disorder == "yes" ? 1 : 0;
    $hypertension = $hypertension == "yes" ? "yes" : "no"; // Ensure Hypertension is "yes" or "no"

    echo "Converted Values:<br>";
    echo "Heart Diseases: $heart_diseases<br>";
    echo "Diabetes: $diabetes<br>";
    echo "Cancer: $cancer<br>";
    echo "Bleeding Disorder: $bleeding_disorder<br>";
    echo "Psychiatric Disorder: $psychiatric_disorder<br>";
    echo "Hypertension: $hypertension<br>"; // Displaying for debugging

    $stmtUpdate = $conn->prepare($updateSql);
    $stmtUpdate->bind_param(
        "ssssssiiiiiss",
        $general_condition,
        $blood_pressure,
        $drugs_taken,
        $history_of_bleeding,
        $allergies,
        $heart_diseases,
        $diabetes,
        $cancer,
        $bleeding_disorder,
        $psychiatric_disorder,
        $hypertension,
        $xrayPath,
        $history_id
    );

    $stmtUpdate->execute();

    if ($stmtUpdate->errno) {
        echo "SQL Error: " . $stmtUpdate->error . "<br>";
    }

    $stmtUpdate->close();

    // Fetch patient_id for redirection
    $fetchPatientIdSql = "SELECT Patient_id FROM history_tbl WHERE History_Id = ?";
    $stmtFetchPatientId = $conn->prepare($fetchPatientIdSql);
    $stmtFetchPatientId->bind_param("i", $history_id);
    $stmtFetchPatientId->execute();
    $stmtFetchPatientId->bind_result($resultPatientId);
    $stmtFetchPatientId->fetch();
    $stmtFetchPatientId->close();

    // Redirect to Patient.Record2.php with both patient_id and history_id
    header("Location: patient_record.php?patient_id=$resultPatientId&history_id=$history_id");
    exit();
}
?>