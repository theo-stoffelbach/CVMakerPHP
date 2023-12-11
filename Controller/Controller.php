<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $mail = $_POST['mail'];
    $phone = $_POST['phone'];
    $experience = $_POST['experience'];
    $school = $_POST['school'];
    $hobbies = $_POST['hobbies'];

    print("Lastname: $lastname\n");
    }

?>
