<!DOCTYPE html>
<html>
  <head>
    <title><?php echo SITE_NAME; ?> Admin Portal</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta content="text/html;charset=utf-8" http-equiv="content-type">
    <!-- / START - page related stylesheets [optional] -->
    <link href="assets/stylesheets/plugins/flags/flags.css" media="all" rel="stylesheet" type="text/css" />
<?php
if (!empty($required_css)) {
    foreach ($required_css as $rc) {
        if (strpos($rc, '//') === false) {
            if (strpos($rc, '/') !== 0) {
                $rc = 'assets/stylesheets/'.$rc;
            }
        }

?>
    <link rel="stylesheet" href="<?php echo $rc ?>">
<?php
    }
}
?>
    <!-- / END - page related stylesheets [optional] -->
    <!-- / bootstrap [required] -->
    <link href="assets/stylesheets/bootstrap/bootstrap.css" media="all" rel="stylesheet" type="text/css" />
    <!-- / theme file [required] -->
    <link href="assets/stylesheets/dark-theme.css" media="all" id="color-settings-body-color" rel="stylesheet" type="text/css" />
    <!-- / coloring file [optional] (if you are going to use custom contrast color) -->
    <link href="assets/stylesheets/theme-colors.css" media="all" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]>
      <script src="assets/javascripts/ie/html5shiv.js" type="text/javascript"></script>
      <script src="assets/javascripts/ie/respond.min.js" type="text/javascript"></script>
    <![endif]-->
  </head>
  <body class="contrast-blue <?php echo (defined('BODY_CLASS')?BODY_CLASS:''); ?>">
<?php
if (IS_LOGIN !== true) {
?>
    <header>
      <nav class="navbar navbar-default">
        <a class="navbar-brand" href="index.php">
          <?php echo SITE_NAME; ?> Admin Portal
        </a>
        <a class="toggle-nav btn pull-left" href="#">
          <i class="icon-reorder"></i>
        </a>
        <ul class='nav'>
          <li class='dropdown dark user-menu'>
            <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
              <span class='user-name'><?php echo $_SESSION['admin_user_name']; ?></span>
              <b class='caret'></b>
            </a>
            <ul class='dropdown-menu'>
              <li>
                <a href='logout.php'>
                  <i class='icon-signout'></i>
                  Sign out
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>
    <div id="wrapper">
      <div id="main-nav-bg"></div>
      <nav id="main-nav">
        <div class="navigation">
<?php
  $nav = array(
      array(
          'name' => 'Welcome',
          'icon' => 'icon-dashboard',
          'url' => 'index.php',
      ),
      array(
          'name' => 'Admin Users',
          'icon' => 'icon-user',
          'url' => 'admin_users.php',
          'alias' => 'admin_user_edit.php',
      ),
  );

  foreach (getPages() as $key => $page) {
    $nav[] = $page;
  }

  $nav = new nav($nav);
?><ul class="nav nav-stacked">
                <li>
                    <a href="add-page.php" class="">
                        <i class="icon-plus"></i>
                        <span>Add Page</span>
                    </a>
                </li>
            </ul>
        </div>
        
      </nav>
      <section id="content">
        <div class="container">
<?php
}
?>
