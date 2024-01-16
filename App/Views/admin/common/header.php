  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title;?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo assets('admin/bootstrap/css/bootstrap.min.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo assets('admin/dist/css/AdminLTE.min.css'); ?>">
      <link rel="stylesheet" href="<?php echo assets('admin/dist/css/AdminLTE.css');?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo assets('admin/dist/css/skins/_all-skins.min.css'); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo assets('admin/plugins/iCheck/flat/blue.css'); ?>">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo assets('admin/plugins/morris/morris.css'); ?>">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo assets('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css'); ?>">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo assets('admin/plugins/datepicker/datepicker3.css'); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo assets('admin/plugins/daterangepicker/daterangepicker-bs3.css'); ?>">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo assets('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>">
  </head>
  <body class="hold-transition skin- sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>W</b>K</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>WIKI</b>Naoufal</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="../#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
                <img src="<?php echo assets('images/' . $user->image); ?>" alt="<?php echo $user->first_name . ' ' . $user->last_name; ?>" title="<?php echo $user->first_name . ' ' . $user->last_name;?>" class="user-image" />
                <span class="hidden-xs">
                  <?php echo $user->first_name . ' ' . $user->last_name;?>
                </span>
              </a>
              <ul class="dropdown-menu">
                  <li>
                      <button type="button" class="btn btn-default" style="width: 100%;" data-toggle="modal" data-target="#user-profile">
                          <span class="fa fa-user"></span>
                          Profile
                      </button>
                  </li>
                  <li>
                      <a href="<?php echo url('/admin/logout') ?>" class="btn btn-default text-white">
                          <span class="fa fa-power-off"></span>
                          Logout
                      </a>
                  </li>
              </ul>
            </li>
            
          </ul>
        </div>
      </nav>
    </header>
