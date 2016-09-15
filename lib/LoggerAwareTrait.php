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
     * Returns whether a logger instance is present.
     *
     * @return bool
     */
    public function hasLogger()
    {
        return $this->logger instanceof LoggerInterface;
    }

    /**
     * @param LoggerInterface $logger
     *
     * @return $this
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;

        return $this;
    }

    /**
     * Returns an instance of the logger.
     *
     * @return LoggerInterface
     */
    public function getLogger()
    {
        return $this->logger;
    }

    /**
     * @param string  $message
     * @param mixed[] $context
     *
     * @return $this
     */
    protected function logEmergency($message, $context = [])
    {
        if ($this->hasLogger()) {
            $this->logger->emergency($message, $context);
        }

        return $this;
    }

    /**
     * @param string  $message
     * @param mixed[] $context
     *
     * @return $this
     */
    protected function logAlert($message, $context = [])
    {
        if ($this->hasLogger()) {
            $this->logger->alert($message, $context);
        }

        return $this;
    }

    /**
     * @param string  $message
     * @param mixed[] $context
     *
     * @return $this
     */
    protected function logCritical($message, $context = [])
    {
        if ($this->hasLogger()) {
            $this->logger->critical($message, $context);
        }

        return $this;
    }

    /**
     * @param string  $message
     * @param mixed[] $context
     *
     * @return $this
     */
    protected function logError($message, $context = [])
    {
        if ($this->hasLogger()) {
            $this->logger->error($message, $context);
        }

        return $this;
    }

    /**
     * @param string  $message
     * @param mixed[] $context
     *
     * @return $this
     */
    protected function logWarning($message, $context = [])
    {
        if ($this->hasLogger()) {
            $this->logger->warning($message, $context);
        }

        return $this;
    }

    /**
     * @param string  $message
     * @param mixed[] $context
     *
     * @return $this
     */
    protected function logNotice($message, $context = [])
    {
        if ($this->hasLogger()) {
            $this->logger->notice($message, $context);
        }

        return $this;
    }

    /**
     * @param string  $message
     * @param mixed[] $context
     *
     * @return $this
     */
    protected function logInfo($message, $context = [])
    {
        if ($this->hasLogger()) {
            $this->logger->info($message, $context);
        }

        return $this;
    }

    /**
     * @param string  $message
     * @param mixed[] $context
     *
     * @return $this
     */
    protected function logDebug($message, $context = [])
    {
        if ($this->hasLogger()) {
            $this->logger->debug($message, $context);
        }

        return $this;
    }
}

/* EOF */
