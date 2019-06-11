<?php include ROOT . '/app/views/header.php'; ?>

<div class="container theme-showcase" role="main">   
    <div class="page-header"><h3>Task №<?php echo $taskItem['task_id'] ?></h3></div>
    <p>
        <a href='/task/add' class="btn btn-outline-success" role="button">Create new task</a>
        <a href='/task/edit/<?php echo $taskItem["task_id"] ?>' class="btn btn-outline-warning" role="button">Edit task</a>
    </p>
    <p>
        <b>User </b><?php echo $taskItem['task_user_name'] ?>
    </p>
    <p>
        <b>Email </b><?php echo $taskItem['task_email'] ?>
    </p>
    <p>
        <b>Status </b><?php
        if ($taskItem['task_status']) {
            echo "Completed";
        } else {
            echo "New";
        }
        ?>
    </p>  
    <p><b>Text </b>
        <?php echo $taskItem['task_text'] ?>
    </p>
</div> 

<?php include ROOT . '/app/views/footer.php'; ?>