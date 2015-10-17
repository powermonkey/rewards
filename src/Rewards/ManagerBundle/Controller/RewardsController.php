<?php

 namespace Rewards\ManagerBundle\Controller;
 use Symfony\Bundle\FrameworkBundle\Controller\Controller;
 use Symfony\Component\HttpFoundation\Request;

 class RewardsController extends Controller {

     public function indexAction() {
         return $this->render('RewardsManagerBundle:Rewards:index.html.twig');
     }

     public function showAction($id) {
         return $this->render('RewardsManagerBundle:Rewards:show.html.twig');
     }

     public function newAction() {
         return $this->render('RewardsManagerBundle:Rewards:new.html.twig');
     }

     public function createAction(Request $request) {

     }

     public function editAction($id) {
         return $this->render('RewardsManagerBundle:Rewards:edit.html.twig');
     }

     public function updateAction(Request $request, $id) {

     }

     public function deleteAction(Request $request, $id) {

     }

 }
