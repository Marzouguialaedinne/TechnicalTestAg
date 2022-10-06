<?php

namespace App\Manager;

use App\Repository\DepartmentRepository;

final class DepartmentManager
{
	/**
	 * @var DepartmentRepository
	 */
	protected $departementRepository;

	public function __construct(DepartmentRepository  $departementRepository)
	{
		$this->departementRepository = $departementRepository;
	}

	public function getListDepartment()
	{
		return $this->departementRepository->findAll();
	}

}