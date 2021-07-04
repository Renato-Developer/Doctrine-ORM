<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;
use Doctrine\DBAL\Logging\DebugStack;

require_once "../vendor/autoload.php";

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$alunosRepository = $entityManager->getRepository(Aluno::class);

$alunos = $alunosRepository->findAll();

$debugStack = new DebugStack();
$entityManager->getConfiguration()->setSQLLogger($debugStack);

/**@var Aluno[] $alunos*/
foreach ($alunos as $aluno) {

    /*
    $telefones = $aluno->getTelefones()->map(function (Telefone $telefone){
        return $telefone->getNumero();
    })->toArray();
    echo "Telefone:". implode(', ', $telefones);
    */

    $telefones = $aluno->getTelefones();
    $cursos = $aluno->getCursos();


    echo "Nome Do Aluno: {$aluno->getNome()}\n";

    /**@var Telefone[] $telefones*/
    foreach ($telefones as $telefone) {
        echo "Telefone Do Aluno: {$telefone->getNumero()}\n";
    }

    /**@var Curso[] $cursos*/
    foreach ($cursos as $curso) {
        echo "Cursos Do Aluno: {$curso->getNome()}\n";
    }

    echo "\n\n\n";
}

print_r($debugStack);