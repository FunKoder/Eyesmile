<?php 
require '../../config/dental_function.php';


if (isset($_POST['submit'])) {
    $patient_id = $_GET['patient_id'];
    
    $t11 = validate($_POST['tooth_11']);$t12 = validate($_POST['tooth_12']);$t13 = validate($_POST['tooth_13']);
    $t14 = validate($_POST['tooth_14']);$t15 = validate($_POST['tooth_15']);$t16 = validate($_POST['tooth_16']); 
    $t17 = validate($_POST['tooth_17']);$t18 = validate($_POST['tooth_18']);

    $t21 = validate($_POST['tooth_21']);$t22 = validate($_POST['tooth_22']);$t23 = validate($_POST['tooth_23']);
    $t24 = validate($_POST['tooth_24']);$t25 = validate($_POST['tooth_25']);$t26 = validate($_POST['tooth_26']); 
    $t27 = validate($_POST['tooth_27']);$t28 = validate($_POST['tooth_28']);

    $t31 = validate($_POST['tooth_31']);$t32 = validate($_POST['tooth_32']);$t33 = validate($_POST['tooth_33']);
    $t34 = validate($_POST['tooth_34']);$t35 = validate($_POST['tooth_35']);$t36 = validate($_POST['tooth_36']); 
    $t37 = validate($_POST['tooth_37']);$t38 = validate($_POST['tooth_38']);

    $t41 = validate($_POST['tooth_41']);$t42 = validate($_POST['tooth_42']);$t43 = validate($_POST['tooth_43']);
    $t44 = validate($_POST['tooth_44']);$t45 = validate($_POST['tooth_45']);$t46 = validate($_POST['tooth_46']); 
    $t47 = validate($_POST['tooth_47']);$t48 = validate($_POST['tooth_48']);

    $t51 = validate($_POST['tooth_51']);$t52 = validate($_POST['tooth_52']);$t53 = validate($_POST['tooth_53']);
    $t54 = validate($_POST['tooth_54']);$t55 = validate($_POST['tooth_55']);

    $t61 = validate($_POST['tooth_61']);$t62 = validate($_POST['tooth_62']);$t63 = validate($_POST['tooth_63']);
    $t64 = validate($_POST['tooth_64']);$t65 = validate($_POST['tooth_65']);

    $t71 = validate($_POST['tooth_71']);$t72 = validate($_POST['tooth_72']);$t73 = validate($_POST['tooth_73']);
    $t74 = validate($_POST['tooth_74']);$t75 = validate($_POST['tooth_75']);

    $t81 = validate($_POST['tooth_81']);$t82 = validate($_POST['tooth_82']);$t83 = validate($_POST['tooth_83']);
    $t84 = validate($_POST['tooth_84']);$t85 = validate($_POST['tooth_85']);
    
    $date = validate($_POST['date']);
    $p_condition = validate($_POST['periodontal_condition']);
    $oral_hygiene = validate($_POST['oral_hygiene']);
    $d_upper = validate($_POST['denture_upper']);
    $d_lower = validate($_POST['denture_lower']);
    $sinceup = validate($_POST['since_upper']);
    $sincelow = validate($_POST['since_lower']);
    $occlusion = validate($_POST['occlusion']);
    $abnormal = validate($_POST['abnormalities']);
    $ntreatment = validate($_POST['nature_of_treatment']);

        // Establish database connection (assuming $conn is your connection variable)
        $conn = mysqli_connect("localhost", "root", "", "eyesmile_db");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // SQL query to insert user data using prepared statement
        $query = "INSERT INTO dentalcharting_tbl (tooth_18, tooth_17, tooth_16, tooth_15, tooth_14, tooth_13, tooth_12, tooth_11,
        tooth_28, tooth_27, tooth_26, tooth_25, tooth_24, tooth_23, tooth_22, tooth_21,
        tooth_38, tooth_37, tooth_36, tooth_35, tooth_34, tooth_33, tooth_32, tooth_31,
        tooth_48, tooth_47, tooth_46, tooth_45, tooth_44, tooth_43, tooth_42, tooth_41,
        tooth_55, tooth_54, tooth_53, tooth_52, tooth_51,
        tooth_65, tooth_64, tooth_63, tooth_62, tooth_61,
        tooth_75, tooth_74, tooth_73, tooth_72, tooth_71,
        tooth_85, tooth_84, tooth_83, tooth_82, tooth_81,
        date, periodontal_condition, oral_hygiene, denture_upper, denture_lower, 
        since_upper ,since_lower, occlusion, abnormalities, nature_of_treatment) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?,
        ?, ?, ?, ?, ?, ?, ?, ?,
        ?, ?, ?, ?, ?, ?, ?, ?,
        ?, ?, ?, ?, ?, ?, ?, ?,
        ?, ?, ?, ?, ?,
        ?, ?, ?, ?, ?,
        ?, ?, ?, ?, ?,
        ?, ?, ?, ?, ?,
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare the SQL statement

        $stmt = mysqli_prepare($conn, $query);
        if ($stmt) {
            // Bind parameters to the query
            mysqli_stmt_bind_param($stmt, "ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss", 
            $t11, $t12, $t13, $t14, $t15, $t16, $t17, $t18,
            $t21, $t22, $t23, $t24, $t25, $t26, $t27, $t28,
            $t31, $t32, $t33, $t34, $t35, $t36, $t37, $t38,
            $t41, $t42, $t43, $t44, $t45, $t46, $t47, $t48,
            $t51, $t52, $t53, $t54, $t55,
            $t61, $t62, $t63, $t64, $t65,
            $t71, $t72, $t73, $t74, $t75,
            $t81, $t82, $t83, $t84, $t85,
            $date, $p_condition, $oral_hygiene, $d_upper, $d_lower, $sinceup, $sincelow, $occlusion, $abnormal, $ntreatment);

            // Execute the statement
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                redirect('../patient record/patientrecord.php?patient_id='. $patient_id, 'User/Admin added successfully');
            } else {
                redirect('../patient record/patientrecord.php?patient_id='. $patient_id, 'Something went wrong');
            }
        } else {
            redirect('../patient record/patientrecord.php?patient_id='. $patient_id, 'Prepared statement error');
        }

        // Close the statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
} 


