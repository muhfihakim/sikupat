<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Dev</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>

<body>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="wrapper">
                <p class="p_create">Web Dev | SIKUPAT</p>
                <form id="form_input" method="post" action="create_account_validation.php">
                    <input type="fullname" name="fullname" id="fullname" placeholder="Nama Lengkap" class="form-control" required>
                    <input type="username" name="username" id="username" placeholder="Username" class="form-control" required>
                    <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
                    <input type="submit" id="btn_submit" class="btn btn-lg btn-success form-control" value="Sign Up">
                </form>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
<script disable-devtool-auto src="js/disable-devtool.js"></script>
</body>

</html>