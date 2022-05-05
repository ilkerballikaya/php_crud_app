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
			      if ( is_numeric($id) == true){
			  			$sql = "SELECT * FROM task WHERE id=?";
						$stmt = $conn->prepare($sql); 
						$stmt->bind_param("i", $id);
						$stmt->execute();
						$result = $stmt->get_result();
						if($result->num_rows < 1){
							  $_SESSION['message'] = 'Task Not Found!';
							  $_SESSION['message_type'] = 'danger';
							  header('Location: index.php');
						}
					  while($row = $result->fetch_assoc()) { 
					  	?>
						  <tr>
						  	<td><?php echo htmlentities($row['id'], ENT_QUOTES, 'UTF-8'); ?></td>
							<td><?php echo htmlentities($row['title'], ENT_QUOTES, 'UTF-8'); ?></td>
							<td><?php echo htmlentities($row['description'], ENT_QUOTES, 'UTF-8'); ?></td>
							<td><?php echo htmlentities($row['created_at'], ENT_QUOTES, 'UTF-8'); ?></td>
						  </tr>
					  	<?php 
				  	}
				  } 
				} 
			?>
		</tbody>
	      </table>
	    </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
