<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 22.01.12
 * Time: 18:56
 */
 class Router {
     private $registry;
     //private $path;
     private $args = array();

     public $file;
     public $controller;
     public $action;

     function __construct($registry)
     {
         $this->registry = $registry;
     }

     private function getController()
     {
         $router = !empty($_GET['route']) ? $_GET['route'] : null;

         if(!$router)
         {
             $router = 'news';
         }
         else
         {
             
         }
     }
 }
