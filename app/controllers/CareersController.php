<?php

class CareersController extends BaseController {

	protected $pageId = 17;

    protected $routes = array(
        '' => array('action' => 'showLanding'),
    );

    public function showLanding() {
        $app = App::getInstance();
        $db  = Database::getInstance();
        $jobListings = $db->query("SELECT * FROM job_listings WHERE active = 1");
        $jobListings = $jobListings->fetchAll(PDO::FETCH_ASSOC);
        $app->template->addRequiredJS("pages/careers.js");
        $app->template->set('jobListings', $jobListings);
 		$app->template->set('page', $this->getPageSectionFields());
        $app->template->setModuleVar('Header', 'meta', Meta::findById($this->getPageId()));
        $app->template->render('careers.php');
    }

}