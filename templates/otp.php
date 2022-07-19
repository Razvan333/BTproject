<?php require_once "../header.php"; ?>

    <!DOCTYPE html>
    <html>
    <title>OTP Code</title>
    <link rel="stylesheet" href="style.css">

    <body>
        <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <form class="p-4 rounded bg-column shadow" action="../backend/otpProcess.php" method="post" style="width: 30rem;">
                <h1 class="text-center pb-5 display-4"><br />OTP Code</h1>
                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_GET['error'] ?>
                    </div>
                <?php } ?>
                <?php if (isset($_GET['success'])) { ?>
                    <div class="alert alert-success" role="alert">
                        <?= $_GET['success'] ?>
                    </div>
                <?php } ?>
                <div class="mb-3">
                    <div class="form">
                        <div class=form-element>
                            <label for="otp-field" class="form-label">OTP CODE:</label>
                            <input type="number" name="otpCode" class="form-control" id="otp-field" placeholder="Insert your otp code received">
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">SEND CODE</button>
            </form>
        </div>
    </body>

    </html>

