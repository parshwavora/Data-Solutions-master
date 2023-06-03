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
                            <h1 class="m-0 text-dark">Inward Laptop</h1>
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
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title"><strong>Laptop Details</strong></h3>
                                    <a href="laptop.php">View Report</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Form for customers -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Customer Details</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- alert div -->
                                    <div class="alertDiv">

                                    </div>
                                    <!-- form start -->
                                    <form role="form" action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-12 col-sm-12 col-md-4">
                                                    <label for="mobileNo">Mobile No *</label>
                                                    <input type="text" class="form-control" name="mobileNo" id="mobileNo" placeholder="Mobile No" required>
                                                </div>
                                                <input type="hidden" class="form-control" name="customerId" required>
                                                <div class="form-group col-12 col-sm-12 col-md-4">
                                                    <label for="fullName">Full Name *</label>
                                                    <input type="text" class="form-control" name="fullName" placeholder="Enter Full Name" required>
                                                </div>
                                                <div class="form-group col-12 col-sm-12 col-md-4">
                                                    <label for="email">Email address</label>
                                                    <input type="email" class="form-control" name="email" placeholder="Enter Email">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->

                                    <!-- Form for laptop -->
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Inward For Laptops</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-12 col-sm-12 col-md-6">
                                                    <label for="company">Company</label>
                                                    <input type="text" class="form-control" name="company" placeholder="Enter Company" required>
                                                </div>
                                                <div class="form-group col-12 col-sm-12 col-md-6">
                                                    <label for="modelNo">Model No</label>
                                                    <input type="text" class="form-control" name="modelNo" placeholder="Enter Model No" required>
                                                </div>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="withAdapter" value="1">
                                                <label class="" for="withAdapter">With Adapter</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="withBattery" value="1">
                                                <label class="" for="withAdapter">With Battery</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="withHarddisk" value="1">
                                                <label class="" for="withAdapter">With Hard Disk</label>
                                            </div>
                                            <div class="form-group">
                                                <label>Problem</label>
                                                <textarea class="form-control" rows="3" placeholder="Enter Your Problem" name="problem" required></textarea>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->
                                <?php
                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    if(isset($_POST['submit'])){
                                        $customerId = $_POST['customerId'];
                                        $name = $_POST['fullName'];
                                        $email = $_POST['email'];
                                        $phone = $_POST['mobileNo'];

                                        $company = $_POST['company'];
                                        $modelNo = $_POST['modelNo'];

                                        $withAdapter = 0;
                                        if(isset($_POST['withAdapter'])){
                                            $withAdapter = 1;
                                        }

                                        $withBattery = 0;
                                        if(isset($_POST['withBattery'])){
                                            $withAdapter = 1;
                                        }

                                        $withHarddisk = 0;
                                        if(isset($_POST['withHarddisk'])){
                                            $withHarddisk = 1;
                                        }

                                        $problem = $_POST['problem'];
                                        $newId = 0;

                                        // New customer entery and fetch Id
                                        if($customerId=="0"){
                                            $sql1 = "";
                                            if(empty($email)){
                                                $sql1 = "INSERT INTO customer (name,phone) VALUES ('$name','$phone')";
                                            }else{
                                                $sql1 = "INSERT INTO customer (name,email,phone) VALUES ('$name','$email','$phone')";
                                            }
                                            if(mysqli_query($con, $sql1)){
                                                $sql2 = "SELECT id FROM customer WHERE phone = '$phone'";
                                                $result = mysqli_query($con, $sql2);
                                                if(mysqli_num_rows($result) > 0) {
                                                    $row = mysqli_fetch_assoc($result);
                                                    $newId = $row['id'];
                                                    //new customer laptop insert
                                                    $sql = "INSERT INTO laptop (customer_id,company,model_no,with_adapter,with_battery,with_harddisk,problem)
                                                    VALUES ('$newId','$company','$modelNo','$withAdapter','$withBattery','$withHarddisk','$problem')";
                                                    if(mysqli_query($con, $sql)) {
                                                        echo "<script>alert('Data Inserted');</script>";
                                                    }
                                                    else{
                                                        //echo "<script>alert('Error while inserting laptop data');</script>";
                                                        ?>
                                                        <script>alert("<?php echo $err; ?>");</script>
                                                        <?php
                                                    }
                                                }
                                            }
                                            else{
                                                //echo "<script>alert('Error while inserting user data');</script>";
                                                ?>
                                                <script>alert("<?php echo $err; ?>");</script>
                                                <?php
                                            }
                                        }
                                        else{
                                            // existing customer laptop insert
                                            $sql = "INSERT INTO laptop (customer_id,company,model_no,with_adapter,problem)
                                            VALUES ('$customerId','$company','$modelNo','$withAdapter','$problem')";
                                            if(mysqli_query($con, $sql)) {
                                                echo "<script>alert('Data Inserted');</script>";
                                            }
                                            else{
                                                //echo "<script>alert('Error while inserting user data');</script>";
                                                ?>
                                                <script>alert("<?php echo $err; ?>");</script>
                                                <?php
                                            }
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <!-- /.card -->
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
    bsCustomFileInput.init();

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
