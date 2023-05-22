<?php
    include ("includes/application_top.php");

    $mode = 'add';
    if ( !empty($_GET['id']) ) {
        $localized_landing_page = $db->query ("select * from localized_landing_pages where id = " . (int)$_GET['id'] . " limit 1")->fetch (PDO::FETCH_ASSOC);
        if ( $localized_landing_page ) {
            $mode = 'edit';
        }
    }

    $return_data = array (
            'errors'     => array (),
            'revalidate' => false
    );

    uploadImage ('background_img', 'ContentModel', array (
            array (
                    'width'   => 3000,
                    'height'  => 3000,
                    'crop'    => true,
                    'preview' => true
            ),
    ));

    if ( !empty($_POST) ) {

        if ( empty($_POST['state']) ) {
            $return_data['revalidate'] = true;
            $return_data['errors'][] = "State is required.";
        }
        

        if ( empty($return_data['revalidate']) && empty($return_data['errors']) ) {

            $data = array (
                    'state'          => $_POST['state'],
                    'city'           => $_POST['city'],
                    'background_img' => $_POST['background_img_file'],
                    'welcome_msg'    => $_POST['welcome_msg'],
                    'active'         => (int)$_POST['active']
            );

            if ( $mode == 'add' ) {
                $db->perform ("localized_landing_pages", $data);
            }
            else {
                $db->perform ("localized_landing_pages", $data, "update", "id = " . (int)$localized_landing_page['id'] . " limit 1");
            }

            header ("Location: localized_landing_pages.php");

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
                            'name' => 'Localized Landing Pages',
                            'icon' => 'icon-globe',
                            'url'  => 'localized_landing_pages.php'
                    ),
                    array (
                            'name' => ucfirst ($mode) . ' Localized Landing Page',
                            'icon' => 'icon-globe',
                    ),
            ));
        ?>

        <div class="row">
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header dark-grey-background">
                        <div class="title">
                            <div class="icon-edit"></div>
                            <?php echo ucfirst ($mode); ?> Localized Landing Page
                        </div>
                    </div>
                    <div class="box-content box-no-padding">
                        <form class="form form-horizontal form-striped" action="" method="post">
                            <?php
                                $states = array ('DEFAULT' => 'DEFAULT');
                                
                                foreach($db->query("select zone_code, zone_name from zones where zone_country_id = 223")->fetchAll(PDO::FETCH_ASSOC) as $zone){
                                    $states[$zone['zone_name']] = $zone['zone_name'];
                                }
                                drawSelect ('state', $states, 'State', $localized_landing_page);
                                drawInputBox ('text', 'city', 'City', $localized_landing_page);
                                
                                drawImageUploadField ('background_img', 'Background Image', $localized_landing_page, ContentModel::getImageFolder ('3000x3000'), 'Images larger than 3000x3000 will be resized');
                                $helpers = array(
                                        '<strong>Replacements:</strong>',
                                        '<ul class="help-block"><li>{{State}} <i class="icon-angle-right"></i> State name.</li></ul>',
                                        '<ul class="help-block"><li>{{City}} <i class="icon-angle-right"></i> City name.</li></ul>'
                                );
                                drawTinyMCETextArea ('welcome_msg', 'Welcome Message', $localized_landing_page,array(),array(),$helpers);
                                drawSelect ('active', array (
                                        'No',
                                        'Yes'
                                ), 'Active', $localized_landing_page);
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
