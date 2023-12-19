<?php
include('prconfig/p_con.php');
?>
<!doctype html>
<html lang="en">

<head>
    <title>Patients</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?php include('../includes/style-links.php'); ?>

</head>

<body style="background-color:#D7F1F6;">
    <?php include('../includes/nav2.php'); ?>
    <div class="container-lg">
        <nav class="d-flex align-items-center justify-content-end fs-4 pt-3" id="space">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" id="nodecor">Home</a></li>
                <li class="breadcrumb-item active">Patient Record</li>
            </ol>
        </nav>
    </div>

    <div class="container-lg d-flex justify-content-end">
        <a name="" id="" class="btn text-white fw-semibold my-2" href="p_info_add.php" style="background-color: #FF6D33;">Add Patient</a>
    </div>

    <div class="container-lg bg-light shadow-lg rounded p-3">
        <h2 class="px-3" style="color: #FF6D33;">Patients</h2>
        <div class="px-3">
            <table id="example" class="table table-striped table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact No.</th>
                        <th>Address</th>
                        <th>Insurance</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody><?php
                        $counter = 1;
                        while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?= $counter ?></td>
                            <td><?= $row['First_name'] . " " . $row['Middle_name'] . " " . $row['Last_name'] . " " . $row['Ext_name'] ?></td>
                            <td><?= $row['Email'] ?></td>
                            <td><?= $row['Telephone_no'] ?></td>
                            <td><?= $row['Address'] ?></td>
                            <td><?= ($row['Insurance'] === 'Yes' ? 'Yes' : 'No') ?></td>
                            <td><button class="btn btn-primary" style="background-color: #0399FE;">
                                    <a href="patientrecord.php?patient_id=<?= $row['Patient_Id'] ?>&history_id=<?= $row['History_id'] ?>">
                                        <i class="fa-solid fa-eye" style="color: #ffffff;"></i></a>
                                </button>
                                <button class="btn btn-danger" style="background-color: #FF5050;">
                                    <a href="?action=delete&patient_id=<?= $row['Patient_Id'] ?>" onclick="return confirm('Are you sure you want to delete this record?')">
                                        <i class="fa-solid fa-trash" style="color: #ffffff;"></i></a>
                                </button>
                            </td>
                        </tr>
                    <?php
                            $counter++;
                        }  ?>
                </tbody>
            </table>
        </div>
    </div>


    <?php include('../includes/script-links.php'); ?>
</body>

</html>