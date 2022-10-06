<?php

namespace App\Entity;

use App\Repository\DepartmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DepartmentRepository::class)
 */
class Department
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $loc;

    /**
     * @ORM\OneToMany(targetEntity=Employe::class, mappedBy="departement")
     */
    private $employes;

    public function __construct()
    {
        $this->employes = new ArrayCollection();
    }

	public function getId()
	{
		return $this->id;
	}

    public function getDname(): ?string
    {
        return $this->dname;
    }

    public function setDname(string $dname): self
    {
        $this->dname = $dname;

        return $this;
    }

    public function getLoc(): ?string
    {
        return $this->loc;
    }

    public function setLoc(string $loc): self
    {
        $this->loc = $loc;

        return $this;
    }

    /**
     * @return Collection|Employe[]
     */
    public function getEmployes(): Collection
    {
        return $this->employes;
    }

    public function addEmploye(Employe $employe): self
    {
        if (!$this->employes->contains($employe)) {
            $this->employes[] = $employe;
            $employe->setDepartement($this);
        }

        return $this;
    }

    public function removeEmploye(Employe $employe): self
    {
        if ($this->employes->removeElement($employe)) {
            // set the owning side to null (unless already changed)
            if ($employe->getDepartement() === $this) {
                $employe->setDepartement(null);
            }
        }

        return $this;
    }

    public function __toString(): string
	{
		return $this->dname;
	}
}
