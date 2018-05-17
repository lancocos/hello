<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->disable();
    
    }
    public function insertAction(){
        $user = new User();
        $user->setName("imwz");
        $user->setPass(sha1("imwz"));
        if($user->save()){
            echo "ok";
        }else{
        
            $messages = $user->getMessages();
            foreach($messages AS $message){
                echo $message;
            }
        }
        $this->view->disable();
    }
    public function formAction(){
        
    }

}

