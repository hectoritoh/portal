<?php

// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace Celmedia\PortalBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CiudadAdmin extends Admin {

    
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper) {




        $formMapper
                ->add('nombre', 'text', array('label' => 'Nombre de la ciudad'))
                ->add('estado', 'choice', array('choices' => array('1' => 'Activo', '0' => 'Inactivo'))) //if no type is specified, SonataAdminBundle tries to guess it
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