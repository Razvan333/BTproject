<?php

class Signup extends DbConn
{

    protected function setUser($userFullName, $email, $userName, $password)
    {
        $stmt = $this->connect()->prepare("INSERT INTO users (fullName, email, userName, password) VALUE (?, ?, ?, ?);");

        $hashPwd = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($userFullName, $email, $userName, $hashPwd))) {
            $stmt = null;
            header("location: ../templates/register.php?error=stmtfailed");
            exit();
        } else {
            header('location: ../templates/logIn.php?success=Account created successfully');
        }
        $stmt = null;
    }

    protected function checkUser($uid, $email)
    {
        $stmt = $this->connect()->prepare("SELECT userName FROM users WHERE userName = ? OR email = ?;");

        if (!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("location: ../login.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() > 0) {
            return false;
        }

        return true;
    }
}
