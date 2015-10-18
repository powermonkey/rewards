<?php
namespace UserBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use UserBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PasswordEncoder implements ContainerAwareInterface
{
	private $container;
	
	public function setContainer(ContainerInterface $container = null)
	{
        $this->container = $container;
		
		return $this;
    }
	
	public function prePersist(LifecycleEventArgs $args)
	{
		$entity = $args->getEntity();
        $entityManager = $args->getEntityManager();
		
        if ($entity instanceof User) {
            $this->encodePassword($entity, $args);
        }
	}
	
	public function preUpdate(LifecycleEventArgs $args)
	{
		$entity = $args->getEntity();
        $entityManager = $args->getEntityManager();
		
        if ($entity instanceof User) {
			var_dump($entity);exit;
            $this->encodePassword($entity, $args);
        }
	}
	
	public function encodePassword($user, $args)
	{
		$password = $user->getPassword();
		
		if(!is_null($password)){
			$encoder = $this->container
				->get('security.encoder_factory')
				->getEncoder($user)
			;
			$user->setPassword($encoder->encodePassword($password, $user->getSalt()));
		}else{
			$args->setNewValue('password', $args->getOldValue('password'));
		}
	}
}