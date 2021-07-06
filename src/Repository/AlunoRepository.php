<?php

namespace Alura\Doctrine\Repository;

use Alura\Doctrine\Entity\Aluno;
use Doctrine\ORM\EntityRepository;

class AlunoRepository extends EntityRepository
{
    public function contadorDeAlunos(): int
    {
        $classeAluno = Aluno::class;
        $dql = "SELECT COUNT(Aluno) FROM $classeAluno Aluno";
        $totalDeAlunos = $this->getEntityManager()
            ->createQuery($dql)
            ->getSingleScalarResult();

        return $totalDeAlunos;
    }

    public function buscarAlunosComTelefone(): Array
    {
        $classeAluno = Aluno::class;
        $dql = "SELECT aluno, telefones FROM $classeAluno aluno JOIN aluno.telefones telefones";
        $alunos = $this->getEntityManager()
            ->createQuery($dql)
            ->getResult();

        return $alunos;
    }

    public function buscarAlunosComCurso(): Array
    {
        $classeAluno = Aluno::class;
        $dql = "SELECT aluno, cursos FROM $classeAluno aluno JOIN aluno.cursos cursos";
        $alunosComCursos = $this->getEntityManager()
            ->createQuery($dql)
            ->getResult();

        return $alunosComCursos;
    }
}