<?php
// Include your database connection code here if not already included
$conn = new mysqli("localhost", "root", "", "eyesmile_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch patient records with related history records
$sql = "SELECT 
            p.Patient_Id,
            p.First_name,
            p.Middle_name,
            p.Last_name,
            p.Ext_name,
            p.Email,
            p.Telephone_no,
            p.Address,
            p.Insurance,
            h.History_id
        FROM patient_tbl p
        LEFT JOIN history_tbl h ON p.Patient_Id = h.Patient_id";

$result = $conn->query($sql);

// Check for query execution errors
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>
