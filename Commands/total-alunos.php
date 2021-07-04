<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$classeAluno = Aluno::class;
$dql = "SELECT count(aluno) FROM $classeAluno aluno";
$query = $entityManager->createQuery($dql);
$quantidadeDeAlunos = $query->getSingleScalarResult();

echo $quantidadeDeAlunos;
