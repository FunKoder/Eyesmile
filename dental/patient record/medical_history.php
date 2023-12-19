<div class="class container-lg bg-light shadow-lg rounded p-3" id="medicalHistory">
    <?php include('minip_info.php'); ?>
    <?php include('prconfig/m_config.php'); ?>
    <form class="row p-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="History_id" value="<?php echo $history_id; ?>">
        <hr class="border-2 mx-auto rounded opacity-100" style="border: 2px solid #ff6d33;">
        <div class="col-4">
            <h5 style="color: #FF6D33;">Additional information</h5>
            <div class="mb-3">
                <label class="col-form-label" for="general-condition">General Condition:</label>
                <textarea class="form-control" id="general-condition" name="general_condition"><?php echo $general_condition; ?></textarea>
            </div>

            <div class="mb-3">
                <label class="col-form-label" for="blood-pressure">Blood Pressure:</label>
                <input class="form-control" type="text" id="blood-pressure" name="blood_pressure" value="<?php echo $blood_pressure; ?>">
            </div>

            <div class="mb-3">
                <label class="col-form-label" for="drugs">Drugs Being Taken:</label>
                <input class="form-control" type="text" id="drugs" name="drugs_taken" value="<?php echo $drugs_taken; ?>">
            </div>

            <div class="mb-3">
                <label class="col-form-label" for="bleeding-history">Previous History of Bleeding:</label>
                <input class="form-control" type="text" id="bleeding-history" name="history_of_bleeding" value="<?php echo $history_of_bleeding; ?>">
            </div>

            <div class="mb-3">
                <label class="col-form-label" for="allergies">Allergies:</label>
                <input class="form-control" type="text" id="allergies" name="allergies" value="<?php echo $allergies; ?>">
            </div>
        </div>

        <div class="col-4">
            <h5 class="ps-2" style="color: #FF6D33;">Chronic Ailments</h5>
            <div id="middle-additional-content" class="flex-item">
                <div id="heart-disease-options" class="row px-2 py-3">
                    <label for="heart-disease" class="col-8 ">Heart Disease:</label>
                    <div class="col-4">
                        <label class="form-check-label">
                            Yes
                            <input type="radio" id="heart-disease-yes" class="form-check-input" name="heart_disease" <?php echo $heart_diseases == 1 ? 'checked' : ''; ?> value="yes">
                        </label>
                        <label class="form-check-label">
                            No
                            <input type="radio" id="heart-disease-no" class="form-check-input" name="heart_disease" <?php echo $heart_diseases == 0 ? 'checked' : ''; ?> value="no">
                        </label>
                    </div>
                </div>

                <div id="diabetes-options" class="row px-2 py-3">
                    <label for="diabetes" class="col-8 ">Diabetes:</label>
                    <div class="col-4">
                        <label class="form-check-label">
                            Yes
                            <input type="radio" id="diabetes-yes" class="form-check-input" name="diabetes" <?php echo $diabetes == 1 ? 'checked' : ''; ?> value="yes">
                        </label>
                        <label class="form-check-label">
                            No
                            <input type="radio" id="diabetes-no" class="form-check-input" name="diabetes" <?php echo $diabetes == 0 ? 'checked' : ''; ?> value="no">
                        </label>
                    </div>
                </div>

                <div id="cancer-options" class="row px-2 py-3">
                    <label for="cancer" class="col-8 ">Cancer:</label>
                    <div class="col-4">
                        <label class="form-check-label">
                            Yes
                            <input type="radio" id="cancer-yes" class="form-check-input" name="cancer" <?php echo $cancer == 1 ? 'checked' : ''; ?> value="yes">
                        </label>
                        <label class="form-check-label">
                            No
                            <input type="radio" id="cancer-no" class="form-check-input" name="cancer" <?php echo $cancer == 0 ? 'checked' : ''; ?> value="no">
                        </label>
                    </div>
                </div>

                <div id="bleeding-disorder-options" class="row px-2 py-3">
                    <label for="bleeding-disorder" class="col-8 ">Bleeding Disorder:</label>
                    <div class="col-4">
                        <label class="form-check-label">
                            Yes
                            <input type="radio" id="bleeding-disorder-yes" class="form-check-input" name="bleeding_disorder" <?php echo $bleeding_disorder == 1 ? 'checked' : ''; ?> value="yes">
                        </label>
                        <label class="form-check-label">
                            No
                            <input type="radio" id="bleeding-disorder-no" class="form-check-input" name="bleeding_disorder" <?php echo $bleeding_disorder == 0 ? 'checked' : ''; ?> value="no">
                        </label>
                    </div>
                </div>

                <div id="psychiatric-disorder-options" class="row px-2 py-3">
                    <label for="psychiatric-disorder" class="col-8 ">Psychiatric Disorder:</label>
                    <div class="col-4">
                        <label class="form-check-label">
                            Yes
                            <input type="radio" id="psychiatric-disorder-yes" class="form-check-input" name="psychiatric_disorder" <?php echo $psychiatric_disorder == 1 ? 'checked' : ''; ?> value="yes">
                        </label>
                        <label class="form-check-label">
                            No
                            <input type="radio" id="psychiatric-disorder-no" class="form-check-input" name="psychiatric_disorder" <?php echo $psychiatric_disorder == 0 ? 'checked' : ''; ?> value="no">
                        </label>
                    </div>
                </div>
            </div>

            <div id="hypertension-options" class="row px-2 py-3">
                <label for="hypertension" class="col-8 ">Hypertension:</label>
                <div class="col-4">
                    <label class="form-check-label">
                        Yes
                        <input type="radio" id="hypertension-yes" class="form-check-input" name="hypertension" <?php echo $hypertension == "yes" ? 'checked' : ''; ?> value="yes">
                    </label>
                    <label class="form-check-label">
                        No
                        <input type="radio" id="hypertension-no" class="form-check-input" name="hypertension" <?php echo $hypertension == "no" ? 'checked' : ''; ?> value="no">
                    </label>
                </div>
            </div>
        </div>

        <div id="" class="col-4">
            <label for="xray-records" class="h5 fw-semibold" style="color: #FF6D33;">X-ray records:</label>
            <input type="file" id="xray-records" name="xray_records" accept="image/*" style="display: none;">
            <button id="choose-xray-img" onclick="document.getElementById('xray-records').click();">Choose File</button>
            <div id="images-container"></div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" name="submit" class="btn fw-semibold text-white px-3 py-2" style="background-color: #FF6D33;">Edit</button>
        </div>
    </form>
</div>