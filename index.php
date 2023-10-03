<!doctype html>
<html lang="en">

<head>
    <title>Login Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center"><strong>
                    Sistem Informasi Kunjungan Pusat Data
                </strong></div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        <div class="img" style="background-image: url(images/bg-1.png);"></div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4"><strong>SIKUPAT</strong></h3>
                                </div>
                                <div class="w-100">
                                </div>
                            </div>
                            <form id="form_input" method="POST" action="login_validation.php" class="signin-form">
                                <div class="form-group mt-3">
                                    <input id="username" type="text" class="form-control" name="username" required>
                                    <label class="form-control-placeholder" for="username">Username</label>
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    <label class="form-control-placeholder" for="password">Password</label>
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Login!</button>
                                </div>
                                <div class="form-group d-md-flex">
                                </div>
                            </form>
                            <p class="text-center"><a data-toggle="tab" href="#diskominfo">Bidang TIK dan Persandian</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script disable-devtool-auto src="js/disable-devtool.js"></script>
</body>

</html>