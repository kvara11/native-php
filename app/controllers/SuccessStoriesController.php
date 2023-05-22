<?php

class SuccessStoriesController extends BaseController {

	protected $pageId = 8;

    protected $routes = array(
        '/:id' => array('action' => 'showSuccessStory'),
        '' => array('action' => 'showLanding'),        
    );

    public $loanTitles = array(
        "bridge_loan" => "Triton Bridge Loan",
        "term_loan" => "Triton Term Loan",
        "working_capital" => "Working Capital",
        "equipment_loans" => "Equipment Loans",
        "offer_financing" => "Offer Financing"
    );

    public $loanImages = array(
        "bridge_loan" => "/img/working-capital-icon-white.png",
        "term_loan" => "/img/working-capital-icon-white.png",
        "working_capital" => "/img/working-capital-icon-white.png",
        "equipment_loans" => "/img/equipment-loans-icon-white.png",
        "offer_financing" => "/img/offer-financing-icon-white.png"
    );

    public function showLanding() {
        $app = App::getInstance();
        $db  = Database::getInstance();

        $successStories = $db->query("SELECT * FROM success_stories WHERE active = 1");
        $successStories = $successStories->fetchAll(PDO::FETCH_ASSOC);

        $app->template->set('successStories', $successStories);
        $app->template->set('loanTitles', $this->loanTitles);
        $app->template->set('loanImages', $this->loanImages);

        $app->template->set('page', $this->getPageSectionFields());    
        $app->template->setModuleVar('Header', 'meta', Meta::findById($this->getPageId()));
        $app->template->render('success-stories.php');
    }

    public function showSuccessStory($params) {

        $app = App::getInstance();
        $db = Database::getInstance();

        $app->template->set('loanTitles', $this->loanTitles);
        $app->template->set('loanImages', $this->loanImages);

        $successStories = $db->query("SELECT * FROM success_stories WHERE active = 1");
        $successStories = $successStories->fetchAll(PDO::FETCH_ASSOC);

        $app->template->set('successStories', $successStories);

        $successStory = $db->prepare("SELECT * FROM success_stories WHERE id = :id");
        $successStory->execute(array(':id' => $params["id"]));
        $successStory = $successStory->fetch(PDO::FETCH_ASSOC);
        //print_r($successStory);
        $meta = new Meta;
        $meta->setTitle($successStory['meta_title']);
        $meta->setDescription($successStory['meta_description']);
        $meta->setKeywords($successStory['meta_keywords']);

        $app->template->set('page', $this->getPageSectionFields());
        $app->template->set('successStory', $successStory);
        $app->template->setModuleVar('Header', 'meta', $meta);
        $app->template->render('success-story.php');

    }

}
