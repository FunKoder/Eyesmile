<?php
require '../../../config/function.php';

if(isset($_POST['saveSetting'])){
    $title = validate($_POST['title']);
    $slug = validate($_POST['slug']);
    $small_description = validate($_POST['small_description']);

    $meta_description = validate($_POST['meta_description']);
    $meta_keyword = validate($_POST['meta_keyword']);

    $email1 = validate($_POST['email1']);
    $email2 = validate($_POST['email2']);
    $phone1 = validate($_POST['phone1']);
    $phone2 = validate($_POST['phone2']);
    $address = validate($_POST['address']);

    $settingId = validate($_POST['settingId']);

    if($settingId == 'insert'){
        $query = "INSERT INTO settings(title,slug,small_description,meta_description,meta_keyword,email1,email2,phone1,phone2,address)
                VALUES ('$title','$slug','$small_description','$meta_description','$meta_keyword','$email1','$email2','$phone1','$phone2','$address')";
        $result = mysqli_query($conn, $query);       
    }
    if(is_numeric($settingId)){
        $query = "UPDATE settings SET 
            title='$title',
            slug='$slug',
            small_description='$small_description',
            meta_description='$meta_description',
            meta_keyword='$meta_keyword',
            email1='$email1',
            email2='$email2',
            phone1='$phone1',
            phone2='$phone2',
            address='$address'
            WHERE id='$settingId';
        
        ";
        $result = mysqli_query($conn,$query);
    }
    if($result){
        redirect('settings.php',"Settings Saved");
    }else {
        redirect('settings.php',"Something Went Wrong !");
    }
}
?>