<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;
use Doctrine\DBAL\Logging\DebugStack;

require_once "../vendor/autoload.php";

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$debugStack = new DebugStack();
$entityManager->getConfiguration()->setSQLLogger($debugStack);


$classeAluno = Aluno::class;
$dql = "SELECT aluno, telefones, cursos FROM $classeAluno aluno JOIN aluno.telefones telefones JOIN aluno.cursos cursos ";
$query = $entityManager->createQuery($dql);
$alunos = $query->getResult();

/**@var Aluno[] $alunos*/
foreach ($alunos as $aluno) {

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