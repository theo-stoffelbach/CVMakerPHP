<?php
// include('../View/view.php');
include('../Controller/Convertisor.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phoneNumber = $_POST['phoneNumber'];

    if (!filter_var($phoneNumber, FILTER_VALIDATE_INT)) {
        echo "<script>
        alert('Le numéro de téléphone doit être un nombre entier');
        window.location.href = '../View/index.php';
        </script>";
    }


    CreateCV();
}

function CreateCV() {
    include('../Model/CVModel.php');

    if (VerifArgUser()) return;

    $valuesUser = AssignValue(); 

    $cvModel = new CVModel();
    $id = $cvModel->addCV("cv",$valuesUser);

    $cvJson = json_encode($valuesUser);

    echo "<script>
    alert('L\'ID de votre CV est $id, veillez le conserver précieusement !');
    window.location.href = '../View/view.php?Id=$id';
    </script>";

    // CreateViewOfCV($valuesUser);
}

function AssignValue() {
    $associativeArray = [
        'lastname' => $_POST['lastname'],
        'firstname' => $_POST['firstname'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'job' => $_POST['job'],

        'experience' => $_POST['experience'],
        'school' => $_POST['school'],
        'hobbies' =>  $_POST['hobbies']
    ];
    return $associativeArray;
}

function VerifArgUser() : bool {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $error = [];
        print($_POST['lastname']. ' <br/> ');

        if ($_POST['lastname'] == "") $error['lastname'] = "error";  
        if ($_POST['firstname'] == "") $error['firstname'] = "error";  
        if ($_POST['email'] == "") $error['email'] = "error";  
        if ($_POST['phone'] == "") $error['phone'] = "error";  
        if ($_POST['job'] == "") $error['job'] = "error";  

        if ($_POST['firstname'] == "") $_POST['experience'];    
        if ($_POST['email'] == "") $_POST['school'];
        if ($_POST['hobbies'] == "") $_POST['hobbies'];

        if (Count($error) != 0) {
            print("errors : ");
            print_r($error);
            return true;
        }
        return false;
    }
    return true;

}


?>