if (isset($_POST['update'])) {
    $conn = mysqli_connect("localhost", "root", "", "eyesmile_db");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $t11 = validateInput($_POST['tooth_11']);$t12 = validateInput($_POST['tooth_12']);$t13 = validateInput($_POST['tooth_13']);
    $t14 = validateInput($_POST['tooth_14']);$t15 = validateInput($_POST['tooth_15']);$t16 = validateInput($_POST['tooth_16']); 
    $t17 = validateInput($_POST['tooth_17']);$t18 = validateInput($_POST['tooth_18']);

    $t21 = validateInput($_POST['tooth_21']);$t22 = validateInput($_POST['tooth_22']);$t23 = validateInput($_POST['tooth_23']);
    $t24 = validateInput($_POST['tooth_24']);$t25 = validateInput($_POST['tooth_25']);$t26 = validateInput($_POST['tooth_26']); 
    $t27 = validateInput($_POST['tooth_27']);$t28 = validateInput($_POST['tooth_28']);

    $t31 = validateInput($_POST['tooth_31']);$t32 = validateInput($_POST['tooth_32']);$t33 = validateInput($_POST['tooth_33']);
    $t34 = validateInput($_POST['tooth_34']);$t35 = validateInput($_POST['tooth_35']);$t36 = validateInput($_POST['tooth_36']); 
    $t37 = validateInput($_POST['tooth_37']);$t38 = validateInput($_POST['tooth_38']);

    $t41 = validateInput($_POST['tooth_41']);$t42 = validateInput($_POST['tooth_42']);$t43 = validateInput($_POST['tooth_43']);
    $t44 = validateInput($_POST['tooth_44']);$t45 = validateInput($_POST['tooth_45']);$t46 = validateInput($_POST['tooth_46']); 
    $t47 = validateInput($_POST['tooth_47']);$t48 = validateInput($_POST['tooth_48']);

    $t51 = validateInput($_POST['tooth_51']);$t52 = validateInput($_POST['tooth_52']);$t53 = validateInput($_POST['tooth_53']);
    $t54 = validateInput($_POST['tooth_54']);$t55 = validateInput($_POST['tooth_55']);

    $t61 = validateInput($_POST['tooth_61']);$t62 = validateInput($_POST['tooth_62']);$t63 = validateInput($_POST['tooth_63']);
    $t64 = validateInput($_POST['tooth_64']);$t65 = validateInput($_POST['tooth_65']);

    $t71 = validateInput($_POST['tooth_71']);$t72 = validateInput($_POST['tooth_72']);$t73 = validateInput($_POST['tooth_73']);
    $t74 = validateInput($_POST['tooth_74']);$t75 = validateInput($_POST['tooth_75']);

    $t81 = validateInput($_POST['tooth_81']);$t82 = validateInput($_POST['tooth_82']);$t83 = validateInput($_POST['tooth_83']);
    $t84 = validateInput($_POST['tooth_84']);$t85 = validateInput($_POST['tooth_85']);
    
    $date = validateInput($_POST['date']);
    $p_condition = validateInput($_POST['periodontal_condition']);
    $oral_hygiene = validateInput($_POST['oral_hygiene']);
    $d_upper = validateInput($_POST['denture_upper']);
    $d_lower = validateInput($_POST['denture_lower']);
    $sinceup = validateInput($_POST['since_upper']);
    $sincelow = validateInput($_POST['since_lower']);
    $occlusion = validateInput($_POST['occlusion']);
    $abnormal = validateInput($_POST['abnormalities']);
    $ntreatment = validateInput($_POST['nature_of_treatment']);
    $userId = validateInput($_POST['patient_id']);

    if (
        $t11 || $t12 || $t13 || $t14 || $t15 || $t16 || $t17 || $t18 ||
        $t21 || $t22 || $t23 || $t24 || $t25 || $t26 || $t27 || $t28 ||
        $t31 || $t32 || $t33 || $t34 || $t35 || $t36 || $t37 || $t38 ||
        $t41 || $t42 || $t43 || $t44 || $t45 || $t46 || $t47 || $t48 ||
        $t51 || $t52 || $t53 || $t54 || $t55 ||
        $t61 || $t62 || $t63 || $t64 || $t65 ||
        $t71 || $t72 || $t73 || $t74 || $t75 ||
        $t81 || $t82 || $t83 || $t84 || $t85 ||
        $date || $p_condition || $oral_hygiene || $d_upper || $d_lower ||
        $sinceup || $sincelow || $occlusion || $abnormal || $ntreatment
    ) {
        $user = getById('dentalcharting_tbl', $userId);

        if ($user['status'] !== 200) {
            redirect('dentalchart-update.php?id=' . $userId, 'No such id found');
        }

        $query = "UPDATE `dentalcharting_tbl` SET 
        `tooth_11`=?, `tooth_12`=?, `tooth_13`=?, `tooth_14`=?, `tooth_15`=?, `tooth_16`=?, `tooth_17`=?, `tooth_18`=?,
        `tooth_21`=?, `tooth_22`=?, `tooth_23`=?, `tooth_24`=?, `tooth_25`=?, `tooth_26`=?, `tooth_27`=?, `tooth_28`=?,
        `tooth_31`=?, `tooth_32`=?, `tooth_33`=?, `tooth_34`=?, `tooth_35`=?, `tooth_36`=?, `tooth_37`=?, `tooth_38`=?,
        `tooth_41`=?, `tooth_42`=?, `tooth_43`=?, `tooth_44`=?, `tooth_45`=?, `tooth_46`=?, `tooth_47`=?, `tooth_48`=?,
        `tooth_51`=?, `tooth_52`=?, `tooth_53`=?, `tooth_54`=?, `tooth_55`=?, `tooth_61`=?, `tooth_62`=?, `tooth_63`=?,
        `tooth_64`=?, `tooth_65`=?, `tooth_71`=?, `tooth_72`=?, `tooth_73`=?, `tooth_74`=?, `tooth_75`=?, `tooth_81`=?,
        `tooth_82`=?, `tooth_83`=?, `tooth_84`=?, `tooth_85`=?, `date`=?, `periodontal_condition`=?, `oral_hygiene`=?,
        `denture_upper`=?, `denture_lower`=?, `since_upper`=?, `since_lower`=?, `occlusion`=?, `abnormalities`=?,
        `nature_of_treatment`=? WHERE patient_id = ?";

        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss", 
            $t11, $t12, $t13, $t14, $t15, $t16, $t17, $t18,
            $t21, $t22, $t23, $t24, $t25, $t26, $t27, $t28,
            $t31, $t32, $t33, $t34, $t35, $t36, $t37, $t38,
            $t41, $t42, $t43, $t44, $t45, $t46, $t47, $t48,
            $t51, $t52, $t53, $t54, $t55,
            $t61, $t62, $t63, $t64, $t65,
            $t71, $t72, $t73, $t74, $t75,
            $t81, $t82, $t83, $t84, $t85,
            $date, $p_condition, $oral_hygiene, $d_upper, $d_lower, $sinceup, $sincelow, $occlusion, $abnormal, $ntreatment, $userId);


            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                redirect('../patient record/patientrecord.php?patient_id='. $patient_id, 'Users/Admin Updated Successfully');
            } else {
                redirect('../patient record/patientrecord.php?patient_id='. $patient_id, 'Something Went Wrong');
            }
        } else {
            redirect('../patient record/patientrecord.php?patient_id='. $patient_id, 'Prepared statement error');
        }

        mysqli_stmt_close($stmt);
    } else {
        redirect('../patient record/patientrecord.php?patient_id=' . $patient_id, 'Please fill at least one input field');
    }

    mysqli_close($conn);
}
 
function validateInput($input)
{
    return htmlspecialchars(trim($input));
}

$paraResult = checkParamId('id');
if(is_numeric($paraResult)){

    $userId = validate($paraResult);

    $user = getById('dentalcharting_tbl',$userId);
    if($user['status'] == 200) {

        $userDeleteRes = deleteQuery('dentalcharting_tbl',$userId);
        if($userDeleteRes){
            redirect('../patient record/patientrecord.php?patient_id='. $patient_id,'User Deleted Successfully');
        }
    }else{
        redirect('../patient record/patientrecord.php?patient_id='.$patient_id ,$user['Something Went Wrong']);
    }
}else {
    redirect('../patient record/patientrecord.php?patient_id='. $patient_id ,$paraResult);
}

?>



