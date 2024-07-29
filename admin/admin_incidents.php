<?php
include_once('../includes/config.php');

$message = '';
$message_type = '';

// Handle form submission for reporting
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
    <title>Admin Incidents</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style type="text/css">
        label {
            font-size: 16px;
            font-weight: bold;
            color: #000;
        }
        .btn-complete {
            background-color: #09bf00; /* หรือสีเขียวเข้มที่คุณต้องการ */
            color: white;
        }
        .btn-complete:hover {
            background-color: #067a00; /* สีเขียวเข้มเมื่อ hover */
			 color: white;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include_once('includes/sidebar.php');?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include_once('includes/topbar.php');?>
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">IT Incidents Report</h1>
                    <div class="row gx-4 gx-lg-5">
                        <div class="col-md-12 mb-5">
                            <div class="card h-100">
                                <div class="card-body">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Description</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Reporting Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM tblfirereport";
                                            $result = $connect->query($sql);
                                            while($row = $result->fetch_assoc()): 
                                                if ($row['Track'] == 'แก้ไขเสร็จสิ้น') {
                                                    continue;
                                                }
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['fullName']; ?></td>
                                                    <td><?php echo $row['Description']; ?></td>
                                                    <td><?php echo $row['Date']; ?></td>
                                                    <td><?php echo $row['Time']; ?></td>
                                                    <td><?php echo $row['postingDate']; ?></td>
                                                    <td>
                                                        <a href="details.php?requestid=<?php echo $row['id'];?>" class="btn-sm btn-primary">View</a> 
                                                        <a href="complete.php?requestid=<?php echo $row['id'];?>" class="btn-sm btn-complete">Complete</a>
                                                    </td>   
                                                </tr>
                                            <?php endwhile ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include_once('includes/footer.php'); ?>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
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
