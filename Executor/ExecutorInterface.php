<?php
/**
 * @project frne/quality-pimp-bundle
 * @license MIT
 * @author Frank Neff
 */

namespace Frne\Bundle\QualityPimpBundle;

use Frne\Bundle\QualityPimpBundle\Checks\CheckInterface;
use Psr\Log\LoggerAwareInterface;

interface ExecutorInterface extends LoggerAwareInterface
{
    /**
     * Executes registered checks
     *
     * @return boolean True on success, false otherwise
     */
    public function execute();

    /**
     * Registers a check for execution
     *
     * @param CheckInterface $check
     * @return void
     */
    public function registerCheck(CheckInterface $check);
} 