<?php
session_start();

if (isset($_POST['submit'])) {

    $userName = $_POST['userName'];
    $userPassword = $_POST['password'];

    include "../config/connect.php";
    include "loginClass.php";
    include "loginController.php";

    $signUp = new LoginController($userName, $userPassword);

    $signUp->loginUser();
}
