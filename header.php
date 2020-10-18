<?php
  @session_start();
  $user = isset($_SESSION['user']) && $_SESSION['user'] !== null ? json_decode($_SESSION['user'], true) : null;
  if($user === null && $_SERVER['REQUEST_URI'] != '/login.php') {
    header("Location: login.php");
  }

  switch($_SERVER['HTTP_HOST']) {
    case 'hounds.raptorwebsolutions.com' :
      $site_id = 1;
      $site_name = 'Hounds Drive In';
    break;

    case 'ohiodrivein.raptorwebsolutions.com' :
      $site_id = 2;
      $site_name = 'Ohio Drive In';
    break;

    default :
      $site_id = 0;
      $site_name = '';
  }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./favicon.ico">

    <title><?php echo $site_name; ?> Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/">

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="./assets/main.css" class="href">

    <!-- Custom styles for this template -->
    <link href="./assets/sticky-footer-navbar.css" rel="stylesheet">

    <script>
      var site_id = <?php echo $site_id; ?>;
    </script>
</head>

<body>

    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="/"><?php echo $site_name; ?> Dashboard</a>

            <?php if($user !== null) : ?>

              <div class="justify-end">
                <div class="btn-group account-dropdown">
                  <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-user-circle-o c-primary" aria-hidden="true"></i> &nbsp; <?php echo $user['name']; ?>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="/"><i class="fa fa-home" aria-hidden="true"></i> &nbsp;Dashboard</a>
                    <a class="dropdown-item" href="./food.php"><i class="fa fa-cutlery" aria-hidden="true"></i> &nbsp;Food Management</a>
                    <a class="dropdown-item" href="/orders.php"><i class="fa fa-clipboard" aria-hidden="true"></i> &nbsp;Order Management</a>
                    <a class="dropdown-item" href="/logoff.php"><i class="fa fa-lock" aria-hidden="true"></i> Log Off</a>
                  </div>
                </div>
              </div>

            <?php endif; ?>

            <?php if($user === null) : ?>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                  aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarCollapse">
              
              <i class="fa fa-lock c-secure" aria-hidden="true"></i> &nbsp;

                <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                <ul id="login-dp" class="dropdown-menu">
                    <li>
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form" role="form" method="post" action="#" accept-charset="UTF-8"
                                    id="login-nav">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                        <input type="text" name="email" class="form-control" id="exampleInputEmail2"
                                            placeholder="Email address">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputPassword2">Password</label>
                                        <input type="password" name="password" class="form-control" id="exampleInputPassword2"
                                            placeholder="Password">
                                        <div class="help-block text-right"><a href="">Forget the password ?</a></div>
                                    </div>
                                    <div class="form-group loader-wrap">
                                        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                    </div>
                                    <input type="hidden" name="createAccount" value="0">
                                </form>
                            </div>
                        </div>
                    </li>
                </ul> -->
              </div>
              <?php endif; ?>
        </nav>
    </header>