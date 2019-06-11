<?php include ROOT . '/app/views/header.php'; ?>

<div class="container theme-showcase" role="main">   
    <div class="page-header"><h3>Create new task</h3></div>
    <?php if ($errors) : ?>
        <div class="alert alert-danger" role="alert">
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <p>
        <a href='/task/add' class="btn btn-outline-success" role="button">Create new task</a>
    </p>
    <?php if ($result): ?>
        <div class="alert alert-success" role="alert">
            <p>Task added!</p>
        </div>
    <?php else : ?>  
        <form action="#" method="post" class="form-horizontal" enctype="multipart/form-data" id="form1" runat="server">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"><b>Name</b> </label>
                <div class="col-sm-10">
                    <input type="text" placeholder="name" name="task_user_name" value="<?php echo $name ?>" class="form-control" id="task_user_name">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"><b>Task text</b> </label>
                <div class="col-sm-10">
                    <textarea name="task_text" cols="40" rows="5" placeholder="text" class="form-control" id="task_text"><?php echo $text ?></textarea>

                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"><b>E-mail</b> </label>
                <div class="col-sm-10">
                    <input type="email" placeholder="email" name="task_email" value="<?php echo $email ?>" class="form-control" id="task_email">
                </div>
            </div>
            <input type="submit" name="submit" value="Save" class="btn btn-outline-success">
        </form>
    <?php endif; ?>
</div> 

<?php include ROOT . '/app/views/footer.php'; ?>