<?php

use Alura\Doctrine\Helper\EntityManagerFactory;
use Alura\Doctrine\Entity\Aluno;

require_once "../vendor/autoload.php";

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$id = $argv[1];
$novoNome = $argv[2];

/*$entityManager->find(Aluno::class, $id)*/
$alunoRepository = $entityManager->getRepository(Aluno::class);

$aluno = $alunoRepository->find($id);
$aluno->setNome($novoNome);

$entityManager->flush();
