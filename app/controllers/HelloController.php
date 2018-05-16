<?php

class HelloController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        echo "index";
        $this->view->disable();
    }
    public function helloAction(){
        //var_dump($this->di->get("session"));
        //var_dump($this->di->get("flash"));
        var_dump($this->di->get("dispatcher"));
        $this->view->disable();
    }

}

