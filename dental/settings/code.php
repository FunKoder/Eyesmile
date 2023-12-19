<?php
require '../../config/function.php';

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
    $uploadDir = '../upload/' . $folder . '/'; // Adjust the path here
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