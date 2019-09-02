<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">


            <?php if(isset($_SESSION['message'])){?>
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION ['message'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php session_unset();} ?>


            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="tittle" class="form-control" placeholder="title" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="description"></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" name="save_task" value="Save Task">
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <tr>
                    <th>title</th>
                    <th>description</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                <tbody>
                    <?php
                    $query = "SELECT * FROM tarea";
                    $result_tasks = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($result_tasks)) { ?>
                    <tr>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td><?php echo $row['create_at'] ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>

                    <?php } ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>