<?php  

include "db_conn.php";

$sql = "SELECT * FROM support ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html>
<head>
	<title>User's Support</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div>
            <br>
			<h4 class="display-4 text-center">User's Support Information</h4><br>
			<?php if (isset($_GET['success'])) { ?>
		    <div class="alert alert-success" role="alert">
			  <?php echo $_GET['success']; ?>
		    </div>
		    <?php } ?>
			<?php if (mysqli_num_rows($result)) { ?>
			<table class="table table-bordered">
			  <thead class="thead-light">
			    <tr>
			      <th scope="col">#</th>
                  <th scope="col">Date</th>
                  <th scope="col">Name</th>
                  <th scope="col">Organization Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Message</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	   $i = 0;
			  	   while($rows = mysqli_fetch_assoc($result)){
			  	   $i++;
			  	 ?>
			    <tr>
			      <th scope="row"><?php echo $i; ?></th>
                  <td><?php echo $rows['date']; ?></td>
                  <td><?php echo $rows['address']; ?></td>
                  <td><?php echo $rows['status']; ?></td>
                  <td><?php echo $rows['email']; ?></td>
                  <td><?php echo $rows['transaction']; ?></td>
			    </tr>
			    <?php } ?>
			  </tbody>
			</table>
			<?php } ?>
            <div align="center">
                <button onclick="location.href='support.php'" type="button" class="btn btn-primary">
                Support page</button>
            </div>
		</div>
	</div>
</body>
</html>