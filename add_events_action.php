<?php include_once('includes/config.php');

if (isset($_POST['submit'])) {
    $eventId = $_POST['event_id'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $created_at = date('Y-m-d H:i:s'); // ใช้เวลาและวันที่ปัจจุบัน

    // SQL Query สำหรับเพิ่มข้อมูล
    $query = mysqli_prepare($connect, "INSERT INTO sub_events (eventId, description, status, created_at) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($query, 'isss', $eventId, $description, $status, $created_at);

    if (mysqli_stmt_execute($query)) {
        echo "<script>alert('Sub Event added successfully');</script>";
        echo "<script>window.location.href ='sub_event_form.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
    mysqli_stmt_close($query);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Add Sub Event</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <!-- Responsive navbar-->
    <?php include_once('includes/header.php') ?>
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
                        <h2 class="card-title">Add Sub Event</h2>

                        <form method="post">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Event ID</th>
                                        <td><input type="number" name="event_id" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td><input type="text" name="description" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            <select name="status" class="form-control" required>
                                                <option value="onProgress">On Progress</option>
                                                <option value="Completed">Completed</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
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
    <?php include_once('includes/footer.php') ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
</html>
