<?php
/**
 * @project frne/quality-pimp-bundle
 * @license MIT
 * @author Frank Neff
 */

namespace Frne\Bundle\QualityPimpBundle\Checks;

use Psr\Log\LoggerAwareInterface;

interface CheckInterface extends LoggerAwareInterface
{
    /**
     * Returns a short description of the check
     *
     * @return string
     */
    public function getDescription();

    /**
     * Mutes the check, so nothing happens if it fails
     *
     * @return void
     */
    public function mute();

    /**
     * Return whether the check is muted
     *
     * @return boolean
     */
    public function isMuted();

    /**
     * Executes the check
     *
     * @return boolean True on success, false otherwise
     */
    public function run();
} 