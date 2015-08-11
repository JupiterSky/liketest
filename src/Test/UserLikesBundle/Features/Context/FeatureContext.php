<?php
namespace Test\UserLikesBundle\Features\Context;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\SchemaTool;
use PhpSpec\ServiceContainer;
use Sanpi\Behatch\Context\RestContext;
use Symfony\Component\DependencyInjection\Container;
use Test\UserLikesBundle\Entity\Post;
use Test\UserLikesBundle\Entity\User;
use Test\UserLikesBundle\Repository\UserRepository;

class FeatureContext extends RestContext implements Context, SnippetAcceptingContext
{


    /**
     * @var ManagerRegistry
     */
    private $doctrine;
    /**
     * @var \Doctrine\Common\Persistence\ObjectManager
     */
    private $manager;
    /**
     * @var Container
     */
    private $container;
    /**
     * Initializes context.
     * @param ManagerRegistry $doctrine
     * @param ServiceContainer $serviceContainer
     */
    public function __construct(ManagerRegistry $doctrine, $serviceContainer)
    {
        $this->doctrine = $doctrine;
        $this->manager = $doctrine->getManager();
        $this->schemaTool = new SchemaTool($this->manager);
        $this->classes = $this->manager->getMetadataFactory()->getAllMetadata();
        $this->container = $serviceContainer;
    }


    /**
     * @BeforeScenario @createSchema
     */
    public function createDatabase()
    {
        $this->schemaTool->dropSchema($this->classes);
        $this->schemaTool->createSchema($this->classes);
    }

    /**
     * @Given /^A default User Created and Post$/
     */
    public function aDefaultUserCreatedAndPost()
    {
        $this->generateUser();
        $this->generatePost();
        $this->manager->flush();
    }

    /**
     * @param $pipeline
     * @return Pipe
     */
    protected function generateUser()
    {
        $pipe = new User();
        $pipe->setName('TESTER');
        $this->manager->persist($pipe);

        return $pipe;
    }

    /**
     * @return Post
     */
    protected function generatePost()
    {
        $pipeline = new Post();
        $pipeline->setTitle("Post generated");
        $pipeline->setContent("COntent..");
        $this->manager->persist($pipeline);

        return $pipeline;
    }


    /**
     * @Given /^the user "([^"]*)" should have "([^"]*)" like$/
     */
    public function theUserShouldHaveLike($userID, $totalMustHave)
    {
         $userRepository= $this->getUserRepository();
        $totalLikes = $userRepository->getTotalLikes($userID);
        $this->assertEquals($totalMustHave,$totalLikes,"User have ".$totalLikes." like in posts");

    }

    /**
     * @param $userID
     * @return UserRepository
     */
    protected function getUserRepository()
    {
        return $this->container->get('test.user.repository');
    }

}
