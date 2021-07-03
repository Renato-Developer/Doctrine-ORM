<?php

use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;
use Alura\Doctrine\Entity\Aluno;

require_once "../vendor/autoload.php";

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);

/*
public function findBy(
    array $criteria,
    ?array $orderBy = null,
    ?int $limit = null,
    ?int $offset = null
)
*/
$alunos = $alunoRepository->findBy(['nome' => 'RenatoAugusto'], ['id' => 'desc']);

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

