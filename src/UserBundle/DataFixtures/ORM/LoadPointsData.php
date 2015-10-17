<?php
namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use UserBundle\Entity\Points;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadPointsData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface, ContainerAwareInterface
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
        $p = new Points();
		$p->setPoints(0);
		$user = $this->getUser();
		$p->setUser($user[0]);
		
        $manager->persist($p);
        $manager->flush();
    }
	
	public function getOrder()
    {
        return 3;
	}
	
	protected function getUser()
	{
		$repository = $this->container->get('doctrine')->getRepository('UserBundle:User');
		$points = $repository->findAll();
		
		return $points;
	}
}