<?php

session_start();

require_once "../header.php";


if (isset($_SESSION['validationOk'])) {
?>
    <!DOCTYPE html>
    <html>
    <title>Safe Area</title>
    <link rel="stylesheet" href="style.css">

    <body>
        <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="p-4 rounded bg-column shadow" style="width: 30rem;">
                <h1 class="text-center pb-5 display-4"><br />Safe Area</h1>
                <div class="mb-3">
                    <label class="d-flex justify-content-center h3">
                        You are safely log in ->

                        <p style="color:blue;">
                            <?php echo $_SESSION['userName']; ?>
                        </p>
                    </label>
                </div>
                <a href="../backend/logout.php" class="d-flex justify-content-center"><button class="btn btn-danger">Log out</button></a>
            </div>
        </div>
    </body>

    </html>

<?php
} else {
    header("Location: logIn.php");
}
