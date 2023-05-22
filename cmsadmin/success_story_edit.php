<?php
    include ("includes/application_top.php");
    
    $mode = 'add';
    if ( !empty($_GET['id']) ) {
        $story = $db->query ("select * from success_stories where id = " . (int)$_GET['id'] . " limit 1")->fetch (PDO::FETCH_ASSOC);
        if ( $story ) {
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
        if ( empty($_POST['story']) ) {
            $return_data['revalidate'] = true;
        }
        
        if ( empty($return_data['revalidate']) && empty($return_data['errors']) ) {
            
            $data = array (
                'name'             => $_POST['name'],
                'title'            => $_POST['title'],
                'company'          => $_POST['company'],
                'story'            => $_POST['story'],
                'loan_type'        => $_POST['loan_type'],
                'featured'         => (int)$_POST['featured'],
                'image'            => $_POST['image_file'],
                'meta_title'       => $_POST['meta_title'],
                'meta_description' => $_POST['meta_description'],
                'meta_keywords'    => $_POST['meta_keywords'],
                'active'           => (int)$_POST['active']
            );
            
            if ( $mode == 'add' ) {
                $db->perform ("success_stories", $data);
            }
            else {
                $db->perform ("success_stories", $data, "update", "id = " . (int)$story['id'] . " limit 1");
            }
            
            header ("Location: success_stories.php");
            
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
                    'name' => 'Success Stories',
                    'icon' => 'icon-comment',
                    'url'  => 'success_stories.php'
                ),
                array (
                    'name' => ucfirst ($mode) . ' Success Story',
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
                            <?php echo ucfirst ($mode); ?> Success Story
                        </div>
                    </div>
                    <div class="box-content box-no-padding">
                        <form class="form form-horizontal form-striped" action="" method="post">
                            <?php
                                drawInputBox ('text', 'name', 'Name', $story);
                                drawInputBox ('text', 'title', 'Title', $story);
                                drawImageUploadField ('image', 'Image', $story, ContentModel::getImageFolder ('800x450'), 'Images larger than 800x450 will be resized');
                                drawInputBox ('text', 'company', 'Company', $story);
                                drawTinyMCETextArea ('story', 'Story', $story);
                                drawSelect ('loan_type', array (
                                    "term_loan"       => "Triton Term Loan",
                                    "bridge_loan"     => "Trtion Bridge Loan",
                                    "working_capital" => "Working Capital",
                                    "equipment_loans" => "Equipment Loans",
                                    "offer_financing" => "Offer Financing",
                                ), 'Loan Type', $story);
                                drawSelect ('featured', array (
                                    'No', 'Yes'
                                ), 'Featured', $story);
                                drawSelect ('active', array (
                                    'No',
                                    'Yes'
                                ), 'Active', $story);
                            ?>
                            <!-- Meta -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="box">
                                        <div class="box-header dark-grey-background">
                                            <div class="title">
                                                <div class="icon-edit"></div>
                                                <?php echo ucfirst ($mode); ?> Meta Info.
                                            </div>
                                        </div>
                                        <div class="box-content box-no-padding">
                                            <?php
                                                drawInputBox ('text', 'meta_title', 'Title', $story);
                                                drawInputBox ('text', 'meta_description', 'Description', $story);
                                                drawInputBox ('text', 'meta_keywords', 'Keywords', $story);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
