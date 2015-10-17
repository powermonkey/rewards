<?php

 namespace Activities\ManagerBundle\Controller;
 use Symfony\Bundle\FrameworkBundle\Controller\Controller;
 use Symfony\Component\HttpFoundation\Request;

 class ActivitiesController extends Controller {

     public function indexAction() {
         return $this->render('ActivitiesManagerBundle:Activities:index.html.twig');
     }

     public function showAction($id) {
         return $this->render('ActivitiesManagerBundle:Activities:show.html.twig');
     }

 }
