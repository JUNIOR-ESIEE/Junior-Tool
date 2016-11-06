<?php

namespace Application\Sonata\UserBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class RatingAdmin extends Admin
{
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('rating')
            ->add('comment')
            ->add('commercial')
            ->add('student')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('rating')
            ->add('comment')
            ->add('commercial')
            ->add('student')
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
            ->with('Notation')
                ->add('rating', null, array(
                    'label' => 'Note',
                ))
                ->add('comment', null, array(
                    'label' => 'Commentaire',
                ))
                ->add('commercial', 'sonata_type_model_list', array(
                    'label' => 'Commercial',
                    'required'  => false,
                ))
                ->add('student', 'sonata_type_model_list', array(
                    'label' => 'Étudiant',
                    'required'  => false,
                ))
            ->end()
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('rating')
            ->add('comment')
            ->add('commercial')
            ->add('student')
        ;
    }

    public function toString($object)
    {
        return $object instanceof Etude
            ? $object->getTitle()
            : 'Notation'; // shown in the breadcrumb on the create view
    }
}
