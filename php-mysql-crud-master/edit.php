<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['matricula'])) {
  $matricula = $_GET['matricula'];
  $query = "SELECT * FROM escuela WHERE matricula=$matricula";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $matricula = $row['matricula'];
    $nombres = $row['nombres'];
    $apellidos = $row['apellidos'];
    $semestral = $row['semestral'];
  }
}

if (isset($_POST['update'])) {
  $matricula = $_GET['matricula'];
  $nombres= $_POST['nombres'];
  $apellidos = $_POST['apellidos'];
  $semestral = $_POST['semestral'];

  $query = "UPDATE escuela set nombres = '$nombres', apellidos = '$apellidos', semestral = '$semestral'  WHERE matricula=$matricula";
  mysqli_query($conn, $query);
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
      <form action="edit.php?matricula=<?php echo $_GET['matricula']; ?>" method="POST">
        <div class="form-group">
        
        </div>
           <div class="form-group">
            <input type="text" name="nombres" class="form-control" value="<?php echo $nombres; ?>"placeholder="nombres" autofocus>
          
          </div>
          <div class="form-group">
            <input type="text" name="apellidos" class="form-control" value="<?php echo $apellidos; ?>"placeholder="apellidos" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="semestral" class="form-control" value="<?php echo $semestral; ?>"placeholder="semestral" autofocus>
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
