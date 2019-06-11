<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task manager</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="" type="image/png">
    <meta name="description" content="MVC Task manager">
    <meta name="author" content="Anton Shpak">
    <meta name="keywords" content="MVC Task manager">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="/public/css/bootstrap.min.css">
    <!-- Bootstrap theme -->
    <link rel="stylesheet" type="text/css" href="/public/css/bootstrap-theme.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--  Main Style  -->
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">

    </head>

    <body>

        <header>
        </header>

        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light navbar-fixed-top">
                <a class="navbar-brand" href="/">Task manager</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item <?php if (!Router::getURI()) echo "active"; ?>"><a class="nav-link" href="/">Tasks list</a></li>
                        <li class="nav-item dropdown">
                            <a href="#" id="navbarDropdown" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <?php if (User::isGuest()) : ?>
                                    Login as admin
                                <?php else : ?>
                                    <?php echo $_SESSION['name'] ?>
                                <?php endif; ?>
                                <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php if (User::isGuest()) : ?>
                                    <a class="dropdown-item" href='/user/login'>login</a>
                                <?php else : ?>
                                    <a class="dropdown-item" href='/user/logout'>logout</a>
                                <?php endif; ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>