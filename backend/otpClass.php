<?php

class OtpCode
{

    private $otpCode;

    public function __construct($otpCode)
    {
        $this->otpCode = $otpCode;
    }

    public function checkOtpCode()
    {
        session_start();

        define('TIME_OTP_IS_VALID', 120);

        if ($this->checkOtpToBeNumber()) {

            $currentTime = $_SERVER['REQUEST_TIME'];
            $verifyOtpValidity = $currentTime - $_SESSION['timeMailSent'];

            if ($this->otpCode != $_SESSION['otpCode']) {
                header("location: ../templates/otp.php?error=OTP code incorrect");
                exit();
            }
            if ($verifyOtpValidity > TIME_OTP_IS_VALID) {
                header("location: ../templates/logIn.php?error=OTP code expired, try again");
                exit();
            }

            unset($_SESSION['otpCode']);
            unset($_SESSION['timeMailSent']);
            $_SESSION['validationOk'] = "true";

            header("location: ../templates/secureArea.php");
        } else {
            header("location: ../templates/otp.php?error=please inserd a valid number");
            exit();
        }
    }

    public function checkOtpToBeNumber()
    {
        if (preg_match("/^[0-9]{6}$/", $this->otpCode)) {
            return true;
        }

        return false;
    }
}
