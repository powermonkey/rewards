<?php

 namespace Activities\ManagerBundle\Controller;
 use Symfony\Bundle\FrameworkBundle\Controller\Controller;
 use Symfony\Component\HttpFoundation\Request;

 class ActivitiesController extends Controller {

     public function indexAction() {
         return $this->render('ActivitiesManagerBundle:Activities:index.html.twig');
     }

     public function newAction() {
         return $this->render('ActivitiesManagerBundle:Activities:new.html.twig');
     }

 }
