<?php

namespace Junior\EtudeBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class StudentAdmin extends Admin
{
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('lastname')
            ->add('firstname')
            ->add('email')
            ->add('year')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id', 'text')
            ->add('lastname')
            ->add('firstname')
            ->add('email')
            ->add('year')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Étudiant')
                ->add('id', null, array(
                    'label' => 'Code cantine',
                ))
                ->add('lastname', null, array(
                    'label' => 'Nom',
                ))
                ->add('firstname', null, array(
                    'label' => 'Prénom',
                ))
                ->add('email', null, array(
                    'label' => 'Email',
                ))
                ->add('year', null, array(
                    'label' => 'Classe',
                ))
            ->end()
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id', 'text')
            ->add('lastname')
            ->add('firstname')
            ->add('email')
            ->add('year')
        ;
    }

    public function toString($object)
    {
        return $object instanceof Etude
            ? $object->getTitle()
            : $object->getFirstname()." ".$object->getLastname(); // shown in the breadcrumb on the create view
    }
}
