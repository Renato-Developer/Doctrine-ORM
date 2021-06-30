<?php


namespace Alura\Doctrine\Helper;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    /** @return EntityManagerInterface */
    public function getEntityManager(): EntityManagerInterface
    {
        $rootDirectory = __DIR__ . '/../..';
        $config = Setup::createAnnotationMetadataConfiguration(
            [$rootDirectory . '/src'],
            true
        );

        $connection = [
            'driver' => 'pdo_mysql',
            'user' => 'renato',
            'password' => 'adm@superuser#',
            'dbname' => 'doctrine-orm'
        ];

        return EntityManager::create($connection, $config);
    }
}