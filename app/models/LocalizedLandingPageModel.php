<?php
    
    class LocalizedLandingPageModel extends BaseModel
    {
        
        protected $id               = 0;
        protected $state            = '';
        protected $city             = '';
        protected $background_img   = '';
        protected $welcome_msg      = '';
        protected $meta_title       = '';
        protected $meta_description = '';
        protected $meta_keywords    = '';
        
        protected static $table_name   = 'localized_landing_pages';
        protected static $image_folder = 'content';
        
        private function parseWelcomeMessage ()
        {
            $shortCodes = array (
                '{{State}}',
                '{{City}}'
            );
            $replacements = array (
                $this->getState (),
                $this->getCity ()
            );
            return str_replace ($shortCodes, $replacements, $this->welcome_msg);
        }
        
        public function getId ()
        {
            return $this->id;
        }
        
        public function getState ()
        {
            return $this->state;
        }
        
        public function getCity ()
        {
            return $this->city;
        }
        
        public function getBackgroundImage ()
        {
            return $this->background_img;
        }
        
        public function getWelcomeMessage ()
        {
            return $this->parseWelcomeMessage();
        }
        
        public function getMetaTitle ()
        {
            return $this->meta_title;
        }
        
        public function getMetaDescription ()
        {
            return $this->meta_description;
        }
        
        public function getMetaKeywords ()
        {
            return $this->meta_keywords;
        }
        
        public static function findById ($id)
        {
            return current (self::find (array (
                'id = ' . (int)$id
            )));
        }
        
        public static function findByState ($state)
        {
            return current (self::find (array (
                'state = "' . $state . '"',
                "city =''",
                'active'
            )));
        }
    
        public static function findByCity ($city)
        {
            return current (self::find (array (
                'city = "' . $city . '"',
                'active'
            )));
        }
        
    }
