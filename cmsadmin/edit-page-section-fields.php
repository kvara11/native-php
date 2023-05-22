<?php

include("includes/application_top.php");

$required_js[] = '//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js';
/*$required_js[] = '//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/languages/php.min.js';*/
$required_js[] = 'highlightinit.js';
$required_css[] = '//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/dracula.min.css';
if (isset($_GET['id'])) {
  
  $sectionId = (int)$_GET['id'];

} else if (isset($_POST['section_id'])) {
  
  $sectionId = (int)$_POST['section_id'];

} else {
  
  echo 'Invalid request';
  die;

}
if(isset($_GET['delete'])){
    $db->query("delete from page_sections where id = " . $sectionId);
    header("Location: index.php?&deleted=true", true, 301);
    exit();
}
$pageSection = $db->query("select name,page_id from page_sections where id = " . $sectionId);
$pageSection = $pageSection->fetch(PDO::FETCH_ASSOC);

$sectionName = $pageSection['name'];

$page = $db->query("select name,icon from pages where id = " . (int)$pageSection['page_id']);
$page = $page->fetch(PDO::FETCH_ASSOC);

$pageName = $page['name'];
$pageIcon = $page['icon'];

$pageSectionFields = $db->query("select * from page_section_fields where page_section_id = " . $sectionId . " ORDER BY sort_order ASC");
$pageSectionFields = $pageSectionFields->fetchAll(PDO::FETCH_ASSOC);

foreach ($pageSectionFields as $key => $field) {
  
  if ($field['type'] == 'image') {

    uploadImage($field['code'], 'ContentModel', array(
      array(
        'width' => 3000,
        'height' => 3000,
        'crop' => true,
        'preview' => true
      ),
    ));

  } 
}

$validator_errors = array();
if (!empty($_POST)) {

    $validFields = array();

    foreach ($pageSectionFields as $key => $value) {
      
      $validFields[$value['code']] = $value['value'];

    }

    if (empty($revalidate) && empty($validator_errors)) {

        foreach ($_POST as $key => $field) {

          $field = $db->quote($field);
          $key = $db->quote($key);

          if (strpos($key, '_file')) {

            $key = str_replace('_file', '', $key);

          }

          $query = $db->prepare("UPDATE page_section_fields SET value=$field WHERE code = $key AND page_section_id = $sectionId");
          $query->execute();

        }

        header("Location: edit-page-section-fields.php?id=$sectionId&saved=true", true, 301);
        exit();

    }

}

addUploadify();
addTinyMCE();
include("includes/header.php");

?>
          <div class="row" id="content-wrapper">
            <div class="col-xs-12">

              <div class="row">
                <div class="col-sm-12">
                  <div class="page-header">
                    <h1 class="pull-left">
                      <i class="<?php echo $pageIcon; ?>"></i>
                      <span><?php echo $pageName; ?> (pid: <?php echo $pageSection['page_id']; ?> )</span>
                    </h1>
                    <div class="pull-right">
                      <ul class="breadcrumb">
                        <li class="active">
                          <a class="btn btn-success" href="add-page-section-field.php?id=<?php echo $sectionId; ?>"><i class='icon-plus-sign'></i> Add new Field</a>
                        </li>
                          <li class="active">
                              <a class="btn btn-danger" href="edit-page-section-fields.php?id=<?php echo $sectionId; ?>&delete=true"><i class='icon-trash'></i> Delete this Section</a>
                          </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <?php
                if (isset($_GET['saved'])) {
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
                        <?php echo $sectionName; ?>
                      </div>
                    </div>
                    <div class="box-content box-no-padding">
                      <form class="form form-horizontal form-striped" action="edit-page-section-fields.php" method="post">
                        <input type="hidden" name="section_id" value="<?php echo $sectionId; ?>">
                        <?php
                          
                          foreach ($pageSectionFields as $key => $field) {
                            if (strpos($field['code'], 'recently_funded') === false) {
                              if (strtolower($field['code']) == 'active') {

                                drawSelectAlternate($field['code'], array(
                                    'No', 'Yes'
                                ), $field['name'], $field['value']);

                              } else if ($field['type'] == 'text') {

                                drawInputBoxAlternate('text', $field['code'], $field['name'], $field['value']);

                              } else if ($field['type'] == 'image') {

                                drawImageUploadFieldAlternate($field['code'], $field['name'], $field['value'], ContentModel::getImageFolder('3000x3000'), 'Images larger than 3000x3000 will be resized');

                              } else if ($field['type'] == 'wysiwyg') {

                                drawTinyMCETextAreaAlternate($field['code'], $field['name'], $field['value']);

                              }else if ($field['type'] == 'textarea') {

                                drawTextAreaAlternate($field['code'], $field['name'], $field['value']);

                              }
                            }
                            echo '<pre><code class="php">&#x3C;?php echo ' . ($field['type'] == 'image'? 'MAIN_IMAGE_FOLDER .' : '') .' $page[\'' .$sectionName .'\'][\'' . $field['code'] . '\']; ?&#x3E;</code></pre>';
                          }

                          //Sorts page_section_fields based on field code for grouping recently_funded
                          $pageSectionCodes = array();
                          foreach ($pageSectionFields as $key => $pageSectionField) {
                              $pageSectionCodes[$key] = $pageSectionField['code'];
                          }
                          array_multisort($pageSectionCodes, SORT_ASC, $pageSectionFields);

                          // Show recently funded fields after main content fields
                          foreach ($pageSectionFields as $key => $field) {
                            if (strpos($field['code'], 'recently_funded') !== false) {
                              
                              if (strtolower($field['code']) == 'active') {

                                drawSelectAlternate($field['code'], array(
                                    'No', 'Yes'
                                ), $field['name'], $field['value']);

                              } else if ($field['type'] == 'text') {

                                drawInputBoxAlternate('text', $field['code'], $field['name'], $field['value']);

                              } else if ($field['type'] == 'image') {

                                drawImageUploadFieldAlternate($field['code'], $field['name'], $field['value'], ContentModel::getImageFolder('3000x3000'), 'Images larger than 3000x3000 will be resized');

                              } else if ($field['type'] == 'wysiwyg') {

                                drawTinyMCETextAreaAlternate($field['code'], $field['name'], $field['value']);

                              }

                            }
                          }

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
include("includes/footer.php");

include("includes/application_bottom.php");
?>
