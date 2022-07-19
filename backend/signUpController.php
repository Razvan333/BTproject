<?php

class SignUpController extends Signup
{
    private $userFullName;
    private $email;
    private $userName;
    private $password;
    private $pswRepeat;

    public function __construct($userFullName, $email, $userName, $password, $pswRepeat)
    {
        $this->userFullName = $userFullName;
        $this->email = $email;
        $this->userName = $userName;
        $this->password = $password;
        $this->pswRepeat = $pswRepeat;
    }

    public function signupUser()
    {
        if ($this->emptyInput() == false) {
            header("location: ../templates/register.php?error=empty imput");
            exit();
        }
        if (empty($this->invalidUserFullName())) {
            header("location: ../templates/register.php?error=invalid full name");
            exit();
        }
        if ($this->invalidEmail() == false) {
            header("location: ../templates/register.php?error=invalid email");
            exit();
        }
        if ($this->invalidUserName() == false) {
            header("location: ../templates/register.php?error=invalid User");
            exit();
        }
        if ($this->passwordMatch() == false) {
            header("location: ../templates/register.php?error=psw does not match");
            exit();
        }
        if ($this->checkIfUserExist() == false) {
            header("location: ../templates/register.php?error=user or email already exist");
            exit();
        }

        $this->setUser($this->userFullName, $this->email, $this->userName, $this->password);
    }

    public function emptyInput()
    {
        if (empty($this->userFullName) || empty($this->email) || empty($this->userName) || empty($this->password) || empty($this->pswRepeat)) {
            return false;
        }

        return true;
    }

    public function invalidUserFullName()
    {
        return htmlspecialchars($this->userFullName);
    }

    public function invalidEmail()
    {
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;
    }

    public function invalidUserName()
    {
        if (preg_match("/^[a-zA-z0-9]*$/", $this->userName)) {
            return true;
        }

        return false;
    }

    public function passwordMatch()
    {
        if ($this->password !== $this->pswRepeat) {
            return false;
        }

        return true;
    }

    public function checkIfUserExist()
    {

        if ($this->checkUser($this->userName, $this->email)) {
            return true;
        }

        return false;
    }
}
