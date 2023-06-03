<?php
    session_start();
    include 'includes/connection.php';
    if (isset($_SESSION['userid'])) {
		header('Location:index.php');
    }
    
    function getUserIpAddr(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Solutions | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <script type="text/javascript">
        // to display login success message
        function loginSuccess(){
            $('#loginMsg').html('<div class="alert alert-success alert-dismissible">'
                +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'
                +'<h5><i class="icon fas fa-check"></i> Login Successfull!</h5>'
                +'<span>Redirecting...</span>'
                +'</div>');
            var delayInMilliseconds = 1500; //1.5 second
            setTimeout(function() {
              window.location='index.php';
            }, delayInMilliseconds);
        }

        // to display invalid credentials message
        function invalidCredentials(email){
            $('#loginMsg').html('<div class="alert alert-danger alert-dismissible">'
                +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'
                +'<h5><i class="icon fas fa-ban"></i> Invalid Credentials!</h5>'
                +'<span>Please try again...</span>'
                +'</div>');
                $('input[name="email"]').val(email);
        }

        // to display invalid email message
        function invalidEmail() {
            $('#loginMsg').html('<div class="alert alert-danger alert-dismissible">'
                +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'
                +'<h5><i class="icon fas fa-ban"></i> Email Not Registered!</h5>'
                +'<span>Please Register First...</span>'
                +'</div>');
        }
    </script>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a><b>Data</b> Solutions</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <div id="loginMsg">

                </div>
                <form action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block" name="submit">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (isset($_POST['submit'])) {
        					$email = $_POST['email'];
        					$password = $_POST['password'];
        					$sql  = "SELECT * FROM admin where email='$email'";
                            $result = mysqli_query($con, $sql);
        					if (mysqli_num_rows($result) > 0) {
        						$row = mysqli_fetch_assoc($result);
                                $stored_password = $row['password'];
                                $ip = getUserIpAddr();
        						if(password_verify($password, $stored_password)){
                                    //code for insert ip address
                                    $sql2  = "UPDATE admin SET last_login_ip = '$ip' where email='$email'";
                                    mysqli_query($con, $sql2);
                                    $_SESSION['adminId'] = $row['id'];
                                    $_SESSION['adminName'] = $row['name'];
                                    echo "<script>loginSuccess();</script>";
        						}
        						else {
                                    session_unset();
                                    session_destroy();
                                    //code for insert to login fail table
                                    $sql3  = "INSERT INTO failed_login (email,ip_address) VALUES ('$email','$ip')";
                                    mysqli_query($con, $sql3);
        							echo "<script>invalidCredentials('".$email."');</script>";
        						}
        					}
        					else {
        						echo "<script>invalidEmail();</script>";
        					}
        				}
                    }
                 ?>
                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
</body>
</html>
