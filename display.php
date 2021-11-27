
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="style.css">

    <title>Form Data</title>
  </head>
  <body>

  	<section class="main">
  		<div class="container">
  			<div class="col-12">
  				<h1 class="text-center">Form Data of Job Candidates</h1>
  			</div>
  			<div class="col-12 m-auto main-table">
  				<div class="table-responsive">
  					<table class="m-auto w-100">
  						<thead>
  							<tr>
  								<th>ID</th>
  								<th>NAME</th>
  								<th>DEGREE</th>
  								<th>MOBILE</th>
  								<th>EMAIL</th>
  								<th>REFER</th>
  								<th>JOB POST</th>
  								<th>IMAGE</th>
  								<th colspan="2">OPERATION</th>
  							</tr>
  						</thead>

  						<tbody>

  							<?php

							include 'connection.php';

							$selectQuery = "SELECT * FROM `register`";

							$query = mysqli_query($connect,$selectQuery);

							$num = mysqli_num_rows($query);

							$i = 1;


							while ($result = mysqli_fetch_array($query)) {
							?>

							<tr>
  								<td><?php echo $i;?></td>
  								<td><?php echo $result['name']; ?></td>
  								<td><?php echo $result['degree']; ?></td>
  								<td><?php echo $result['mobile']; ?></td>
  								<td><?php echo $result['email']; ?></td>
  								<td><?php echo $result['refer']; ?></td>
  								<td><?php echo $result['jobpost']; ?></td>
  								<td><img src="<?php echo $result['file']; ?>" class="img-fluid"></td>
  								<td><a href="update.php?id=<?php echo $result['id']; ?>" type="button" class="btn" data-bs-toggle="tooltip" data-bs-placement="top" title="UPDATE">
									<i class="far fa-edit"></i></a></td>
  								<td><a href="delete.php?id=<?php echo $result['id']; ?>" type="button" class="btn" data-bs-toggle="tooltip" data-bs-placement="top" title="DELETE">
									<i class="fas fa-trash"></i></a></td>
  							</tr>


  							<?php
  							$i++;
							}
							

							?>

  						</tbody>
  					</table>
  				</div>
  			</div>
  		</div>
  	</section>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>