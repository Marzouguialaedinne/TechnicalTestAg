<?php

namespace App\Entity;

use App\Repository\ManagerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ManagerRepository::class)
 */
class Manager
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Employe::class, inversedBy="managers")
     */
    private $manager;

    /**
     * @ORM\ManyToOne(targetEntity=Employe::class, inversedBy="managers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Employee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getManager(): ?Employe
    {
        return $this->manager;
    }

    public function setManager(?Employe $manager): self
    {
        $this->manager = $manager;

        return $this;
    }

    public function getEmployee(): ?Employe
    {
        return $this->Employee;
    }

    public function setEmployee(?Employe $Employee): self
    {
        $this->Employee = $Employee;

        return $this;
    }
}
