<?php
// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace Celmedia\PortalBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use FOS\UserBundle\Model\UserManagerInterface;

class UsuarioAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
           $formMapper
            ->with('General')
                ->add('username', "text")
                ->add('email', "text")
                ->add('plainPassword', 'text')
            ->end()
            ->with('Groups')
                ->add('groups', 'sonata_type_model', array('required' => false))
            ->end()
            ->with('Management')
                ->add('roles', 'sonata_security_roles', array( 'multiple' => true))
                ->add('locked', null, array('required' => false))
                ->add('expired', null, array('required' => false))
                ->add('enabled', null, array('required' => false))
                ->add('credentialsExpired', null, array('required' => false))
            ->end()
        ;
        
//         $formMapper
//        ->with('General')
//            ->add('username', 'text')
//            ->add('email', 'text')
//            ->add('plainPassword', 'text')
//        ->end();
                 
   
                 
                 
//                   ->with('Groups')
//          ->add('groups', 'sonata_type_model', array('required' => false))
//        ->end() ;
      /******************************************************************* 
          ->with('Groups')
          ->add('groups', 'sonata_type_model', array('required' => false))
        ->end() 
       ******************************************************************/
//        ->with('Management')
//            ->add('roles', 'sonata_security_roles', array( 'multiple' => true))
//            ->add('locked', null, array('required' => false))
//            ->add('expired', null, array('required' => false))
//            ->add('enabled', null, array('required' => false))
//            ->add('credentialsExpired', null, array('required' => false))
//        ->end();
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
//        $datagridMapper
//            ->add('username')
//            ->add('author')
        ;
    }

    
    
    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
//        $listMapper
//            ->addIdentifier('username')
//            ->add('slug')
//            ->add('author')
        ;
    }
    
    
     
    
}