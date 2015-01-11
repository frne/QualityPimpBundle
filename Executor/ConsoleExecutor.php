<?php
/**
 * @project frne/quality-pimp-bundle
 * @license MIT
 * @author Frank Neff
 */

namespace Frne\Bundle\QualityPimpBundle;

use Frne\Bundle\QualityPimpBundle\Checks\CheckInterface;
use Psr\Log\LoggerInterface;

class ConsoleExecutor extends AbstractExecutor
{
    /**
     * Executes registered checks
     *
     * @return boolean True on success, false otherwise
     */
    public function execute()
    {
        // TODO: Implement execute() method.
    }

    /**
     * Registers a check for execution
     *
     * @param CheckInterface $check
     * @return void
     */
    public function registerCheck(CheckInterface $check)
    {
        // TODO: Implement registerCheck() method.
    }

    /**
     * Sets a logger instance on the object
     *
     * @param LoggerInterface $logger
     * @return null
     */
    public function setLogger(LoggerInterface $logger)
    {
        // TODO: Implement setLogger() method.
    }


} 