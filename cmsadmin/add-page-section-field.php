<?php
    
    include ("includes/application_top.php");
    
    // error_reporting(E_ALL);
    // ini_set("display_errors", 1);
    
    if ( isset($_GET['id']) ) {
        
        $sectionId = (int)$_GET['id'];
        
    }
    else if ( isset($_POST['section_id']) ) {
        
        $sectionId = (int)$_POST['section_id'];
        
    }
    else {
        
        echo 'Invalid request';
        die;
        
    }
    
    $validator_errors = array ();
    if ( !empty($_POST) ) {
        
        if ( empty($revalidate) && empty($validator_errors) ) {
            
            $page_section_id = $db->quote ($_POST['section_id']);
            $code = $db->quote ($_POST['code']);
            $name = $db->quote ($_POST['name']);
            $type = $db->quote ($_POST['type']);
            $value = $db->quote ($_POST['value']);
            
            $query = $db->prepare ("INSERT INTO page_section_fields (`page_section_id`,`code`,`name`,`type`,`value`) VALUES ($page_section_id,$code,$name,$type,$value)");
            
            $query->execute ();
            
            header ("Location: edit-page-section-fields.php?id=$sectionId&saved=true", true, 301);
            exit();
            
        }
        
    }
    
    include ("includes/header.php");

?>
<div class="row" id="content-wrapper">
    <div class="col-xs-12">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-header">
                    <h1 class="pull-left">
                        <i class="icon-plus-sign"></i>
                        <span>Add new Field</span>
                    </h1>
                </div>
            </div>
        </div>
        <?php
            if ( isset($_GET['saved']) ) {
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class='alert alert-success alert-dismissable'>
                            <a class="close" data-dismiss="alert" href="#">&times;</a>
                            <h4><i class='icon-ok-sign'></i> Saved!</h4>
                            Content saved successfully
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header dark-grey-background">
                        <div class="title">
                            <div class="icon-edit"></div>
                            <?php echo $sectionName; ?> (pid: <?php echo $sectionId; ?> )
                        </div>
                    </div>
                    <div class="box-content box-no-padding">
                        <form class="form form-horizontal form-striped" action="add-page-section-field.php"
                              method="post">
                            <input type="hidden" name="section_id" value="<?php echo $sectionId; ?>">
                            <?php
                                
                                drawInputBoxAlternate ('text', 'code', 'Name', '');
                                drawInputBoxAlternate ('text', 'name', 'Label', '');
                                drawSelectAlternate ('type',
                                    array (
                                        'text'    => 'Text',
                                        'textarea'    => 'Textarea',
                                        'wysiwyg' => 'Rich Text Editor',
                                        'image'   => 'Image'
                                    ),
                                    'Type', 'text');
                                drawInputBoxAlternate ('text', 'value', 'Value', '');
                            
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
