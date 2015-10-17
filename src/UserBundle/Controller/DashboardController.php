<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\Points;
use UserBundle\Entity\PointsGiven;
use UserBundle\Entity\PointsLog;
use UserBundle\Entity\PointsReceived;
use UserBundle\Entity\PointsReceivedAchievement;
use UserBundle\Entity\PointsReceivedPending;
use UserBundle\Entity\User;

class DashboardController extends Controller
{
    public function indexAction()
    {
        return $this->render('UserBundle:Dashboard:profile.html.twig');
    }
	
	public function scrumdashboardAction()
    {
		
        return $this->render('UserBundle:Dashboard:scrumdashboard.html.twig');
    }
	
	public function sendpointsAction(Request $request)
	{
		$post = $request->request->all();
		$em = $this->getDoctrine()->getManager();
		$searchUser = $this->searchUserByEmail($post['user']);
		$user = new User();
		$points = new Points();
		$pointsGiven = new PointsGiven();
		$pointsLog = new PointsLog();
		$pointsReceived = new PointsReceived();
		$currentUser = $this->get('security.token_storage')->getToken()->getUser();
		$currentUserPoints = $this->getUserPoints($currentUser->getId());
		$pointsGiven->setUserIdTo($searchUser->getId());
		$pointsGiven->setPoints($post['points']);
		$pointsGiven->setMessage($post['message']);
		$user->addPointsGiven($pointsGiven);
		$em->persist($pointsGiven);
		$em->flush();
		
		
		$pointsReceived->setUserIdFrom($currentUser->getId());
		$pointsReceived->setPoints($post['points']);
		$pointsReceived->setMessage($post['message']);
		$searchUser->addPointsReceived($pointsReceived);
		$em->persist($pointsReceived);
		$em->flush();
		
		//to do: decrease points of user that sent points
		
		return $this->render('UserBundle:Dashboard:profile.html.twig');
		// $pointsLog->
	}
	
	public function searchUserByEmail($email)
	{
		$repository = $this->getDoctrine()->getRepository('UserBundle:User');
		$user = $repository->findOneBy(
			array('email' => $email)
		);
		
		return $user;
	}
	
	public function getUserPoints($currentUser)
	{
		$repository = $this->getDoctrine()->getRepository('UserBundle:User');
		$points = $repository->findOneBy(
			array('id' => $currentUser)
		);
		
		return $points;
	}
}
