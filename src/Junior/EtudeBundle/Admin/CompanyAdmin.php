<?php

namespace Junior\EtudeBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class CompanyAdmin extends Admin
{
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('address')
            ->add('zipcode')
            ->add('city')
            ->add('country')
            ->add('website')
            ->add('phone')
            ->add('fax')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name')
            ->add('address')
            ->add('zipcode')
            ->add('city')
            ->add('country')
            ->add('website')
            ->add('phone')
            ->add('fax')
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
            ->with('Entreprise')
                ->add('name', null, array(
                    'label' => 'Nom',
                ))
                ->add('address', null, array(
                    'label' => 'Adresse',
                ))
                ->add('zipcode', null, array(
                    'label' => 'Code postal',
                ))
                ->add('city', null, array(
                    'label' => 'Ville',
                ))
                ->add('country', null, array(
                    'label' => 'Pays',
                ))
                ->add('website', null, array(
                    'label' => 'Site internet',
                ))
                ->add('phone', null, array(
                    'label' => 'Téléphone',
                ))
                ->add('fax', null, array(
                    'label' => 'Fax',
                ))
            ->end()
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('address')
            ->add('zipcode')
            ->add('city')
            ->add('country')
            ->add('website')
            ->add('phone')
            ->add('fax')
        ;
    }

    public function toString($object)
    {
        return $object instanceof Company
            ? $object->getTitle()
            : $object->getName(); // shown in the breadcrumb on the create view
    }
}
