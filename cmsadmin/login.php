<?php
include("includes/application_top.php");

$return_data = array(
  'errors'     => array(),
  'revalidate' => false
);

if (!empty($_POST)) {
    if (empty($_POST['email'])) {
        $return_data['revalidate'] = true;
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $return_data['revalidate'] = true;
        $_POST['email'] = '';
    }
    if (empty($_POST['password'])) {
        $return_data['revalidate'] = true;
    }
    if (empty($return_data['revalidate']) && empty($return_data['errors'])) {
        $valid_user = false;
        $admin_user = $db->query('select * from admin_users where email like '.$db->quote($_POST['email']).' and password = '.$db->quote(md5($_POST['password'])).' and active limit 1')->fetch(PDO::FETCH_ASSOC);
        if ($admin_user) {
          $_SESSION['admin_user'] = $admin_user;
          $redirect = 'index.php';
          if (!empty($_SESSION['redir'])) {
              $redirect = $_SESSION['redir'];
              unset($_SESSION['redir']);
          }

          $return_data['redirect'] = $redirect;

        } else {
            $return_data['errors']['email'] = 'Email/Password combination not found.';
        }
    }

    echo json_encode($return_data);
    die();

}

addValidation();
$required_js[] = 'pages/login.js';

define('BODY_CLASS', ' login contrast-background');
define("IS_LOGIN", true);
include("includes/header.php");
?>
    <div class="middle-container">
      <div class="middle-row">
        <div class="middle-wrapper">
          <div class="login-container-header">
            <div class="container">
              <div class="row">
                <div class="col-sm-12">
                  <div class="text-center">
                    <h1 class="text-center title"><?php echo SITE_NAME; ?> Admin Portal</h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="login-container">
            <div class="container">
              <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                  <h1 class="text-center title">Sign in</h1>
                  <form action="#" method="get">
                    <div class="form-group">
                      <div class="controls with-icon-over-input">
                        <input value="" placeholder="E-mail" class="form-control" data-rule-required="true" name="email" type="text" />
                        <i class="icon-user text-muted"></i>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="controls with-icon-over-input">
                        <input value="" placeholder="Password" class="form-control" data-rule-required="true" name="password" type="password" />
                        <i class="icon-lock text-muted"></i>
                      </div>
                    </div>
                    <button class="btn btn-block">Sign in</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
include("includes/footer.php");
include("includes/application_bottom.php");
?>