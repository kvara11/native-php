<?php
    include ("includes/application_top.php");

    $mode = 'add';
    if ( !empty($_GET['id']) ) {
        $job_listing_page = $db->query ("select * from job_listings where job_id = " . (int)$_GET['id'] . " limit 1")->fetch (PDO::FETCH_ASSOC);
        if ( $job_listing_page ) {
            $mode = 'edit';
        }
    }

    $return_data = array (
            'errors'     => array (),
            'revalidate' => false
    );
    
    if ( !empty($_POST) ) {
        if ( empty($_POST['job_title']) ) {
            $return_data['revalidate'] = true;
            $return_data['errors'][] = "Title is required.";
        }
        if ( empty($_POST['job_body']) ) {
            $return_data['revalidate'] = true;
            $return_data['errors'][] = "Body is required.";
        }
        

        if ( empty($return_data['revalidate']) && empty($return_data['errors']) ) {
            
            $data = array (
                    'job_title'      => $_POST['job_title'],
                    'job_body'      => $_POST['job_body'],
                    'active'         => (int)$_POST['active']
            );

            if ( $mode == 'add' ) {
                $db->perform ("job_listings", $data);
            }
            else {
                $db->perform ("job_listings", $data, "update", "job_id = " . (int)$job_listing_page['job_id'] . " limit 1");
            }

            header ("Location: job_listings.php");

        }

    }

    addUploadify ();
    addTinyMCE ();

    include ("includes/header.php");
?>
<div class="row" id="content-wrapper">
    <div class="col-xs-12">
        <?php
            drawHeaderRow (array (
                    array (
                            'name' => 'Job Listings',
                            'icon' => 'icon-briefcase',
                            'url'  => 'job_listings.php'
                    ),
                    array (
                            'name' => ucfirst ($mode) . ' Job Listing',
                            'icon' => 'icon-briefcase',
                    ),
            ));
        ?>

        <div class="row">
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header dark-grey-background">
                        <div class="title">
                            <div class="icon-edit"></div>
                            <?php echo ucfirst ($mode); ?> Job Listing
                        </div>
                    </div>
                    <div class="box-content box-no-padding">
                        <form class="form form-horizontal form-striped" action="" method="post">
                            <?php
                                
                                drawInputBox ('text', 'job_title', 'Job Title', $job_listing_page);
                                
                                drawTinyMCETextArea ('job_body', 'Job Post Body', $job_listing_page,array(),array(),$helpers);
                                drawSelect ('active', array (
                                        'No',
                                        'Yes'
                                ), 'Active', $job_listing_page);
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
    include ("includes/footer.php");
    include ("includes/application_bottom.php");
?>
