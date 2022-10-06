<?php

namespace App\Manager;

use App\Entity\Employe;
use App\Repository\EmployeRepository;
use Doctrine\ORM\EntityManagerInterface;

final class EmployeManager
{
	/**
	 * @var EntityManagerInterface
	 */
	protected $em;

	/**
	 * @var EmployeRepository
	 */
	protected $employeRepository;


	public function __construct(
	 	EntityManagerInterface $em
	)
	{
		$this->em                = $em;
		$this->employeRepository = $this->em->getRepository(Employe::class);

	}

	public function getListEmployee()
	{
		return $this->employeRepository->findByHierarchicalRelationShip();
	}

	public function new(Employe $employe)
	{
		$this->em->persist($employe);
		$this->em->flush();
	}

	public function update(Employe $employe)
	{
		$this->em->flush();
	}

}