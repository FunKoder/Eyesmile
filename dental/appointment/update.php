<?php
require '../../config/function.php';
if (isset($_POST['updateReq'])) {
    $status = validate($_POST['status']);
    $preffered_date = validate($_POST['preffered_date']);
    $preffered_time  = validate($_POST['preffered_time']);
 
    $appointmentId = validate($_POST['appointmentId']);

    // Corrected SQL UPDATE query
    $query = "UPDATE appointment SET 
        status = ?,
        preffered_date= ?,
        preffered_time= ?
        WHERE id = ?;"
        ;

    // Establish database connection
    $conn = mysqli_connect("localhost", "root", "", "eyesmile_db");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, $query);
    if ($stmt) {
        // Format the time to 12-hour format with AM/PM for insertion
        $preffered_time = date("h:i A", strtotime($preffered_time));
        // Bind parameters to the query
        mysqli_stmt_bind_param($stmt, "sssi", $status,$preffered_date,$preffered_time, $appointmentId);

        // Execute the statement
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            redirect('request.php' , 'Appointment updated successfully');
        } else {
            redirect('request-view.php' , 'Something went wrong while updating');
        }
    } else {
        redirect('request-view.php', 'Prepared statement error');
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>