<?php
include_once('../includes/config.php');

// ตรวจสอบว่าฟอร์มถูกส่งมาหรือไม่
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // รับและตรวจสอบข้อมูลที่ส่งมาจากฟอร์ม
    $event_id = intval($_POST['event_id']); // ตรวจสอบให้แน่ใจว่าเป็นตัวเลข
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $status = mysqli_real_escape_string($connect, $_POST['status']);
    
    // เตรียม SQL statement สำหรับการเพิ่มข้อมูล
    $stmt = mysqli_prepare($connect, "INSERT INTO sub_events (event_id, description, status) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'iss', $event_id, $description, $status);
    
    // เรียกใช้ statement และตรวจสอบความสำเร็จ
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Toastify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>
<body>
    <div id="wrapper">
        <?php include_once('includes/sidebar.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include_once('includes/topbar.php'); ?>
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Incidents Complete</h1>
                    <div class="row gx-4 gx-lg-5">
                        <div class="col-md-12 mb-5">
                            <div class="card h-100">
                                <div class="card-body">
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

                        <!-- ฟอร์มเพิ่ม Sub Event -->
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary" align="center">Add Sub Event</h6>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <input type="hidden" name="event_id" value="<?php echo htmlspecialchars($rid); ?>">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>Description</th>
                                                    <td><input type="text" name="description" class="form-control" required></td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>
                                                        <select name="status" class="form-control" required>
                                                            <option value="กำลังแก้ไข">กำลังแก้ไข</option>
                                                            <option value="แก้ไขเสร็จสิ้น">แก้ไขเสร็จสิ้น</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><input type="submit" name="submit" class="btn btn-primary" value="Add Sub Event"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- ประวัติการดำเนินการของ Request -->
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
            <!-- Footer -->
            <?php include_once('includes/footer.php'); ?>
        </div>
    </div>
    
    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS -->
    <script src="js/scripts.js"></script>
    <!-- Toastify JS -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        // ตรวจสอบว่ามีการตั้งค่าข้อความและประเภทข้อความจาก PHP หรือไม่
        <?php if (isset($message) && isset($message_type)): ?>
            Toastify({
                text: "<?php echo $message; ?>",
                duration: 3000, // ระยะเวลาแสดงผลในหน่วยมิลลิวินาที
                close: true, // แสดงปุ่มปิด
                gravity: "top", // ตำแหน่ง
                position: "right", // ตำแหน่ง
                backgroundColor: "<?php echo ($message_type == 'success') ? 'green' : 'red'; ?>"
            }).showToast();
        <?php endif; ?>
    </script>
</body>
</html>
