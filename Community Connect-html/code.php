<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_user']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_user']);

    $query = "DELETE FROM profile WHERE id='$profile_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_profile']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['user_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['age']);
    $course = mysqli_real_escape_string($con, $_POST['address']);

    $query = "UPDATE profile SET name='$name', email='$email', age='$age', address='$address' WHERE id='$profile_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_profile']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    $query = "INSERT INTO profile (name,email,phone,course) VALUES ('$name','$email','$phone','$course')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "profile Created Successfully";
        header("Location: register.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Profile Not Created";
        header("Location: register.php");
        exit(0);
    }
}

?>