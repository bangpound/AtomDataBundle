<?php

namespace Bangpound\Atom\DataBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
use Knp\Menu\ItemInterface;
use Sonata\AdminBundle\Admin\AdminInterface;

class TopicAdmin extends Admin
{

    public function setParentAssociationMapping($associationMapping)
    {
        $this->parentAssociationMapping = $associationMapping;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('hubName', 'hub_name', array('required' => true))
            ->add('topicUrl', 'url', array('required' => true));
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('hubName')
            ->add('topicUrl')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('topicUrl', null, array('route' => array('name' => 'show')))
            ->add('hubName')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }

    protected function configureShowFields(ShowMapper $filter)
    {
        $filter
            ->add('topicUrl', null, array('template' => 'BangpoundAtomDataBundle:CRUD:show_orm_one_to_one.html.twig'))
            ->add('hubName')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }
}
