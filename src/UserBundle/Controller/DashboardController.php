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
		$currentUser = $this->get('security.token_storage')->getToken()->getUser();
		$currentUserPoints = $this->getUserPoints($currentUser->getId());
		
        return $this->render('UserBundle:Dashboard:profile.html.twig', array(
				'points' => $currentUserPoints,
				'firstname' => $currentUser->getFirstname(),
				'lastname' => $currentUser->getLastname(),
			)
		);
    }
	
	public function managerAction()
    {
        return $this->render('UserBundle:Dashboard:manager.html.twig');
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
		
		$pointsReceived->setUserIdFrom($currentUser->getId());
		$pointsReceived->setPoints($post['points']);
		$pointsReceived->setMessage($post['message']);
		$searchUser->addPointsReceived($pointsReceived);
		$em->persist($pointsReceived);
		
		//to do: decrease points of user that sent points
		$updatedCurrentUserPoints = $currentUserPoints - $post['points'];
		
		$points->setPoints($updatedCurrentUserPoints);
		$em->flush();
		
		return $this->redirect($this->getRequest()->headers->get('referer'));
		
		// return $this->render('UserBundle:Dashboard:profile.html.twig', array(
				// 'points' => $updatedCurrentUserPoints,
				// 'firstname' => $currentUser->getFirstname(),
				// 'lastname' => $currentUser->getLastname(),
			// )
		// );
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
		$repository = $this->getDoctrine()->getRepository('UserBundle:Points');
		$user = $repository->findOneBy(
			array('user' => $currentUser)
		);
		
		
		return $user->getPoints();
	}
}
