<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DashboardController extends Controller
{
    public function indexAction()
    {
        return $this->render('UserBundle:Dashboard:profile.html.twig');
    }
	
	public function sendpointsAction(Request $request)
	{
		$post = $request->request->all();
		
	}
}
