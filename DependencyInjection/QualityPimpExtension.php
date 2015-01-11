<?php
/**
 * @project frne/quality-pimp-bundle
 * @license MIT
 * @author Frank Neff
 */

namespace Frne\Bundle\QualityPimpBundle\DependencyInjection;

use Frne\Bundle\QualityPimpBundle\Checks\CheckInterface;
use Frne\Bundle\QualityPimpBundle\Checks\ConfigurableCheckInterface;
use
    Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class QualityPimpExtension extends Extension
{

    /**
     * @param array $configs
     * @param ContainerBuilder $container
     * @throws \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     * @throws \Symfony\Component\DependencyInjection\Exception\LogicException
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config/services')
        );
        $loader->load('checks.xml');
        $loader->load('executors.xml');
        $loader->load('compiler.xml');

        if (!$container->hasParameter('qualitypimp.registry.checks_configured.class')) {
            throw new LogicException('Could\'nt find the check registry class');
        }

        $configuredChecksRegistry = new Definition(
            $container->getParameter('qualitypimp.registry.checks_configured.class')
        );

        foreach ($config['checks'] as $checkId => $checkConfig) {
            if (!$container->hasDefinition($checkId)) {
                throw new InvalidConfigurationException(
                    sprintf(
                        'Quality check with id %s does not exist!',
                        $checkId
                    )
                );
            }

            $check = $container->get($checkId);

            if (!$check instanceof CheckInterface) {
                throw new InvalidConfigurationException(
                    sprintf(
                        'Invalid quality check %s (must implement QualityCheckInterface)',
                        get_class($check)
                    )
                );
            }

            $checkDefinition = $container->getDefinition($checkId);

            if (
                array_key_exists('mute', $checkConfig) &&
                $checkConfig['mute']
            ) {
                $checkDefinition->addMethodCall('mute');
            }

            if (
                array_key_exists('options', $checkConfig) &&
                is_array($checkOptions = $checkConfig['options']) &&
                count($checkOptions) > 0 &&
                $check Instanceof ConfigurableCheckInterface
            ) {
                $checkDefinition->addMethodCall('setOptions', array($checkOptions));
            }

            $configuredChecksRegistry->addMethodCall(
                'registerCheck',
                array($checkId, $checkDefinition)
            );
        }

        var_dump($configuredChecksRegistry);

        $container->setDefinition('qualitypimp.registry.checks_configured', $configuredChecksRegistry);
    }
}
