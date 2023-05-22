<?php

include("includes/application_top.php");

// error_reporting(E_ALL);
// ini_set("display_errors", 1);

if (isset($_GET['id'])) {
  
  $pageId = (int)$_GET['id'];

} else if (isset($_POST['page_id'])) {
  
  $pageId = (int)$_POST['page_id'];

} else {
  
  echo 'Invalid request';
  die;

}

$validator_errors = array();
if (!empty($_POST)) {

    if (empty($revalidate) && empty($validator_errors)) {

        $page_id = $db->quote($pageId);
        $name = $db->quote($_POST['name']);
        $query = $db->prepare("INSERT INTO page_sections (`page_id`,`name`) VALUES ($page_id,$name)");

        $query->execute();
        $sectionId = $db->lastInsertId ();
        header("Location: edit-page-section-fields.php?id=$sectionId&saved=true", true, 301);
        exit();

    }

}

include("includes/header.php");

?>
          <div class="row" id="content-wrapper">
            <div class="col-xs-12">

              <div class="row">
                <div class="col-sm-12">
                  <div class="page-header">
                    <h1 class="pull-left">
                      <i class="icon-plus-sign"></i>
                      <span>Add new Page Section</span>
                    </h1>
                  </div>
                </div>
              </div>
              <?php
                if (isset($_GET['saved'])) {
              ?>
                  <div class="row">
                    <div class="col-sm-12">
                        <div class='alert alert-success alert-dismissable'>
                          <a class="close" data-dismiss="alert" href="#">&times;</a>
                          <h4><i class='icon-ok-sign'></i> Saved!</h4>
                          Content saved successfully
                        </div>
                      </div>
                 </div>
              <?php
                }
              ?>
              <div class="row">
                <div class="col-sm-12">
                  <div class="box">
                    <div class="box-header dark-grey-background">
                      <div class="title">
                        <div class="icon-edit"></div>
                        <?php echo $sectionName; ?>
                      </div>
                    </div>
                    <div class="box-content box-no-padding">
                      <form class="form form-horizontal form-striped" action="add-page-section.php" method="post">
                        <input type="hidden" name="page_id" value="<?php echo $pageId; ?>">
                        <?php
                          
                          drawInputBoxAlternate('text', 'name', 'Name', '');
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
