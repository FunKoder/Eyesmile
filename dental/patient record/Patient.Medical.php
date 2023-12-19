<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eyesmile_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$resultHistoryId = ""; // Initialize $resultHistoryId to avoid undefined variable warning

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['history_id'])) {
    $history_id = $_GET['history_id'];

    $fetchSql = "SELECT * FROM history_tbl WHERE Patient_id = ? AND History_Id = ?";
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
    header("Location: Patient.Record2.php?patient_id=$resultPatientId&history_id=$history_id");
    exit();
}
?>

    <link rel="stylesheet" href="Patient.Medical.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <div class="class" id="medicalHistory">
        <form class="row" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="col-4">
                <label for="general-condition">General Condition:</label>
                <textarea id="general-condition" name="general_condition"><?php echo $general_condition; ?></textarea>

                <label for="blood-pressure">Blood Pressure:</label>
                <input type="text" id="blood-pressure" name="blood_pressure" value="<?php echo $blood_pressure; ?>">

                <label for="drugs">Drugs Being Taken:</label>
                <input type="text" id="drugs" name="drugs_taken" value="<?php echo $drugs_taken; ?>">

                <label for="bleeding-history">Previous History of Bleeding:</label>
                <input type="text" id="bleeding-history" name="history_of_bleeding" value="<?php echo $history_of_bleeding; ?>">

                <label for="allergies">Allergies:</label>
                <input type="text" id="allergies" name="allergies" value="<?php echo $allergies; ?>">
            </div>

            <div class="col-4">
                <h3 id="additional-info-h3">Chronic Ailments</h3>

                <div id="middle-additional-content" class="flex-item">
                    <label for="heart-disease">Heart Disease:</label>
                    <div id="heart-disease-options">
                        <label>
                            Yes
                            <input type="radio" id="heart-disease-yes" name="heart_disease" <?php echo $heart_diseases == 1 ? 'checked' : ''; ?> value="yes">
                        </label>

                        <label>
                            No
                            <input type="radio" id="heart-disease-no" name="heart_disease" <?php echo $heart_diseases == 0 ? 'checked' : ''; ?> value="no">
                        </label>
                    </div>

                    <label for="diabetes">Diabetes:</label>
                    <div id="diabetes-options">
                        <label>
                            Yes
                            <input type="radio" id="diabetes-yes" name="diabetes" <?php echo $diabetes == 1 ? 'checked' : ''; ?> value="yes">
                        </label>

                        <label>
                            No
                            <input type="radio" id="diabetes-no" name="diabetes" <?php echo $diabetes == 0 ? 'checked' : ''; ?> value="no">
                        </label>
                    </div>

                    <label for="cancer">Cancer:</label>
                    <div id="cancer-options">
                        <label>
                            Yes
                            <input type="radio" id="cancer-yes" name="cancer" <?php echo $cancer == 1 ? 'checked' : ''; ?> value="yes">
                        </label>

                        <label>
                            No
                            <input type="radio" id="cancer-no" name="cancer" <?php echo $cancer == 0 ? 'checked' : ''; ?> value="no">
                        </label>
                    </div>


                    <label for="bleeding-disorder">Bleeding Disorder:</label>
                    <div id="bleeding-disorder-options">
                        <label>
                            Yes
                            <input type="radio" id="bleeding-disorder-yes" name="bleeding_disorder" <?php echo $bleeding_disorder == 1 ? 'checked' : ''; ?> value="yes">
                        </label>

                        <label>
                            No
                            <input type="radio" id="bleeding-disorder-no" name="bleeding_disorder" <?php echo $bleeding_disorder == 0 ? 'checked' : ''; ?> value="no">
                        </label>
                    </div>

                    <label for="psychiatric-disorder">Psychiatric Disorder:</label>
                    <div id="psychiatric-disorder-options">
                        <label>
                            Yes
                            <input type="radio" id="psychiatric-disorder-yes" name="psychiatric_disorder" <?php echo $psychiatric_disorder == 1 ? 'checked' : ''; ?> value="yes">
                        </label>

                        <label>
                            No
                            <input type="radio" id="psychiatric-disorder-no" name="psychiatric_disorder" <?php echo $psychiatric_disorder == 0 ? 'checked' : ''; ?> value="no">
                        </label>
                    </div>
                </div>
                <label for="hypertension">Hypertension:</label>
                <div id="hypertension-options">
                    <label>
                        Yes
                        <input type="radio" id="hypertension-yes" name="hypertension" <?php echo $hypertension == "yes" ? 'checked' : ''; ?> value="yes">
                    </label>

                    <label>
                        No
                        <input type="radio" id="hypertension-no" name="hypertension" <?php echo $hypertension == "no" ? 'checked' : ''; ?> value="no">
                    </label>
                </div>
            </div>

            <div id="" class="col-4">
                <label for="xray-records">X-ray records:</label>
                <input type="file" id="xray-records" name="xray_records" accept="image/*" style="display: none;">
                <button id="choose-xray-img" onclick="document.getElementById('xray-records').click();">Choose File</button>
                <div id="images-container"></div>
            </div>

            <button id="submit-button" type="submit" name="submit">Edit</button>
        </form>

    </div>
