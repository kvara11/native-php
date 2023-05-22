<?php

class HelpController extends BaseController {

	protected $pageId = 5;

    protected $routes = array(
        '' => array('action' => 'showLanding'),
    );

    public function showLanding() {
        $app = App::getInstance();
        $db = Database::getInstance();
        
        $resourceArticles = $db->query("SELECT * FROM resource_articles WHERE active='1' ORDER BY id DESC");
		$resourceArticles = $resourceArticles->fetchAll(PDO::FETCH_ASSOC);

 		$app->template->set('page', $this->getPageSectionFields());
 		$app->template->set('resourceArticles', $resourceArticles);
        $app->template->setModuleVar('Header', 'meta', Meta::findById($this->getPageId()));
        $app->template->render('helpful-resources.php');
    }

}