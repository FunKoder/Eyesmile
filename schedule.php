<?php include('../includes/header.php');
include('../includes/style-links.php');
include('../../login/verify.php');


if ($user['user_type'] === 'admin' || $user['user_type'] === 'Optic') :
    include '../includes/nav2.php';
elseif ($user['user_type'] === 'Staff') :
    include '../includes/nav3.php';
endif;
?>
<body>
<div class="container-md shadow-lg bg-white p-5 justify-content-center mt-5 mb-4" id="cons">
    <h1 class="fw-bold" style="color: #FF6D33;">Add Schedule</h1>
    <div class="card-body">
        <form action="code-sched.php" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Date</label>
                        <input type="date" name="selected_date" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Start Time</label>
                        <input type="time" name="start_time" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>End Time</label>
                        <input type="time" name="end_time" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 text-end">
                    <br>
                    <button type="submit" name="add_schedule" class="btn btn-submit">Add Schedule</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>