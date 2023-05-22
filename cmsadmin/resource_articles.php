<?php
include("includes/application_top.php");

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

if (!empty($_GET['delete'])) {
    $db->query("delete from resource_articles where id = ".(int)$_GET['delete']." limit 1");
    header("Location: resource_articles.php");
    exit();
}

include("includes/header.php");
?>
          <div class="row" id="content-wrapper">
            <div class="col-xs-12">

<?php
drawHeaderRow(array(
    array(
      'name' => 'Resource Articles',
      'icon' => 'icon-user',
      'url'  => 'resource_articles.php'
    ),
));
?>
              <div class='row'>
                <div class='col-sm-12'>
                  <div class='box'>
                    <div class='box-content'>
                      <a class="btn btn-success" href="resource_article_edit.php"><i class='icon-plus-sign'> Add new Resource Article</i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="box bordered-box purple-border no-bottom-margin">
                    <div class="box-content box-no-padding">
                      <table class="table table-striped no-bottom-margin">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th>Status</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
<?php
foreach ($db->query("select * from resource_articles order by title") as $resource_article) {
?>
                          <tr>
                            <td><?php echo stripslashes($resource_article['title']); ?></td>
                            <td>
                              <span class="label label-<?php echo ($resource_article["active"]?"success":"important"); ?>"><?php echo ($resource_article["active"]?"Active":"Inactive"); ?></span>
                            </td>
                            <td>
                              <div class="text-right">
                                <a class="btn btn-success btn-xs" href="resource_article_edit.php?id=<?php echo $resource_article['id']; ?>">
                                  <i class="icon-edit"></i>
                                </a>
                                <a class="btn btn-danger btn-xs" href="?delete=<?php echo $resource_article['id']; ?>" onclick="return confirm('Are you sure you want to delete this resource_article user?');">
                                  <i class="icon-remove"></i>
                                </a>
                              </div>
                            </td>
                          </tr>
<?php
}
?>
                        </tbody>
                      </table>
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
