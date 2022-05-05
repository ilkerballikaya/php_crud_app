<?php

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  if ( is_numeric($id) == true){
	  $sql = "DELETE FROM task WHERE id =?";
	  $stmt = $conn->prepare($sql); 
	  $stmt->bind_param("i", $id);
	  $stmt->execute();

	  $_SESSION['message'] = 'Task Removed Successfully';
	  $_SESSION['message_type'] = 'danger';
	  header('Location: index.php');
  }
}

?>
