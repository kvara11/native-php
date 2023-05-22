<?php
include("includes/application_top.php");

if (!empty($_GET['delete'])) {
    $db->query("delete from testimonials where id = ".(int)$_GET['delete']." limit 1");
    header("Location: testimonials.php");
    exit();
}

include("includes/header.php");
?>
          <div class="row" id="content-wrapper">
            <div class="col-xs-12">

              <?php
                drawHeaderRow(array(
                    array(
                      'name' => 'Testimonials',
                      'icon' => 'icon-comment',
                      'url'  => 'testimonials.php'
                    ),
                ));
              ?>
              <div class='row'>
                <div class='col-sm-12'>
                  <div class='box'>
                    <div class='box-content'>
                      <a class="btn btn-success" href="testimonial_edit.php"><i class='icon-plus-sign'></i> Add New Testimonial</a>
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
                          <?php foreach ($db->query("select * from testimonials order by id") as $testimonial) { ?>
                            <tr>
                              <td><?php echo stripslashes($testimonial['name']); ?></td>
                              <td><?php echo stripslashes($testimonial['title']); ?></td>
                              <td>
                                <span class="label label-<?php echo ($testimonial["featured"]?"success":"important"); ?>"><?php echo ($testimonial["featured"]?"Yes":"No"); ?></span>
                              </td>
                              <td>
                                <span class="label label-<?php echo ($testimonial["active"]?"success":"important"); ?>"><?php echo ($testimonial["active"]?"Active":"Inactive"); ?></span>
                              </td>
                              <td>
                                <div class="text-right">
                                  <a class="btn btn-success btn-xs" href="testimonial_edit.php?id=<?php echo $testimonial['id']; ?>">
                                    <i class="icon-edit"></i>
                                  </a>
                                  <a class="btn btn-danger btn-xs" href="?delete=<?php echo $testimonial['id']; ?>" onclick="return confirm('Are you sure you want to delete this testimonial?');">
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
