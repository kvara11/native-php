<?php

include('includes/application_top.php');
include('includes/header.php');

?>
<?php
    if (isset($_GET['deleted'])) {
        ?>
        <div class="row">
            <div class="col-sm-12">
                <div class='alert alert-success alert-dismissable'>
                    <a class="close" data-dismiss="alert" href="#">&times;</a>
                    <h4><i class='icon-ok-sign'></i> Deleted!</h4>
                    Content deleted successfully
                </div>
            </div>
        </div>
        <?php
    }
?>
          <div class='row' id='content-wrapper'>
            <div class='col-xs-12'>

              <div class='page-header page-header-with-buttons'>
                <h1 class='pull-left'>
                  <i class='icon-dashboard'></i>
                  <span>Welcome</span>
                </h1>
              </div>
              <div class='alert alert-info'>
                Welcome to the
                <strong>Triton Capital</strong> Admin Portal
                - Use the left bar to navigate around this site.
              </div>
            </div>
          </div>
<?php

include('includes/footer.php');
include('includes/application_bottom.php');

?>
