<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$aluno = new Aluno();
$aluno->setNome($argv[1]);

for ($i = 2; $i < $argc; $i++) {
    $numeroTelefone = $argv[$i];
    $telefone = new Telefone();

    $entityManager->persist($telefone);

    $telefone->setNumero($numeroTelefone);

    $aluno->addTelefone($telefone);
}

$entityManager->beginTransaction();
$entityManager->persist($aluno);
$entityManager->flush();
$entityManager->commit();
