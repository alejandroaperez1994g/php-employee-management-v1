<?php


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/24229652dd.js" crossorigin="anonymous"></script>
    <script defer src="assets/fontawesome/js/all.min.js"></script>
    <!-- Custom JS -->
    <!-- <script src="./assets/js/index.js" type="module"></script> -->
    <link rel="stylesheet" href="./assets/css/app.css">
</head>

<body>
    <div id="auth">

        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <h3>Sign In</h3>
                            </div>
                            <form action="./src/library/loginController.php" method="POST">
                                <div class="form-group position-relative has-icon-left">
                                    <label for="username">Email</label>
                                    <div class="position-relative">
                                        <input type="email" class="form-control" id="email" name="email">
                                        <div class="form-control-icon">
                                            <i class="fa-solid fa-at"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="clearfix">
                                        <label for="password">Password</label>

                                    </div>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" id="password" name="password">
                                        <div class="form-control-icon">
                                            <i class="fa fa-key"></i>
                                        </div>

                                    </div>
                                </div>
                                <?php require("./src/library/sessionHelper.php");
                                checkUrl($_GET);
                                ?>

                                <div class="clearfix">
                                    <button class="btn btn-primary float-end">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="./assets/js/feather-icons/feather.min.js"></script>
    <script src="./assets/js/app.js"></script>

    <script src="./assets/js/main.js"></script>
</body>

</html>