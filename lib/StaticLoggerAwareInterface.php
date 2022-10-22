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

use Psr\Log\LoggerInterface;

interface StaticLoggerAwareInterface
{
    /**
     * Returns true if a logger instance is set.
     */
    public static function hasLogger(): bool;

    /**
     * Returns a logger instance or null.
     *
     * @return LoggerInterface|null
     */
    public static function getLogger();

    /**
     * Sets logger instance.
     *
     * @param LoggerInterface|null $logger An instance of LoggerInterface
     */
    public static function setLogger(LoggerInterface $logger = null);
}
