<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'crud',
  'crud',
  'php_mysql_crud'
) or die(mysqli_erro($mysqli));

?>
