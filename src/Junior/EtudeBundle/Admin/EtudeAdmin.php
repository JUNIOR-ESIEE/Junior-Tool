<?php

namespace Junior\EtudeBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class EtudeAdmin extends Admin
{
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('lastname')
            ->add('firstname')
            ->add('company')
            ->add('phone')
            ->add('email')
            ->add('deposit')
            ->add('title')
            ->add('description')
            ->add('deadline')
            ->add('state')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('lastname')
            ->add('firstname')
            ->add('company')
            ->add('deposit')
            ->add('title')
            ->add('deadline')
            ->add('state')
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
            ->with('Client')
                ->add('lastname')
                ->add('firstname')
                ->add('company')
                ->add('phone')
                ->add('email')
            ->end()
            ->with('Projet')
                ->add('deposit', 'date')
                ->add('title')
                ->add('description')
                ->add('deadline', 'date')
            ->end()
            ->with('Suivi')
                ->add('state')
                ->add('commercial', 'sonata_type_model_list', array(
                    'required'  => false,
                ))
                ->add('rbu', 'sonata_type_model_list', array(
                    'required'  => false,
                ))
            ->end()
            ->with('Réalisation')
                ->add('student', 'sonata_type_model_list', array(
                    'required'  => false,
                ))
            ->end()
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('lastname')
            ->add('firstname')
            ->add('company')
            ->add('phone')
            ->add('email')
            ->add('deposit')
            ->add('title')
            ->add('description')
            ->add('deadline')
            ->add('state')
            ->add('commercial')
            ->add('rbu')
            ->add('student')
        ;
    }

    public function toString($object)
    {
        return $object instanceof Etude
            ? $object->getTitle()
            : 'Etude'; // shown in the breadcrumb on the create view
    }
}
