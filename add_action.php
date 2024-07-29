<?php include_once('includes/config.php');
if(isset($_POST['submit'])){
    $requestId = $_POST['requestid'];
    $teamName = $_POST['teamName'];
    $teamLeaderName = $_POST['teamLeaderName'];
    $teamLeadMobno = $_POST['teamLeadMobno'];
    $teamMembers = $_POST['teamMembers'];
    $assignTime = $_POST['assignTime'];
    $query = mysqli_query($connect, "INSERT INTO tblteams (requestId, teamName, teamLeaderName, teamLeadMobno, teamMembers, assignTime) VALUES ('$requestId', '$teamName', '$teamLeaderName', '$teamLeadMobno', '$teamMembers', '$assignTime')");
    if($query){
        echo "<script>alert('Action added successfully');</script>";
        echo "<script>window.location.href ='reporting.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
        echo "<script>window.location.href ='add_action.php?requestid=$requestId'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Add Action</title>
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
        </div>

        <!-- Content Row-->
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-12 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Add Action for Request ID: <?php echo $_GET['requestid']; ?></h2>
                        <form method="post">
                            <input type="hidden" name="requestid" value="<?php echo $_GET['requestid']; ?>">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Team Name</th>
                                        <td><input type="text" name="teamName" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <th>Team Leader Name</th>
                                        <td><input type="text" name="teamLeaderName" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <th>TL Mobile No.</th>
                                        <td><input type="text" name="teamLeadMobno" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <th>Team Members</th>
                                        <td><textarea class="form-control" required name="teamMembers"></textarea></td>
                                    </tr>
                                    <tr>
                                        <th>Assigned Time</th>
                                        <td><input type="datetime-local" name="assignTime" class="form-control" required></td>
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

    <div>
        <br><br><br><br><br><br><br><br>
    </div>
    <!-- Footer-->
    <?php include_once('includes/footer.php') ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
</html>
