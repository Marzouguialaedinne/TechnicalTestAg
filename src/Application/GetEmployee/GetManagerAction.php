<?php

namespace App\Application\GetEmployee;

use App\Manager\ManagersManager;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Symfony\Component\Routing\Annotation\Route;

final class GetManagerAction
{
	private FormFactoryInterface $formFactory;
	private  Environment $environment;
	private  ManagersManager $manager;


	public function __construct(FormFactoryInterface $formFactory, Environment $environment, ManagersManager $manager)
	{
		$this->formFactory    = $formFactory;
		$this->environment    = $environment;
		$this->manager        = $manager;
	}

	/**
	 * @Route("/manager", name="get_manager", methods={"GET"})
	 */
	public function __invoke(Request $request): Response
	{
		return new Response($this->environment->render('pages/manager.html.twig', [
			'managers' => $this->manager->getManagers()
		]));
	}

}