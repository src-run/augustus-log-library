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

/**
 * Trait that enabled logging.
 */
trait LoggerAwareTrait
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Returns true if a logger instance is set.
     *
     * @return bool
     */
    final public function hasLogger()
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
     * @param null|LoggerInterface $logger An instance of LoggerInterface.
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
     * @param string  $message      The log message.
     * @param mixed[] $replacements String replacements for the message.
     *
     * @return $this
     */
    final protected function logEmergency($message, $replacements = [])
    {
        if ($this->hasLogger()) {
            $this->logger->emergency($message, $replacements);
        }

        return $this;
    }

    /**
     * Log an alert entry.
     *
     * @param string  $message      The log message.
     * @param mixed[] $replacements String replacements for the message.
     *
     * @return $this
     */
    final protected function logAlert($message, $replacements = [])
    {
        if ($this->hasLogger()) {
            $this->logger->alert($message, $replacements);
        }

        return $this;
    }

    /**
     * Log a critical entry.
     *
     * @param string  $message      The log message.
     * @param mixed[] $replacements String replacements for the message.
     *
     * @return $this
     */
    final protected function logCritical($message, $replacements = [])
    {
        if ($this->hasLogger()) {
            $this->logger->critical($message, $replacements);
        }

        return $this;
    }

    /**
     * Log an error entry.
     *
     * @param string  $message      The log message.
     * @param mixed[] $replacements String replacements for the message.
     *
     * @return $this
     */
    final protected function logError($message, $replacements = [])
    {
        if ($this->hasLogger()) {
            $this->logger->error($message, $replacements);
        }

        return $this;
    }

    /**
     * Log a warning entry.
     *
     * @param string  $message      The log message.
     * @param mixed[] $replacements String replacements for the message.
     *
     * @return $this
     */
    final protected function logWarning($message, $replacements = [])
    {
        if ($this->hasLogger()) {
            $this->logger->warning($message, $replacements);
        }

        return $this;
    }

    /**
     * Log a notice entry.
     *
     * @param string  $message      The log message.
     * @param mixed[] $replacements String replacements for the message.
     *
     * @return $this
     */
    final protected function logNotice($message, $replacements = [])
    {
        if ($this->hasLogger()) {
            $this->logger->notice($message, $replacements);
        }

        return $this;
    }

    /**
     * Log an info entry.
     *
     * @param string  $message      The log message.
     * @param mixed[] $replacements String replacements for the message.
     *
     * @return $this
     */
    final protected function logInfo($message, $replacements = [])
    {
        if ($this->hasLogger()) {
            $this->logger->info($message, $replacements);
        }

        return $this;
    }

    /**
     * Log a debug entry.
     *
     * @param string  $message      The log message.
     * @param mixed[] $replacements String replacements for the message.
     *
     * @return $this
     */
    final protected function logDebug($message, $replacements = [])
    {
        if ($this->hasLogger()) {
            $this->logger->debug($message, $replacements);
        }

        return $this;
    }
}

/* EOF */
