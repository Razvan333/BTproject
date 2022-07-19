<?php

session_start();

if (isset($_POST['submit'])) {

    $userFullName = $_POST['fullName'];
    $email = $_POST['email'];
    $userName = $_POST['userName'];
    $password1 = $_POST['password'];
    $pwdRepeat = $_POST['pwdRepeat'];

    include "../config/connect.php";
    include "signUpClass.php";
    include "signUpController.php";

    $signUp = new SignUpController($userFullName, $email, $userName, $password1, $pwdRepeat);

    $signUp->signupUser();
} 
