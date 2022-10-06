<?php

namespace App\Manager;

use App\Repository\ManagerRepository;

final class ManagersManager
{
	/**
	 * @var ManagerRepository
	 */
	protected $managerRepository;

	public function __construct(ManagerRepository  $managerRepository)
	{
		$this->managerRepository = $managerRepository;
	}

	public function getManagers()
	{
		return $this->distinctResponse();
	}

	private function distinctResponse()
	{
		return $this->managerRepository->getTotalNumberEmployee();
	}

}