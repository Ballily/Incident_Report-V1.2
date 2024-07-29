<?php
//database connection
$connect=mysqli_connect("localhost","holeit_admin","@Ball4574","holeit_itnotify");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}

    $sql = "SELECT * FROM tblfirereport";
    $result = $connect->query($sql);

  ?>

<!DOCTYPE html>
<html lang="en">
    <head>
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
		
        <title>IT Incidents Report</title>
	
    </head>
    <body>
		
 <!-- Responsive navbar-->
        <?php include_once('includes/header.php') ?>		
		<div> <br> </div>
        <!-- Page Content-->
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->

            <!-- Content Row-->
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-12 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
            
		<h2 class="card-title">IT Incidents Report</h2>					
		 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Reporting Time</th>
                    </tr>
                </thead>
			<tbody>
             <!-- ข้อมูลที่เราจะทำการ fetch จากฐานข้อมูล -->
            </tbody>
        	<tbody>
				
 <?php while($row = $result->fetch_assoc()): ?>
  <?php if($row['Track'] == 'กำลังแก้ไข'): ?>
   <tr>
    <td><?php echo $row['fullName']; ?></td>
    <td> <?php echo $row['Description']; ?> </td>
    <td><?php echo $row['Date']; ?></td>
	<td><?php echo $row['Time']; ?></td>
	<td><?php echo $row['postingDate']; ?></td>
   </tr>
  <?php endif; ?>
 <?php endwhile ?>
				
				
</tbody>
</table>
</div>	</div>			</div></div></div>
			
<!-- Footer-->
			<div> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> </div>
			
			<?php include_once('includes/footer.php') ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
			
			</body>
</html>
