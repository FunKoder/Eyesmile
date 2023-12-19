<div class="row p-3 fs-6">
    <div class="col-sm-6 fs-6">
        <p>Name: <?php echo $first_name . ' ' . $middle_name . ' ' . $last_name; ?></p>
        <p>Age: <?php echo calculateAge($birthdate); ?></p>
        <p>Sex: <?php echo $sex; ?></p>
        <p>Birthdate: <?php echo $birthdate; ?></p>
    </div>
    <div class="col-sm-6 fs-6">
        <p>Martial Status: <?php echo $marital_status; ?></p>
        <p>Occupation: <?php echo $occupation; ?></p>
        <p>Telephone No: <?php echo $telephone_no; ?></p>
        <p>Address: <?php echo $address; ?></p>
    </div>
</div>