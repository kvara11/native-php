<?php
include("includes/application_top.php");

if (!empty($_GET['delete'])) {
    $db->query("delete from job_listings where job_id = ".(int)$_GET['delete']." limit 1");
    header("Location: job_listings.php");
    exit();
}

include("includes/header.php");
?>
          <div class="row" id="content-wrapper">
            <div class="col-xs-12">

              <?php
                drawHeaderRow(array(
                    array(
                      'name' => 'Job Listings',
                      'icon' => 'icon-briefcase',
                      'url'  => 'job_listings.php'
                    ),
                ));
              ?>
              <div class='row'>
                <div class='col-sm-12'>
                  <div class='box'>
                    <div class='box-content'>
                      <a class="btn btn-success" href="job_listing_edit.php"><i class='icon-plus-sign'></i> Add New Job Listing</a>
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
                            <th>Active</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ( $db->query("select job_id, job_title, active from job_listings order by job_id") as $job_listing) { ?>
                            <tr>
                              <td><?php echo stripslashes($job_listing['job_title']); ?></td>
                              <td>
                                <span class="label label-<?php echo ($job_listing["active"]?"success":"important"); ?>"><?php echo ($job_listing["active"]?"Active":"Inactive"); ?></span>
                              </td>
                              <td>
                                <div class="text-right">
                                  <a class="btn btn-success btn-xs" href="job_listing_edit.php?id=<?php echo $job_listing['job_id']; ?>">
                                    <i class="icon-edit"></i>
                                  </a>
                                  <a class="btn btn-danger btn-xs" href="?delete=<?php echo $job_listing['job_id']; ?>" onclick="return confirm('Are you sure you want to delete this job listing?');">
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
