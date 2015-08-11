<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 10-08-2015
 * Time: 18:32
 */


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use  Test\UserLikesBundle\Entity\Post;

class LoadPostData implements FixtureInterface
{



    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {


        $post =$this->createAPost('Good Code', 'Good code always looks like it was written by someone who cares.');

        $post2 =$this->createAPost('Code Readability', 'The ratio of time spent reading (code) versus writing is well over 10 to 1 ... (therefore) making it easy to read makes it easier to write.');
        // esta linha não é o melhor exemplo :P

        $manager->persist($post);

        $manager->persist($post2);

        $manager->flush();
    }

    /**
     * @param $title
     * @param $desc
     * @return Post
     */
    protected function createAPost($title, $desc)
    {
        $userAdmin = new Post();
        $userAdmin->setTitle($title);
        $userAdmin->setContent($desc);
        return $userAdmin;
    }


}
