<?php

namespace Alura\Doctrine\Repository;

use Alura\Doctrine\Entity\Aluno;
use Doctrine\ORM\EntityRepository;

class AlunoRepositoryQueryBuilderExample extends EntityRepository
{
    public function contadorDeAlunos(): int
    {
        $queryResult = $this->createQueryBuilder('aluno')
            ->select('count(aluno.id)')
            ->getQuery()
            ->getSingleScalarResult();

        return $queryResult;
    }

    public function buscarAlunosComTelefone(): Array
    {
        $query = $this->createQueryBuilder('aluno')
            ->addSelect('telefones')
            ->join('aluno.telefones', 'telefones')
            ->getQuery();

        return $query->getResult();
    }

    public function buscarAlunosComCursoETelefone(): Array
    {
        $query = $this->createQueryBuilder('aluno')
            ->addSelect('cursos')
            ->addSelect('telefones')
            ->join('aluno.cursos', 'cursos')
            ->join('aluno.telefones', 'telefones')
            ->getQuery();

        return $query->getResult();
    }
}