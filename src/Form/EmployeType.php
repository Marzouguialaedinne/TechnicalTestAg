<?php

namespace App\Form;

use App\Entity\Employe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options): void
	{
		$builder
			->add(
				'ename',
				TextType::class,
				[
					'label'=>'Name Employee',
					'attr' => [
						'class' => 'form-control',
					],
				]
			)
			->add(
			'job',
		 	TextType::class,
				[
					'label'=>'JOB',
					'attr' => [
						'class' => 'form-control',
					],
				]
			)
			->add(
			'hiredate',
			 DateType::class,
				  [
					'label'=>'Date of Birth',
					'required' => false,
					'html5' => false,
					'attr' => ['class' => 'form-control js-datepicker'],
					'widget' => 'single_text'
					]
				)
			->add(
			'sal',
			 IntegerType::class,
				 [
					 'label'=>'Salary',
				 ]
			 )
			->add('comm')
			->add(
			'mgr',
				null,
				[
					'label'=>'Manager',
				]
			)
			->add('departement')
			->add(
				'Submit',
				SubmitType::class,
				[
					'attr' => [
						'class' => 'btn btn-primary',
					],
				]
			);
		;
	}

	public function configureOptions(OptionsResolver $resolver): void
	{
		$resolver->setDefaults([
			'data_class' => Employe::class,
		]);
	}
}
