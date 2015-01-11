<?php

namespace Frne\Bundle\QualityPimpBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class QualityChecksCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('qualitypimp.check_registry')) {
            return;
        }

        $definition = $container->getDefinition(
            'qualitypimp.check_registry'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'qualitypimp.check'
        );

        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall(
                'registerCheck',
                array($id, new Reference($id))
            );
        }
    }
}