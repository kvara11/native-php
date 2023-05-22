<?php
include("includes/application_top.php");

if (!empty($_GET['delete'])) {
    $db->query("delete from general_faqs where id = ".(int)$_GET['delete']." limit 1");
    header("Location: general_faqs.php");
    exit();
}

include("includes/header.php");
?>
          <div class="row" id="content-wrapper">
            <div class="col-xs-12">

              <?php
                drawHeaderRow(array(
                    array(
                      'name' => 'General FAQs',
                      'icon' => 'icon-question',
                      'url'  => 'general_faqs.php'
                    ),
                ));
              ?>
              <div class='row'>
                <div class='col-sm-12'>
                  <div class='box'>
                    <div class='box-content'>
                      <a class="btn btn-success" href="general_faq_edit.php"><i class='icon-plus-sign'></i> Add new General FAQ</a>
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
                            <th>Question</th>
                            <th>Status</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($db->query("select * from general_faqs order by question") as $faq) { ?>
                            <tr>
                              <td><?php echo stripslashes($faq['question']); ?></td>
                              <td>
                                <span class="label label-<?php echo ($faq["active"]?"success":"important"); ?>"><?php echo ($faq["active"]?"Active":"Inactive"); ?></span>
                              </td>
                              <td>
                                <div class="text-right">
                                  <a class="btn btn-success btn-xs" href="general_faq_edit.php?id=<?php echo $faq['id']; ?>">
                                    <i class="icon-edit"></i>
                                  </a>
                                  <a class="btn btn-danger btn-xs" href="?delete=<?php echo $faq['id']; ?>" onclick="return confirm('Are you sure you want to delete this faq?');">
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
