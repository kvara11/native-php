<?php
include("includes/application_top.php");

if (!empty($_GET['delete'])) {
    $db->query("delete from success_stories where id = ".(int)$_GET['delete']." limit 1");
    header("Location: success_stories.php");
    exit();
}

include("includes/header.php");
?>
          <div class="row" id="content-wrapper">
            <div class="col-xs-12">

              <?php
                drawHeaderRow(array(
                    array(
                      'name' => 'Success Stories',
                      'icon' => 'icon-comment',
                      'url'  => 'success_stories.php'
                    ),
                ));
              ?>
              <div class='row'>
                <div class='col-sm-12'>
                  <div class='box'>
                    <div class='box-content'>
                      <a class="btn btn-success" href="success_story_edit.php"><i class='icon-plus-sign'></i> Add New Success Story</a>
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
                            <th>Name</th>
                            <th>Title</th>
                            <th>Featured</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($db->query("select * from success_stories order by id") as $story) { ?>
                            <tr>
                              <td><?php echo stripslashes($story['name']); ?></td>
                              <td><?php echo stripslashes($story['title']); ?></td>
                              <td>
                                <span class="label label-<?php echo ($story["featured"]?"success":"important"); ?>"><?php echo ($story["featured"]?"Yes":"No"); ?></span>
                              </td>
                              <td>
                                <span class="label label-<?php echo ($story["active"]?"success":"important"); ?>"><?php echo ($story["active"]?"Active":"Inactive"); ?></span>
                              </td>
                              <td>
                                <div class="text-right">
                                  <a class="btn btn-success btn-xs" href="success_story_edit.php?id=<?php echo $story['id']; ?>">
                                    <i class="icon-edit"></i>
                                  </a>
                                  <a class="btn btn-danger btn-xs" href="?delete=<?php echo $story['id']; ?>" onclick="return confirm('Are you sure you want to delete this story?');">
                                    <i class="icon-remove"></i>
                                  </a>
                                </div>
                              </td>
                            </tr>
                          <?php } ?>
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
