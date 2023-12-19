<?php include('../includes/header.php');
$users = getAll('user'); // Assuming your table name is 'users'
include('../../login/verify.php');
include('../includes/style-links.php')


?>

<body style="background-color: #D7F1F6;">
    <!-- Your HTML code remains unchanged -->
    <?php include ('../includes/nav3.php');?>
    <div class="container-xl shadow-lg bg-white p-5 justify-content-center mt-5 mb-5" id="cons">
        <button class="btn float-end" id="button"><a href="users-create.php" style="text-decoration:none; color:white">Add</a></button>
        <h1 class="fw-bold" style="color: #FF6D33;">Users List</h1>
        <table id="examples" class="table table-striped" style="width:100%">
            <thead style="width: max-content;">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact No.</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                <?php
                if ($users && mysqli_num_rows($users) > 0) {
                    while ($row = mysqli_fetch_assoc($users)) {
                        $fullName = $row['first_name'] . ' ' . $row['last_name'];
                ?>
                        <tr>

                            <td><?= $fullName ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['phone'] ?></td>
                            <td><?= $row['status'] == 0 ? 'Active' : 'Deactivated'; ?></td>
                            <td>
                                <a href="users-edit.php?id=<?= $row['id'] ?>" class="btn btn-primary" style="background-color: #0399FE;">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="code.php?id=<?= $row['id'] ?>" class="btn btn-danger" style="background-color: #FF5050;" onclick="return confirm('Are you sure you want to delete this data?')">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
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

</body>


<?php include('../includes/script-links.php') ?>

</html>