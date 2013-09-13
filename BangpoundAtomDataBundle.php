<?php

namespace Bangpound\Atom\DataBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use Doctrine\Bundle\MongoDBBundle\DependencyInjection\Compiler\DoctrineMongoDBMappingsPass;
use Doctrine\Bundle\CouchDBBundle\DependencyInjection\Compiler\DoctrineCouchDBMappingsPass;
use Doctrine\Bundle\PHPCRBundle\DependencyInjection\Compiler\DoctrinePhpcrMappingsPass;

class BangpoundAtomDataBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $modelDir = realpath(__DIR__.'/Resources/config/doctrine/model');
        $mappings = array(
            $modelDir => 'Bangpound\Atom\DataBundle\Model',
        );

        $ormCompilerClass = 'Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass';
        if (class_exists($ormCompilerClass)) {
            $container->addCompilerPass(
                DoctrineOrmMappingsPass::createYamlMappingDriver(
                    $mappings,
                    array('bangpound_atom_data.model_manager_name'),
                    'bangpound_atom_data.backend_type_orm'
            ));
        }

        $mongoCompilerClass = 'Doctrine\Bundle\MongoDBBundle\DependencyInjection\Compiler\DoctrineMongoDBMappingsPass';
        if (class_exists($mongoCompilerClass)) {
            $container->addCompilerPass(
                DoctrineMongoDBMappingsPass::createYamlMappingDriver(
                    $mappings,
                    array('bangpound_atom_data.model_manager_name'),
                    'bangpound_atom_data.backend_type_mongodb'
            ));
        }

        $couchCompilerClass = 'Doctrine\Bundle\CouchDBBundle\DependencyInjection\Compiler\DoctrineCouchDBMappingsPass';
        if (class_exists($couchCompilerClass)) {
            $container->addCompilerPass(
                DoctrineCouchDBMappingsPass::createYamlMappingDriver(
                    $mappings,
                    array('bangpound_atom_data.model_manager_name'),
                    'bangpound_atom_data.backend_type_couchdb'
            ));
        }

        $phpcrCompilerClass = 'Doctrine\Bundle\PHPCRBundle\DependencyInjection\Compiler\DoctrinePhpcrMappingsPass';
        if (class_exists($phpcrCompilerClass)) {
            $container->addCompilerPass(
                DoctrinePhpcrMappingsPass::createYamlMappingDriver(
                    $mappings,
                    array('bangpound_atom_data.model_manager_name'),
                    'bangpound_atom_data.backend_type_phpcr'
            ));
        }
    }
}
