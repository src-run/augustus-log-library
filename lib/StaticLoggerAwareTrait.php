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
     */
    final public static function hasLogger(): bool
    {
        return null !== static::$loggerAware && static::$loggerAware->hasLogger();
    }

    /**
     * Returns a logger instance or null.
     *
     * @return LoggerInterface|null
     */
    final public static function getLogger()
    {
        return null !== static::$loggerAware ? static::$loggerAware->getLogger() : null;
    }

    /**
     * Sets logger instance.
     *
     * @param LoggerInterface|null $logger An instance of LoggerInterface
     *
     * @return LoggerAwareInterface
     */
    final public static function setLogger(LoggerInterface $logger = null)
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
    final protected static function logEmergency($message, array $context = [])
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
    final protected static function logAlert($message, array $context = [])
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
    final protected static function logCritical($message, array $context = [])
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
    final protected static function logError($message, array $context = [])
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
    final protected static function logWarning($message, array $context = [])
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
    final protected static function logNotice($message, array $context = [])
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
    final protected static function logInfo($message, array $context = [])
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
    final protected static function logDebug($message, array $context = [])
    {
        return static::$doScopedLog->invokeArgs(static::$loggerAware, [__FUNCTION__, $message, $context]);
    }
}
