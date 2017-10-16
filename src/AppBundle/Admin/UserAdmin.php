<?php

namespace AppBundle\Admin;


use AppBundle\Entity\Gender;
use AppBundle\Entity\User;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class UserAdmin extends AbstractAdmin
{
	/**
	 * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
	 *
	 * @return void
	 */
	protected function configureShowFields(ShowMapper $showMapper)
	{
		$showMapper
			->with('User', array(
				'class' => 'col-lg-6',
			))
			->add('username')
			->add('email')
			->add('enabled')
			->end()
			->with('Profile', array(
				'class' => 'col-lg-6',
			))
			->add('profile.firstName')
			->add('profile.lastName')
			->add('profile.birthday')
			->add('profile.gender')
			->add('profile.notes')
			->end()
		;
	}

	/**
	 * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
	 *
	 * @return void
	 */
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
			->with('User', array(
				'class' => 'col-lg-6',
			))
			->add('enabled', null, array('required' => false))
			->add('username')
			->add('email')
			->end()
			->with('Profile', array(
				'class' => 'col-lg-6',
			))
			->add('profile.firstName', null, array(
				'required' => true,
			))
			->add('profile.lastName', null, array(
				'required' => true,
			))
			->add('profile.birthday', BirthdayType::class, array(

			))
			->add('profile.gender', EntityType::class, array(
				'class' => Gender::class,
			))
			->add('profile.notes', TextareaType::class, array(
				'required' => true,
			))
			->end()
		;
	}

	/**
	 * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
	 *
	 * @return void
	 */
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
			->addIdentifier('username')
			->add('email')
			->add('profile.firstName')
			->add('profile.lastName')
			->add('profile.gender', EntityType::class, array(
				'class' => Gender::class,
			))
			->add('_action', 'actions', array(
				'actions' => array(
					'show' => array(),
					'edit' => array(),
					'delete' => array(),
				)
			))
		;
	}

	/**
	 * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
	 *
	 * @return void
	 */
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper
			->add('enabled')
			->add('username')
			->add('email')
			->add('profile.firstName')
			->add('profile.lastName')
			->add('profile.gender')
		;
	}
}