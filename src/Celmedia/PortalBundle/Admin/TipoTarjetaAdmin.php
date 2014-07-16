<?php

// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace Celmedia\PortalBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class TipoTarjetaAdmin extends Admin {

    
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper) {


        



        $formMapper
        ->add('nombre', 'text', array('label' => 'Nombre del tipo'))

->add('estado', 'choice', array('choices' => array('1' => 'Activo', '0' => 'Inactivo')))
        ->add('imagen', 'sonata_media_type', array(
           'provider' => 'sonata.media.provider.image',
           'context'  => 'tarjeta'
           ))
             //if no type is specified, SonataAdminBundle tries to guess it
            ;
        }

    // Fields to be shown on filter forms
        protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
//        
            $datagridMapper
            ->add('nombre')
            ->add('estado')
            ;
        }

    // Fields to be shown on lists
        protected function configureListFields(ListMapper $listMapper) {
//        
            $listMapper
            ->addIdentifier('nombre')
            ->add('estado' ,  'choice', array('choices' => array('1' => 'Activo', '0' => 'Inactivo')))
            ;
        }


        
        

    }