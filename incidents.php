<?php include_once('includes/config.php');?>

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
    </head>
    <body>
        <!-- Responsive navbar-->
        <?php include_once('includes/header.php') ?>
        <div> <br>	</div>
		
		
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
						<th>Action</th>
                    </tr>
                </thead>
			<tbody>
             <!-- ข้อมูลที่เราจะทำการ fetch จากฐานข้อมูล -->
            </tbody>
        	<tbody>
<?php
	
$sql = "SELECT * FROM tblfirereport";
    $result = $connect->query($sql);
?>				
 <?php while($row = $result->fetch_assoc()): ?>
  <?php if($row['Track'] == 'กำลังแก้ไข'): ?>
   <tr>
    <td><?php echo $row['fullName']; ?></td>
    <td> <?php echo $row['Description']; ?> </td>
    <td><?php echo $row['Date']; ?></td>
	<td><?php echo $row['Time']; ?></td>
	<td><?php echo $row['postingDate']; ?></td>
	<td>

                                <a href="details.php?requestid=<?php echo $row['id'];?>" class="btn-sm btn-primary">View</a> 
	

                              </td>   
   </tr>
  <?php endif; ?>
 <?php endwhile ?>
				
				
</tbody>
</table>
</div>	</div>			</div></div></div>
		
		
						
                  
               
                
            
			
			
		<div> <br> </div>	
			
            <!-- Call to Action-->
            <div class="card text-white bg-secondary my-5 py-4 text-center">
                <div class="card-body"><p class="text-white m-0">IT alerting and support systems are vital for ensuring a healthy and responsive IT environment in today's dynamic world. They help organizations identify and address issues before they disrupt business operations.</p></div>
            </div>
       
        <!-- Footer-->
        <?php include_once('includes/footer.php') ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
