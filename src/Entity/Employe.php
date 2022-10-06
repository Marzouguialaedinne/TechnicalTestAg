<?php

namespace App\Entity;

use App\Repository\EmployeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmployeRepository::class)
 */
class Employe
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
    private $ename;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $job;

    /**
     * @ORM\Column(type="date")
     */
    private $hiredate;

    /**
     * @ORM\Column(type="integer")
     */
    private $sal;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $comm;

    /**
     * @ORM\ManyToOne(targetEntity=Employe::class, inversedBy="employes")
     */
    private $mgr;

    /**
     * @ORM\OneToMany(targetEntity=Employe::class, mappedBy="mgr")
     */
    private $employes;

    /**
     * @ORM\ManyToOne(targetEntity=Department::class, inversedBy="employes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $departement;

    /**
     * @ORM\OneToMany(targetEntity=Project::class, mappedBy="empno")
     */
    private $projects;

    /**
     * @ORM\OneToMany(targetEntity=Manager::class, mappedBy="manager")
     */
    private $managers;

    public function __construct()
    {
        $this->employes = new ArrayCollection();
        $this->projects = new ArrayCollection();
        $this->managers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEname(): ?string
    {
        return $this->ename;
    }

    public function setEname(string $ename): self
    {
        $this->ename = $ename;

        return $this;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(string $job): self
    {
        $this->job = $job;

        return $this;
    }

    public function getHiredate(): ?\DateTimeInterface
    {
        return $this->hiredate;
    }

    public function setHiredate(\DateTimeInterface $hiredate): self
    {
        $this->hiredate = $hiredate;

        return $this;
    }

    public function getSal(): ?int
    {
        return $this->sal;
    }

    public function setSal(int $sal): self
    {
        $this->sal = $sal;

        return $this;
    }

    public function getComm(): ?int
    {
        return $this->comm;
    }

    public function setComm(?int $comm): self
    {
        $this->comm = $comm;

        return $this;
    }

    public function getMgr(): ?self
    {
        return $this->mgr;
    }

    public function setMgr(?self $mgr): self
    {
        $this->mgr = $mgr;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getEmployes(): Collection
    {
        return $this->employes;
    }

    public function addEmploye(self $employe): self
    {
        if (!$this->employes->contains($employe)) {
            $this->employes[] = $employe;
            $employe->setMgr($this);
        }

        return $this;
    }

    public function removeEmploye(self $employe): self
    {
        if ($this->employes->removeElement($employe)) {
            // set the owning side to null (unless already changed)
            if ($employe->getMgr() === $this) {
                $employe->setMgr(null);
            }
        }

        return $this;
    }

    public function getDepartement(): ?Department
    {
        return $this->departement;
    }

    public function setDepartement(?Department $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * @return Collection|Project[]
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(Project $project): self
    {
        if (!$this->projects->contains($project)) {
            $this->projects[] = $project;
            $project->setEmpno($this);
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        if ($this->projects->removeElement($project)) {
            // set the owning side to null (unless already changed)
            if ($project->getEmpno() === $this) {
                $project->setEmpno(null);
            }
        }

        return $this;
    }

    public function __toString()
	{
		return $this->ename;
	}

    /**
     * @return Collection|Manager[]
     */
    public function getManagers(): Collection
    {
        return $this->managers;
    }

    public function addManager(Manager $manager): self
    {
        if (!$this->managers->contains($manager)) {
            $this->managers[] = $manager;
            $manager->setManager($this);
        }

        return $this;
    }

    public function removeManager(Manager $manager): self
    {
        if ($this->managers->removeElement($manager)) {
            // set the owning side to null (unless already changed)
            if ($manager->getManager() === $this) {
                $manager->setManager(null);
            }
        }

        return $this;
    }
}
