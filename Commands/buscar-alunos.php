<?php

use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;
use Alura\Doctrine\Entity\Aluno;

require_once "../vendor/autoload.php";

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$dql = "SELECT aluno FROM Alura\\Doctrine\\Entity\\Aluno aluno WHERE aluno.id = 1 AND aluno.nome = 'RenatoAugusto'";
$query = $entityManager->createQuery($dql);
$alunos = $query->getResult();

/**
 * @var Aluno[] $alunos
 */
foreach ($alunos as $aluno) {

    $telefones = $aluno->getTelefones()->map(function (Telefone $telefone) {
        return $telefone->getNumero();
    })->toArray();

    echo "ID: {$aluno->getId()}\n\n";
    echo "NOME: {$aluno->getNome()}\n\n";
    echo "\n\nTELEFONE:" . implode(', ', $telefones);
}

