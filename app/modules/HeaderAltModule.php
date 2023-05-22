<?php

class HeaderAltModule extends BaseModule {

    protected $view = 'HeaderAlt.php';

    public function process() {
        global $cart;
        $this->cart = $cart;

        if (!$this->meta)
            $this->meta = new Meta;
        $this->render();
    }

}
