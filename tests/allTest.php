<?php
require __DIR__ . "/../config/connect.php";
require __DIR__ . "/../backend/signUpClass.php";
require __DIR__ . "/../backend/signUpController.php";
require __DIR__ . "/../backend/otpClass.php";


class AllTest extends \PHPUnit\Framework\TestCase {
    
    public function testSignUp() {
       
        $signUp = new SignUpController("Catalin Calbor", "calbor@gmail.com", "catalin", "Catalin1!", "Catalin1!");

        $result = $signUp->emptyInput();
        $this->assertEquals(true, $result);

        $result = $signUp->invalidUserFullName();
        $this->assertEquals("Catalin Calbor", $result);

        $result = $signUp->invalidEmail();
        $this->assertEquals(true, $result);

        $result = $signUp->invalidUserName();
        $this->assertEquals(true, $result);

        $result = $signUp->passwordMatch();
        $this->assertEquals(true, $result);
        
    }

    public function testSignUpWrongCredential() {
        $signUp = new SignUpController("Catalin Calbor", "calbor.com", "catalin 123", "Catalin1!", "Catalin1");

        $result = $signUp->emptyInput();
        $this->assertEquals(true, $result);

        $result = $signUp->invalidUserFullName();
        $this->assertEquals("Catalin Calbor", $result);

        $result = $signUp->invalidEmail();
        $this->assertEquals(false, $result);

        $result = $signUp->invalidUserName();
        $this->assertEquals(false, $result);

        $result = $signUp->passwordMatch();
        $this->assertEquals(false, $result);   
    }

    public function testOtpCheck() {
        $otp = new OtpCode(123456);

        $result = $otp->checkOtpToBeNumber();
        $this->assertEquals(true, $result);
    }

    public function testWrongOtpCheck() {
        $otp = new OtpCode("test");

        $result = $otp->checkOtpToBeNumber();
        $this->assertEquals(false, $result);
    }
}
