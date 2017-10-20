<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ProfileAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('firstName')
            ->add('lastName')
            ->add('birthday')
            ->add('notes')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('firstName')
            ->add('lastName')
            ->add('birthday')
            ->add('notes')
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
			->with('General', array(
				'class' => 'col-lg-6',
			))
            ->add('id')
            ->add('firstName')
            ->add('lastName')
            ->add('birthday')
            ->add('notes')
			->end()
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
			->with('General', array(
				'class' => 'col-lg-6',
			))
            ->add('id')
            ->add('firstName')
            ->add('lastName')
            ->add('birthday')
            ->add('notes')
			->end()
        ;
    }
}
