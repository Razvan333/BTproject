<?php

if (isset($_POST['submit'])) {

    $otpCode = $_POST['otpCode'];

    include "otpClass.php";

    $checkOtp = new OtpCode($otpCode);

    $checkOtp->checkOtpCode();
}
