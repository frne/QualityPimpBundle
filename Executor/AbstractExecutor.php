<?php
/**
 * @project frne/quality-pimp-bundle
 * @license MIT
 * @author Frank Neff
 */

namespace Frne\Bundle\QualityPimpBundle;

use Frne\Bundle\QualityPimpBundle\Checks\CheckInterface;
use Psr\Log\LoggerInterface;

abstract class AbstractExecutor implements ExecutorInterface
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var CheckInterface[]
     */
    protected $checks = array();

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
    public function registerCheck(CheckInterface $check)
    {
        $check->setLogger($this->logger);

        $this->checks[] = $check;
    }
}