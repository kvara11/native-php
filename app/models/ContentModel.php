<?php

class ContentModel extends BaseModel {

    protected $id = 0;
    protected $name = '';
    protected $title_1 = '';
    protected $title_2 = '';
    protected $content_1 = '';
    protected $content_2 = '';
    protected $image_1 = '';
    protected $image_2 = '';
    protected $image_3 = '';
    protected $meta_title = '';
    protected $meta_description = '';
    protected $meta_keywords = '';

    protected static $table_name = 'content';
    protected static $image_folder = 'content';

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getTitle($i = 1) {
        return $this->{'title_'.$i};
    }

    public function getContent($i = 1) {
        return $this->{'content_'.$i};
    }

    public function getImage() {
        return $this->image;
    }

    public function getMetaTitle() {
        return $this->meta_title;
    }

    public function getMetaDescription() {
        return $this->meta_description;
    }

    public function getMetaKeywords() {
        return $this->meta_keywords;
    }

    public static function findById($id) {
        return current(self::find(array('id = '.(int)$id)));
    }

}
