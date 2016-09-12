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
     * @param string  $message
     * @param mixed[] $context
     *
     * @return $this
     */
    protected function logEmergency($message, $context = [])
    {
        if ($this->logger instanceof LoggerInterface) {
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
        if ($this->logger instanceof LoggerInterface) {
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
        if ($this->logger instanceof LoggerInterface) {
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
        if ($this->logger instanceof LoggerInterface) {
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
        if ($this->logger instanceof LoggerInterface) {
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
        if ($this->logger instanceof LoggerInterface) {
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
        if ($this->logger instanceof LoggerInterface) {
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
        if ($this->logger instanceof LoggerInterface) {
            $this->logger->debug($message, $context);
        }

        return $this;
    }
}

/* EOF */
