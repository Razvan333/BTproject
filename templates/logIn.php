<?php require_once "../header.php"; ?>

<!DOCTYPE html>
<html>
<title>Log in</title>
<link rel="stylesheet" href="style.css">

<body>

    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <form class="p-4 rounded bg-column shadow" action="../backend/loginProcess.php" method="post" style="width: 30rem;">
            <h1 class="text-center pb-5 display-4"><br />LOGIN</h1>
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
                <label for="exampleInputUserName" class="form-label">User Name:
                </label>
                <input type="text" name="userName" class="form-control" id="exampleInputUserName" placeholder="Your User Name">
            </div>
            <div class="mb-3">
                <div class="form">
                    <div class=form-element>
                        <label for="password-field" class="form-label">Password:</label>
                        <input type="password" name="password" class="form-control" id="password-field" placeholder="Password">
                    </div>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Login</button>
            <a href="register.php" class="btn btn-dark" style="float:right;">Create an account</a><br /><br />

        </form>

    </div>
    </div>

</body>

</html>