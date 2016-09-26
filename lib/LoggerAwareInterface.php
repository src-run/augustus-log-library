<?php

/*
 * This file is part of the `src-run/augustus-log-library` project.
 *
 * (c) Rob Frawley 2nd <rmf@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace SR\Log;

use Psr\Log\LoggerAwareInterface as BaseLoggerAwareInterface;
use Psr\Log\LoggerInterface;

interface LoggerAwareInterface extends BaseLoggerAwareInterface
{
    /**
     * Returns true if a logger instance is set.
     *
     * @return bool
     */
    public function hasLogger() : bool;

    /**
     * Returns a logger instance or null.
     *
     * @return LoggerInterface|null
     */
    public function getLogger();

    /**
     * Sets logger instance.
     *
     * @param null|LoggerInterface $logger An instance of LoggerInterface
     *
     * @return $this
     */
    public function setLogger(LoggerInterface $logger = null);
}
