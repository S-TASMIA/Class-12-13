<?php
session_start();
include "../database/env.php";
$id= $_SESSION['auth']['id'];

$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$email = $_REQUEST['email'];
$profileImg = $_FILES['profile_img'];
$errors = [];


$accepted_types = ['jpg', 'png', 'svg'];
$extension = pathinfo($profileImg['name'])['extension'];
var_dump(in_array($extension,$accepted_types));

//img validation
if ($profileImg ['size'] == 0){
    $errors['profile_img_error'] ="image is empty";
}
else if(in_array($extension, $accepted_types)){
    $errors['profile_img_error'] ="Supported types are wrong";
} 
//    else if($profileImg['size']>200000){
//    $errors['profile_img_error'] ="Total img size is 2MB";
//}
//
//// redirect
//
//if(count($errors) == 0){
//    //moveing file
//    $fileName = "User-" . uniqid() . ".$extension";
//    
//    //
//    //if(!is_dir("../uploads/users")){
//    //    mkdir("../uploads/users");
//    //}
//    //$uploadedfiles = 
//    move_uploaded_file($profileImg['tmp_name'],"../uploads/$fileName");
//
//    //if($uploadedfiles){
//    //    $query = "UPDATE foods SET Fname='$fname',Lname='$lname',Email='$email',profile_img='$fileName' WHERE id = '$id'";
//    //    $res = mysqli_query($conn,$query);
//    //    
//    //    $_SESSION['auth']['fname'] = $fname;
//    //    $_SESSION['auth']['lname'] = $lname;
//    //    $_SESSION['auth']['email'] = $email;
//    //    $_SESSION['auth']['profile'] = $fileName;
////
//    //    header("Location: ../Backend_file/profile.php");
//    //}
//    
//}
//else{
//    // $_SESSION['profile_error'] = $errors;
//    header("Location: ../backend/profile.php");  
//}