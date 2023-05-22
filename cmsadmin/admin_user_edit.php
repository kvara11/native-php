<?php
include("includes/application_top.php");

$mode = 'add';
if (!empty($_GET['id'])) {
    $admin = $db->query("select * from admin_users where id = ".(int)$_GET['id']." limit 1")->fetch(PDO::FETCH_ASSOC);
    if ($admin) {
        $mode = 'edit';
    }
}

$return_data = array(
  'errors'     => array(),
  'revalidate' => false
);

if (!empty($_POST)) {

    if (empty($_POST['name'])) {
        $return_data['revalidate'] = true;
    }
    if (empty($_POST['email'])) {
        $return_data['revalidate'] = true;
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $return_data['revalidate'] = true;
    } else {
        $check_email = ($db->query("select count(*) from admin_users where email like ".$db->quote($_POST['email'])." and id != ".(int)$admin['id'])->fetchColumn() > 0);
        if ($check_email) {
            $return_data['errors']['email'] = 'Email address already associated with an Admin.';
        }
    }
    if ($mode == 'add') {
        if (empty($_POST['password'])) {
            $return_data['revalidate'] = true;
        }
    }

    if (empty($return_data['revalidate']) && empty($return_data['errors'])) {

        $data = array(
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'active' => (int)$_POST['active']
        );
        if ($mode == 'add' || ($mode == 'edit' && !empty($_POST['password']))) {
            $data['password'] = md5($_POST['password']);
        }
        if ($mode == 'add') {
            $db->perform("admin_users", $data);
        } else {
            $db->perform("admin_users", $data, "update", "id = ".(int)$admin['id']." limit 1");
        }

        $return_data['redirect'] = 'admin_users.php';

    }

    echo json_encode($return_data);
    die();

}

addValidation();
addPWStrength();
$required_js[] = 'pages/admin_user_edit.js';

include("includes/header.php");
?>
          <div class="row" id="content-wrapper">
            <div class="col-xs-12">
<?php
drawHeaderRow(array(
    array(
      'name' => 'Admin Users',
      'icon' => 'icon-user',
      'url'  => 'admin_users.php'
    ),
    array(
      'name' => ucfirst($mode) . ' Admin User',
      'icon' => 'icon-edit',
    ),
));
?>

              <div class="row">
                <div class="col-sm-12">
                  <div class="box">
                    <div class="box-header dark-grey-background">
                      <div class="title">
                        <div class="icon-edit"></div>
                        <?php echo ucfirst($mode); ?> Admin User
                      </div>
                    </div>
                    <div class="box-content box-no-padding">
                      <form class="form form-horizontal form-striped" action="#" method="get">
<?php
drawInputBox('text', 'name', 'Name', $admin);
drawInputBox('text', 'email', 'Email', $admin);
drawInputBox('password', 'password', ($mode == 'edit'?'Change ':'') . 'Password', $admin, 'pwstrength' . ($mode == 'edit'?' optional':''));
drawSelect('active', array(
    'No', 'Yes'
), 'Active', $admin);
?>
                        <div class="form-actions" style="margin-bottom: 0;">
                          <div class="row">
                            <div class="col-md-9 col-md-offset-3">
                              <button class="btn btn-primary btn-lg" type="submit">
                                <i class="icon-save"></i>
                                Save
                              </button>
                            </div>
                          </div>
                        </div>
                      </form>

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
