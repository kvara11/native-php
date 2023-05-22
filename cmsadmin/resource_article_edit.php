<?php
include("includes/application_top.php");

$mode = 'add';
if (!empty($_GET['id'])) {
    $resource_article = $db->query("select * from resource_articles where id = ".(int)$_GET['id']." limit 1")->fetch(PDO::FETCH_ASSOC);
    if ($resource_article) {
        $mode = 'edit';
    }
}

$return_data = array(
  'errors'     => array(),
  'revalidate' => false
);

uploadImage('image', 'ContentModel', array(
  array(
    'width' => 800,
    'height' => 450,
    'crop' => true,
    'preview' => true
  ),
));

if (!empty($_POST)) {

    if (empty($_POST['title'])) {
        $return_data['revalidate'] = true;
    }

    if (empty($return_data['revalidate']) && empty($return_data['errors'])) {

        $data = array(
            'title' => $_POST['title'],
            'main_content' => $_POST['main_content'],
            'image' => $_POST['image_file'],

            'meta_title' => $_POST['meta_title'],
            'meta_description' => $_POST['meta_description'],
            'meta_keywords' => $_POST['meta_keywords'],

            'active' => (int)$_POST['active']
        );
        if ($mode == 'add') {
            $db->perform("resource_articles", $data);
        } else {
            $db->perform("resource_articles", $data, "update", "id = ".(int)$resource_article['id']." limit 1");
        }

        header("Location: resource_articles.php");

    }

}

addUploadify();
addTinyMCE();
$required_js[] = 'pages/resource_article_edit.js';

include("includes/header.php");
?>
          <div class="row" id="content-wrapper">
            <div class="col-xs-12">
<?php
drawHeaderRow(array(
    array(
      'name' => 'Resource Article',
      'icon' => 'icon-folder-open',
      'url'  => 'resource_articles.php'
    ),
    array(
      'name' => ucfirst($mode) . ' Resource Article',
      'icon' => 'icon-folder-open',
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
                        <?php echo ucfirst($mode); ?> Resource Article
                      </div>
                    </div>
                    <div class="box-content box-no-padding">
                        <?php
                          drawInputBox('text', 'title', 'Title', $resource_article);
                          drawTinyMCETextArea('main_content', 'Main Content', $resource_article);
                          drawImageUploadField('image', 'Image', $resource_article, ContentModel::getImageFolder('800x450'), 'Images larger than 800x450 will be resized');
                          drawSelect('active', array(
                              'No', 'Yes'
                          ), 'Active', $resource_article);
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
                        <?php echo ucfirst($mode); ?> Resource Article Meta Info.
                      </div>
                    </div>
                    <div class="box-content box-no-padding">
                        <?php
                          drawInputBox('text', 'meta_title', 'Title', $resource_article);
                          drawInputBox('text', 'meta_description', 'Description', $resource_article);
                          drawInputBox('text', 'meta_keywords', 'Keywords', $resource_article);
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
include("includes/footer.php");
include("includes/application_bottom.php");
?>
