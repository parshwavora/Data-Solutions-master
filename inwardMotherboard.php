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
                            <h1 class="m-0 text-dark">Inward Motherboard</h1>
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
                                    <h3 class="card-title"><strong>Motherboard Details</strong></h3>
                                    <a href="motherboard.php">View Report</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Form for customers -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Customer Details</h3>
                                    </div>
                                    <!-- /.card-header -->
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

                                    <!-- from for motherboard details -->
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Inward For Motherboards</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-12 col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="company">Company *</label>
                                                        <input type="text" class="form-control" name="company" placeholder="Enter Company" required>
                                                    </div>
                                                </div>
                                                <div class="form-group col-12 col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="motherboardName">Motherboard Name *</label>
                                                        <input type="text" class="form-control" name="motherboardName" placeholder="Enter Motherboard Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="givenWith">Given With</label>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" name="ram" value="RAM">
                                                    <label class="form-check-label" for="ram">RAM</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" name="cpu">
                                                    <label class="form-check-label" for="cpu" value="CPU">CPU</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" name="fan">
                                                    <label class="form-check-label" for="fan" value="FAN">FAN</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Problem *</label>
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
                                        $motherboardName = $_POST['motherboardName'];
                                        $ram = 0;
                                        $cpu = 0;
                                        $fan = 0;
                                        if(isset($_POST['ram'])){
                                            $ram = 1;
                                        }
                                        if(isset($_POST['cpu'])){
                                            $cpu = 1;
                                        }
                                        if(isset($_POST['fan'])){
                                            $fan = 1;
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
                                                    //new customer motherboard insert
                                                    $sql = "INSERT INTO motherboard (customer_id,company,name,with_ram,with_cpu,with_fan,problem)
                                                    VALUES ('$newId','$company','$motherboardName','$ram','$cpu','$fan','$problem')";
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
                                            else{
                                                //echo "<script>alert('Error while inserting user data');</script>";
                                                ?>
                                                <script>alert("<?php echo $err; ?>");</script>
                                                <?php
                                            }
                                        }
                                        else{
                                            // existing customer laptop insert
                                            $sql = "INSERT INTO motherboard (customer_id,company,name,with_ram,with_cpu,with_fan,problem)
                                            VALUES ('$customerId','$company','$motherboardName','$ram','$cpu','$fan','$problem')";
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
