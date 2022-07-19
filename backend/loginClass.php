<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

class Login extends DbConn
{

    protected function getUser($userName, $userPassword)
    {

        $stmt = $this->connect()->prepare("SELECT password FROM users WHERE userName = ?;");

        if (!$stmt->execute(array($userName))) {
            $stmt = null;
            header("location: ../templates/logIn.php?error=stmtfailed");
            exit;
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../templates/logIn.php?error=userName not found");
            exit();
        }

        $pswHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($userPassword, $pswHashed[0]['password']);

        if ($checkPwd == false) {
            header("location: ../templates/logIn.php?error=incorrect password");
            exit();
        } elseif ($checkPwd == true) {
            $stmt = $this->connect()->prepare("SELECT * FROM users WHERE userName = ? AND password = ?;");

            if (!$stmt->execute(array($userName, $pswHashed[0]['password']))) {
                $stmt = null;
                header("location: ../templates/logIn.php?error=stmtfailed");
                exit();
            }
            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../templates/logIn.php?error=user not found");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $_SESSION['userName'] = $user[0]['userName'];
            $this->sendMail($user[0]['email']);
        }
        $stmt = null;
    }

    private function sendMail($userEmail)
    {

        $_SESSION['otpCode'] = $this->generateOtpNumber();

        $mail = new PHPMailer();

        $mail->IsSMTP();
        // $mail->CharSet = 'UTF-8';

        $mail->Host       = "smtp.sendgrid.net";
        $mail->SMTPAuth   = true;
        $mail->SMTPDebug  = 2;

        $mail->Username   = "apikey";
        $mail->Password   = "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";
        $mail->SMTPSecure = "tls";
        $mail->Port       = 25;

        $mail->setFrom("pojar.razvanmarius@gmail.com", "test");
        $mail->addAddress($userEmail);

        $mail->isHTML(true);
        $mail->Subject = 'OTP CODE';
        $mail->Body    = 'This is your OTP code: <b>' . $_SESSION['otpCode'] .
            '.</b><br>You have 2 minutes until the code will be unavailable
                         <br><br>Yours sincerely,<br>Pojar Razvan';


        if ($mail->send()) {
            $_SESSION['timeMailSent'] = $_SERVER["REQUEST_TIME"];
            header("location: ../templates/otp.php?success=Message was send successfully");
        } else {
            header("location: ../templates/logIn.php?error=Message was not sent, please try again");
        }
    }

    private function generateOtpNumber()
    {
        return rand(100000, 999999);
    }
}
