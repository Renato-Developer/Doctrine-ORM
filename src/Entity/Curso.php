<?php


namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 */
class Curso
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;

    /**
     * @Column(type="string")
     */
    private string $nome;

    /**
     * @ManyToMany(targetEntity="Aluno", inversedBy="cursos")
     */
    private $alunos;

    public function __construct(string $nome)
    {
        $this->alunos = new ArrayCollection();
        $this->nome = $nome;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function addAluno(Aluno $aluno): self
    {
        if($this->alunos->contains($aluno)) {
            return $this;
        }

        $this->alunos->add($aluno);
        $aluno->addCurso($this);

        return $this;
    }

}