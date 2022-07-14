<?php

require_once "../header.php";

?>
<!DOCTYPE html>
<title>Registration</title>

<body>
    <div class="background-register">
        <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <form class="p-5 rounded bg-column shadow" action="../backend/signUp.php" method="post" style="width: 30rem;">
                <h1 class="text-center pb-5 display-4"><br />Register</h1>
                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_GET['error'] ?>
                    </div>
                <?php } ?>

                <div class="mb-3">
                    <label for="InputFullName" class="form-label">Your Name:
                    </label>
                    <input type="text" name="fullName" class="form-control" id="InputFullName" placeholder="Your Full Name">
                </div>
                <div class="mb-3">
                    <label for="InputUserName" class="form-label">User Name:
                    </label>
                    <input type="text" name="userName" class="form-control" id="InputUserName" placeholder="Your User Name">
                </div>
                <div class="mb-3" id="form">
                    <label for="InputEmail" class="form-label">Email:
                    </label>
                    <input type="email" name="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Email@gmail.com">
                </div>
                <div class="mb-3">
                    <div class="form">
                        <div class=form-element>
                            <label for="password-field" class="form-label">Password:</label>
                            <input type="password" name="password" class="form-control" id="password-field" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="InputRePassword" class="form-label">Re-enter password:</label>
                    <input type="password" name="pwdRepeat" class="form-control" id="InputRePassword" placeholder="Re-Password">
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
                <a href="login.php" class="btn btn-dark" style="float:right;">Already have an account</a>
            </form>
        </div>
    </div>

</body>

</html>