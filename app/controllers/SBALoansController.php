<?php

class SBALoansController extends BaseController {

	protected $pageId = 24;

    protected $routes = array(
        '' => array('action' => 'showLanding'),
    );

    public function showLanding() {
        $app = App::getInstance();
        $db  = Database::getInstance();
        $jobListings = $db->query("SELECT * FROM job_listings WHERE active = 1");
        $jobListings = $jobListings->fetchAll(PDO::FETCH_ASSOC);
        $app->template->set('jobListings', $jobListings);
 		$app->template->set('page', $this->getPageSectionFields());
        $app->template->setModuleVar('Header', 'meta', Meta::findById($this->getPageId()));
        $app->template->render('sba-loans.php');
    }

}