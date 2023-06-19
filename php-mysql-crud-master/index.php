<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
          </div>
          <div class="form-group">
            <input type="text" name="nombres" class="form-control" placeholder="nombres" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="apellidos" class="form-control" placeholder="apellidos" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="semestral" class="form-control" placeholder="semestral" autofocus>
          </div>
          
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>matricula</th>
            <th>nombres</th>
            <th>apellidos</th>
            <th>semestral</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM escuela";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['matricula']; ?></td>
            <td><?php echo $row['nombres']; ?></td>
            <td><?php echo $row['apellidos']; ?></td>
            <td><?php echo $row['semestral']; ?></td>
            <td>
              <a href="edit.php?matricula=<?php echo $row['matricula']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?matricula=<?php echo $row['matricula']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
