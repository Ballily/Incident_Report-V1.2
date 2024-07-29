<?php
include_once('../includes/config.php');

$message = '';
$message_type = '';

if (isset($_POST['submit'])) {
    $fname = mysqli_real_escape_string($connect, $_POST['fullname']);
    $des = mysqli_real_escape_string($connect, $_POST['Description']);
    $date = mysqli_real_escape_string($connect, $_POST['date']);
    $time = mysqli_real_escape_string($connect, $_POST['time']);
    $concern = mysqli_real_escape_string($connect, $_POST['Concern']);

    $query = "INSERT INTO tblfirereport (fullName, Description, date, time, concern) VALUES ('$fname', '$des', '$date', '$time', '$concern')";
    $result = mysqli_query($connect, $query);

    if ($result) {
        $message = 'Reporting successful';
        $message_type = 'success';
    } else {
        $message = 'Something went wrong. Please try again.';
        $message_type = 'error';
    }

    mysqli_close($connect);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Reporting</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style type="text/css">
        label {
            font-size: 16px;
            font-weight: bold;
            color: #000;
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include_once('includes/sidebar.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include_once('includes/topbar.php'); ?>
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Incident Reporting of IT System</h1>
                    <div class="row gx-4 gx-lg-5">
                        <div class="col-md-12 mb-5">
                            <div class="card h-100">
                                <div class="card-body">
                                    <form method="post">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>Name</th>
                                                    <td><input type="text" name="fullname" class="form-control" required></td>
                                                </tr>
                                                <tr>
                                                    <th>Description</th>
                                                    <td><input type="text" name="Description" class="form-control" required></td>
                                                </tr>
                                                <tr>
                                                    <th>Date</th>
                                                    <td><input type="date" id="date" name="date" class="form-control" required></td>
                                                </tr>
                                                <tr>
                                                    <th>Time</th>
                                                    <td><input type="time" id="time" name="time" class="form-control" required></td>
                                                </tr>
                                                <tr>
                                                    <th>Concern</th>
                                                    <td><textarea class="form-control" required name="Concern"></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><input type="submit" name="submit" class="btn btn-primary"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include_once('includes/footer.php'); ?>
        </div>
    </div>
    <?php include_once('includes/footer2.php'); ?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script>
        <?php if ($message && $message_type): ?>
            Toastify({
                text: "<?php echo $message; ?>",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "<?php echo ($message_type == 'success') ? 'green' : 'red'; ?>"
            }).showToast();
        <?php endif; ?>
    </script>
</body>

</html>
