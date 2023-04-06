<?php
$page_title = "Login"; 
include (__DIR__ . "/components/header.php");
?>

<body>
    <div class="container-fluid">
        <div class="row">
            <?= success_notification()?>
            <?= error_notification() ?>

        </div>
        <div class="row">
            <div style="padding: 0px 545px;">
                <h2>Login</h2>
                <div class="col-md-12">
                    <form method="post" action="../actions/login_user.php">
                        <div class="mb-3">
                            <label for="email1" class="form-label">Email </label>
                            <input name="email" type="text" class="form-control" id="email1"
                                placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="password"
                                placeholder="Password">
                        </div>
                        <br>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </div>
                </div>
                </form>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../views/register.php">New around here? Sign up</a>
            </div>
        </div>
    </div>

</body>

</html>