<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 10-08-2015
 * Time: 18:32
 */



use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use  Test\UserLikesBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin->setName('TEST LIKES');
        $manager->persist($userAdmin);
        $manager->flush();
    }
}
