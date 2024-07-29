<?php
include_once('../includes/config.php');

if (isset($_POST['submit'])) {
    $fname = $_POST['fullname'];
    $des = $_POST['Description'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $concern = $_POST['Concern'];

    $query = mysqli_query($connect, "INSERT INTO tblfirereport (fullName, Description, date, time, concern) VALUES ('$fname', '$des', '$date', '$time', '$concern')");

    $message = '';
    $message_type = '';

    if ($query) {
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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>IT Incidents Report</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- Toastify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>
<body>
    <!-- Responsive navbar-->
    <?php include_once('includes/header.php'); ?>
    <!-- Page Content-->
    <div class="container px-4 px-lg-5">
        <!-- Heading Row-->
        <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <!-- <div class="col-lg-12"><img class="img-fluid rounded mb-4 mb-lg-0" src="assets/6094899.jpg" alt="..." /></div> -->
        </div>

        <!-- Content Row-->
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-12 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Incident Reporting of IT System</h2>

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
                                        <td>
                                            <input type="date" id="date" name="date" class="form-control" required>
                                        </td>
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
                                        <th>Concern</th>
                                        <td><input type="submit" name="submit" class="btn btn-primary"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer-->
    <?php include_once('includes/footer.php'); ?>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>

    <!-- Toastify JS -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
        // Check if PHP has set a message and type
        <?php if (isset($message) && isset($message_type)): ?>
            Toastify({
                text: "<?php echo $message; ?>",
                duration: 3000, // Duration in milliseconds
                close: true, // Show close button
                gravity: "top", // Positioning
                position: "right", // Positioning
                backgroundColor: "<?php echo ($message_type == 'success') ? 'green' : 'red'; ?>"
            }).showToast();
        <?php endif; ?>
    </script>
</body>
</html>
