<?php
    include ("includes/application_top.php");

    $mode = 'add';
    if ( !empty($_GET['id']) ) {
        $testimonial = $db->query ("select * from testimonials where id = " . (int)$_GET['id'] . " limit 1")->fetch (PDO::FETCH_ASSOC);
        $localizedLandingPages = $db->query ("select * from localized_landing_pages")->fetchAll (PDO::FETCH_ASSOC);

        if ( $testimonial ) {
            $mode = 'edit';
        }
    }

    $return_data = array (
            'errors'     => array (),
            'revalidate' => false
    );

    uploadImage ('image', 'ContentModel', array (
            array (
                    'width'   => 800,
                    'height'  => 450,
                    'crop'    => true,
                    'preview' => true
            ),
    ));

    if ( !empty($_POST) ) {
        

        if ( empty($_POST['name']) ) {
            $return_data['revalidate'] = true;
        }
        if ( empty($_POST['title']) ) {
            $return_data['revalidate'] = true;
        }
        if ( empty($_POST['company']) ) {
            $return_data['revalidate'] = true;
        }
        if ( empty($_POST['quote']) ) {
            $return_data['revalidate'] = true;
        }


        if ( empty($return_data['revalidate']) && empty($return_data['errors']) ) {
            $db->query('delete from testimonials_to_localized_landing_pages where testimonial_id = ' . (int) $_GET['id']);
            
            foreach ( $_POST['localized_landing_pages'] as $localized_landing_page ) {
                $llpData = array(
                        'testimonial_id' => (int) $_GET['id'],
                        'localized_landing_page_id' => (int) $localized_landing_page
                );
                $db->perform ("testimonials_to_localized_landing_pages", $llpData);
            }
            $data = array (
                    'name'        => $_POST['name'],
                    'title'       => $_POST['title'],
                    'company'     => $_POST['company'],
                    'quote'       => $_POST['quote'],
                    'featured'    => (int)$_POST['featured'],
                    'image'       => $_POST['image_file'],
                    'custom_link' => $_POST['custom_link'],
                    'active'      => (int)$_POST['active']
            );

            if ( $mode == 'add' ) {
                $db->perform ("testimonials", $data);
            }
            else {
                $db->perform ("testimonials", $data, "update", "id = " . (int)$testimonial['id'] . " limit 1");
            }

            header ("Location: testimonials.php");

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
                            'name' => 'Testimonials',
                            'icon' => 'icon-comment',
                            'url'  => 'testimonials.php'
                    ),
                    array (
                            'name' => ucfirst ($mode) . ' Testimonial',
                            'icon' => 'icon-comment',
                    ),
            ));
        ?>

        <div class="row">
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header dark-grey-background">
                        <div class="title">
                            <div class="icon-edit"></div>
                            <?php echo ucfirst ($mode); ?> Testimonial
                        </div>
                    </div>
                    <div class="box-content box-no-padding">
                        <form class="form form-horizontal form-striped" action="" method="post">
                            <?php
                                drawInputBox ('text', 'name', 'Name', $testimonial);
                                drawInputBox ('text', 'title', 'Title', $testimonial);
                                drawImageUploadField ('image', 'Image', $testimonial, ContentModel::getImageFolder ('800x450'), 'Images larger than 800x450 will be resized');
                                drawInputBox ('text', 'company', 'Company', $testimonial);
                                drawTextArea ('quote', 'Quote', $testimonial);
                                drawInputBox ('text', 'custom_link', 'Custom Link', $testimonial);
                                drawSelect ('featured', array (
                                        'No', 'Yes'
                                ), 'Featured', $testimonial);
                                $localizedLandingPagesArray = array();
                                foreach ( $localizedLandingPages as $localizedLandingPage ) {
                                    $checked = $db->query ("select count(*) from testimonials_to_localized_landing_pages where testimonial_id = " . (int)$_GET['id'] . " and localized_landing_page_id = " . (int) $localizedLandingPage['id'] . " limit 1")->fetchColumn ();
                                    $localizedLandingPagesArray[] = array(
                                            'value' => $localizedLandingPage['id'],
                                            'label' => (!empty($localizedLandingPage['city']) ? $localizedLandingPage['city'] . ', ' . $localizedLandingPage['state'] : $localizedLandingPage['state']),
                                            'checked' => (bool)$checked
                                    );
                                    
                                }
                                drawCheckboxes ('localized_landing_pages[]', 'Show on Localized Landing Page(s): ', $localizedLandingPagesArray);
                                drawSelect ('active', array (
                                        'No', 'Yes'
                                ), 'Active', $testimonial);
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
