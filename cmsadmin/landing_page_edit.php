<?php
    include ("includes/application_top.php");
    
    $mode = 'add';
    $parent = 1;
    if ( !empty($_GET['parent']) ) {
        $parent = (int)$_GET['parent'];
    }
    if ( !empty($_GET['id']) ) {
        $landing_page = $db->query ("select * from landing_pages where id = " . (int)$_GET['id'] . " limit 1")->fetch (PDO::FETCH_ASSOC);
        if ( $landing_page ) {
            $mode = 'edit';
        }
    }
    
    $return_data = array (
        'errors'     => array (),
        'revalidate' => false
    );
    
    uploadImage ('icon', 'ContentModel', array (
        array (
            'width'   => 340,
            'height'  => 250,
            'crop'    => true,
            'preview' => true
        ),
    ));
    uploadImage ('top_feature_image', 'ContentModel', array (
        array (
            'width'   => 3000,
            'height'  => 3000,
            'crop'    => true,
            'preview' => true
        ),
    ));
    
    if ( !empty($_POST) ) {
        
        /*if ( empty($_POST['title']) ) {
            $return_data['revalidate'] = true;
        }*/
        
        if ( empty($return_data['revalidate']) && empty($return_data['errors']) ) {
            
            $data = array (
                'parent'                     => $parent,
                'page_name'                  => $_POST['page_name'],
                'url_slug'                   => $_POST['url_slug'],
                'headline'                   => $_POST['headline'],
                'icon'                       => $_POST['icon_file'],
                'industry_short_description' => $_POST['industry_short_description'],
                'top_feature_image'          => $_POST['top_feature_image_file'],
                'main_content'               => $_POST['main_content'],
                'secondary_content'          => $_POST['secondary_content'],
                'cta_headline'               => $_POST['cta_headline'],
                'cta_button_1_label'         => $_POST['cta_button_1_label'],
                'cta_button_1_url'           => $_POST['cta_button_1_url'],
                'cta_button_2_label'         => $_POST['cta_button_2_label'],
                'cta_button_2_url'           => $_POST['cta_button_2_url'],
                'cta_button_3_label'         => $_POST['cta_button_3_label'],
                'cta_button_3_url'           => $_POST['cta_button_3_url'],
                'meta_title'       => $_POST['meta_title'],
                'meta_description' => $_POST['meta_description'],
                'meta_keywords'    => $_POST['meta_keywords'],
                'active' => (int)$_POST['active'],
                'display_order' => 0
            );
            
            if ( $mode == 'add' ) {
                $db->perform ("landing_pages", $data);
            }
            else {
                $db->perform ("landing_pages", $data, "update", "id = " . (int)$landing_page['id'] . " limit 1");
            }
            
            header ("Location: landing_pages.php?parent={$parent}");
            
        }
        
    }
    
    addUploadify ();
    addTinyMCE ();
    /*$required_js[] = 'pages/landing_page_edit.js';*/
    $page_icon = "icon-money";
    if($parent == 2){
        $page_icon = "icon-truck";
    }
    include ("includes/header.php");
?>
<div class="row" id="content-wrapper">
    <div class="col-xs-12">
        <?php
            drawHeaderRow (array (
                array (
                    'name' => 'Landing Pages',
                    'icon' => $page_icon,
                    'url'  => 'landing_pages.php'
                ),
                array (
                    'name' => ucfirst ($mode) . ' Landing Page',
                    'icon' => $page_icon,
                ),
            ));
        ?>
        <form class="form form-horizontal form-striped" action="#" method="post">
            <div class="row">
                <div class="col-sm-12">
                    <div class="box">
                        <div class="box-header dark-grey-background">
                            <div class="title">
                                <div class="icon-edit"></div>
                                <?php echo ucfirst ($mode); ?> Landing Page
                            </div>
                        </div>
                        <div class="box-content box-no-padding">
                            <?php
                                drawInputBox ('text', 'page_name', 'Page Name', $landing_page);
                                drawInputBox ('text', 'url_slug', 'URL Slug', $landing_page);
                                drawInputBox ('text', 'headline', 'Headline', $landing_page);
                                drawImageUploadField ('icon', 'Icon', $landing_page, ContentModel::getImageFolder ('340x250'), 'Images larger than 340x250 will be resized');
                                drawInputBox ('text', 'industry_short_description', 'Industry Short Description', $landing_page,'','Shows on icon hover');
                                drawImageUploadField ('top_feature_image', 'Top Feature Image', $landing_page, ContentModel::getImageFolder ('3000x3000'), 'Images larger than 3000x3000 will be resized');
                                drawTinyMCETextArea ('main_content', 'Main Content', $landing_page);
                                drawTinyMCETextArea ('secondary_content', 'Secondary Content', $landing_page);
                                drawInputBox ('text', 'cta_headline', 'CTA Headline', $landing_page);
                                drawInputBox ('text', 'cta_button_1_label', 'CTA Button 1 Label', $landing_page);
                                drawInputBox ('text', 'cta_button_1_url', 'CTA Button 1 URL', $landing_page);
                                drawInputBox ('text', 'cta_button_2_label', 'CTA Button 2 Label', $landing_page);
                                drawInputBox ('text', 'cta_button_2_url', 'CTA Button 2 URL', $landing_page);
                                drawInputBox ('text', 'cta_button_3_label', 'CTA Button 3 Label', $landing_page);
                                drawInputBox ('text', 'cta_button_3_url', 'CTA Button 3 URL', $landing_page);
                                drawSelect ('active', array (
                                    'No', 'Yes'
                                ), 'Active', $landing_page);
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Meta -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="box">
                        <div class="box-header dark-grey-background">
                            <div class="title">
                                <div class="icon-edit"></div>
                                <?php echo ucfirst ($mode); ?> Landing Page Meta Info.
                            </div>
                        </div>
                        <div class="box-content box-no-padding">
                            <?php
                                drawInputBox ('text', 'meta_title', 'Title', $landing_page);
                                drawInputBox ('text', 'meta_description', 'Description', $landing_page);
                                drawInputBox ('text', 'meta_keywords', 'Keywords', $landing_page);
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

                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
<?php
    include ("includes/footer.php");
    include ("includes/application_bottom.php");
?>
