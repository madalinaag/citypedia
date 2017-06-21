<?php

namespace AppBundle\Admin\App;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class PlaceAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
//            ->add('category', 'sonata_type_model', array('multiple' => true, 'by_reference' => false))
            ->add('address')
            ->add('zip')
            ->add('phone')
            ->add('webAddress')
            ->add('openHours')
            ->add('description')
            ->add('isClaimed')
            ->add('isClosed')
            ->add('coordLatitude')
            ->add('coordLongitude')
            ->add('imageUrl')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name')
//            ->add('category', 'sonata_type_model', array('multiple' => true, 'by_reference' => false))
            ->add('address')
            ->add('zip')
            ->add('phone')
            ->add('webAddress')
            ->add('openHours')
            ->add('description')
            ->add('isClaimed')
            ->add('isClosed')
            ->add('coordLatitude')
            ->add('coordLongitude')
            ->add('imageUrl')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
//            ->add('category', 'sonata_type_model', array('multiple' => true, 'by_reference' => false))
            ->add('address')
            ->add('zip')
            ->add('phone')
            ->add('webAddress')
            ->add('openHours')
            ->add('description')
            ->add('isClaimed')
            ->add('isClosed')
            ->add('coordLatitude')
            ->add('coordLongitude')
            ->add('imageUrl')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
//            ->add('category', 'sonata_type_model', array('multiple' => true, 'by_reference' => false))
            ->add('address')
            ->add('zip')
            ->add('phone')
            ->add('webAddress')
            ->add('openHours')
            ->add('description')
            ->add('isClaimed')
            ->add('isClosed')
            ->add('coordLatitude')
            ->add('coordLongitude')
            ->add('imageUrl')
        ;
    }
}
