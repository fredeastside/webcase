<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 22.01.12
 * Time: 18:56
 */
 class Router {
     private $registry;
     private $args = array();

     private $class;
     public $controller;
     public $action;

     function __construct($registry)
     {
         $this->registry = $registry;
     }

     public function loader()
     {
         $this->getController();

         $controller = new $this->class($this->registry);

         if(is_callable(array($controller, $this->action)) == false)
             $action = 'index';
         else
             $action = $this->action;

         $controller->$action();
     }

     private function getController()
     {
         $router = !empty($_GET['route']) ? $_GET['route'] : null;
         $action = !empty($_GET['method']) ? $_GET['method'] : null;

         if(!$router)
         {
             $router = 'news';
         }
         else
         {
             $parts = explode('/', $router);
             $this->controller = $parts[0];

             //if(isset($parts[1]))
                 //$this->action = $parts[1];
             if(isset($action))
                 $this->action = $action;
         }

         if(!isset($this->controller))
             $this->controller = 'news';

         //if(!isset($this->action))
           //  $this->action = 'index';

         if(!isset($action))
            $this->action = 'index';
         $this->class = 'C_' . ucwords($this->controller) ;
     }
 }
