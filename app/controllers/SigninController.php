<?php

class SigninController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $name = $this->request->get('name');
        $passwd = $this->request->get('pass');
        $record = User::findFirst([
            'name=:name: AND pass=:pass:',
            'bind'=>[
                'name'=>$name,
                'pass'=>sha1($passwd),
                ]
            ]);
        if($record){
            echo "welcome ".$record->name;
            $this->session->set(
                'user',$record
            );
            $this->response->redirect('products/index');
                
        }
        $this->view->disable();

    }

}

