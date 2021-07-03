<?php

use Alura\Doctrine\Helper\EntityManagerFactory;
use Alura\Doctrine\Entity\Aluno;

require_once "../vendor/autoload.php";

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$id = $argv[1];

//Utilizando o getReference ganhamos performance, pois o Doctrine não precisa criar pra depois excluir o que seria
//o casso do getRepository.
$aluno = $entityManager->getReference(Aluno::class, $id);

$entityManager->remove($aluno);
$entityManager->flush();
