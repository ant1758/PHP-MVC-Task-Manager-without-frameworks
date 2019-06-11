<?php include ROOT . '/app/views/header.php'; ?>

<div class="container theme-showcase" role="main">   
    <div class="page-header"><h3>Task №<?php echo $taskItem['task_id'] ?></h3></div>
    <p>
        <a href='/task/add' class="btn btn-outline-success" role="button">Create new task</a>
        <a href='/task/edit/<?php echo $taskItem["task_id"] ?>' class="btn btn-outline-warning" role="button">Edit task</a>
    </p>
    <?php if ($result): ?>
        <div class="alert alert-success" role="alert">
            <p>Task edited!</p>
        </div>
    <?php else : ?>   
        <p>
            <b>User </b><?php echo $taskItem['task_user_name'] ?>
        </p>
        <p>
            <b>E-mail </b><?php echo $taskItem['task_email'] ?>
        </p>
        <form action="#" method="post" class="form-horizontal">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"><b>Task text</b> </label>
                <div class="col-sm-10">
                    <textarea name="task_text" cols="40" rows="5" placeholder="text" class="form-control"><?php echo $taskItem['task_text'] ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"><b>Status</b> </label>
                <div class="col-sm-10">
                    <input type="checkbox" name="task_status" value="1" <?php if ($taskItem['task_status']) echo "checked"; ?>>
                </div>
            </div>
            <input type="submit" name="submit" value="Save" class="btn btn-outline-success">
        </form>
    <?php endif; ?>
</div> 

<?php include ROOT . '/app/views/footer.php'; ?>