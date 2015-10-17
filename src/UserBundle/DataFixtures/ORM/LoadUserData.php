<?php
namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use UserBundle\Entity\User;
use UserBundle\Entity\Points;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface, ContainerAwareInterface
{
	private $container;
	
	public function setContainer(ContainerInterface $container = null)
	{
        $this->container = $container;
		
		return $this;
    }
	
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
		$project = $this->getProjects();
		$user->setUsername('rodi');
		$salt = $user->getSalt();
		$user->setPassword('1234');
        $user->setFirstname('Rodolfo');
        $user->setLastname('Cam');
        $user->setEmail('r.cam@arcanys.com');
        $user->setStatus(1);
        $user->addRole('ROLE_USER');
        $user->setDateHired(new \DateTime(date('d-M-Y H:i:s')));
        $user->addProject($project[0]);
		$manager->persist($user);
        $manager->flush();
		
		$user = new User();
		$project = $this->getProjects();
		$user->setUsername('donnah');
		$salt = $user->getSalt();
		$user->setPassword('1234');
        $user->setFirstname('Donnah');
        $user->setLastname('Chan');
        $user->setSalt('test');
        $user->setEmail('d.chan@arcanys.com');
        $user->setStatus(1);
        $user->addRole('ROLE_USER');
        $user->setDateHired(new \DateTime(date('d-M-Y H:i:s')));
        $user->addProject($project[0]);
		
        $manager->persist($user);
        $manager->flush();
        $manager->clear();
    }
	
	protected function getProjects()
	{
		$repository = $this->container->get('doctrine')->getRepository('UserBundle:Project');
		$project = $repository->findAll();
		
		return $project;
	}
	
	
	public function getOrder()
    {
        return 2;
	}
}