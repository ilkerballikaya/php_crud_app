<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  if ( is_numeric($id) == true){
		$sql = "SELECT * FROM task WHERE id=?";
		$stmt = $conn->prepare($sql); 
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
	  if (mysqli_num_rows($result) == 1) {
		$row = $result->fetch_assoc();
		$title = $row['title'];
		$description = $row['description'];
	  }
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $title= $_POST['title'];
  $description = $_POST['description'];

  $query = "UPDATE task set title = '$title', description = '$description' WHERE id=$id";
  mysqli_query($conn, $query);
  
  	$sql = "UPDATE task set title =?, description =? WHERE id=?";
	$stmt= $conn->prepare($sql);
	$stmt->bind_param("ssi", $title, $description, $id);
	$stmt->execute();
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_task.php?id=<?php echo htmlentities($_GET['id'], ENT_QUOTES, 'UTF-8'); ?>" method="POST">
        <div class="form-group">
          <input name="title" type="text" class="form-control" value="<?php echo htmlentities($title, ENT_QUOTES, 'UTF-8'); ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
        <textarea name="description" class="form-control" cols="30" rows="10"><?php echo htmlentities($description, ENT_QUOTES, 'UTF-8'); ?></textarea>
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
