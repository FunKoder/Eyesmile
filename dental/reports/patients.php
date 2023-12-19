<?php include('../../login/verify.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <title>Reports</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include('../includes/style-links.php'); ?>
</head>

<body style="background-color: #D7F1F6;">

<?php include ('../includes/nav2.php');?>
    
    <div class="container-lg">
        <nav class="d-flex align-items-center justify-content-end fs-4 pt-3" id="space">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" id="nodecor">Home</a></li>
                <li class="breadcrumb-item active">Reports</li>
            </ol>
        </nav>
    </div>

    <div class="container-lg bg-light shadow-lg rounded p-2 mt-3 mb-5">
        <div class="container-lg rounded">
            <div class="row px-3 pt-4 fw-semibold fs-6">
                <div class="col-6">
                    <h3 style="color: #FF6D33;">Patient Record</h3>
                </div>
                <div class="d-flex col-6 justify-content-end">
                    <p class="fw-semibold">No. Patients this month:<span class="fs-4" style="color: #FF6D33;"> 3</span></p>
                </div>
            </div>

            <div class="px-2 pb-3">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact No.</th>
                            <th>Address</th>
                            <th>Maxicare Insured</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>20</td>
                            <td>User Admin</td>
                            <td>Testing@example.com</td>
                            <td>123456789</td>
                            <td>Unknown</td>
                            <td>True</td>
                            <td><button class="btn btn-primary" style="background-color: #0399FE;">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button class="btn btn-danger" style="background-color: #FF5050;">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>30</td>
                            <td>User Staff</td>
                            <td>Testing@example.com</td>
                            <td>123456789</td>
                            <td>Unknown</td>
                            <td>False</td>
                            <td><button class="btn btn-primary" style="background-color: #0399FE;">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button class="btn btn-danger" style="background-color: #FF5050;">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>40</td>
                            <td>User</td>
                            <td>Testing@example.com</td>
                            <td>123456789</td>
                            <td>Unknown</td>
                            <td>NULL</td>
                            <td><button class="btn btn-primary" style="background-color: #0399FE;">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button class="btn btn-danger" style="background-color: #FF5050;">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

<?php include('../includes/script-links.php'); ?>

</html>