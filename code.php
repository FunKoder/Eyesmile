<?php
require 'config/function.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . "/vendor/autoload.php";

// Function to generate a random reference number
function generateReferenceNumber() {
    $length = 11; // You can adjust the length of the reference number as needed
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Characters to use for the reference number
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}

if (isset($_POST['appoint'])) {
    // Retrieve form data without validation
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $ext_name = $_POST['ext_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $clinic = $_POST['clinic'];
    $insurance = $_POST['insurance'];
    $insurance_no = $_POST['insurance_no'];
    $insurance_exp = $_POST['insurance_exp'];
    $procedure_type = $_POST['procedure_type'];
    $preffered_date = $_POST['preffered_date'];
    $preffered_time = $_POST['preffered_time'];

    $reference_number = generateReferenceNumber();

    $query = "INSERT INTO appointment (first_name, last_name, middle_name, ext_name, phone, email, clinic, insurance, insurance_no, insurance_exp, procedure_type, preffered_date, preffered_time, reference_no)
        VALUES ('$first_name', '$last_name', '$middle_name', '$ext_name', '$phone', '$email', '$clinic', '$insurance', '$insurance_no', '$insurance_exp', '$procedure_type', '$preffered_date', '$preffered_time', '$reference_number')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // Your SMTP server
            $mail->SMTPAuth   = true;
            $mail->Username   = 'workmail3r@gmail.com'; // Your SMTP username
            $mail->Password   = 'bknv mswy acok beli'; // Your SMTP password
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            //Recipients
            $mail->setFrom('caps77602@gmail.com', 'EyeSmile'); // Your email and name
            $mail->addAddress($email); // Email submitted in the form

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Appointment Confirmation';
            $mail->Body = 'Thank you for booking an appointment with EyeSmile. Your appointment details are as follows:<br><br>' .
                '<strong>Reference Number:</strong> ' . $reference_number . '<br>' .
                '<strong>Name:</strong> ' . $first_name . ' ' . $middle_name . ' ' . $last_name . ' ' . $ext_name . '<br>' .
                '<strong>Phone Number:</strong> ' . $phone . '<br>' .
                '<strong>Email:</strong> ' . $email . '<br>' .
                '<strong>Clinic:</strong> ' . $clinic . '<br>' .
                '<strong>Procedure Type:</strong> ' . $procedure_type . '<br>' .
                '<strong>Preferred Date:</strong> ' . $preffered_date . '<br>' .
                '<strong>Preferred Time:</strong> ' . $preffered_time . '<br>' .
                '<strong>Insurance:</strong> ' . $insurance . '<br>' .
                '<strong>Insurance Number:</strong> ' . $insurance_no . '<br>' .
                '<strong>Insurance Expiration Date:</strong> ' . $insurance_exp . '<br><br>';

            $mail->send();

            // Redirect upon successful email sending
            redirect('contact.php', 'Email sent successfully');
        } catch (Exception $e) {
            // Redirect if email sending fails
            redirect('appointment.php', 'Email sending failed. Please try again.');
        }
    } else {
        // Redirect if database insertion fails
        redirect('appointment.php', 'Something went wrong. Please try again.');
    }
}

if (isset($_POST['saveSetting'])) {
    $title = validate($_POST['title']);
    $small_description = validate($_POST['small_description']);
    $meta_description = validate($_POST['meta_description']);
    $meta_keyword = validate($_POST['meta_keyword']);
    $email1 = validate($_POST['email1']);
    $email2 = validate($_POST['email2']);
    $phone1 = validate($_POST['phone1']);
    $phone2 = validate($_POST['phone2']);
    $address = validate($_POST['address']);
    $iframe = validate($_POST['iframe']);
    $settingId = validate($_POST['settingId']);

    // Handle Dental Image Upload
    $dentalImagePath = handleImageUpload('dental_image', 'dental', $setting['data']['dental_image'] ?? '');

    // Handle Optical Image Upload
    $opticalImagePath = handleImageUpload('optical_image', 'optical', $setting['data']['optical_image'] ?? '');

    // Update or Insert the settings
    if ($settingId == 'insert') {
        $query = "INSERT INTO settings(title, small_description, meta_description, meta_keyword, email1, email2, phone1, phone2, address, iframe, dental_image, optical_image)
                VALUES ('$title','$small_description','$meta_description','$meta_keyword','$email1','$email2','$phone1','$phone2','$address','$iframe','$dentalImagePath','$opticalImagePath')";
    } else {
        $query = "UPDATE settings SET 
            title='$title',
            small_description='$small_description',
            meta_description='$meta_description',
            meta_keyword='$meta_keyword',
            email1='$email1',
            email2='$email2',
            phone1='$phone1',
            phone2='$phone2',
            address='$address',
            iframe='$iframe',
            dental_image='$dentalImagePath',
            optical_image='$opticalImagePath'
            WHERE id='$settingId'";
    }

    $result = mysqli_query($conn, $query);

    if ($result) {
        redirect('settings.php', "Settings Saved");
    } else {
        redirect('settings.php', "Something Went Wrong !");
    }
}

function handleImageUpload($inputName, $folder, $defaultImagePath)
{
    $uploadDir = '../settings/upload/' . $folder . '/'; // Adjust the path here
    $imageFileType = strtolower(pathinfo($_FILES[$inputName]['name'], PATHINFO_EXTENSION));

    // Check if the file has been uploaded
    if (!isset($_FILES[$inputName]['tmp_name']) || empty($_FILES[$inputName]['tmp_name'])) {
        return $defaultImagePath; // Use default image path
    }

    // Check if image file is a valid image or SVG
    $validFormats = ['jpg', 'jpeg', 'png', 'gif', 'svg'];
    if (!in_array($imageFileType, $validFormats)) {
        return $defaultImagePath; // Use default image path
    }

    // Use the original file name without extension as a unique identifier
    $uniqueFileName = pathinfo($_FILES[$inputName]['name'], PATHINFO_FILENAME);
    $uploadedFile = $uploadDir . $uniqueFileName . '.' . $imageFileType;

    // Move the uploaded file
    if (move_uploaded_file($_FILES[$inputName]['tmp_name'], $uploadedFile)) {
        return $uploadedFile;
    }

    return $defaultImagePath; // Use default image path
}
?>