<?php include('../includes/header.php');
$requests = getAll('appointment'); // Assuming your table name is 'users'
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Appointment Requests</title>

    
    <link rel="stylesheet" href="../assets/css/style.css">
    <?php include('../includes/style-links.php');?>
</head>
<body style="background-color: #D7F1F6;">

    <?php include('../includes/nav3.php');?>

    <div class="container-xl shadow-lg bg-white p-5 justify-content-center mt-5 mb-5" id="cons" >
    <a class="nav-link btn-link" href="appointment-form.php" style=" background-color: #FF7518;
    color: white; padding:8px; width: max-content; border-radius:5px; float:right"  >Add Appointment</a>
                <?= alertMessage();?>

                <h1 class="fw-bold" style="color: #FF6D33;">Online Appointment Requests</h1>
                <table id="example" class="table table-striped" style="width:100%; text-align:center">
                    <thead style="width: max-content;">
                        <tr>
                            <th>ID</th>
                            <th>Appointment Number</th>
                            <th>Patient Name</th>
                            <th>Contact No.</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    if ($requests && mysqli_num_rows($requests) > 0) {
                        while ($row = mysqli_fetch_assoc($requests)) {
                        
                    ?>
                         
                        <tr>
                            <td><?= $row['id']; ?></td>
                            <td><?= $row['reference_no']; ?></td>
                            <td><?= $row['first_name'] . ' ' . $row['last_name']. ' ' . $row['middle_name']. ' ' . $row['ext_name']; ?></td>
                            <td><?= $row['phone']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['status']; ?></td>
                      
                            
                            <td>
                            <a href="request-view.php?id=<?= $row['id']; ?>" class="btn btn-primary" style="background-color: #0399FE;">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="code.php?id=<?= $row['id']; ?>" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this record?')"
                            style="background-color: #FF5050;">
                                <i class="fa-solid fa-trash"></i>
                            </a></td>
                        </tr>

                    <?php
                        }
                    } else {
                        echo '<tr><td colspan="6">No users found</td></tr>';
                    }
                    ?>
                          
                    </tbody>
                </table>
            </div>
    </div>
    
</body>
<?php include('../includes/script-links.php'); ?>
</html>