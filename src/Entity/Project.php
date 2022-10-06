<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $startDate;

    /**
     * @ORM\Column(type="date")
     */
    private $endate;

    /**
     * @ORM\ManyToOne(targetEntity=Employe::class, inversedBy="projects")
     * @ORM\JoinColumn(nullable=false)
     */
    private $empno;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndate(): ?\DateTimeInterface
    {
        return $this->endate;
    }

    public function setEndate(\DateTimeInterface $endate): self
    {
        $this->endate = $endate;

        return $this;
    }

    public function getEmpno(): ?Employe
    {
        return $this->empno;
    }

    public function setEmpno(?Employe $empno): self
    {
        $this->empno = $empno;

        return $this;
    }
}
