<?php include ROOT . '/app/views/header.php'; ?>

<div class="container" role="main">
    <div class="page-header"><h3>Tasks list</h3></div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <form class="form-inline" action="/" method="post">
                <div class="form-group mb-6">
                    <label for="sortField">Sort </label>
                    <select class="form-control" name="sortField">
                        <option value="0" <?php if ($_SESSION['sort_field'] == 0) echo 'selected="selected"'; ?>>id</option>
                        <option value="1" <?php if ($_SESSION['sort_field'] == 1) echo 'selected="selected"'; ?>>name</option>
                        <option value="2" <?php if ($_SESSION['sort_field'] == 2) echo 'selected="selected"'; ?>>email</option>
                        <option value="3" <?php if ($_SESSION['sort_field'] == 3) echo 'selected="selected"'; ?>>status</option>
                    </select>
                </div>
                <div class="form-group mb-6">
                    <label for="sortOrganize">Order </label>
                    <select class="form-control" name="sortOrganize">
                        <option value="1" <?php if ($_SESSION['sort_organize'] == 1) echo 'selected="selected"'; ?>>/\</option>
                        <option value="2" <?php if ($_SESSION['sort_organize'] == 2) echo 'selected="selected"'; ?>>\/</option>
                    </select>
                </div>
                <input class="btn btn-outline-secondary" type="submit" name="submit" value="Sort">
            </form>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <p class="operation-cont"><a href='/task/add' class="btn btn-outline-success" role="button">Create new task</a></p>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>User name</th>
                    <th>Email</th>
                    <th>Text</th>
                    <th>Status</th>
                    <th></th>
                    <?php if (!User::isGuest()) : ?>
                        <th></th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($taskList as $taskItem) : ?>
                    <tr class="<?php if ($taskItem['task_status']) echo 'success'; ?>">
                        <td><?php echo $taskItem['task_id'] ?></td>
                        <td><?php echo $taskItem['task_user_name'] ?></td>
                        <td><?php echo $taskItem['task_email'] ?></td>
                        <td><?php echo $taskItem['task_text'] ?></td>
                        <td>
                            <?php
                            if ($taskItem['task_status'])
                                echo "Completed";
                            else
                                echo "New";
                            ?>
                        </td>
                        <td>
                            <a href="/task/<?php echo $taskItem['task_id'] ?>" class="btn btn-outline-info" role="button">Open</a>
                        </td>
                        <?php if (!User::isGuest()) : ?>
                            <td>
                                <a href="/task/edit/<?php echo $taskItem['task_id'] ?>" class="btn btn-outline-warning" role="button">Edit</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <p><?php echo $pagination->get(); ?></p>
</div>   

<?php include ROOT . '/app/views/footer.php'; ?>