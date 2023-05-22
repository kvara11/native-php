<?php

class HeaderModule extends BaseModule {

    protected $view = 'Header.php';

    public function process() {
        global $cart;
        $this->cart = $cart;

        if (!$this->meta)
            $this->meta = new Meta;
        $this->render();
    }

}
