<div class="container-lg bg-light shadow-lg rounded p-3">
    <?php include('minip_info.php'); ?>

    <hr class="border-2 mx-auto rounded opacity-100" style="border: 2px solid #ff6d33;">
    <p class="h5 fw-semibold ps-2" style="color: #FF6D33;">Additional information</p>

    <div class="p-3">
        <p>Date Issued: <?php echo date("Y-m-d"); ?></p>
        <p>Email: <?php echo $email; ?></p>
        <p>Contact No: <?php echo $telephone_no; ?></p>
        <p>Maxicare Status: <?php echo $insurance; ?></p>
        <p>Maxicare ID Card No: <?php echo $insurance_id_no; ?></p>
        <div class="d-flex justify-content-end">
            <a href="patient_info.php" class="edit-button btn btn-outline-dark mx-2">
                Back
            </a>
            <a href="p_info_edit.php?patient_id=<?php echo $patient_id; ?>" class="edit-button btn rounded fw-semibold text-white" style="background-color: #FF6D33;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                </svg>
                Edit
            </a>
        </div>
    </div>
</div>



<?php include('../includes/script-links.php'); ?>