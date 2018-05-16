<?php

class HelloController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        echo 111;
        $this->view->disable();
    }
    public function helloAction(){
        echo 222;
        $this->view->disable();
    }

}

