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
                            <h1 class="m-0 text-dark">Inward Storage Device</h1>
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
                                    <h3 class="card-title"><strong>Storage Device Details</strong></h3>
                                    <a href="javascript:void(0);">View Report</a>
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
                                            <h3 class="card-title">Inward For Storage Device</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-12 col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>Select Storage Device *</label>
                                                        <select class="form-control" name="storageDevice" requierd>
                                                            <option value="">Select Storage Device</option>
                                                            <option>Hard Disk</option>
                                                            <option>DVR</option>
                                                            <option>Pen Drive</option>
                                                            <option>Memory Card</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-12 col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="company">Company *</label>
                                                        <input type="text" class="form-control" name="company" placeholder="Enter Company" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="hardDiskDetail">
                                                <div class="row">
                                                    <div class="form-group col-12 col-sm-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="company">Serial No. *</label>
                                                            <input type="text" class="form-control" name="serialNo" placeholder="Enter Serial No">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-12 col-sm-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="company">Firmware No.</label>
                                                            <input type="text" class="form-control" name="firmwareNo" placeholder="Enter Firmware No">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-12 col-sm-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="company">WWN No.</label>
                                                            <input type="text" class="form-control" name="wwnNo" placeholder="Enter WWN No">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-12 col-sm-12 col-md-6">
                                                        <label>Hard Disk Type *</label>
                                                        <select class="form-control" name="hardDiskType">
                                                            <option value="">Type Of Hard Disk</option>
                                                            <option>Desktop</option>
 <option> laptop</option>                                                           <option>Portable</option>
                                                            <option>SSD</option>
                                                            <option>Other</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-12 col-sm-12 col-md-6">
                                                        <label>SSD Type</label>
                                                        <select class="form-control" name="ssdType">
                                                            <option value="">Select Type Of SSD</option>
                                                            <option>NVME</option>
                                                            <option>SATA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-md-8">
                                                    <div class="form-group">
                                                        <label for="storageCapacity">Storage Capacity *</label>
                                                        <input type="text" class="form-control" name="storageCapacity" placeholder="Enter Storage Capacity" required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label>Unit *</label>
                                                        <select class="form-control" name="storageUnit" required>
                                                            <option>MB</option>
                                                            <option>GB</option>
                                                            <option>TB</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="company">Priority</label>
                                                <input type="text" class="form-control" name="priority" placeholder="Enter Priority Folder Name">
                                            </div>
                                            <div class="form-group">
                                                <label>Problem *</label>
                                                <textarea class="form-control" rows="3" placeholder="Enter Problem" name="problem" required></textarea>
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

                                        $storageDevice = $_POST['storageDevice']; // type of device
                                        /*if(empty($storageDevice)){
                                            $storageDevice = "NULL";
                                        }*/
                                        $company = $_POST['company'];
                                        /*if(empty($company)){
                                            $company = "NULL";
                                        }*/
                                        $storageCapacity = $_POST['storageCapacity'];
                                        /*if(empty($storageCapacity)){
                                            $storageCapacity = "NULL";
                                        }*/
                                        $storageUnit = $_POST['storageUnit'];
                                        /*if(empty($storageUnit)){
                                            $storageUnit = "NULL";
                                        }*/

                                       
                                        $priority = $_POST['priority'];
                                        if(empty($priority)){
                                            $priority = 'NULL';
                                        }
                                        $problem = $_POST['problem'];
                                        /*if(empty($problem)){
                                            $problem = NULL;
                                        }*/

                                        // hard disk parameters
                                        $serialNo = $_POST['serialNo'];
                                        if(empty($serialNo)){
                                            $serialNo = "NULL";
                                        }
                                        $firmwareNo = $_POST['firmwareNo'];
                                        if(empty($firmwareNo)){
                                            $firmwareNo = "NULL";
                                        }
                                        $wwnNo = $_POST['wwnNo'];
                                        if(empty($wwnNo)){
                                            $wwnNo = "NULL";
                                        }
                                        $hardDiskType = $_POST['hardDiskType'];
                                        if(empty($hardDiskType)){
                                            $hardDiskType = "NULL";
                                        }
                                        $ssdType = "NULL";
                                        if ($_POST['ssdType']) {
                                            $ssdType = $_POST['ssdType'];
                                        }

                                        //$newId = 0;
                                        // New customer entery and fetch Id
                                        if($customerId=="0"){
                                            $sql1 = "";
                                            if(empty($email)){
                                                $sql1 = "INSERT INTO customer (name,phone) VALUES ('$name','$phone')";
                                            }else{
                                                $sql1 = "INSERT INTO customer (name,email,phone) VALUES ('$name','$email','$phone')";
                                            }

                                            //echo $sql1;
                                            if(mysqli_query($con, $sql1)){
                                                $sql2 = "SELECT id FROM customer WHERE phone = '$phone'";
                                                $result = mysqli_query($con, $sql2);
                                                if(mysqli_num_rows($result) > 0) {
                                                    //echo "<script>alert('new customer')</script>";
                                                    $row = mysqli_fetch_assoc($result);
                                                    $customerId = $row['id'];
                                                    //echo $customerId."<br>";
                                                    $sql = "";
                                                    if($storageDevice == "Hard Disk"){
                                                        $sql = "INSERT INTO harddisk (customer_id,serial_no,firmware_no,wwn_no,type,ssd_type,company,storage_capacity,storage_unit,priority,problem)
                                                        VALUES ('$customerId','$serialNo','$firmwareNo','$wwnNo','$hardDiskType','$ssdType','$company','$storageCapacity','$storageUnit','$priority','$problem')";
                                                    }
                                                    elseif ($storageDevice == "DVR") {
                                                        $sql = "INSERT INTO dvr (customer_id,company,storage_capacity,storage_unit,priority,problem)
                                                        VALUES ('$customerId','$company','$storageCapacity','$storageUnit','$priority','$problem')";
                                                    }
                                                    elseif ($storageDevice == "Pen Drive") {
                                                        $sql = "INSERT INTO pendrive (customer_id,company,storage_capacity,storage_unit,priority,problem)
                                                        VALUES ('$customerId','$company','$storageCapacity','$storageUnit','$priority','$problem')";
                                                    }
                                                    elseif ($storageDevice == "Memory Card") {
                                                        $sql = "INSERT INTO memorycard (customer_id,company,storage_capacity,storage_unit,priority,problem)
                                                        VALUES ('$customerId','$company','$storageCapacity','$storageUnit','$priority','$problem')";
                                                    }
                                                    echo $sql;
                                                    //new customer laptop insert
                                                    if(mysqli_query($con, $sql)) {
                                                        echo "<script>alert('Data Inserted');</script>";
                                                    }
                                                    else{
                                                        $err = "Error: ". mysqli_error($con);
                                                        ?>
                                                        <script>alert("<?php echo $err; ?>");</script>
                                                        <?php
                                                    }
                                                }
                                            }
                                            else{
                                                $err = "Error: ". mysqli_error($con);
                                                ?>
                                                <script>alert("<?php echo $err; ?>");</script>
                                                <?php
                                            }
                                        }
                                        else{
                                            // existing customer laptop insert
                                            $sql = "";
                                            if($storageDevice == "Hard Disk"){
                                                $sql = "INSERT INTO harddisk (customer_id,serial_no,firmware_no,wwn_no,type,ssd_type,company,storage_capacity,storage_unit,priority,problem)
                                                VALUES ('$customerId','$serialNo','$firmwareNo','$wwnNo','$hardDiskType','$ssdType','$company','$storageCapacity','$storageUnit','$priority','$problem')";
                                            }
                                            elseif ($storageDevice == "DVR") {
                                                $sql = "INSERT INTO dvr (customer_id,company,storage_capacity,storage_unit,priority,problem)
                                                VALUES ('$customerId','$company','$storageCapacity','$storageUnit','$priority','$problem')";
                                            }
                                            elseif ($storageDevice == "Pen Drive") {
                                                $sql = "INSERT INTO pendrive (customer_id,company,storage_capacity,storage_unit,priority,problem)
                                                VALUES ('$customerId','$company','$storageCapacity','$storageUnit','$priority','$problem')";
                                            }
                                            elseif ($storageDevice == "Memory Card") {
                                                $sql = "INSERT INTO memorycard (customer_id,company,storage_capacity,storage_unit,priority,problem)
                                                VALUES ('$customerId','$company','$storageCapacity','$storageUnit','$priority','$problem')";
                                            }
                                            echo $sql;
                                            if(mysqli_query($con, $sql)) {
                                                echo "<script>alert('Data Inserted');</script>";
                                            }
                                            else{
                                                $err = "Error: ". mysqli_error($con);
                                                ?>
                                                <script>alert("<?php echo $err; ?>");</script>
                                                <?php
                                                //echo "<script>alert('Error while inserting storage device data');</script>";
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

    $('select[name="hardDiskType"]').change(function(){
        var selectedDiskType = $(this).children("option:selected").val();
        if (selectedDiskType == "SSD") {
            $('select[name="ssdType"]').removeAttr('readonly');
        }
        else{
            $('select[name="ssdType"]').attr('readonly', true);
        }
    });

    $('#hardDiskDetail').hide();
    $('select[name ="storageDevice"]').change(function(){
        var selectedDevice = $(this).children("option:selected").val();
        if (selectedDevice == "Hard Disk") {
            $('#hardDiskDetail').fadeIn();
            $('input[name="serialNo"]').attr('required',true);
            $('select[name="hardDiskType"]').attr('required',true);
            //$('input[name="firmwareNo"]').attr('required',true);
            //$('input[name="wwnNo"]').attr('required',true);
        }
        else {
            $('#hardDiskDetail').fadeOut();
            $('input[name="serialNo"]').removeAttr('required');
            $('select[name="hardDiskType"]').removeAttr('required');
            //$('input[name="firmwareNo"]').removeAttr('required');
            //$('input[name="wwnNo"]').removeAttr('required');

        }
    });

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
