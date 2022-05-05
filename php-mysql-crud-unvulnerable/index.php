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
        <form action="get_task.php" method="GET">
          <div class="form-group">
            <input type="text" name="id" class="form-control" placeholder="Task ID" autofocus>
          </div>
          <input type="submit" class="btn btn-success btn-block" value="Get Task">
        </form>
      </div>
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
          </div>
          <div class="form-group">
            <textarea name="description" rows="2" class="form-control" placeholder="Task Description"></textarea>
          </div>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
          <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
		$sql = "SELECT * FROM task";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result(); 

          while($row = $result->fetch_assoc()) { ?>
          <tr>
            <td><?php echo htmlentities($row['id'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlentities($row['title'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlentities($row['description'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlentities($row['created_at'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td>
              <a href="edit_task.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
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
