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
	
	public function sendpointsAction(Request $request)
	{
		$post = $request->request->all();
		$searchUser = $this->searchUserByEmail($post['email']);
		$user = new User();
		$pointsGiven = new PointsGiven();
		$pointsLog = new PointsLog();
		$pointsReceived = new PointsReceived();
		
		$pointsGiven->setUserIdTo($searchUser->getId());
		$pointsGiven->setPoints($post['points']);
		$pointsGiven->setMessage($post['message']);
		$user->addPointsGiven($pointsGiven);
		
		$pointsReceived->setUserIdFrom($user->getId());
		$pointsReceived->setPoints($post['points']);
		$pointsReceived->setMessage($post['message']);
		$searchUser->addPointsReceived($pointsReceived);
		
		return $this->render('UserBundle:Dashboard:profile.html.twig');
		// $pointsLog->
	}
	
	public function searchUserByEmail($email)
	{
		$u = new User();
		$user = $u->findOneByEmail($email);
		
		return $user;
	}
}
