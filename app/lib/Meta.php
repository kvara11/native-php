<?php
/**
 * @author    Chris Neal
 * @version   1.0
 * @copyright Copyright (c) 2014, Analog Republic
 **/

class Meta {

    private $default_title = 'Default Title';

    private $separator = ' | ';
    private $title = '';
    private $description = '';
    private $keywords = '';

    private $show_og = false;
    private $og_site_name = 'Default Title';
    private $og_title = '';
    private $og_description = '';
    private $og_image = '';
    private $og_type = 'article';

    public function setTitle($title) {
        if (is_array($title)) {
            $this->title = implode($this->separator, $title);
        } else
            $this->title = $title;
        return $this;
    }

    public function getTitle() {
        if (!empty($this->title))
            return $this->title;

        return $this->default_title;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setKeywords($keywords) {
        $this->keywords = $keywords;
        return $this;
    }

    public function getKeywords() {
        return $this->keywords;
    }

    public function getShowOG(){
        return $this->show_og;
    }

    public function setShowOG($show_og) {
        $this->show_og = (bool)$show_og;
        return $this;
    }

    public function getOGSiteName() {
        return $this->og_site_name;
    }

    public function setOGSiteName($og_site_name) {
        $this->og_site_name = $og_site_name;
        return $this;
    }

    public function getOGTitle() {
        return $this->og_title;
    }

    public function setOGTitle($og_title) {
        if (is_array($og_title)) {
            $this->og_title = implode($this->separator, $og_title);
        } else
            $this->og_title = $og_title;
        return $this;
    }

    public function getOGDescription() {
        return $this->og_description;
    }

    public function setOGDescription($og_description) {
        $this->og_description = $og_description;
        return $this;
    }

    public function getOGImage() {
        return $this->og_image;
    }

    public function setOGImage($og_image) {
        $this->og_image = $og_image;
        return $this;
    }

    public function getOGType() {
        return $this->og_type;
    }

    public function setOGType($og_type) {
        $this->og_type = $og_type;
        return $this;
    }

    public static function findById($id) {
        $db = Database::getInstance();
        $meta_row = $db->query('select * from page_meta where id = '.(int)$id.' limit 1')->fetch(PDO::FETCH_ASSOC);
        if (!$meta_row)
            return false;

        $meta = new self;
        $meta->setTitle($meta_row['title'])->setDescription($meta_row['description'])->setKeywords($meta_row['keywords']);
        return $meta;
    }

}
