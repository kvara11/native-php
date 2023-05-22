<?php
include("includes/application_top.php");

$mode = 'add';
if (!empty($_GET['id'])) {
    $offer_financing_faq = $db->query("select * from offer_financing_faqs where id = ".(int)$_GET['id']." limit 1")->fetch(PDO::FETCH_ASSOC);
    if ($offer_financing_faq) {
        $mode = 'edit';
    }
}

$return_data = array(
  'errors'     => array(),
  'revalidate' => false
);

if (!empty($_POST)) {

    if (empty($_POST['question'])) {
        $return_data['revalidate'] = true;
    }
    if (empty($_POST['answer'])) {
        $return_data['revalidate'] = true;
    } 

    if (empty($return_data['revalidate']) && empty($return_data['errors'])) {

        $data = array(
            'question' => $_POST['question'],
            'answer' => $_POST['answer'],
            'active' => (int)$_POST['active']
        );
        if ($mode == 'add') {
            $db->perform("offer_financing_faqs", $data);
        } else {
            $db->perform("offer_financing_faqs", $data, "update", "id = ".(int)$offer_financing_faq['id']." limit 1");
        }

        header("Location: offer_financing_faqs.php");

    }

}

addUploadify();
addTinyMCE();
$required_js[] = 'pages/offer_financing_faq_edit.js';

include("includes/header.php");
?>
          <div class="row" id="content-wrapper">
            <div class="col-xs-12">
<?php
drawHeaderRow(array(
    array(
      'name' => 'Offer Financing FAQ',
      'icon' => 'icon-question',
      'url'  => 'offer_financing_faqs.php'
    ),
    array(
      'name' => ucfirst($mode) . ' Offer Financing FAQ',
      'icon' => 'icon-question',
    ),
));
?>

              <div class="row">
                <div class="col-sm-12">
                  <div class="box">
                    <div class="box-header dark-grey-background">
                      <div class="title">
                        <div class="icon-edit"></div>
                        <?php echo ucfirst($mode); ?> Offer Financing FAQ
                      </div>
                    </div>
                    <div class="box-content box-no-padding">
                      <form class="form form-horizontal form-striped" action="" method="post">
                        <?php
                          drawInputBox('text', 'question', 'Question', $offer_financing_faq);
                          drawTinyMCETextArea('answer', 'Answer', $offer_financing_faq);
                          drawSelect('active', array(
                              'No', 'Yes'
                          ), 'Active', $offer_financing_faq);
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
