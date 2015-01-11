<?php
/**
 * @project frne/quality-pimp-bundle
 * @license MIT
 * @author Frank Neff
 */

namespace Frne\Bundle\QualityPimpBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('quality_pimp');

        $rootNode->children()
        ->arrayNode('checks')
            ->info('A list of check id\'s and specific configurations')
            ->isRequired()
            ->requiresAtLeastOneElement()
            ->useAttributeAsKey('id')
            ->prototype('array')
                ->children()
                    ->booleanNode('mute')
                        ->info('Mutes the check, so no one cares about')
                        ->defaultFalse()
                    ->end()
                    ->arrayNode('options')
                        ->info('Key/value pairs for check specific options')
                        ->prototype('scalar')
                        ->end()
                    ->end()
                ->end()
            ->end()
        ->end()
    ;


        return $treeBuilder;
    }
}
