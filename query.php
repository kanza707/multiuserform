<?php
include_once('connection.php');

if (isset($_REQUEST['register'])) {
    
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $pass = $_REQUEST['pass'];
    $select = $_REQUEST['select'];
}
if (empty($select) || empty($name) || empty($email) || empty($pass)  ) {
    header('location: login.php?warn=kindly fill all feilds');

   
}else {
        $insertq = "INSERT INTO `registration`( `name`, `email`, `pass`, `role_id`) VALUES ('$name','$email','$pass','$select')";
    $iq = mysqli_query($con, $insertq);

}

if (!empty($iq)) {

    header('location: login.php?message=registration sucessful ');
    exit();
} else{


    header('location: login.php?failed=registration failed');
    exit();

    
}




