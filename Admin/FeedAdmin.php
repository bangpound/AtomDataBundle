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

class FeedAdmin extends Admin
{
    public function setParentAssociationMapping($associationMapping)
    {
        $this->parentAssociationMapping = $associationMapping;
    }

    protected function configureSideMenu(ItemInterface $menu, $action, AdminInterface $childAdmin = null)
    {
        if (!$childAdmin && !in_array($action, array('edit', 'show'))) { return; }

        $admin = $this->isChild() ? $this->getParent() : $this;
        $id = $admin->getRequest()->get('id');

        $menu->addChild('Feed', array('uri' => $admin->generateUrl('show', array('id' => $id))));
        $menu->addChild('Entries', array('uri' => $admin->generateUrl('bangpound.atom.entry.list', array('id' => $id))));
    }

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
            ->add('feedTopic.topic.topicUrl')
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
        ;
    }

    protected function configureRoutes(RouteCollection $collection) {
        $collection->remove('edit');
        $collection->remove('create');
    }
}
