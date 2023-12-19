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
        header("Location: Patient.Record.php"); // Redirect back to Patient Record page
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}


$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">

    <title>Admin Side | Add Patient</title>
    <script src="Navbar.js"></script>
    <style>
        body {
            background-color: #D7F1F6;
            font-family: 'Poppins', sans-serif;
        }

        .container-fluid {
            max-width: 800px; /* Adjust the max-width as needed */
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #0399FE;
            color: #ffffff;
            padding: 20px;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        .appointment-details {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: auto;
            margin-top: 50px;
            text-align: center;
        }

        .form-label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        .button-container {
            margin-top: 20px;
        }

        .save-button,
        .close-button {
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            margin-top: 10px;
        }

        .save-button {
            background-color: #4CAF50;
            color: white;
            border: none;
        }

        .save-button:hover {
            background-color: #45a049;
        }

        .close-button {
            background-color: #FF6D33;
            color: white;
            border: none;
        }

        .close-button:hover {
            background-color: #FF8533;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="appointment-details">
                <div class="row">
                    <div class="col-md-6">
                        <!-- First Column -->
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" value="<?php echo htmlspecialchars($firstName); ?>" required>

                        <label for="middle_name">Middle Name:</label>
                        <input type="text" name="middle_name" value="<?php echo htmlspecialchars($middleName); ?>">

                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" value="<?php echo htmlspecialchars($lastName); ?>" required>

                        <label for="ext_name">Ext Name:</label>
                        <input type="text" name="ext_name" value="<?php echo htmlspecialchars($extName); ?>">

                        <label for="sex">Sex:</label>
                        <select name="sex" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>

                        <label for="birthdate">Birthdate:</label>
                        <input type="date" name="birthdate" required>
                    </div>
                    <div class="col-md-6">
                        <!-- Second Column -->
                        <label for="marital_status">Martial Status:</label>
                        <input type="text" name="marital_status" value="<?php echo htmlspecialchars($maritalStatus); ?>">

                        <label for="occupation">Occupation:</label>
                        <input type="text" name="occupation" value="<?php echo htmlspecialchars($occupation); ?>">

                        <label for="telephone_no">Contact No.:</label>
                        <input type="text" name="telephone_no" value="<?php echo htmlspecialchars($telephoneNo); ?>" required>

                        <label for="address">Address:</label>
                        <input type="text" name="address" value="<?php echo htmlspecialchars($address); ?>" required>

                        <label for="email">Email:</label>
                        <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>

                        <label for="insurance">Insurance:</label>
                        <select name="insurance" id="insurance" onchange="toggleInsuranceFields()">
                            <option value="None">None</option>
                            <option value="MaxiCare">MaxiCare</option>
                        </select>

                        <label for="insurance_id_no" id="insurance_id_no_label" style="display: none;">Insurance ID No.:</label>
                        <input type="text" name="insurance_id_no" id="insurance_id_no" style="display: none;">

                        <label for="company_name" id="company_name_label" style="display: none;">Company Name:</label>
                        <input type="text" name="company_name" id="company_name" style="display: none;">
                    </div>
                </div>
                <div class="row button-container">
                    <button class="save-button" type="submit">Submit</button>
                    <button class="close-button" type="button" onclick="window.location.href='Patient.Record.php'">Close</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function toggleInsuranceFields() {
            var insuranceSelect = document.getElementById("insurance");
            var insuranceIdNoLabel = document.getElementById("insurance_id_no_label");
            var insuranceIdNoInput = document.getElementById("insurance_id_no");
            var companyNameLabel = document.getElementById("company_name_label");
            var companyNameInput = document.getElementById("company_name");

            if (insuranceSelect.value !== "None") {
                insuranceIdNoLabel.style.display = "block";
                insuranceIdNoInput.style.display = "block";
                companyNameLabel.style.display = "block";
                companyNameInput.style.display = "block";
            } else {
                insuranceIdNoLabel.style.display = "none";
                insuranceIdNoInput.style.display = "none";
                companyNameLabel.style.display = "none";
                companyNameInput.style.display = "none";
            }
        }

        // Trigger the function on page load to set initial visibility
        toggleInsuranceFields();
    </script>
</body>

</html>
