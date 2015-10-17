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
		var_dump($post);exit;
		$user = $this->searchUserByEmail($post['email']);
		$u = new User();
		$u->setPointsGiven($post['points']);
		
	}
	
	public function searchUserByEmail($email)
	{
		$u = new User();
		$user = $u->findOneByEmail($email);
		
		return $user;
	}
}
