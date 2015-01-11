<?php
/**
 * @project frne/quality-pimp-bundle
 * @license MIT
 * @author Frank Neff
 */

namespace Frne\Bundle\QualityPimpBundle\Checks;

use Psr\Log\LoggerInterface;

abstract class AbstractCheck implements CheckInterface
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var boolean
     */
    protected $muted = false;

    /**
     * {@inheritdoc}
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
    public function mute()
    {
        $this->muted = true;
    }

    /**
     * {@inheritdoc}
     */
    public function isMuted()
    {
        return $this->muted;
    }
} 