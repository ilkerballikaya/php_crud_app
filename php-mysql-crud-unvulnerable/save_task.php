<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $sql = "INSERT INTO task(title, description) VALUES (?, ?)";
  $stmt = $conn->prepare($sql); 
  $stmt->bind_param("ss", $title, $description);
  $stmt->execute();
  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
