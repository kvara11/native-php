<?php
/**
 * @author    Chris Neal
 * @version   1.0
 * @copyright Copyright (c) 2014, Analog Republic
 **/

abstract class BaseController {

	protected $pageId;

    public function __construct() {}

	protected function getPageId() {

		return $this->pageId;

	}

    protected function setPageId($pageId) {

        $this->pageId = $pageId;

    }

    public function getPageSectionFields() {

        $db = Database::getInstance();
        $pageSections = $db->prepare("SELECT name,id FROM page_sections WHERE page_id = :id");
        $pageSections->execute(array(':id' => $this->getPageId()));
        $pageSections = $pageSections->fetchAll(PDO::FETCH_ASSOC);

        $page = array();

        foreach ($pageSections as $sectionKey => $pageSection) {
            
            $page[$pageSection['name']] = array();

            $pageSectionFields = $db->query("SELECT * FROM page_section_fields WHERE page_section_id = " . $pageSection['id']);
            $pageSectionFields = $pageSectionFields->fetchAll(PDO::FETCH_ASSOC);

            foreach ($pageSectionFields as $fieldKey => $pageSectionField) {
                
                $page[$pageSection['name']][$pageSectionField['code']] = $pageSectionField['value'];

            }

        }

        return $page;

    }

    public function Index($params = array()) {
        $app = App::getInstance();
        $app->router->setRoutes($this->routes);
        $app->router->parseRoute();
    }

}
