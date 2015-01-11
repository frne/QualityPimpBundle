<?php
/**
 * @project frne/quality-pimp-bundle
 * @license MIT
 * @author Frank Neff
 */

namespace Frne\Bundle\QualityPimpBundle\Checks;

use Psr\Log\LoggerInterface;

class PhpUnitCheck extends AbstractCheck implements ConfigurableCheckInterface
{
    /**
     * @var array
     */
    private $options;

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return "Runs PHPUnit tests of the project";
    }

    /**
     * {@inheritdoc}
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    /**
     * {@inheritdoc}
     */
    public function getOptions()
    {
       return $this->options;
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        // TODO: Implement run() method.
    }
} 