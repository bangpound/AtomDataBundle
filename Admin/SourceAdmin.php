<?php

namespace Bangpound\Atom\DataBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Knp\Menu\ItemInterface;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Route\RouteCollection;

class SourceAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('updated')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', null, array('route' => array('name' => 'show')))
            ->add('atomId')
            ->add('updated', 'datetime')
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('title')
            ->add('atomId')
            ->add('updated')
            ->add('authors')
            ->add('contributors')
            ->add('links', null, array('template' => 'BangpoundAtomDataBundle:CRUD:show_link_one_to_many.html.twig'))
            ->add('categories')
        ;
    }

    protected function configureRoutes(RouteCollection $collection) {
        $collection->remove('edit');
        $collection->remove('create');
    }
}
