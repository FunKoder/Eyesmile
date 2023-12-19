<?php 
include('prconfig/p_config.php');
?>
<!doctype html>
<html lang="en">

<head>
    <title>Personal info</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?php include('../includes/style-links.php'); ?>

</head>

<body style="background-color:#D7F1F6;">

    <div class="container-lg bg-light shadow-lg rounded p-3 mt-5">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="container-lg rounded">
            <p class="h3 fw-semibold ps-2" style="color: #FF6D33;">Add Patient</p>
                <div class="row p-3 pt-4">
                    <div class="col-sm-6 fs-6"> 
                        <div class="row g-3 justify-content-center">
                            <div class="col-3">
                                <label class="col-form-label" for="first_name">First Name:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" name="first_name" value="<?php echo htmlspecialchars($firstName); ?>" required><br>
                            </div>
                        </div>

                        <div class="row g-3 justify-content-center">
                            <div class="col-3">
                                <label class="col-form-label" for="middle_name">Middle Name:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" name="middle_name" value="<?php echo htmlspecialchars($middleName); ?>"><br>
                            </div>
                        </div>

                        <div class="row g-3 justify-content-center">
                            <div class="col-3">
                                <label class="col-form-label" for="last_name">Last Name:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" name="last_name" value="<?php echo htmlspecialchars($lastName); ?>" required><br>
                            </div>
                        </div>

                        <div class="row g-3 justify-content-center">
                            <div class="col-3">
                                <label class="col-form-label" for="ext_name">Ext Name:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" name="ext_name" value="<?php echo htmlspecialchars($extName); ?>"><br>
                            </div>
                        </div>

                        <div class="row g-3 justify-content-center">
                            <label class="col-3" for="sex">Sex:</label>
                            <div class="col-9">
                                <select name="sex" class="form-select " required>
                                    <option selected>None</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select><br>
                            </div>
                        </div>

                    </div>

                    <div class="col-sm-6 fs-6">
                        <div class="row g-3 justify-content-center">
                            <div class="col-3">
                                <label class="col-form-label" for="birthdate">Birthdate:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="date" name="birthdate"><br>
                            </div>
                        </div>
                        <div class="row g-3 justify-content-center">
                            <div class="col-3">
                                <label class="col-form-label" for="marital_status">Martial Status:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" name="marital_status" value="<?php echo htmlspecialchars($maritalStatus); ?>"><br>
                            </div>
                        </div>
                        <div class="row g-3 justify-content-center">
                            <div class="col-3">
                                <label class="col-form-label" for="occupation">Occupation:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" name="occupation" value="<?php echo htmlspecialchars($occupation); ?>"><br>
                            </div>
                        </div>
                        <div class="row g-3 justify-content-center">
                            <div class="col-3">
                                <label class="col-form-label" for="telephone_no">Telephone No:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" name="telephone_no" value="<?php echo htmlspecialchars($telephoneNo); ?>" required><br>
                            </div>
                        </div>
                        <div class="row g-3 justify-content-center">
                            <div class="col-3">
                                <label class="col-form-label" for="address">Address:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" name="address" value="<?php echo htmlspecialchars($address); ?>" required><br>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="border-2 mx-auto rounded opacity-100" style="border: 2px solid #ff6d33;">

                <p class="h5 fw-semibold ps-2" style="color: #FF6D33;">Additional information</p>


                <div class="row p-3 pt-4 ">
                    <div class="col-sm-6 fs-6">
                        <div class="row g-3 justify-content-center">
                            <div class="col-3">
                                <label class="col-form-label" for="insurance">Insurance:</label>
                            </div>
                            <div class="col-9">
                                <select class="form-select" name="insurance" id="insurance" onchange="toggleInsuranceFields()">
                                    <option value="None">None</option>
                                    <option value="MaxiCare">MaxiCare</option>
                                </select><br>
                            </div>
                        </div>

                        <div class="row g-3 justify-content-center mb-3">
                            <div class="col-3">
                                <label class="col-form-label" for="insurance_id_no" id="insurance_id_no_label" style="display: none;">Insurance ID No.:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" name="insurance_id_no" id="insurance_id_no" style="display: none;"><br>
                            </div>
                        </div>

                        <div class="row g-3 justify-content-center">
                            <div class="col-3">
                                <label class="col-form-label" for="company_name" id="company_name_label" style="display: none;">Company Name:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" name="company_name" id="company_name" style="display: none;">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 fs-6">
                        <div class="row g-3 justify-content-center">
                            <div class="col-3">
                                <label class="col-form-label" for="email">Email:</label>
                            </div>
                            <div class="col-9"> 
                                <input  class="form-control"type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required><br>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn fw-semibold bg-danger me-2 text-white" type="button" onclick="window.location.href='patient_info.php'">Back</button>
                    <button class="btn fw-semibold text-white" style="background-color: #FF6D33;" type="submit">Submit</button>
                </div>

            </div>
        </form>
    </div>


    <?php include('../includes/script-links.php'); ?>
</body>
<script>
    function toggleInsuranceFields() {
        var insuranceSelect = document.getElementById("insurance");
        var insuranceIdNoLabel = document.getElementById("insurance_id_no_label");
        var insuranceIdNoInput = document.getElementById("insurance_id_no");
        var companyNameLabel = document.getElementById("company_name_label");
        var companyNameInput = document.getElementById("company_name");

        if (insuranceSelect.value !== "None") {
            insuranceIdNoLabel.style.display = "inline";
            insuranceIdNoInput.style.display = "inline";
            companyNameLabel.style.display = "inline";
            companyNameInput.style.display = "inline";
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

</html>