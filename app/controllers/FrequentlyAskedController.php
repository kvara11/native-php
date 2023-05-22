<?php

class FrequentlyAskedController extends BaseController {

	protected $pageId = 6;

    protected $routes = array(
        '' => array('action' => 'showLanding'),
    );
    
    public function showLanding() {
        $app = App::getInstance();
        $db  = Database::getInstance();

        $general        = $db->query("SELECT question,answer FROM general_faqs WHERE active = 1");
        $general        = $general->fetchAll(PDO::FETCH_ASSOC);

        $workingCapital = $db->query("SELECT question,answer FROM working_capital_faqs WHERE active = 1");
        $workingCapital = $workingCapital->fetchAll(PDO::FETCH_ASSOC);

        $equipmentLoans = $db->query("SELECT question,answer FROM equipment_loan_faqs WHERE active = 1");
        $equipmentLoans = $equipmentLoans->fetchAll(PDO::FETCH_ASSOC);

        $offerFinancing = $db->query("SELECT question,answer FROM offer_financing_faqs WHERE active = 1");
        $offerFinancing = $offerFinancing->fetchAll(PDO::FETCH_ASSOC);

        $app->template->set('page', $this->getPageSectionFields());

        $app->template->set('general', $general);
        $app->template->set('workingCapital', $workingCapital);
        $app->template->set('equipmentLoans', $equipmentLoans);
        $app->template->set('offerFinancing', $offerFinancing);        

        $app->template->setModuleVar('Header', 'meta', Meta::findById($this->getPageId()));
        $app->template->render('faqs.php');
    }

}