<?php

namespace App\Application\GetEmployee;

use App\Manager\EmployeManager;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Symfony\Component\Routing\Annotation\Route;

final class GetEmployeAction
{
	private FormFactoryInterface $formFactory;
	private  Environment $environment;
	private EmployeManager $employeManager;


	public function __construct(FormFactoryInterface $formFactory, Environment $environment, EmployeManager $employeManager)
	{
		$this->formFactory    = $formFactory;
		$this->environment    = $environment;
		$this->employeManager = $employeManager;
	}

	/**
	 * @Route("/", name="get_employe", methods={"GET"})
	 */
	public function __invoke(Request $request): Response
	{
		return new Response($this->environment->render('pages/home.html.twig', [
				'listEmployee' => $this->employeManager->getListEmployee()
		]));
	}

}