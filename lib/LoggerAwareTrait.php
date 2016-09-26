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

trait LoggerAwareTrait
{
    /**
     * @var null|LoggerInterface
     */
    private $logger;

    /**
     * Returns true if a logger instance is set.
     *
     * @return bool
     */
    final public function hasLogger() : bool
    {
        return $this->logger instanceof LoggerInterface;
    }

    /**
     * Returns a logger instance or null.
     *
     * @return LoggerInterface|null
     */
    final public function getLogger()
    {
        return $this->logger;
    }

    /**
     * Sets logger instance.
     *
     * @param null|LoggerInterface $logger An instance of LoggerInterface
     *
     * @return $this
     */
    final public function setLogger(LoggerInterface $logger = null)
    {
        $this->logger = $logger;

        return $this;
    }

    /**
     * Log an emergency entry.
     *
     * @param string  $message The message string to log
     * @param mixed[] $context Replacement values for string
     *
     * @return $this
     */
    final protected function logEmergency($message, array $context = [])
    {
        return $this->doScopedLog(__FUNCTION__, $message, $context);
    }

    /**
     * Log an alert entry.
     *
     * @param string  $message The message string to log
     * @param mixed[] $context Replacement values for string
     *
     * @return $this
     */
    final protected function logAlert($message, array $context = [])
    {
        return $this->doScopedLog(__FUNCTION__, $message, $context);
    }

    /**
     * Log a critical entry.
     *
     * @param string  $message The message string to log
     * @param mixed[] $context Replacement values for string
     *
     * @return $this
     */
    final protected function logCritical($message, array $context = [])
    {
        return $this->doScopedLog(__FUNCTION__, $message, $context);
    }

    /**
     * Log an error entry.
     *
     * @param string  $message The message string to log
     * @param mixed[] $context Replacement values for string
     *
     * @return $this
     */
    final protected function logError($message, array $context = [])
    {
        return $this->doScopedLog(__FUNCTION__, $message, $context);
    }

    /**
     * Log a warning entry.
     *
     * @param string  $message The message string to log
     * @param mixed[] $context Replacement values for string
     *
     * @return $this
     */
    final protected function logWarning($message, array $context = [])
    {
        return $this->doScopedLog(__FUNCTION__, $message, $context);
    }

    /**
     * Log a notice entry.
     *
     * @param string  $message The message string to log
     * @param mixed[] $context Replacement values for string
     *
     * @return $this
     */
    final protected function logNotice($message, array $context = [])
    {
        return $this->doScopedLog(__FUNCTION__, $message, $context);
    }

    /**
     * Log an info entry.
     *
     * @param string  $message The message string to log
     * @param mixed[] $context Replacement values for string
     *
     * @return $this
     */
    final protected function logInfo($message, array $context = [])
    {
        return $this->doScopedLog(__FUNCTION__, $message, $context);
    }

    /**
     * Log a debug entry.
     *
     * @param string  $message The message string to log
     * @param mixed[] $context Replacement values for string
     *
     * @return $this
     */
    final protected function logDebug($message, array $context = [])
    {
        return $this->doScopedLog(__FUNCTION__, $message, $context);
    }

    /**
     * @param string  $scope
     * @param string  $message
     * @param mixed[] $context
     *
     * @return $this
     */
    final private function doScopedLog($scope, $message, array $context = [])
    {
        if ($this->hasLogger() && false !== $scope = $this->sanitizeScope($scope)) {
            call_user_func_array([$this->logger, $scope], [
                $message,
                $context,
            ]);
        }

        return $this;
    }

    /**
     * @param string $scope
     *
     * @return bool|string
     */
    final private function sanitizeScope($scope)
    {
        $scope = strtolower($scope);

        if (strpos($scope, 'log') === 0) {
            $scope = substr($scope, 3);
        }

        return in_array($scope, get_class_methods($this->logger), true) ? $scope : false;
    }
}
