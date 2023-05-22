<?php
include("includes/application_top.php");

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
    $parent = 1;
    if(!empty($_GET['parent'])){
        $parent = (int)$_GET['parent'];
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        foreach ((array)$_POST['set'] as $i => $set_id) {
            $db->query("update landing_pages set display_order = ".($i + 1)." where id = ".(int)$set_id." and parent = {$parent} limit 1");
        }
        die();
    }
if (!empty($_GET['delete'])) {
    $db->query("delete from landing_pages where id = ".(int)$_GET['delete']." limit 1");
    $db->query("delete from landing_pages_to_page_meta where landing_page_id = ".(int)$_GET['delete']." limit 1");
    header("Location: landing_pages.php");
    exit();
}

$required_js[] = 'helpers/sortable.js';
include("includes/header.php");
?>
          <div class="row" id="content-wrapper">
            <div class="col-xs-12">

<?php
drawHeaderRow(array(
    array(
      'name' => 'Landing Pages',
      'icon' => 'icon-money',
      'url'  => 'landing_pages.php'
    ),
));
?>
              <div class='row'>
                <div class='col-sm-12'>
                  <div class='box'>
                    <div class='box-content'>
                      <a class="btn btn-success" href="landing_page_edit.php?parent=<?php echo $parent; ?>"><i class='icon-plus-sign'> Add new Landing Page</i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="box bordered-box purple-border no-bottom-margin">
                    <div class="box-content box-no-padding">
                            <div class="gallery sortable-container">
                                <ul class="list-unstyled list-inline">
<?php
foreach ($db->query("select id, icon from landing_pages where parent = {$parent} order by display_order") as $landing_page) {
?>
    <li id="set_<?php echo $landing_page['id']; ?>">
        <input type="hidden" name="set[]" value="<?php echo $landing_page['id']; ?>" />
        <div class="picture">
            <div class="actions show-actions">
                <div class="pull-right">
                    <a class="btn btn-link" href="landing_page_edit.php?parent=<?php echo $parent; ?>&id=<?php echo $landing_page['id']; ?>">
                        <i class="icon-edit"></i>
                    </a>
                    <a class="btn btn-link" href="?parent=<?php echo $parent; ?>&delete=<?php echo $landing_page['id']; ?>" onclick="return confirm('Are you sure you want to delete this set?');">
                        <i class="icon-remove"></i>
                    </a>
                </div>
            </div>
            <img src="/assets/img/content-340x250/<?php echo $landing_page['icon'] ?>" width="170" height="125" />
        </div>
    </li>
<?php
}
?>
                                </ul>
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
