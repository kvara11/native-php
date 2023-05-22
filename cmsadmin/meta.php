<?php
include("includes/application_top.php");

$meta = $db->query('select * from page_meta where id = '.(int)$_GET['id'].' limit 1')->fetch(PDO::FETCH_ASSOC);
if (!$meta) {
  header("Location: index.php");
  exit();
}

$validator_errors = array();
if (!empty($_POST)) {

    if (empty($revalidate) && empty($validator_errors)) {

        $data = array(
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'keywords' => $_POST['keywords'],
        );
        $db->perform("page_meta", $data, "update", "id = ".(int)$meta['id']." limit 1");

        header("Location: meta.php?id=".$meta['id']."&saved=true", true, 301);
        exit();

    }

}

addAutoSize();
include("includes/header.php");
?>
          <div class="row" id="content-wrapper">
            <div class="col-xs-12">

              <div class="row">
                <div class="col-sm-12">
                  <div class="page-header">
                    <h1 class="pull-left">
                      <i class="icon-archive"></i>
                      <span>Meta</span>
                    </h1>
                    <div class="pull-right">
                      <ul class="breadcrumb">
                        <li>
                          <i class="icon-archive"></i>
                          Meta
                        </li>
                        <li class="separator">
                          <i class="icon-angle-right"></i>
                        </li>
                        <li>
                          <?php echo $meta['name']; ?>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
<?php
if ($_GET['saved']) {
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
                        Meta
                      </div>
                    </div>
                    <div class="box-content box-no-padding">
                      <form class="form form-horizontal form-striped" action="meta.php?id=<?php echo $meta['id']; ?>" method="post">
<?php
drawInputBox('text', 'title', 'Meta Title', $meta);
drawAutoSizeTextArea('description', 'Meta Description', $meta);
drawAutoSizeTextArea('keywords', 'Meta Keywords', $meta);
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
