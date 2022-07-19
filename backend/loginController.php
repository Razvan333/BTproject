<?php

class LoginController extends Login
{

    private $userName;
    private $userPassword;

    public function __construct($userName, $userPassword)
    {
        $this->userName = $userName;
        $this->userPassword = htmlspecialchars($userPassword);
    }

    public function loginUser()
    {
        if ($this->emptyInput()) {
            header("location: ../templates/logIn.php?error=empty input");
            exit();
        }
        if (!$this->invalidUserName()) {
            header("location: ../templates/logIn.php?error=invalid User Name");
            exit();
        }

        $this->getUser($this->userName, $this->userPassword);
    }

    private function emptyInput()
    {

        if (empty($this->userName) || empty($this->userPassword)) {
            return true;
        }

        return false;
    }

    private function invalidUserName()
    {
        if (preg_match("/^[a-zA-z0-9]*$/", $this->userName)) {
            return true;
        }

        return false;
    }
}
