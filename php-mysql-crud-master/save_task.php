<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $nombres = $_POST['nombres'];
  $apellidos = $_POST['apellidos'];
  $semestral = $_POST['semestral'];
  $query = "INSERT INTO escuela(nombres, apellidos, semestral ) VALUES ('$nombres', '$apellidos',  '$semestral')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
