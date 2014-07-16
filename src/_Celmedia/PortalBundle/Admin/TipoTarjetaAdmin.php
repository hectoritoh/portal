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


        $entity = $this->getSubject();

        // use $fileFieldOptions so we can add other options to the field
        $fileFieldOptions = array('required' => false);
        if ($entity->getImagen() && ($webPath = "uploads/tiposTarjetas/" . $entity->getImagen() )) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath() . '/' . $webPath;

            // add a 'help' option containing the preview's img tag
            $fileFieldOptions['help'] = '<img src="' . $fullPath . '" class="admin-preview" />';
        }



        $formMapper
                ->add('nombre', 'text', array('label' => 'Nombre del tipo'))
                ->add('file', 'file', $fileFieldOptions)
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

    public function prePersist($entity) {
        $entity->upload($this->getUploadPath());
    }

    public function preUpdate($entity) {
        $entity->upload($this->getUploadPath());
    }

    private function getUploadPath() {
        return __DIR__ . '/../../../../web/' .   $this->getWebPath() .'/';
    }
    
    private function getWebPath() {
        return 'uploads/tiposTarjetas';
    }
    
    

}