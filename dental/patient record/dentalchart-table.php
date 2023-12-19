<?php
include "../../config/dental_function.php";
$users = getAll('dentalcharting_tbl');
?>

<div class="px-2 pb-3">
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Date</th>
                <th>Periodontal Condition</th>
                <th>Oral hygiene</th>
                <th>Denture upper</th>
                <th>Denture lower</th>
                <th>Occlusion</th>
                <th>Abnormalities</th>
                <th>Nature of treatment</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody><?php
                if ($users && mysqli_num_rows($users) > 0) {
                    while ($row = mysqli_fetch_assoc($users)) {
                ?>
                    <tr>
                        <td><?= $row['date'] ?></td>
                        <td><?= $row['periodontal_condition'] ?></td>
                        <td><?= $row['oral_hygiene'] ?></td>
                        <td><?= $row['denture_upper'] ?></td>
                        <td><?= $row['denture_lower'] ?></td>
                        <td><?= $row['occlusion'] ?></td>
                        <td><?= $row['abnormalities'] ?></td>
                        <td><?= $row['nature_of_treatment'] ?></td>
                        <td><button class="btn btn-primary" style="background-color: #0399FE;">
                                <a href="dentalchart-update.php?id=<?= $row['patient_id'] ?>">
                                    <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>
                            </button>
                            <button class="btn btn-danger" style="background-color: #FF5050;">
                                <a href="dental_code.php?id=<?= $row['patient_id'] ?>" onclick="return confirm('Are you sure you want to delete this data?')">
                                    <i class="fa-solid fa-trash" style="color: #ffffff;"></i></a>
                            </button>
                        </td>
                    </tr>
            <?php  }
                } else {
                    echo '<tr><td colspan="9">No record found</td></tr>';
                } ?>
        </tbody>
    </table>
</div>