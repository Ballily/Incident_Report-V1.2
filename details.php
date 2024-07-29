<?php
include_once('includes/config.php');

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // Retrieve and sanitize form inputs
    $event_id = intval($_POST['event_id']); // Ensure it's an integer
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $status = mysqli_real_escape_string($connect, $_POST['status']);
    
    // Prepare SQL statement for insertion
    $stmt = mysqli_prepare($connect, "INSERT INTO sub_events (event_id, description, status) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'iss', $event_id, $description, $status);
    
    // Execute the statement and check for success
    if (mysqli_stmt_execute($stmt)) {
        $message = "Sub event added successfully!";
        $message_type = "success";
    } else {
        $message = "Error adding sub event: " . mysqli_error($connect);
        $message_type = "error";
    }
    
    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>IT INCIDENT REPORT</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet">
    <!-- Toastify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>
<body>
    <!-- Responsive navbar -->
    <?php include_once('includes/header.php'); ?>
    
    <!-- Page Content -->
    <div class="container px-4 px-lg-5">
        <!-- Heading Row -->
        <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <!-- No content in heading row -->
        </div>

        <!-- Content Row -->
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-12 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Personal Information Card -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary" align="center">Incidence Information</h6>
                                    </div>
                                    <div class="card-body">
                                        <?php 
                                        $rid = $_GET['requestid'];
                                        $stmt = mysqli_prepare($connect, "SELECT * FROM tblfirereport WHERE id = ?");
                                        mysqli_stmt_bind_param($stmt, 'i', $rid);
                                        mysqli_stmt_execute($stmt);
                                        $result = mysqli_stmt_get_result($stmt);
                                        
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <tr>
                                                <th>Full Name</th>
                                                <td><?php echo htmlspecialchars($row['fullName']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Description</th>
                                                <td><?php echo htmlspecialchars($row['Description']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Time</th>
                                                <td><?php echo htmlspecialchars($row['Time']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Reporting Time</th>
                                                <td><?php echo htmlspecialchars($row['postingDate']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Concern</th>
                                                <td><?php echo htmlspecialchars($row['Concern']); ?></td>
                                            </tr>
                                        </table>
                                        <?php 
                                        } 
                                        mysqli_stmt_close($stmt);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

					
                        <!-- Request Track History -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary" align="center">Action Report</h6>
                                    </div>
                                    <div class="card-body"> 
                                        <?php 
                                        $stmt = mysqli_prepare($connect, "SELECT * FROM sub_events WHERE event_id = ?;");
                                        mysqli_stmt_bind_param($stmt, 'i', $rid);
                                        mysqli_stmt_execute($stmt);
                                        $result = mysqli_stmt_get_result($stmt);

                                        if (mysqli_num_rows($result) > 0) {
                                            $counter = 1; // ตัวแปรนับลำดับ
                                            while ($sub_event = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <h5 class="card-title">Action No. <?php echo $counter; ?></h5> 
                                                <p><strong>Description:</strong> <?php echo htmlspecialchars($sub_event['description']); ?></p>
                                                <p><strong>Status:</strong> <?php echo htmlspecialchars($sub_event['status']); ?></p>
                                                <p><strong>Created at:</strong> <?php echo htmlspecialchars($sub_event['created_at']); ?></p>
                                            </div>
                                        </div>
                                        <?php 
                                                $counter++; // เพิ่มค่าลำดับ
                                            }
                                        } else {
                                            echo "<p>No sub events found for this incident.</p>";
                                        }
                                        mysqli_stmt_close($stmt);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <?php include_once('includes/footer.php'); ?>
    
    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS -->
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
