<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    // echo 
    // '<script>
    // alert("Vous avez oublier : ' . 
    // '\nle mail' . 
    // '");
    // </script>';

    // print("Lastname: $lastname\n");
    }

    function CreateCV() {
        if (VerifArgUser()) return;

        $valuesUser = AssignValue(); 

                

    }

    function AssignValue() {
        $associativeArray = [
            'lastname' => $_POST['lastname'],
            'firstname' => $_POST['firstname'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            // 'experience' => $experience,
            // 'school' => $school,
            // 'hobbies' => $hobbies
        ];
        
        print_r($associativeArray);
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

            if (Count($error) != 0) {
                print("errors : ");
                print_r($error);
                return true;
            }
            return false;
        }
        return true;
    }

    FunctionName();
?>