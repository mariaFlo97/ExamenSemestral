<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
   '',
  'bdo'
) or die(mysqli_erro($mysqli));

?>
