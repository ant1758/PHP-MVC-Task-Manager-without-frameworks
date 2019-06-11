<?php include ROOT . '/app/views/header.php'; ?>

<div class="container theme-showcase" role="main">
    <div class="page-header"><h2>Login</h2></div>
    <?php if ($errors) : ?>
        <div class="alert alert-danger" role="alert">
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form class="col-sm-12 col-lg-3" action="#" method="post">
        <div class="form-group">
            <label for="inputName">Name </label>
            <input type="text" id="inputName" placeholder="name" name="user_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="inputPassword">Password </label>
            <input type="password"  id="inputPassword" placeholder="password" name="pass" class="form-control">
        </div>
        <input type="submit" name="submit" value="Login" class="btn btn-default">
    </form>
</div>

<?php include ROOT . '/app/views/footer.php'; ?>


