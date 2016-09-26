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
use SR\Reflection\Inspect;
use SR\Reflection\Inspector\MethodInspector;

/**
 * Trait implementing static logger aware interface.
 */
trait StaticLoggerAwareTrait
{
    /**
     * @var LoggerAwareInterface
     */
    protected static $loggerAware;

    /**
     * @var MethodInspector
     */
    protected static $doScopedLog;

    /**
     * Returns true if a logger instance is set.
     *
     * @return bool
     */
    final static public function hasLogger() : bool
    {
        return static::$loggerAware !== null && static::$loggerAware->hasLogger();
    }

    /**
     * Returns a logger instance or null.
     *
     * @return LoggerInterface|null
     */
    final static public function getLogger()
    {
        return static::$loggerAware !== null ? static::$loggerAware->getLogger() : null;
    }

    /**
     * Sets logger instance.
     *
     * @param null|LoggerInterface $logger An instance of LoggerInterface
     *
     * @return LoggerAwareInterface
     */
    final static public function setLogger(LoggerInterface $logger = null)
    {
        if (!static::$loggerAware) {
            static::$loggerAware = new LoggerAware();
            static::$doScopedLog = Inspect::using(static::$loggerAware)->getMethod('doScopedLog');
        }

        return static::$loggerAware->setLogger($logger);
    }

    /**
     * Log an emergency entry.
     *
     * @param string  $message The message string to log
     * @param mixed[] $context Replacement values for string
     *
     * @return $this
     */
    final static protected function logEmergency($message, array $context = [])
    {
        return static::$doScopedLog->invokeArgs(static::$loggerAware, [__FUNCTION__, $message, $context]);
    }

    /**
     * Log an alert entry.
     *
     * @param string  $message The message string to log
     * @param mixed[] $context Replacement values for string
     *
     * @return $this
     */
    final static protected function logAlert($message, array $context = [])
    {
        return static::$doScopedLog->invokeArgs(static::$loggerAware, [__FUNCTION__, $message, $context]);
    }

    /**
     * Log a critical entry.
     *
     * @param string  $message The message string to log
     * @param mixed[] $context Replacement values for string
     *
     * @return $this
     */
    final static protected function logCritical($message, array $context = [])
    {
        return static::$doScopedLog->invokeArgs(static::$loggerAware, [__FUNCTION__, $message, $context]);
    }

    /**
     * Log an error entry.
     *
     * @param string  $message The message string to log
     * @param mixed[] $context Replacement values for string
     *
     * @return $this
     */
    final static protected function logError($message, array $context = [])
    {
        return static::$doScopedLog->invokeArgs(static::$loggerAware, [__FUNCTION__, $message, $context]);
    }

    /**
     * Log a warning entry.
     *
     * @param string  $message The message string to log
     * @param mixed[] $context Replacement values for string
     *
     * @return $this
     */
    final static protected function logWarning($message, array $context = [])
    {
        return static::$doScopedLog->invokeArgs(static::$loggerAware, [__FUNCTION__, $message, $context]);
    }

    /**
     * Log a notice entry.
     *
     * @param string  $message The message string to log
     * @param mixed[] $context Replacement values for string
     *
     * @return $this
     */
    final static protected function logNotice($message, array $context = [])
    {
        return static::$doScopedLog->invokeArgs(static::$loggerAware, [__FUNCTION__, $message, $context]);
    }

    /**
     * Log an info entry.
     *
     * @param string  $message The message string to log
     * @param mixed[] $context Replacement values for string
     *
     * @return $this
     */
    final static protected function logInfo($message, array $context = [])
    {
        return static::$doScopedLog->invokeArgs(static::$loggerAware, [__FUNCTION__, $message, $context]);
    }

    /**
     * Log a debug entry.
     *
     * @param string  $message The message string to log
     * @param mixed[] $context Replacement values for string
     *
     * @return $this
     */
    final static protected function logDebug($message, array $context = [])
    {
        return static::$doScopedLog->invokeArgs(static::$loggerAware, [__FUNCTION__, $message, $context]);
    }
}

/* EOF */
