<?php include('includes/header.php'); ?>
<?php include("db.php"); ?>
<div class="container p-4">
  <div class="row">
	<div class="col-md-8">
	      <table class="table table-bordered">
		<thead>
		  <tr>
		    <th>ID</th>
		    <th>Title</th>
		    <th>Description</th>
		    <th>Created At</th>
		  </tr>
		</thead>
		<tbody>
			<?php
				if  (isset($_GET['id'])) {
				  $id = $_GET['id'];
				  $query = "SELECT * FROM task WHERE id=$id";
				  $result = mysqli_query($conn, $query);  

				  while($row = mysqli_fetch_assoc($result)) { 
				  	?>
					  <tr>
					    <td><?php echo $row['id']; ?></td>
					    <td><?php echo $row['title']; ?></td>
					    <td><?php echo $row['description']; ?></td>
					    <td><?php echo $row['created_at']; ?></td>
					  </tr>
				  	<?php 
				  } 
				} 
			?>
		</tbody>
	      </table>
	    </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
