<?php

namespace UserBundle\Component\Authentication\Handler;

use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;
use Symfony\Component\HttpFoundation\Session\Session;

class LoginHandler implements AuthenticationSuccessHandlerInterface
{
	
	protected $router;
	protected $security;
	
	public function __construct(Router $router, SecurityContext $security)
	{
		$this->router = $router;
		$this->security = $security;
	}
	
	public function onAuthenticationSuccess(Request $request, TokenInterface $token)
	{
		
		if ($this->security->isGranted('ROLE_USER')){
			$response = new RedirectResponse($this->router->generate('dashboard'));			
		}else if($this->security->isGranted('ROLE_SCRUM')){
			$response = new RedirectResponse($this->router->generate('scrumdashboard'));
		}
			
		return $response;
	}
	
}