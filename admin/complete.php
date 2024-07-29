<?php
include_once('../includes/config.php');

if (isset($_GET['requestid'])) {
    $requestid = intval($_GET['requestid']);

    // Update the status to "แก้ไขเสร็จสิ้น"
    $query = "UPDATE tblfirereport SET Track='แก้ไขเสร็จสิ้น' WHERE id='$requestid'";
    $result = mysqli_query($connect, $query);

    if ($result) {
        header("Location: admin_incidents.php"); // Redirect back to the list page
        exit();
    } else {
        echo "Failed to update status.";
    }

    mysqli_close($connect);
}
?>
