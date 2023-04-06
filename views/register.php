<?php
$page_title = "Register"; 
include (__DIR__ . "/components/header.php");
?>

<body>

    <div class="container-fluid">
        <div class="row">

            <div style="padding: 0px 545px;">
                <div class="card-body">
                    <h2>Register User </h2>

                    <?= error_notification() ?>
                    <?= success_notification()?>
                    <div class="col-md-12">
                        <form method="post" action="../actions/register_user.php">
                            <div class="mb-3">
                                <label for="email1" class="form-label">Email address</label>
                                <input name="email" type="text" class="form-control" id="email1">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">User Name </label>

                                <input name="name" type="text" class="form-control" id="name">
                            </div>
                            <div class="mb-3">
                                <label for="birthday" class="form-label">birthday</label>
                                <input name="birthday" class="form-control" type="date" placeholder="birthday"
                                    id="birthday">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input name="password" class="form-control" id="password" type="password">
                            </div>
                            <div class="mb-3">
                                <label for="conPassword" class="form-label"> Confirm Password</label>
                                <input name="confirm_password" type="password" class="form-control" id="conPassword">
                                <br>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                        </form>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../views/login.php">It's old? Then log in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


</body>

</html>