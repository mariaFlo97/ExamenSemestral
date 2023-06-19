<?php

include("db.php");

if(isset($_GET['matricula'])) {
  $matricula = $_GET['matricula'];
  $query = "DELETE FROM escuela WHERE matricula = $matricula";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>
