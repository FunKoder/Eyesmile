<?php
include('prconfig/p_con.php');
include('prconfig/p_config3.php');
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
            <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">
            <div class="container-lg rounded">
                <div class="row p-3 pt-4">
                    <div class="col-sm-6 fs-6">
                        <div class="row g-3 justify-content-center">
                            <div class="col-3">
                                <label class="col-form-label" for="edited_first_name">First Name:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" name="edited_first_name" value="<?php echo $edited_first_name; ?>"><br>
                            </div>
                        </div>

                        <div class="row g-3 justify-content-center">
                            <div class="col-3">
                                <label class="col-form-label" for="edited_middle_name">Middle Name:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" name="edited_middle_name" value="<?php echo $edited_middle_name; ?>"><br>
                            </div>
                        </div>

                        <div class="row g-3 justify-content-center">
                            <div class="col-3">
                                <label class="col-form-label" for="edited_last_name">Last Name:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" name="edited_last_name" value="<?php echo $edited_last_name; ?>"><br>
                            </div>
                        </div>

                        <div class="row g-3 justify-content-center">
                            <div class="col-3">
                                <label class="col-form-label" for="edited_ext_name">Ext Name:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" name="edited_ext_name" value="<?php echo $edited_ext_name; ?>"><br>
                            </div>
                        </div>

                        <div class="row g-3 justify-content-center">
                            <label class="col-3" for="sex">Sex:</label>
                            <div class="col-9">
                                <select name="edited_sex" class="form-select">
                                    <option selected><?php echo $edited_sex; ?></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select><br>
                            </div>
                        </div>

                    </div>

                    <div class="col-sm-6 fs-6">
                        <div class="row g-3 justify-content-center">
                            <div class="col-3">
                                <label class="col-form-label" for="edited_birthdate">Birthdate:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="date" name="edited_birthdate" value="<?php echo calculateAge($edited_birthdate); ?>"><br>
                            </div>
                        </div>
                        <div class="row g-3 justify-content-center">
                            <div class="col-3">
                                <label class="col-form-label" for="edited_marital_status">Martial Status:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" name="edited_marital_status" value="<?php echo $edited_marital_status; ?>"><br>
                            </div>
                        </div>
                        <div class="row g-3 justify-content-center">
                            <div class="col-3">
                                <label class="col-form-label" for="edited_occupation">Occupation:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" name="edited_occupation" value="<?php echo $edited_occupation; ?>"><br>
                            </div>
                        </div>
                        <div class="row g-3 justify-content-center">
                            <div class="col-3">
                                <label class="col-form-label" for="edited_telephone_no">Contact No:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" name="edited_telephone_no" value="<?php echo $edited_telephone_no; ?>"><br>
                            </div>
                        </div>
                        <div class="row g-3 justify-content-center">
                            <div class="col-3">
                                <label class="col-form-label" for="edited_address">Address:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" name="edited_address" value="<?php echo $edited_address; ?>"><br>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="border-2 mx-auto rounded opacity-100" style="border: 2px solid #ff6d33;">

                <p class="h4 fw-semibold ps-2" style="color: #FF6D33;">Additional information</p>

                <div class="row p-3 pt-4 ">
                    <div class="col-sm-6 fs-6">
                        <div class="row g-3 justify-content-center">
                            <div class="col-3">
                                <label class="col-form-label" for="edited_insurance">Insurance:</label>
                            </div>
                            <div class="col-9">
                                <select class="form-select" name="edited_insurance" id="insurance" onchange="toggleInsuranceFields()" value="<?php echo $edited_insurance; ?>">
                                    <option value="None">None</option>
                                    <option value="MaxiCare">MaxiCare</option>
                                </select><br>
                            </div>
                        </div>

                        <div class="row g-3 justify-content-center mb-3">
                            <div class="col-3">
                                <label class="col-form-label" for="edited_insurance_id_no" id="insurance_id_no_label" style="display: none;">Insurance ID No.:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" name="edited_insurance_id_no" id="insurance_id_no" value="<?php echo $edited_insurance_id_no; ?>" style="display: none;"><br>
                            </div>
                        </div>

                        <div class="row g-3 justify-content-center">
                            <div class="col-3">
                                <label class="col-form-label" for="edited_company_name" id="company_name_label" style="display: none;">Company Name:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" name="edited_company_name" id="company_name" style="display: none;">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 fs-6">
                        <div class="row g-3 justify-content-center">
                            <div class="col-3">
                                <label class="col-form-label" for="edited_email">Email:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="email" name="edited_email" value="<?php echo $edited_email; ?>"><br>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="patientrecord.php?patient_id=<?php echo $patient_id ?>" class="btn btn btn-outline-dark mx-2 align-self">Cancel</a>
                    <button class="btn fw-semibold text-white edit-button" style="background-color: #FF6D33;" type="submit" name="submit">Submit</button>
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