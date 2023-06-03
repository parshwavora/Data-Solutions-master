<?php
include('includes/loginCheck.php');
include('includes/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Data Solutions | Admin</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Menu  -->
        <?php include('includes/menu.php'); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Status wise report</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <!--<ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                        </ol>-->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <form class="form-horizontal" role="form" action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <select class="form-control" name="status" value="<?php echo $row['status']?>" required>
                                                    <?php
                                                        $sqlStatus = "SELECT title FROM status";
                                                        $result = mysqli_query($con,$sqlStatus);
                                                        if(mysqli_num_rows($result)>0){
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                            ?>
                                                                <option value="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></option>
                                                            <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block" name="submit">Fetch Data</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <?php
                                    if ($_SERVER["REQUEST_METHOD"]=="POST") {
                                        if (isset($_POST['submit'])) {
                                            $status = $_POST['status'];
                                            $sql = "SELECT * FROM harddisk WHERE status = '$status'";
                                            $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result)>0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "id : ".$row['id']." Customer : ".$row['customer_id']." Serial no : ".$row['serial_no']." Problem : ".$row['problem']." Status : ".$row['status']."\n" ;
                                                }
                                            }
                                        }
                                    }
                                 ?>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <?php include 'includes/footer.php'; ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    // AJAX code to fetch customer data
    $("#mobileNo").blur(function(){
        //alert(this.value);
        $.post("getUserDetails.php",
        {
            mobileNo: this.value
        },
        function(data,status){
            if(data=="0"){
                //alert(data);
                $('input[name="customerId"]').val(data);
                //alert($('input[name="customerId"]').val());
            }
            else{
                var array = data.split(",");
                $('input[name="customerId"]').val(array[0]);
                $('input[name="fullName"]').val(array[1]);
                $('input[name="email"]').val(array[2]);
            }
        });
    });

});
</script>
</body>
</html>
