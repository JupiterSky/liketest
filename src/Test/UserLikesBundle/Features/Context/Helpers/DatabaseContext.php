<?php
namespace Test\UserLikesBundle\Features\Context\Helpers;


use Behat\Behat\Context\Context;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\DBAL\Schema\Schema;

class  DatabaseContext implements Context
{

    /**
     * @var Schema
     */
    protected static $databaseSchema;


    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
        $this->manager = $doctrine->getManager();
    }



    /**
     * @BeforeScenario
     */
    public function resetTestFixtures($event) {
        /** @var \Doctrine\ORM\EntityManager $entityManager */
        $entityManager = $this->manager;
        if (self::$databaseSchema !== NULL) {
            $this->truncateTables($entityManager);
        } else {
            $schema = $entityManager->getConnection()->getSchemaManager()->createSchema();
            self::$databaseSchema = $schema;
            $this->truncateTables($entityManager);
            $proxyFactory = $entityManager->getProxyFactory();
            $proxyFactory->generateProxyClasses($entityManager->getMetadataFactory()->getAllMetadata());
        }
    }


    /**
     * Truncate all known tables
     *
     * @param \Doctrine\ORM\EntityManager $entityManager
     * @return void
     */
    public function truncateTables($entityManager) {
        $connection = $entityManager->getConnection();
        $tables = self::$databaseSchema->getTables();
        switch ($connection->getDatabasePlatform()->getName()) {
            case 'mysql':
                $sql = 'SET FOREIGN_KEY_CHECKS=0;';
                foreach ($tables as $table) {
                    $sql .= 'TRUNCATE `' . $table->getName() . '`;';
                }
                $sql .= 'SET FOREIGN_KEY_CHECKS=1;';
                $connection->executeQuery($sql);
                break;
            case 'postgresql':
            default:
                foreach ($tables as $table) {
                    $sql = 'TRUNCATE ' . $table->getName() . ' CASCADE;';
                    $connection->executeQuery($sql);
                }
                break;
        }
    }




    /**
     * @return array
     */
    protected function getMetadata()
    {
        return $this->getEntityManager()->getMetadataFactory()->getAllMetadata();
    }


    /**
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEntityManager()
    {
        return $this->manager;
    }
}
