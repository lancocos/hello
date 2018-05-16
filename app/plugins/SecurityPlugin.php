<?php
use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Acl;
use Phalcon\Acl\Role;
use Phalcon\Acl\Adapter\Memory as AclList;
use Phalcon\Acl\Resource;

class SecurityPlugin extends Plugin
{
    private $acl;
    private $role;
    private $privateResources = [
        "companies"    => ["index", "search", "new", "edit", "save", "create", "delete"],
        "products"     => ["index", "search", "new", "edit", "save", "create", "delete"],
        "producttypes" => ["index", "search", "new", "edit", "save", "create", "delete"],
        "invoices"     => ["index", "profile"],
    ];
    private $publicResources = [
        "index"    => ["index"],
        "about"    => ["index"],
        "register" => ["index"],
        "errors"   => ["show404", "show500"],
        "session"  => ["index", "register", "start", "end"],
        "contact"  => ["index", "send"],
    ];
    public function __construct(){
        echo 000;
        $this->acl = new AclList();
        $this->acl->setDefaultAction(
            Acl::DENY
        );
        $roles = [
            "users"  => new Role("Users"),
            "guests" => new Role("Guests"),
        ];

        foreach ($roles as $role) {
            $this->acl->addRole($role);
        }
        foreach ($this->privateResources as $resourceName => $actions) {
            $this->acl->addResource(
                new Resource($resourceName),
                $actions
            );
        }
        foreach ($this->publicResources as $resourceName => $actions) {
            $this->acl->addResource(
                new Resource($resourceName),
                $actions
            );
        }
        
    }
    public function beforeExecuteRoute()
    {
        $auth = $this->session->get("auth");

        if (!$auth) {
            $this->role = "Guests";
        } else {
            $this->role = "Users";
        }
        echo $this->role;
        echo $controller = $this->dispatcher->getControllerName();
        echo $action     = $this->dispatcher->getActionName();
        var_dump($this->acl);
        
        echo 111;
    }
    public function beforeDispatchLoop()
    {
      echo 222;  
    
    }
    public function beforeDispatch()
    {
        
    
    }
    public function initialize()
    {
        
    
    }
    public function afterExecuteRoute()
    {
        
    
    }
    public function beforeNotFoundAction()
    {
        
    
    }
    public function beforeException()
    {
        
    
    }
    public function afterDispatch()
    {
        
    
    }
    public function afterDispatchLoop()
    {
        
    
    }
    
}