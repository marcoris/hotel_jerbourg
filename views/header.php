<?php Session::init(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo URL; ?>public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/jquery/jquery-ui.min.css">
    <link rel='stylesheet' href='<?php echo URL; ?>public/fontawesome/css/all.css'>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css">
    <title>Hotel Jerbourg - Bretagne</title>
</head>
<body>
    <div class="header">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="<?php echo URL; ?>">Hotel Jerbourg</a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarCollapse" style="">
                <ul class="navbar-nav mr-auto">
                    <?php if (Session::get('loggedIn')) : ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>bookings">Buchungen</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>guests">Gäste</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>hitlist">Hitliste</a></li>
                        <?php if (Session::get('role') == 1) : ?>
                            <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>sales">Umsatz</a></li>
                        <?php endif; ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>login/logout">Logout (<?php echo $_SESSION['login']; ?>)</a></li>
                    <?php else : ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>login">Login</a></li>
                    <?php endif; ?>
                </ul>
                </div>
        </nav>
    </div>

    