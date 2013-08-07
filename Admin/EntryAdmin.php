<?php

namespace Bangpound\Atom\DataBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class EntryAdmin extends Admin
{
    protected $datagridValues = array(
        '_page'       => 1,
        '_sort_order' => 'DESC', // sort direction
        '_sort_by' => 'updated' // field name
    );

    public function setParentAssociationMapping($associationMapping)
    {
        $this->parentAssociationMapping = $associationMapping;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array('required' => true))
            ->add('updated', 'datetime', array('required' => true));
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('published')
            ->add('updated')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', null, array('route' => array('name' => 'show')))
            ->add('source')
            ->add('published')
            ->add('updated')
        ;
    }

    protected function configureShowFields(ShowMapper $filter)
    {
        $entry = $this->getSubject();
        $filter
            ->add('atomId')
            ->add('title')
            ->add('published')
            ->add('updated')
            ->add('links', null, array('template' => 'BangpoundAtomDataBundle:CRUD:show_link_one_to_many.html.twig'))
            ->add('authors')
            ->add('contributors')
            ->add('categories')
            ->add('source', null, array('template' => 'BangpoundAtomDataBundle:CRUD:show_source_one_to_one.html.twig'))
        ;

        if ($entry->getSummaryType() == 'html') {
            $filter->add('summary', 'text', array('safe' => TRUE));
        }
        else {
            $filter->add('summary', 'text');
        }
    }

    protected function configureRoutes(RouteCollection $collection) {
        $collection->remove('edit');
        $collection->remove('create');
    }
}
