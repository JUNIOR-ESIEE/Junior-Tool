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
            ->add('client')
            ->add('deposit')
            ->add('title')
            ->add('description')
            ->add('deadline')
            ->add('state')
            ->add('commercial')
            ->add('commercialEnrollmentOpen')
            ->add('student')
            ->add('studentsEnrollmentOpen')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('client')
            ->add('deposit')
            ->add('title')
            ->add('deadline')
            ->add('state')
            ->add('commercial')
            ->add('student')
            ->add('scopeStatement')
            ->add('graphicCharter')
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
                ->add('client', 'sonata_type_model_list', array(
                    'label' => 'Client'
                ))
            ->end()
            ->with('Projet')
                ->add('deposit', 'date', array(
                    'label' => 'Date de dépôt',
                ))
                ->add('title', null, array(
                    'label' => "Titre de l'étude",
                ))
                ->add('description', null, array(
                    'label' => 'Description',
                ))
                ->add('deadline', 'date', array(
                    'label' => 'Date de fin',
                ))
                ->add('scopeStatement', 'sonata_media_type', array(
                    'required'      => false,
                    'provider'      => 'sonata.media.provider.file',
                    'context'       => 'scopeStatement',
                    'new_on_update' => false,
                    'label'         => 'Cahier des charges',
                ))
                ->add('graphicCharter', 'sonata_media_type', array(
                    'required'      => false,
                    'provider'      => 'sonata.media.provider.file',
                    'context'       => 'graphicCharter',
                    'new_on_update' => false,
                    'label'         => 'Charte graphique',
                ))
            ->end()
            ->with('Suivi')
                ->add('state', null, array(
                    'label' => 'État en cours',
                ))
                ->add('commercial', 'sonata_type_model_list', array(
                    'label' => 'Commercial',
                    'required'  => false,
                ))
                ->add('rbu', 'sonata_type_model_list', array(
                    'label' => 'RBU',
                    'required'  => false,
                ))
            ->end()
            ->with('Réalisation')
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
            ->add('client')
            ->add('deposit')
            ->add('title')
            ->add('description')
            ->add('deadline')
            ->add('state')
            ->add('commercial')
            ->add('rbu')
            ->add('student')
            ->add('scopeStatement')
            ->add('graphicCharter')
        ;
    }

    public function prePersist($object)
    {
        if($object->getCommercial() == NULL) $object->setCommercialEnrollmentOpen(1);
        if($object->getCommercial() != NULL) $object->setCommercialEnrollmentOpen(0);
        if($object->getStudent() == NULL) $object->setStudentsEnrollmentOpen(1);
        if($object->getStudent() != NULL) $object->setStudentsEnrollmentOpen(0);
    }

    public function preUpdate($object)
    {
        if($object->getCommercial() == NULL) $object->setCommercialEnrollmentOpen(1);
        if($object->getCommercial() != NULL) $object->setCommercialEnrollmentOpen(0);
        if($object->getStudent() == NULL) $object->setStudentsEnrollmentOpen(1);
        if($object->getStudent() != NULL) $object->setStudentsEnrollmentOpen(0);
    }

    public function toString($object)
    {
        return $object instanceof Etude
            ? $object->getTitle()
            : 'Etude'; // shown in the breadcrumb on the create view
    }
}
