<?php

namespace App\Application\GetEmployee;

use App\Entity\Employe;
use App\Form\EmployeType;
use App\Manager\EmployeManager;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;
use Symfony\Component\Routing\Annotation\Route;

final class EditEmployeAction
{
	private FormFactoryInterface $formFactory;
	private Environment $environment;
	private EmployeManager $employeManager;
	private UrlGeneratorInterface $urlGenerator;


	public function __construct(FormFactoryInterface $formFactory, Environment $environment, EmployeManager $employeManager, UrlGeneratorInterface $urlGenerator)
	{
		$this->formFactory    = $formFactory;
		$this->environment    = $environment;
		$this->employeManager = $employeManager;
		$this->urlGenerator   = $urlGenerator;
	}

	/**
	 * @Route("/employe/{id}", name="edit_employe", methods={"GET", "POST"})
	 */
	public function __invoke(Request $request, Employe $employe): Response
	{
		$form = $this->formFactory->create(EmployeType::class, $employe);
		$form->handleRequest($request);

		if($form->isSubmitted() && $form->isValid()){
			$this->employeManager->update($employe);
			return new RedirectResponse($this->urlGenerator->generate('get_employe', []), Response::HTTP_SEE_OTHER);
		}

		return new Response($this->environment->render('pages/edit.html.twig', [
			'form' => $form->createView()
		]));
	}

}