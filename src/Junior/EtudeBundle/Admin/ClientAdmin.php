<?php

namespace Junior\EtudeBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ClientAdmin extends Admin
{
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('lastname')
            ->add('firstname')
            ->add('job')
            ->add('phone')
            ->add('mobile')
            ->add('email')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('lastname')
            ->add('firstname')
            ->add('job')
            ->add('phone')
            ->add('mobile')
            ->add('email')
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
                ->add('lastname', null, array(
                    'label' => 'Nom',
                ))
                ->add('firstname', null, array(
                    'label' => 'Prénom',
                ))
                ->add('job', null, array(
                    'label' => 'Poste',
                ))
                ->add('phone', null, array(
                    'label' => 'Téléphone',
                ))
                ->add('mobile', null, array(
                    'label' => 'Mobile',
                ))
                ->add('email', null, array(
                    'label' => 'Email',
                ))
                ->add('company', 'sonata_type_model_list', array(
                    'label' => 'Entreprise',
                    'required'  => false,
                ))
            ->end()
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('lastname')
            ->add('firstname')
            ->add('job')
            ->add('phone')
            ->add('mobile')
            ->add('email')
        ;
    }

    public function toString($object)
    {
        return $object instanceof Client
            ? $object->getTitle()
            : $object->getFirstname()." ".$object->getLastname(); // shown in the breadcrumb on the create view
    }
}
