<?php
/**
 * @project frne/quality-pimp-bundle
 * @license MIT
 * @author Frank Neff
 */

namespace Frne\Bundle\QualityPimpBundle\Checks;

use Psr\Log\LoggerInterface;

class LintTwigTemplatesCheck extends AbstractCheck
{
    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return "Validates Twig Templates (twig:lint)";
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        // TODO: Implement run() method.
    }
} 