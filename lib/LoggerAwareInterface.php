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

/**
 * Interface for logger aware.
 */
interface LoggerAwareInterface extends BaseLoggerAwareInterface
{
    /**
     * Returns an instance of the logger.
     *
     * @return LoggerInterface
     */
    public function getLogger();

    /**
     * Returns whether a logger instance is present.
     *
     * @return bool
     */
    public function hasLogger();
}

/* EOF */
